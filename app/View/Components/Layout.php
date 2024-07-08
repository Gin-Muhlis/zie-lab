<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    private $profileCompany;
    /**
     * Create a new component instance.
     */
    public function __construct($profileCompany)
    {
        $this->profileCompany = $profileCompany;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $profileCompany = $this->profileCompany;
        return view('components.layout', compact('profileCompany'));
    }
}
