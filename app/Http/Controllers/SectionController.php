<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeOrderSectionRequest;
use App\Models\Product;
use App\Models\Section;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Repositories\Section\SectionRepository;
use Exception;

class SectionController extends Controller
{
    private $section_repository;
    public function __construct(SectionRepository $sectionRepository)
    {
        $this->section_repository = $sectionRepository;
    }

    // tambah data
    public function store(StoreSectionRequest $request)
    {
        try {
            $validated = $request->validated();

            $last_order_section = $this->section_repository->getLastOrderSection($validated['product_id']);

            $validated['order'] = $last_order_section->order + 1;

            $this->section_repository->createData($validated);
            
            return redirect()->back()->with('success', 'Data berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan dengan sistem']);
        }
    }

    // edit data
    public function update(UpdateSectionRequest $request, Section $section)
    {
        try {
            $validated = $request->validated();

            $this->section_repository->updateData($validated, $section->id);
            
            return redirect()->back()->with('success', 'Data berhasil diperbarui');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan dengan sistem']);
        }
    }

    // hapus data
    public function destroy(Section $section)
    {
        try {
            $this->section_repository->deleteData($section->id);

            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan dengan sistem']);
        }
    }

    // ubah urutan
    public function changeOrder(ChangeOrderSectionRequest $request, Product $product) {
            
            $validated = $request->validated();

            if ($validated['new_order'] === $validated['old_order']) {
                return redirect()->back()->with('success', 'Urutan berhasil diperbarui');
            }

            $section_update_first = $this->section_repository->getByOrderProductId($validated['old_order'], $product->id);

            $section_update_second = $this->section_repository->getByOrderProductId($validated['new_order'], $product->id);

            $data_update_first = [
                'order' => $validated['new_order']
            ];

            $data_update_second = [
                'order' => $validated['old_order']
            ];

            $this->section_repository->updateData($data_update_first, $section_update_first->id);
            $this->section_repository->updateData($data_update_second, $section_update_second->id);

            return redirect()->back()->with('success', 'Urutan berhasil diperbarui');
        
    }
}
