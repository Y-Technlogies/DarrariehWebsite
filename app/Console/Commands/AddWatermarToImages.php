<?php

namespace App\Console\Commands;

use App\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AddWatermarToImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'watermark:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add watermark to exsisting image';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $watermark = Image::make(Storage::disk(config('voyager.storage.disk'))->path(config('voyager.media.watermark.source')));

        $products = Product::cursor();

        $products->each(function ($product) use ($watermark) {

           $imagePath = Storage::disk(config('voyager.storage.disk'))->path($product->getCover());

           if (file_exists($imagePath)) {
               $this->line($imagePath);
               $image = Image::make($imagePath);
               $image->insert($watermark,
                   config('voyager.media.watermark.position'),
                   config('voyager.media.watermark.x'),
                   config('voyager.media.watermark.y'));

               $image->save($imagePath);
           }
        });
    }
}
