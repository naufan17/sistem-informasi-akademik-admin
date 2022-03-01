<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ImportSantri;
use App\Models\Santri;

class DataSantriController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $santris = Santri::where('status', 'Aktif')
                        ->orderBy('id')
                        ->paginate(50);

        $filter_status = Santri::select('status')
                                ->distinct()
                                ->get();

        $status = Santri::select('status')
                        ->where('status', 'Aktif')
                        ->distinct()
                        ->get();

        return view('administrator.data-santri', compact('santris', 'status', 'filter_status'));
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

        Santri::create([
            'id' => $request->id,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => 'Santri',
            'status' => 'Aktif',
        ]);

        Session::flash('tambah','Data Berhasil Ditambahkan!');

        return redirect('/administrator/data-santri');
    }

    public function formImport()
    {
        return view('administrator.import-data-santri');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');
        $nama_file = rand().$file->getClientOriginalName();
        $file->move('file_santri', $nama_file);
        Excel::import(new ImportSantri, public_path('/file_santri/'.$nama_file));

        Session::flash('tambah','Data Berhasil Diimport!');

        return redirect('/administrator/data-santri');
    }

    public function filter(Request $request)
    {
        $santris = Santri::where('status', $request->status)
                        ->orderBy('id')
                        ->paginate(50);

        $status = Santri::select('status')
                        ->where('status', $request->status)
                        ->distinct()
                        ->get();

        $filter_status = Santri::select('status')
                                ->distinct()
                                ->get();
        
        return view('administrator.data-santri', compact('santris', 'status', 'filter_status'));
    }

    public function formUpdate($id)
    {
        $santris = Santri::where('id', $id)
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

        Santri::where('id', $request->id)->update([
            'id' => $request->id,
            'name' => $request->name,  
            'status' => $request->status,  
        ]);

        Session::flash('perbarui','Data Berhasil Diperbarui!');

        return redirect('/administrator/data-santri');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ]);

        Santri::where('id', $request->id)->update([
            'password' => Hash::make($request->password), 
        ]);

        Session::flash('perbarui','Data Berhasil Diupdate');

        return redirect('/administrator/data-santri');
    }

    public function destroy($id)
    {
        Santri::where('id', $id)->delete();

        Session::flash('hapus','Data Berhasil Dihapus!');

        return redirect('/administrator/data-santri');
    }

    public function detailSantri($id)
    {
        $santris = Santri::where('id', $id)->get();
        
        return view('administrator.detail-data-santri', compact('santris'));
    }
}
