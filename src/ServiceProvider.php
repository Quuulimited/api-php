<?php
    namespace Quuulimited\Api;

    class ServiceProvider extends \Illuminate\Support\ServiceProvider{

        public function boot()
        {
           
        }
        public function register()
        {
            // Import controllers
            $this->app->make('Quuulimited\Api\Api');
            
        }


    }