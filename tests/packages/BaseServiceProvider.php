<?php

namespace Laranext\Tests\Packages;

use Illuminate\Support\ServiceProvider;

abstract class BaseServiceProvider extends ServiceProvider
{
    public function register() {}

    public function boot() {}
}
