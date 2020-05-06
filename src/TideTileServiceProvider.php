<?php

namespace JonLynch\TideTile;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use JonLynch\TideTile\Commands\FetchTideDataCommand;

class TideTileServiceProvider extends ServiceProvider
{
 
    public function boot()
    {
        Livewire::component('tide-tile', TideTileComponent::class);

        if ($this->app->runningInConsole()) {
            $this->commands([
                FetchTideDataCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/dashboard-tide-tile'),
        ], 'dashboard-tide-tile-views');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard-tide-tile');
    }
}
