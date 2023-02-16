<?php


namespace App\Classes\Widget;


abstract class Widget
{
    protected $type;

    private $availableTypes = ['input', 'textarea'];

    private $requiredParams = ['name'];

    protected $name;

    protected $value;

    protected $otherAttributes = [];

    private $view;

    private function checkTypeAvailable(): void
    {
        if (!in_array($this->type, $this->availableTypes, true)) {
            throw new \InvalidArgumentException("'{$this->type}' type is not available. Available types: 'input', 'textarea'");
        }
    }

    private function checkPropertiesExist()
    {
        $allProperties = get_object_vars($this);
        foreach ($allProperties as $prop => $value) {
            if (!in_array($prop, $this->requiredParams, true)) {
                throw new \InvalidArgumentException("'{$prop}' parameter is required!");
            }
        }
    }

    protected function setView($view)
    {
        $this->view = $view;
    }

    protected function setConfigs($configs): Widget
    {
        foreach ($configs as $config => $configValue) {
            if (property_exists($this, $config)) {
                $this->{$config} = $configValue;
            } else {
                $this->otherAttributes[$config] = $configValue;
            }
        }
        $this->checkTypeAvailable();
        $this->checkPropertiesExist();
        return $this;
    }

    private function getParams()
    {
        return [
            'name' => $this->name,
            'value' => $this->value ?? '',
            'other_attributes' => $this->otherAttributes
        ];
    }

    protected function render()
    {
        return view($this->view, $this->getParams());
    }
}
