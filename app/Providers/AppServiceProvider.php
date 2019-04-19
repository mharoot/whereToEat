<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade; // adding switch case functionality @ https://undebugable.wordpress.com/2016/12/30/using-switch-case-on-laravel-5-blade/
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // Switch case directive
        Blade::extend(function($value, $compiler){
            $value = preg_replace('/(\s*)@switch\((.*)\)(?=\s)/', '$1<?php switch($2):', $value);     $value = preg_replace('/(\s*)@endswitch(?=\s)/', '$1endswitch; ?>', $value);
            $value = preg_replace('/(\s*)@case\((.*)\)(?=\s)/', '$1case $2: ?>', $value);
            $value = preg_replace('/(?<=\s)@default(?=\s)/', 'default: ?>', $value);
            $value = preg_replace('/(?<=\s)@breakswitch(?=\s)/', '<?php break;', $value);
            return $value;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
