<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Validator::extend('bonus_spacing', 'App\Http\ScrabbleValidator@validateBonusSpacing');
         Validator::extend('tripleletter_spacing', 'App\Http\ScrabbleValidator@validateTripleLetterSpacing');
         Validator::extend('tripleletter_coexist', 'App\Http\ScrabbleValidator@validateTripleLetterCoexist');
         Validator::extend('doubletripleword_spacing', 'App\Http\ScrabbleValidator@validateDoubleTripleWordSpacing');
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
