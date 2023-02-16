<?php

namespace App\View\Components;

use http\Exception\InvalidArgumentException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class ImageUploader extends Component
{
    public $name;

    public $class;

    public $value;

    public $attributes;

    private $builtInAttributes = ["name", "id", "class", "value"];

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param string $class
     * @param Model|null $value
     */
    public function __construct(string $name, string $class = null, Model $value = null)
    {
        if (!$name) {
            throw new \InvalidArgumentException("'name' attribute required in x-image-uploader component");
        }
        $this->name = $name;
        $this->class = $class ?? '';
        $this->value = $value ? $value->{$name} : '';
    }

    private function setAttributes($attributes)
    {
        array_walk($attributes, function ($item) {
            $attr = explode("=", $item);
            if (in_array($attr[0], $this->builtInAttributes) && isset($attr[1])) {
                if ($attr[0] === 'class') {
                    $this->{$attr} .= " {$attr[1]}";
                } else {
                    $this->{$attr} = " {$item}";
                }
            } else {
                $this->attributes .= " {$item}";
            }
        });
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('admin.layouts.components.image-uploader');
    }
}
