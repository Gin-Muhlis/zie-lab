<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use App\Repositories\User\UserRepository;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\ProfileCompany\ProfileCompanyRepository;

class AuthController extends Controller
{

    private $profile_company_repository;
    private $user_repository;


    public function __construct(ProfileCompanyRepository $profileCompanyRepository, UserRepository $userRepository)
    {
        $this->profile_company_repository = $profileCompanyRepository;
        $this->user_repository = $userRepository;
    }


    // Menampilkan page login
    public function loginPage()
    {
        $profile_company = $this->profile_company_repository->getData();
        return view('pages.login', compact('profile_company'));
    }

    // Menampilkan page register
    public function registerPage()
    {
        $profile_company = $this->profile_company_repository->getData();
        return view('pages.register', compact('profile_company'));
    }

    // cek login
    public function loginCheck(LoginRequest $request)
    {
        try {
            $validated = $request->validated();

            $remember = $request->filled('remember_token');

            if (!Auth::attempt($validated, $remember)) {
                return redirect()->back()->withErrors(['auth' => 'Email atau password salah'])->withInput();
            }

            if (Auth::user()->isSuperAdmin()) {
                return redirect()->route('dashboard.admin')->with('success', 'Selamat datang ' . Auth::user()->name);
            } else {
                return redirect()->route('dashboard.user')->with('success', 'Selamat datang ' . Auth::user()->name);
            }
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }

    }

    // cek register
    public function registerCheck(RegisterRequest $request)
    {
        try {
            $validated = $request->validated();
            $validated['password'] = Hash::make($validated['password']);

            $user = $this->user_repository->createUser($validated);

            $user->assignRole('user');

            return redirect()->route('auth.login.page')->with('success', 'Anda telah bergabung, silahkan login');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['register' => 'Terjadi kesalahan dengan sistem'])->withInput();
        }
    }

    // logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logout berhasil');
    }
}
