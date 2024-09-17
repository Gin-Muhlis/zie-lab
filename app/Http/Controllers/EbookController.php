<?php

namespace App\Http\Controllers;

use App\Repositories\Benefit\BenefitRepository;
use Exception;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreEbookRequest;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Category\CategoryRepository;

class EbookController extends Controller
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
        $data = $this->product_repository->getPaginationDataByType($page, $size, 'E-Book');

        return view('admin.products.ebooks.index', compact('data'));
    }

    // tampil tambah data
    public function create()
    {
        $categories = $this->category_repository->getData();
        return view('admin.products.ebooks.create', compact('categories'));
    }

    //  tambah data
    public function store(StoreEbookRequest $request)
    {
        $thumbnail_saved = null;
        $file_saved = null;
        
        try {
            $validated = $request->validated();

            $cropped_image = $validated['thumbnail_product'];
            $file_ebook = $validated['file_ebook'];

            do {
                $data['code'] = Str::random('10');
            } while (Product::where('code', $data['code'])->exists());

            $data['title'] = $validated['title'];
            $data['description'] = $validated['description'];
            $data['category_id'] = $validated['category_id'];
            $data['user_id'] = Auth::user()->id;
            $data['price'] = $validated['price'];
            $data['type'] = 'E-Book';
            $data['status'] = $validated['status'];

            if ($cropped_image) {
                $cropped_image = str_replace('data:image/jpeg;base64,', '', $cropped_image);
                $cropped_image = str_replace(' ', '+', $cropped_image);

                $image_name = Str::random(40) . '.jpg';
                $path_thumbnail = 'public/images/products/ebooks/';

                $data['thumbnail'] = $path_thumbnail . $image_name;
                $thumbnail_saved = $data['thumbnail'];

                Storage::put($path_thumbnail . $image_name, base64_decode($cropped_image));
            }

            if ($file_ebook) {
                $data['file_book'] = $file_ebook->store('public/documents/product');
                $file_saved = $data['file_book'];
            }

            DB::beginTransaction();

            $product = $this->product_repository->createData($data);

            foreach ($validated['benefits'] as $benefit) {
                $data_benefit['product_id'] = $product->id;
                $data_benefit['benefit'] = $benefit;

                $this->benefit_repository->createData($data_benefit);
            }

            DB::commit();

            return redirect()->route('e-books.index')->with('success', 'Data berhasil ditambahkan');

        } catch (Exception $e) {
            DB::rollBack();

            if ($thumbnail_saved) {
                Storage::delete($thumbnail_saved);
            }
    
            if ($file_saved) {
                Storage::delete($file_saved);
            }
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan dengan sistem']);
        }
    }
}
