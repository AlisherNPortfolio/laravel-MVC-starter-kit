<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Notifier extends Component
{
    public $errors;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($errors)
    {
        $this->errors = $errors;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('admin.layouts.components.notifier');
    }
}
