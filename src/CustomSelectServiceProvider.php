<?php

namespace App\Statamic\Extensions\custom_select\CustomSelect;

use Statamic\Providers\AddonServiceProvider;

class CustomSelectServiceProvider extends AddonServiceProvider
{
    protected $fieldtypes = [
        CustomSelectFieldtype::class,
    ];

    protected $tags = [
        CustomSelectTags::class,
    ];

     protected $scripts = [
         __DIR__.'/../resources/dist/js/custom-select.js',
     ];

    public function boot()
    {
        parent::boot();

        $this->publishes([
            __DIR__.'/../config/custom-select.php' => config_path('custom-select.php'),
        ], 'config');
    }
}
