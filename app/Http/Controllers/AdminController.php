<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;

class AdminController extends Controller
{
    public function vlogin()
    {
        return view('auth.login');
    }

    public function validateLogin(Request $request)
    {
        $validateLogin = $request->validate
    }

    public function form()
    {
        return view('auth.registration', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:70',
            'email' => 'required|email:dns|max:50|unique:admin',
            'password' => 'required|min:5|max:64'
        ]);

        $validatedData['password'] = hash("sha256", $validatedData['password']);

        DB::table('admin')
            ->insert($validatedData);

        // // make var, yg bawah gmake var, make with tapi sama aja
        // $request->session()->flash('success', 'Registrasi berhasil! Silahkan login');
        // return redirect('/login');

        return redirect('/login')->with('success', 'Registrasi berhasil! Silahkan login');
    }
}
