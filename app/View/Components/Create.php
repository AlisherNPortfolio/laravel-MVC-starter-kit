<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Create extends Component
{
    public $link;

    public $can;

    /**
     * Create a new component instance.
     *
     * @param string $link
     * @param bool $can
     */
    public function __construct(string $link, bool $can)
    {
        $this->link = $link;
        $this->can = $can;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('admin.layouts.components.create');
    }
}
