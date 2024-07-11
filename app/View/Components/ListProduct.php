<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListProduct extends Component
{

    private $products;
    private $categories;
    private $filterCategory;
    /**
     * Create a new component instance.
     */
    public function __construct($products, $categories, $filterCategory)
    {
        $this->products = $products;
        $this->categories = $categories;
        $this->filterCategory = $filterCategory;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $products = $this->products;
        $categories = $this->categories;
        $filterCategory = $this->filterCategory;

        return view('components.list-product', compact('products', 'categories', 'filterCategory'));
    }
}
