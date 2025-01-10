<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class modal extends Component
{
    public $movie;
    public $action;
    public $method;

    public function __construct($movie, $action, $method)
    {
        $this->movie = $movie;
        $this->action = $action;
        $this->method = $method;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
