<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DataSantriController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $santris = User::where('role', 'santri')->get();

        return view('administrator.data-santri', compact('santris'));
    }

    public function formTambah()
    {
        return view('administrator.tambah-data-santri');
    }

    public function Tambah(Request $request)
    {
        $request->validate([
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',
            'role' => 'required', 'string',
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
        ]);

        return redirect('/administrator/data-santri');
    }

    public function filter(Request $request)
    {
        $santris = User::where('role', 'santri')->where('status', $request->status)->get();
        
        return view('administrator.data-santri', compact('santris'));
    }

    public function formUpdate($name)
    {
        $santris = User::where('role', 'santri')->where('name', $name)->get();

        return view('administrator.update-data-santri', compact('santris'));
    }
}
