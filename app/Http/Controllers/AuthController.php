<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Menampilkan page login
    public function loginPage() {
        return view('pages.login');
    }

    // Menampilkan page register
    public function registerPage() {
        return view('pages.register');
    }
}
