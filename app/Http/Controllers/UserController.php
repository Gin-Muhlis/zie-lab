<?php

namespace App\Http\Controllers;

use App\Exports\templates\UserTemplate;
use App\Exports\UserExport;
use App\Http\Requests\ImportRequest;
use App\Imports\UserImport;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\User\UserRepository;

class UserController extends Controller
{
    private $user_repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->user_repository = $userRepository;
    }

    // tampil data
    public function index(Request $request)
    {
        try {
            $page = $request->page ?? 1;
            $size = 10;
            $data = $this->user_repository->getPaginationData($page, $size);

            return view('admin.data-master.users.index', compact('data'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan dengan sistem']);
        }
    }

    // tambah data
    public function store(StoreUserRequest $request)
    {
        try {
            $validated = $request->validated();

            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('public/images/users');
            }

            $this->user_repository->createData($validated);

            return redirect()->back()->with('success', 'Data berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan dengan sistem']);
        }
    }

    // edit data
    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $validated = $request->validated();

            $data['name'] = $validated['name_update'];
            $data['email'] = $validated['email_update'];
            $data['phone'] = $validated['phone_update'];
            $data['password'] = $validated['password_update'];

            if (is_null($data['password'])) {
                unset($data['password']);
            }  

            if ($request->hasFile('image_update')) {
                if ($user->image) {
                    $path_image = str_replace('storage', 'public', $user->image);
                    Storage::delete($path_image);
                }
                $data['image'] = $request->file('image_update')->store('public/images/users');
            }

            $this->user_repository->updateData($data, $user->id);

            return redirect()->back()->with('success', 'Data berhasil diperbarui');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan dengan sistem']);
        }
    }

    // hapus data
    public function destroy(User $user)
    {
        try {
            if ($user->image) {
                $path_icon = str_replace('storage', 'public', $user->image);
                Storage::delete($path_icon);
            }

            $this->user_repository->deleteData($user->id);

            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan dengan sistem']);
        }
    }

    // export data
    public function export() {
        $data = $this->user_repository->getData();

        return Excel::download(new UserExport($data), 'data pengguna.xlsx');
    }

    // import data
    public function import(ImportRequest $request) {
        $validated = $request->validated();

        Excel::import(new UserImport, $validated['file_import']);

        return redirect()->back()->with('success', 'Import data berhasil');
    }

    // download template
    public function templateDownload() {
        return Excel::download(new UserTemplate, 'template user.xlsx');
    }
}
