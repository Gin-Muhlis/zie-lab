<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Category extends Component
{
    private $categories;
    /**
     * Create a new component instance.
     */
    public function __construct($categories)
    {
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = $this->categories;
        return view('components.category', compact('categories'));
    }
}
