<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEfileRequest;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreEfileRequest;
use App\Repositories\Benefit\BenefitRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Category\CategoryRepository;

class EfileController extends Controller
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
        $data = $this->product_repository->getPaginationDataByType($page, $size, 'E-File');

        return view('admin.products.efiles.index', compact('data'));
    }

    // tampil tambah data
    public function create()
    {
        $categories = $this->category_repository->getData();
        return view('admin.products.efiles.create', compact('categories'));
    }

    //  tambah data
    public function store(StoreEfileRequest $request)
    {
        $thumbnail_saved = null;

        try {
            $validated = $request->validated();
            
            $cropped_image = $validated['thumbnail_product'];

            do {
                $data['code'] = Str::random('10');
            } while (Product::where('code', $data['code'])->exists());

            $data['title'] = $validated['title'];
            $data['description'] = $validated['description'];
            $data['category_id'] = $validated['category_id'];
            $data['user_id'] = Auth::user()->id;
            $data['price'] = $validated['price'];
            $data['type'] = 'E-File';
            $data['status'] = $validated['status'];
            $data['link_gdrive'] = $validated['link_gdrive'];

            if ($cropped_image) {
                $cropped_image = str_replace('data:image/jpeg;base64,', '', $cropped_image);
                $cropped_image = str_replace(' ', '+', $cropped_image);

                $image_name = Str::random(40) . '.jpg';
                $path_thumbnail = 'public/images/products/ebooks/';

                $data['thumbnail'] = $path_thumbnail . $image_name;
                $thumbnail_saved = $data['thumbnail'];

                Storage::put($path_thumbnail . $image_name, base64_decode($cropped_image));
            }

            DB::beginTransaction();

            $product = $this->product_repository->createData($data);

            foreach ($validated['benefits'] as $benefit) {
                $data_benefit['product_id'] = $product->id;
                $data_benefit['benefit'] = $benefit;

                $this->benefit_repository->createData($data_benefit);
            }

            DB::commit();

            return redirect()->route('e-files.index')->with('success', 'Data berhasil ditambahkan');

        } catch (Exception $e) {
            DB::rollBack();

            if ($thumbnail_saved) {
                Storage::delete($thumbnail_saved);
            }

            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan dengan sistem']);
        }
    }

    // detail data
    public function show($e_file)
    {
        try {
            $data = $this->product_repository->getDetailProduct($e_file);
            $categories = $this->category_repository->getData();

            return view('admin.products.efiles.detail', compact('data', 'categories'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan dengan sistem']);
        }
    }

    // edit data
    public function edit($e_book)
    {
        try {
            $data = $this->product_repository->getDetailProduct($e_book);
            $categories = $this->category_repository->getData();

            return view('admin.products.efiles.edit', compact('data', 'categories'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan dengan sistem']);
        }
    }

    // update data
    public function update(UpdateEfileRequest $request, $e_book)
    {

        $thumbnail_saved = null;

        try {
            $product = $this->product_repository->getDetailProduct($e_book);
            
            $validated = $request->validated();

            $cropped_image = $validated['thumbnail_product'] ?? null;

            do {
                $data['code'] = Str::random('10');
            } while (Product::where('code', $data['code'])->exists());

            $data['title'] = $validated['title'];
            $data['description'] = $validated['description'];
            $data['category_id'] = $validated['category_id'];
            $data['user_id'] = Auth::user()->id;
            $data['price'] = $validated['price'];
            $data['type'] = 'E-File';
            $data['status'] = $validated['status'];
            $data['link_gdrive'] = $validated['link_gdrive'];

            if ($cropped_image) {
                $cropped_image = str_replace('data:image/jpeg;base64,', '', $cropped_image);
                $cropped_image = str_replace(' ', '+', $cropped_image);

                $image_name = Str::random(40) . '.jpg';
                $path_thumbnail = 'public/images/products/ebooks/';

                $data['thumbnail'] = $path_thumbnail . $image_name;
                $thumbnail_saved = $data['thumbnail'];
                Storage::put($path_thumbnail . $image_name, base64_decode($cropped_image));
            }

            DB::beginTransaction();

            $this->product_repository->updateData($data, $product->id);

            if (isset($validated['deleted_benefits'])) {
                foreach ($validated['deleted_benefits'] as $delete_id) {
                    $this->benefit_repository->deleteData($delete_id);
                }
            }

            foreach ($validated['benefits'] as $benefit) {
                if (!$this->benefit_repository->findBenefitByProductId($benefit, $product->id)) {
                    $data_benefit['product_id'] = $product->id;
                    $data_benefit['benefit'] = $benefit;

                    $this->benefit_repository->createData($data_benefit);
                }
            }

            DB::commit();

            if ($product->thumbnail && $cropped_image) {
                Storage::delete($product->thumbnail);
            }

            return redirect()->route('e-files.index')->with('success', 'Data berhasil diperbarui');

        } catch (Exception $e) {
            dd($e->getMessage());
            DB::rollBack();

            if ($thumbnail_saved) {
                Storage::delete($thumbnail_saved);
            }
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan dengan sistem']);
        }
    }
}
