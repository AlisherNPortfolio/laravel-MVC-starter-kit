<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Crud extends Component
{
    public $actions;

    public $link;

    /**
     * Create a new component instance.
     *
     * @param array $actions
     * @param string $link
     */
    public function __construct(array $actions, string $link)
    {
        $this->actions = $actions;
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('admin.layouts.components.crud');
    }
}
