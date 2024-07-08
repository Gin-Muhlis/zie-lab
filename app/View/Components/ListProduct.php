<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListProduct extends Component
{

    private $products;
    private $categories;
    /**
     * Create a new component instance.
     */
    public function __construct($products, $categories)
    {
        $this->products = $products;
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $products = $this->products;
        $categories = $this->categories;
        return view('components.list-product', compact('products', 'categories'));
    }
}
