<?php

namespace App\Http\Controllers;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;

class EbookController extends Controller
{
    private $product_repository;
    private $category_repository;
    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->product_repository = $productRepository;
        $this->category_repository = $categoryRepository;
    }

    // tampil data
    public function index(Request $request)
    {
        $page = $request->page ?? 1;
        $size = 10;
        $data = $this->product_repository->getPaginationDataByType($page, $size, 'E-Book');

        return view('admin.products.ebooks.index', compact('data'));
    }

    // tampil tambah data
    public function create() {
        $categories = $this->category_repository->getData();
        return view('admin.products.ebooks.create', compact('categories'));
    }
}
