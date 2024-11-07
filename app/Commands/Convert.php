<?php

namespace App\Commands;

use App\Converter;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class Convert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'convert {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert CSV file to XML format';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $converter = new Converter(path: $this->argument('file'));
        print_r($converter->toXml());
    }
}
