<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title, $cardHeader;


    public function __construct($title, $cardHeader = '')
    {
       $this->title = $title;

       $this->cardHeader = $cardHeader;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.components.admin-layout');
    }
}
