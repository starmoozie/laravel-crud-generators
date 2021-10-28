<?php

namespace Starmoozie\Generators\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CrudStarmoozieCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'starmoozie:crud {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a CRUD interface: Controller, Model, Request';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = (string) $this->argument('name');
        $nameTitle = ucfirst(Str::camel($name));
        $nameKebab = Str::kebab($nameTitle);
        $namePlural = ucfirst(str_replace('-', ' ', Str::plural($nameKebab)));

        // Create the CRUD Model and show output
        $this->call('starmoozie:crud-model', ['name' => $nameTitle]);

        // Create the CRUD Controller and show output
        $this->call('starmoozie:crud-controller', ['name' => $nameTitle]);

        // Create the CRUD Request and show output
        $this->call('starmoozie:crud-request', ['name' => $nameTitle]);

        // Create the CRUD route
        $this->call('starmoozie:add-custom-route', [
            'code' => "Route::crud('$nameKebab', '{$nameTitle}CrudController');",
        ]);

        // Create the sidebar item
        $this->call('starmoozie:add-sidebar-content', [
            'code' => "<li class='nav-item'><a class='nav-link' href='{{ starmoozie_url('$nameKebab') }}'><i class='nav-icon la la-question'></i> $namePlural</a></li>",
        ]);

        // if the application uses cached routes, we should rebuild the cache so the previous added route will
        // be acessible without manually clearing the route cache.
        if (app()->routesAreCached()) {
            $this->call('route:cache');
        }
    }
}
