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
        $ustadzs = User::where('role', 'ustadz')
                        ->orderBy('id')
                        ->paginate(50);

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
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ]);

        User::create([
            'id' => $request->id,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => 'Ustadz',
            'status' => 'Aktif',
        ]);

        return redirect('/administrator/data-ustadz');
    }

    public function filter(Request $request)
    {
        $ustadzs = User::where('role', 'ustadz')
                        ->where('status', $request->status)
                        ->paginate(50);

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

        return redirect('/administrator/data-ustadz');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ]);

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

    public function detailUstadz($id)
    {
        $ustadzs = User::where('id', $id)->get();
        
        return view('administrator.detail-data-ustadz', compact('ustadzs'));
    }

}
