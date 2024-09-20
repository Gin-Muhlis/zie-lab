<?php

namespace App\Http\Controllers;

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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        //
    }
}
