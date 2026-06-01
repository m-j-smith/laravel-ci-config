<?php

namespace MJSmith\LaravelCiConfig;

use Illuminate\Support\ServiceProvider;
use MJSmith\LaravelCiConfig\Console\InstallCommand;

class CiConfigServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }
}