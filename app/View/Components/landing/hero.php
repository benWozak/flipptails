<?php

namespace App\View\Components\landing;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class hero extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.landing.hero');
    }
}
