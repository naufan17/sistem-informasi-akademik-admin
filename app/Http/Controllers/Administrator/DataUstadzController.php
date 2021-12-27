<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DataUstadzController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ustadzs = User::where('role', 'ustadz')->get();

        return view('administrator.data-ustadz', compact('ustadzs'));
    }

    public function formCreate()
    {
        return view('administrator.tambah-data-ustadz');
    }

    public function create(Request $request)
    {
        $request->validate([
            'id' => 'required', 'number', 'max:255',
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',
            'role' => 'required', 'string',
        ]);

        User::create([
            'id' => $request['id'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
        ]);

        return redirect('/administrator/data-ustadz');
    }

    public function filter(Request $request)
    {
        $ustadzs = User::where('role', 'ustadz')
                        ->where('status', $request->status)
                        ->get();

        return view('administrator.data-ustadz', compact('ustadzs'));
    }

    public function formUpdate($id)
    {
        $ustadzs = User::where('role', 'ustadz')
                        ->where('id', $id)
                        ->get();

        return view('administrator.update-data-ustadz', compact('ustadzs'));
    }

    public function updateProfile(Request $request)
    {
        User::where('id', $request->id)->update([
            'name' => $request->name, 
            'email' => $request->email, 
            'status' => $request->status, 
        ]);

        return redirect('/administrator/data-ustadz');
    }

    public function updatePassword(Request $request)
    {
        User::where('id', $request->id)->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect('/administrator/data-ustadz');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect('/administrator/data-ustadz');
    }

}
