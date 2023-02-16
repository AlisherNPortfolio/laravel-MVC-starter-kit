<?php


namespace App\Classes\Widget;


class TranslationInput extends Widget
{
    public static function run(string $view, array $configs)
    {
        $selfInstance = new self();
        $selfInstance->setView($view);
        return $selfInstance->setConfigs($configs);
    }
}
