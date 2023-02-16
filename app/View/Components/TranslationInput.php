<?php

namespace App\View\Components;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class TranslationInput extends Component
{
    public $type;

    public $name;

    public $id;

    public $class;

    public $placeholder;

    public $slugable;

    public $value;

    public $rows;

    public $languages = [];

    public $richTextBox;

    /**
     * Create a new component instance.
     *
     * @param Model $value
     * @param string $type
     * @param string $name
     * @param string|null $class
     * @param string|null $id
     * @param string|null $placeholder
     * @param string|null $slugable
     * @param string|null $rows
     * @param string|null $richTextBox
     */
    public function __construct(
        string $type,
        string $name,
        string $class = null,
        string $id = null,
        string $placeholder = null,
        string $slugable = null,
        string $rows = null,
        string $richTextBox = null,
        Model $value = null
    )
    {
        $this->type = $type;
        $this->name = $name;
        $this->class = $class ?? null;
        $this->id = $id ?? null;
        $this->placeholder = $placeholder ?? null;
        $this->slugable = $slugable ?? null;
        $this->rows = $rows ?? null;
        $this->richTextBox = $richTextBox ?? false;
        $this->value = $value ? $value->original($name) : '';

        $this->languages = languages();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('admin.layouts.components.translation-input');
    }
}
