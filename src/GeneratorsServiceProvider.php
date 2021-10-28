<?php

namespace Starmoozie\Generators;

use Starmoozie\Generators\Console\Commands\BuildStarmoozieCommand;
use Starmoozie\Generators\Console\Commands\ChartStarmoozieCommand;
use Starmoozie\Generators\Console\Commands\ChartControllerStarmoozieCommand;
use Starmoozie\Generators\Console\Commands\ConfigStarmoozieCommand;
use Starmoozie\Generators\Console\Commands\CrudStarmoozieCommand;
use Starmoozie\Generators\Console\Commands\CrudControllerStarmoozieCommand;
use Starmoozie\Generators\Console\Commands\CrudModelStarmoozieCommand;
use Starmoozie\Generators\Console\Commands\CrudOperationStarmoozieCommand;
use Starmoozie\Generators\Console\Commands\CrudRequestStarmoozieCommand;
use Starmoozie\Generators\Console\Commands\ModelStarmoozieCommand;
use Starmoozie\Generators\Console\Commands\RequestStarmoozieCommand;
use Starmoozie\Generators\Console\Commands\ViewStarmoozieCommand;
use Illuminate\Support\ServiceProvider;

class GeneratorsServiceProvider extends ServiceProvider
{
    protected $commands = [
        BuildStarmoozieCommand::class,
        ConfigStarmoozieCommand::class,
        CrudModelStarmoozieCommand::class,
        CrudControllerStarmoozieCommand::class,
        ChartControllerStarmoozieCommand::class,
        CrudOperationStarmoozieCommand::class,
        CrudRequestStarmoozieCommand::class,
        CrudStarmoozieCommand::class,
        ChartStarmoozieCommand::class,
        ModelStarmoozieCommand::class,
        RequestStarmoozieCommand::class,
        ViewStarmoozieCommand::class,
    ];

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
    }
}
