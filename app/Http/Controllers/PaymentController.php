<?php
namespace App\Http\Controllers;

use App\Order;
use App\OrderLine;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    private $token;
    private $url;
    private $client;
    private $header;

    /**
     * PaymentController constructor.
     */
    public function __construct()
    {
        $this->token = setting('myfatoora.token');
        $this->url = setting('myfatoora.base_url');
        $this->client = new Client();
        $this->header = [
            'Authorization' => $this->token,
            "Content-Type"  => "application/json"
        ];
    }

    public function pay()
    {
        $body = [
              "CustomerName" => "Ahmed",
              "NotificationOption" => "ALL",
              "DisplayCurrencyIso" => "KWD",
              "MobileCountryCode" => "+965",
              "CustomerMobile" => "92249038",
              "CustomerEmail" => "aramadan@myfatoorah.com",
              "InvoiceValue" => 100,
              "CallBackUrl" => route('pay.success'),
              "ErrorUrl" => route('pay.faild'),
              "Language" => "en",
              "CustomerReference" => "ref 1",
              "CustomerCivilId" => 12345678,
              "UserDefinedField" => "Custom field",
              "ExpireDate" => "",
              "CustomerAddress" => [
                        "Block" => "",
                        "Street" => "",
                        "HouseBuildingNo" => "",
                        "Address" => "",
                        "AddressInstructions" => ""
                ],
              "InvoiceItems" => []
        ];

        $body['InvoiceValue'] = Session::get('total');

        $customer = \App\Customer::find(Session::get('customer_id'));
        $body['CustomerName'] = ucfirst($customer->first_name);
        $body['CustomerMobile'] = $customer->phone;
        $body['CustomerEmail'] = $customer->email ?: 'admin@gmail.com';
        $body['CustomerReference'] = $customer->id;
        $body['CustomerAddress']['Address'] = $customer->address;

        $order = new Order();
        $order->customer_id = $customer->id;
        $order->status = 'requested';
        $order->save();

        foreach (Session::get('products') as $product) {
            $orderLine = new OrderLine();
            $orderLine->product_id = $product['product_id'];
            $orderLine->quantity = $product['quantity'];
            $orderLine->price = $product['price'];
            $orderLine->order_id = $order->id;
            $orderLine->color = $product['product_color'];
            $orderLine->size = $product['product_size'];
            $orderLine->save();

            array_push($body['InvoiceItems'],[
                'ItemName' => $product['product_id'],
                'Quantity' => (int) $product['quantity'],
                'UnitPrice' => $product['price'],
            ]);
        }

        $res = $this->client->post($this->url.'/v2/SendPayment', ['headers' => $this->header, RequestOptions::JSON => $body]);
        $data = json_decode($res->getBody()->getContents(), true);
        $order->invoice_id = $data['Data']['InvoiceId'];
        $order->save();

        return redirect()->to($data['Data']['InvoiceURL']);
    }

    public function success(Request $request)
    {
        $body = [];
        $key = array_key_exists('paymentId', $request->input()) ? 'paymentId' : 'invoiceId';
        $body['key'] = $request->get($key);
        $body['keyType'] = $key;

        $res = $this->client->post($this->url.'/v2/GetPaymentStatus', ['headers' => $this->header, RequestOptions::JSON => $body]);
        $data = json_decode($res->getBody()->getContents(), true);

        $order = Order::where('invoice_id', $data['Data']['InvoiceId'])->first();
        $order->status = $data['Data']['InvoiceStatus'];
        $order->save();

        Session::put('total', 0);
        Session::put('products', []);
        Session::put('products_count', 0);

        return redirect()->to('/')->with('success', 'You Order has been placed successfully');
    }

    public function faild()
    {
        echo 'Paymant faild';
    }
}
