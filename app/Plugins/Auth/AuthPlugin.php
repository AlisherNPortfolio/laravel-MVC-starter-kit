<?php


namespace App\Plugins\Auth;


use App\Classes\PluginLoader\Plugin;

class AuthPlugin extends Plugin
{
    public $name = 'auth';

    public function boot()
    {
        $this->enableViews();
        $this->enableRoutes();
    }
}
