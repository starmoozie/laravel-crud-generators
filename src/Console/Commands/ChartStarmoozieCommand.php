<?php

namespace Starmoozie\Generators\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class ChartStarmoozieCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'starmoozie:chart {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a ChartController and route';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $studlyName = Str::studly($this->argument('name')); // aka Pascal Case
        $kebabName = Str::kebab($this->argument('name'));

        // Create the ChartController and show output
        $this->call('starmoozie:chart-controller', ['name' => $studlyName]);

        // Create the chart route
        $this->call('starmoozie:add-custom-route', [
            'code' => "Route::get('charts/{$kebabName}', 'Charts\\{$studlyName}ChartController@response')->name('charts.{$kebabName}.index');",
        ]);
    }
}
