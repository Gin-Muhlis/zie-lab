<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\Category\CategoryRepository;

class CategoryController extends Controller
{
    private $category_repository;

    public function __construct(CategoryRepository $categoryRepository) {
        $this->category_repository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->category_repository->getData();
    
        return view('admin.data-master.categories.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            $validated = $request->validated();

            if ($request->hasFile('icon')) {
                $validated['icon'] = $request->file('icon')->store('public/images/categories');
            }

            $this->category_repository->createData($validated);

            return redirect()->back()->with('success', 'Data berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan dengan sistem']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $validated = $request->validated();

            if ($request->hasFile('icon')) {
                if ($category->icon) {
                    $path_icon = str_replace('storage', 'public', $category->icon);
                    Storage::delete($path_icon);
                }
                $validated['icon'] = $request->file('icon')->store('public/images/categories');
            }

            $this->category_repository->updateData($validated, $category->id);

            return redirect()->back()->with('success', 'Data berhasil diperbarui');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan dengan sistem']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
