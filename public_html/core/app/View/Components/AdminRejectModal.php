<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminRejectModal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $task;

    public function __construct($task = 0)
    {
        $this->task = $task;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.components.admin-reject-modal');
    }
}
