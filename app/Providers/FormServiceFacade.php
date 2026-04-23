<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FormServiceFacade extends ServiceProvider {

    protected static function getFacadeAccessor()
    {
        return 'formservice';
    }
}


