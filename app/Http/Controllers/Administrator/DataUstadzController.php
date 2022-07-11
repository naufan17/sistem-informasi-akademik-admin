<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Ustadz;
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
        $ustadzs = Ustadz::where('status', 'Aktif')
                        ->paginate(50);

        $filter_status = Ustadz::select('status')
                                ->distinct()
                                ->get();

        $status = Ustadz::select('status')
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

        Ustadz::create([
            'id' => $request->id,
            'name' => $request->name,
            'status' => 'Aktif',
            'password' => Hash::make($request->password),
        ]);

        return redirect('/administrator/data-ustadz')->with('tambah','Data Berhasil Ditambahkan!');
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

        return redirect('/administrator/data-ustadz')->with('tambah','Data Berhasil Diimport!');
    }

    public function filter(Request $request)
    {
        $ustadzs = Ustadz::where('status', $request->status)
                        ->paginate(50);

        $status = Ustadz::select('status')
                        ->where('status', $request->status)
                        ->distinct()
                        ->get();

        $filter_status = Ustadz::select('status')
                                ->distinct()
                                ->get();

        return view('administrator.data-ustadz', compact('ustadzs', 'status', 'filter_status'));
    }

    public function formUpdate($id)
    {
        $ustadzs = Ustadz::where('id', $id)
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
        
        Ustadz::where('id', $request->id)->update([
            'id' => $request->id,
            'name' => $request->name, 
            'status' => $request->status, 
        ]);

        return redirect('/administrator/data-ustadz')->with('perbarui','Data Berhasil Diperbarui');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ]);

        Ustadz::where('id', $request->id)->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect('/administrator/data-ustadz')->with('perbarui','Data Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        Ustadz::where('id', $id)->delete();

        return redirect('/administrator/data-ustadz')->with('hapus','Data Berhasil Dihapus!');
    }

    public function detailUstadz($id)
    {
        $ustadzs = Ustadz::where('id', $id)->get();
        
        return view('administrator.detail-data-ustadz', compact('ustadzs'));
    }

    public function sampleImport()
    {
        $path = storage_path('app/public/' . 'data_sample_ustadz.xlsx');

        return response()->download($path);
    }
}
