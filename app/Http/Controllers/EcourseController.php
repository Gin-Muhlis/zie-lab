<?php

namespace App\Http\Controllers;

use App\Repositories\Benefit\BenefitRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;

class EcourseController extends Controller
{
    private $product_repository;
    private $category_repository;
    private $benefit_repository;
    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository, BenefitRepository $benefitRepository)
    {
        $this->product_repository = $productRepository;
        $this->category_repository = $categoryRepository;
        $this->benefit_repository = $benefitRepository;
    }

    // tampil data
    public function index(Request $request)
    {
        $page = $request->page ?? 1;
        $size = 10;
        $data = $this->product_repository->getPaginationDataByType($page, $size, 'E-Course');

        return view('admin.products.ecourses.index', compact('data'));
    }
}
