<?php


namespace App\Plugins\Home;


use App\Classes\PluginLoader\Plugin;

class HomePlugin extends Plugin
{
    public $name = 'home';

    public function boot()
    {
        $this->enableViews();
        $this->enableRoutes();
    }
}
