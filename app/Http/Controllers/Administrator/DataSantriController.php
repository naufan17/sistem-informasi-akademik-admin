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
        $santris = User::where('role', 'santri')
                        ->orderBy('id')
                        ->paginate(50);

        $filter_status = User::select('status')
                        ->where('role', 'santri')
                        ->distinct()
                        ->get();

        return view('administrator.data-santri', compact('santris', 'filter_status'));
    }

    public function formCreate()
    {
        return view('administrator.tambah-data-santri');
    }

    public function create(Request $request)
    {
        $request->validate([
            'id' => 'required', 'number', 'max:255',
            'name' => 'required', 'string', 'max:255',
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ]);

        User::create([
            'id' => $request->id,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => 'Santri',
            'status' => 'Aktif',
        ]);

        return redirect('/administrator/data-santri');
    }

    public function filter(Request $request)
    {
        $santris = User::where('role', 'santri')
                        ->where('status', $request->status)
                        ->paginate(50);

        $filter_status = User::select('status')
                        ->where('role', 'santri')
                        ->where('status', $request->status)
                        ->distinct()
                        ->get();
        
        return view('administrator.data-santri', compact('santris', 'filter_status'));
    }

    public function formUpdate($id)
    {
        $santris = User::where('role', 'santri')
                        ->where('id', $id)
                        ->get();

        return view('administrator.update-data-santri', compact('santris'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'id' => 'required', 'number', 'max:255',
            'name' => 'required', 'string', 'max:255',
            'status' => 'required', 'string',
        ]);

        User::where('id', $request->id)->update([
            'id' => $request->id,
            'name' => $request->name,  
            'status' => $request->status,  
        ]);

        return redirect('/administrator/data-santri');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ]);

        User::where('id', $request->id)->update([
            'password' => Hash::make($request->password), 
        ]);

        return redirect('/administrator/data-santri');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect('/administrator/data-santri');
    }

    public function detailSantri($id)
    {
        $santris = User::where('id', $id)->get();
        
        return view('administrator.detail-data-santri', compact('santris'));
    }
}
