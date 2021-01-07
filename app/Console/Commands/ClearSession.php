<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Session;

class ClearSession extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:cart';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear products from session';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $session = Session::all();

       $bar = $this->output->createProgressBar(count($session));
       $bar->start();

       foreach ($session as $index=>$value) {
           $this->info($value);
           $bar->advance();
       }

       $bar->finish();
    }
}
