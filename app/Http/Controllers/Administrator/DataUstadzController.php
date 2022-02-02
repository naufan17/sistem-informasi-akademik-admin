<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use App\Models\ImportUstadz;
use Illuminate\Support\Facades\Session;

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
                        ->where('status', 'Aktif')
                        ->orderBy('id')
                        ->paginate(50);

        $filter_status = User::select('status')
                            ->where('role', 'ustadz')
                            ->distinct()
                            ->get();

        $status = User::select('status')
                        ->where('role', 'ustadz')
                        ->where('status', 'Aktif')
                        ->distinct()
                        ->get();

        return view('administrator.data-ustadz', compact('ustadzs', 'status', 'filter_status'));
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

        Session::flash('tambah','Data Berhasil Ditambahkan!');

        return redirect('/administrator/data-ustadz');
    }

    public function formImport()
    {
        return view('administrator.import-data-ustadz');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');
        $nama_file = rand().$file->getClientOriginalName();
        $file->move('file_ustadz', $nama_file);
        Excel::import(new ImportUstadz, public_path('/file_ustadz/'.$nama_file));

        Session::flash('tambah','Data Berhasil Diimport!');

        return redirect('/administrator/data-ustadz');
    }

    public function filter(Request $request)
    {
        $ustadzs = User::where('role', 'ustadz')
                        ->where('status', $request->status)
                        ->paginate(50);

        $status = User::select('status')
                        ->where('role', 'ustadz')
                        ->where('status', 'Aktif')
                        ->distinct()
                        ->get();

        $filter_status = User::select('status')
                        ->where('role', 'ustadz')
                        ->where('status', $request->status)
                        ->distinct()
                        ->get();

        return view('administrator.data-ustadz', compact('ustadzs', 'status', 'filter_status'));
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

        Session::flash('update','Data Berhasil Diupdate');

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

        Session::flash('update','Data Berhasil Diupdate');

        return redirect('/administrator/data-ustadz');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();

        Session::flash('hapus','Data Berhasil Dihapus');

        return redirect('/administrator/data-ustadz');
    }

    public function detailUstadz($id)
    {
        $ustadzs = User::where('id', $id)->get();
        
        return view('administrator.detail-data-ustadz', compact('ustadzs'));
    }

}
