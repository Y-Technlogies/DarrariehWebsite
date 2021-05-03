<?php

namespace App\Console\Commands;

use App\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AddWatermarToImages extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:watermark {arg}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add watermark to existing image';


    private $watermark;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->watermark = Image::make(Storage::disk(config('voyager.storage.disk'))->path(config('voyager.media.watermark.source')));
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        switch ($this->argument('arg')) {
            case 'all':
                $this->info('applying to all');
                $this->allImages();
                break;
            case file_exists(Storage::disk(config('voyager.storage.disk'))->path($this->argument('arg'))) :
                $this->info('applying on selected file');
                $this->onSingleFile();
                break;
            case preg_match('/^(?:resize-)+\d+$/m', $this->argument('arg')) == 1:
                $this->info('applying on selected thumbnails');
                $this->onThumbnailis();
                break;
            default:
                $this->info('Error!!');
                break;

        }
    }

    private function onSingleFile()
    {
        $imagePath = Storage::disk(config('voyager.storage.disk'))->path($this->argument('arg'));

        if (file_exists($imagePath)) {
            $this->line($imagePath);
            $image = Image::make($imagePath);
            $image->insert($this->watermark, config('voyager.media.watermark.position'), config('voyager.media.watermark.x'), config('voyager.media.watermark.y'));

            $image->save($imagePath);
        }
    }

    private function onThumbnailis()
    {
        $products = Product::cursor();

        $products->each(function ($product) {

            $images = json_decode($product->images);
            foreach ($images as $image)
            {
                $imagePath = Storage::disk(config('voyager.storage.disk'))->path($product->getThumbnail($image, $this->argument('arg')));
                $this->addWaterMark($imagePath);
            }
        });
    }

    private function allImages()
    {
        $products = Product::cursor();

        $products->each(function ($product) {
            $imagePath = Storage::disk(config('voyager.storage.disk'))->path($product->getCover());
            $this->addWaterMark($imagePath);
        });
    }

    private function addWaterMark($imagePath)
    {
        if (file_exists($imagePath)) {
            $this->line($imagePath);
            $image = Image::make($imagePath);
            $image->insert($this->watermark, config('voyager.media.watermark.position'), config('voyager.media.watermark.x'), config('voyager.media.watermark.y'));
            $image->save($imagePath);
        }
    }
}
