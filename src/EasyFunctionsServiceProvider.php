<?php

namespace Bagsiz\EasyFunctions;

use Illuminate\Support\ServiceProvider;

class EasyFunctionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('command.activitylog:clean', CleanActivitylogCommand::class);
        $this->commands([
            'command.activitylog:clean',
        ]);
        
        $this->app->bind(EasyFunction::class, function () {
            return new EasyFunction();
        });
        $this->app->alias(EasyFunction::class, 'easy-functions');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
