<?php

namespace App\Http\Controllers;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Faq\FaqRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\ProfileCompany\ProfileCompanyRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $profile_company_repository;
    private $category_repository;
    private $product_repository;
    private $faq_repository;


    public function __construct(ProfileCompanyRepository $profileCompanyRepository, CategoryRepository $categoryRepository, ProductRepository $productRepository, FaqRepository $faqRepository) {
        $this->profile_company_repository = $profileCompanyRepository;
        $this->category_repository = $categoryRepository;
        $this->product_repository = $productRepository;
        $this->faq_repository = $faqRepository;
    }

    // landing page
    public function index() {
        $profile_company = $this->profile_company_repository->getData();
        $categories = $this->category_repository->getCategoryHasProduct();
        $products = $this->product_repository->getData();
        $faqs = $this->faq_repository->getData();

        return view('welcome', compact('profile_company', 'categories', 'products', 'faqs'));
    }
}
