<?php

namespace App\Http\Controllers;

use App\Exports\ProfileCompanyExport;
use App\Models\ProfileCompany;
use Exception;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProfileCompanyRequest;
use App\Http\Requests\UpdateProfileCompanyRequest;
use App\Repositories\ProfileCompany\ProfileCompanyRepository;
use Maatwebsite\Excel\Facades\Excel;

class ProfileCompanyController extends Controller
{
    private $profile_company_repository;

    public function __construct(ProfileCompanyRepository $profileCompanyRepository) {
        $this->profile_company_repository = $profileCompanyRepository;
    }
   
    // tampil data
    public function index()
    {
        $data = $this->profile_company_repository->getData();

        return view('admin.data-master.profileCompanies.index', compact('data'));
    }
    
    // edit data
    public function update(UpdateProfileCompanyRequest $request, ProfileCompany $profileCompany)
    {
        try {
            $validated = $request->validated();

            if ($request->hasFile('icon')) {
                if ($profileCompany->icon) {
                    Storage::delete($profileCompany->icon);
                }
                $validated['icon'] = $request->file('icon')->store('public/images/profile-companies');
            }

            $this->profile_company_repository->updateData($validated, $profileCompany->id);

            return redirect()->back()->with('success', 'Data berhasil diperbarui');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan dengan sistem']);
        }
    }

    // export data
    public function export() {
        $data = $this->profile_company_repository->getData();

        return Excel::download(new ProfileCompanyExport($data), 'data biodata perusahaan.xlsx');
    }
}
