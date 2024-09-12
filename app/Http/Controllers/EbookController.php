<?php

namespace App\Http\Controllers;

use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;

class EbookController extends Controller
{
    private $product_repository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->product_repository = $productRepository;
    }

    // tampil data
    public function index(Request $request)
    {
        $page = $request->page ?? 1;
        $size = 10;
        $data = $this->product_repository->getPaginationData($page, $size);

        return view('admin.products.ebooks.index', compact('data'));
    }
}
