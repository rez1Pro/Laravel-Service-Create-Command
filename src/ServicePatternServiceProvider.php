<?php

namespace Rez1pro\ServicePattern;

use Illuminate\Support\ServiceProvider;
use Rez1pro\ServicePattern\MakeServiceCommand;

class ServicePatternServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->commands([MakeServiceCommand::class]);
    }
}
