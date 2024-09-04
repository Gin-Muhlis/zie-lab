<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Exports\CategoryExport;
use App\Imports\CategoryImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Exports\templates\CategoryTemplate;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\ImportCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\Category\CategoryRepository;

class CategoryController extends Controller
{
    private $category_repository;

    public function __construct(CategoryRepository $categoryRepository) {
        $this->category_repository = $categoryRepository;
    }
   
    // tampil data
    public function index(Request $request)
    {
        $page = $request->page ?? 1;
        $size = 10;
        $data = $this->category_repository->getPaginationData($page, $size);

        return view('admin.data-master.categories.index', compact('data'));
    }
    
    // tambah data
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
    
    // edit data
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

    // hapus data
    public function destroy(Category $category)
    {
        try {

            $this->category_repository->deleteData($category->id);

            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan dengan sistem']);
        }
    }

    // export data
    public function export() {
        $data = $this->category_repository->getData();

        return Excel::download(new CategoryExport($data), 'data kategori.xlsx');
    }

    // import data
    public function import(ImportCategoryRequest $request) {
        $validated = $request->validated();

        $spreadsheet = IOFactory::load($validated['file_import']);
        $sheet = $spreadsheet->getActiveSheet();

        $drawings = $sheet->getDrawingCollection();

        Excel::import(new CategoryImport, $validated['file_import']);

        return redirect()->back()->with('success', 'Import data berhasil');
    }

    // download template
    public function templateDownload() {
        return Excel::download(new CategoryTemplate, 'template kategori.xlsx');
    }
}
