<?php

namespace SaeidKhaleghi\PoliceReporter;

use Illuminate\Support\ServiceProvider;

class PoliceReporterServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'reporter');
    }

    public function register()
    {

    }

}
