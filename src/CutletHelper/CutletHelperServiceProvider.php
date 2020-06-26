<?php

namespace Va\CutletHelper;

use Illuminate\Support\ServiceProvider;
use Va\CutletHelper\Facades\CutletHelper;
use Va\CutletHelper\Helpers\Helper;

class CutletHelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        CutletHelper::shouldProxyTo(Helper::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        require_once(__DIR__ . '/Validations/helperValidation.php');

        $this->publishes([
            __DIR__ . '/../config/cutlet-helper.php' => config_path('cutlet-helper.php'),
        ], 'cutlet-helper');
    }
}
