<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Faqs extends Component
{

    private $faqs;
    /**
     * Create a new component instance.
     */
    public function __construct($faqs)
    {
        $this->faqs = $faqs;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        $faqs = $this->faqs;
        return view('components.faqs', compact('faqs'));
    }
}
