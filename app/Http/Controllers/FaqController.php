<?php

namespace App\Http\Controllers;

use App\Exports\FaqExport;
use App\Exports\templates\FaqTemplate;
use App\Http\Requests\ImportRequest;
use App\Imports\FaqImport;
use App\Models\Faq;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use App\Repositories\Faq\FaqRepository;
use Maatwebsite\Excel\Facades\Excel;

class FaqController extends Controller
{
    private $faq_repository;

    public function __construct(FaqRepository $faqRepository) {
        $this->faq_repository = $faqRepository;
    }
   
    // tampil data
    public function index(Request $request)
    {
        $page = $request->page ?? 1;
        $size = 10;
        $data = $this->faq_repository->getPaginationData($page, $size);

        return view('admin.data-master.faqs.index', compact('data'));
    }
    
    // tambah data
    public function store(StoreFaqRequest $request)
    {
        try {
            $validated = $request->validated();

            if ($request->hasFile('icon')) {
                $validated['icon'] = $request->file('icon')->store('public/images/categories');
            }

            $this->faq_repository->createData($validated);

            return redirect()->back()->with('success', 'Data berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan dengan sistem']);
        }
    }
    
    // edit data
    public function update(UpdateFaqRequest $request, Faq $faq)
    {
        try {
            $validated = $request->validated();

            $this->faq_repository->updateData($validated, $faq->id);

            return redirect()->back()->with('success', 'Data berhasil diperbarui');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan dengan sistem']);
        }
    }

    // hapus data
    public function destroy(Faq $faq)
    {
        try {

            $this->faq_repository->deleteData($faq->id);

            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan dengan sistem']);
        }
    }

    // export data
    public function export() {
        $data = $this->faq_repository->getData();

        return Excel::download(new FaqExport($data), 'data FAQ.xlsx');
    }

    // import data
    public function import(ImportRequest $request) {
        $validated = $request->validated();

        Excel::import(new FaqImport, $validated['file_import']);

        return redirect()->back()->with('success', 'Import data berhasil');
    }

    // download template
    public function templateDownload() {
        return Excel::download(new FaqTemplate, 'template FAQ.xlsx');
    }
}
