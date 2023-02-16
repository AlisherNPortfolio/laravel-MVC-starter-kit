<?php

namespace App\View\Components;

use http\Exception\InvalidArgumentException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class ShowTranslations extends Component
{
    public $translations;

    /**
     * Create a new component instance.
     *
     * @param $translations
     * @param string $name
     */
    public function __construct(Model $translations, string $name)
    {
        if (!$name) {
            throw new \InvalidArgumentException("'name' attribute is required in x-show-translations component");
        }
        $this->translations = $translations->original($name);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('admin.layouts.components.show-translations');
    }
}
