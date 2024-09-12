<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\ProfileCompany\ProfileCompanyRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $profile_company_repository;
    private $category_repository;
    private $product_repository;


    public function __construct(ProfileCompanyRepository $profileCompanyRepository, CategoryRepository $categoryRepository, ProductRepository $productRepository) {
        $this->profile_company_repository = $profileCompanyRepository;
        $this->category_repository = $categoryRepository;
        $this->product_repository = $productRepository;
    }

    // browse product
    public function listProduct(Request $request) {
        $page = $request->input('page', 1);
        $size = 9;
        $type = $request->input('type');
        $category = $request->input('category');
        $minimum_price = $request->input('minimum_price');
        $maximum_price = $request->input('maximum_price');
        $search = $request->input('search');

        $filter['type'] = $type;
        $filter['category'] = $category;
        $filter['minimum_price'] = $minimum_price;
        $filter['maximum_price'] = $maximum_price;
        $filter['search'] = $search;

        $profile_company = $this->profile_company_repository->getData();
        $categories = $this->category_repository->getCategoryHasProduct();

        $products = $this->product_repository->getBrowsePaginationData();

        if ($type) {
            $products->where('type', $type);
        }

        if ($category) {
            $products->where('category_id', $category);
        }

        if ($minimum_price) {
            $products->where('price', '>=', $minimum_price);
        }

        if ($maximum_price) {
            $products->where('price', '<=', $maximum_price);
        }

        if ($search) {
            $products->where('title', 'like', '%' . $search . '%');
        }

        $products = $products->paginate($size, ['*'], 'page', $page);

        $products->appends([
            'type' => $type,
            'category' => $category,
            'minimum_price' => $minimum_price,
            'maximum_price' => $maximum_price,
            'search' => $search
        ]);

        return view('pages.browse-product', compact('profile_company', 'products', 'categories', 'page', 'filter'));
    }

    // Detail produk
    public function detailProduct($code) {
        $profile_company = $this->profile_company_repository->getData();
        $product = $this->product_repository->getDetailProduct($code);
        
        return view('pages.detail-product', compact('profile_company', 'product'));
    }

    // pembayaran produk
    public function paymentProduct($code) {
        $profile_company = $this->profile_company_repository->getData();
        $product = $this->product_repository->getDetailProduct($code);

        return view('.pages.payment-product', compact('profile_company', 'product'));
    }
}
