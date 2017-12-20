<?php

namespace SouthernIns\Laravel;


use Illuminate\Support\ServiceProvider;
use SouthernIns\Laravel\ArtisanCommands\UnserializeJson;

/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 12/20/2017
 * Time: 12:25 PM
 */
class RacoonsServiceProvider {

    public function boot(){
        // Boot runs after ALL providers are registered

    } //- END function boot()

    public function register(){

        if( $this->app->runningInConsole() ){
            $this->commands([
                UnserializeJson::class
                // Add additional Commands to load here.
            ]);
        }

    } //- END function register()

} //- END class RacoonsServiceProvider{}