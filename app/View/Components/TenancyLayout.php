<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class TenancyLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('tenancy.layouts.app');
    }
}
