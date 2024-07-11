<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FilterBrowseProduct extends Component
{

    private $categories;
    private $filter;
    /**
     * Create a new component instance.
     */
    public function __construct($categories, $filter)
    {
        $this->categories = $categories;
        $this->filter = $filter;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = $this->categories;
        $filter = $this->filter;

        return view('components.filter-browse-product', compact('categories', 'filter'));
    }
}
