<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListCategory extends Component
{
    private $categories;
    private $filter_category;
    /**
     * Create a new component instance.
     */
    public function __construct($categories, $filterCategory)
    {
        $this->categories = $categories;
        $this->filter_category = $filterCategory;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = $this->categories;
        $filterCategory = $this->filter_category;
        return view('components.list-category', compact('categories', 'filterCategory'));
    }
}
