<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Support\Facades\Session;

class DataKelasController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $grades = Grade::orderBy('grade_name')
                        ->orderBy('grade_number')
                        ->get();

        $filter_grade_name = Grade::select('grade_name')
                                ->distinct()
                                ->get();

        $grade_name = Grade::select('grade_name')
                            ->limit(1);

        return view('administrator.data-kelas', compact('grades', 'filter_grade_name', 'grade_name'));
    }

    public function filter(Request $request)
    {
        $grades = Grade::where('grade_name', $request->grade_name)
                        ->orderBy('grade_name')
                        ->orderBy('grade_number')
                        ->get();

        $filter_grade_name = Grade::select('grade_name')
                                ->distinct()
                                ->get();

        $grade_name  = Grade::select('grade_name')
                            ->where('grade_name', $request->grade_name)
                            ->distinct()
                            ->get();

        return view('administrator.data-kelas', compact('grades', 'filter_grade_name', 'grade_name'));
    }

    public function formCreate()
    {
        return view('administrator.tambah-data-kelas');
    }

    public function create(Request $request)
    {
        $request->validate([
            'grade_number' => 'required', 'number',
            'grade_name' => 'required', 'string','max:255',
        ]);

        Grade::firstOrCreate([
            'grade_number' => $request->grade_number, 
            'grade_name' => $request->grade_name, 
        ]);

        Session::flash('tambah','Data Berhasil Ditambahkan!');

        return redirect('/administrator/data-kelas');
    }

    public function formUpdate($id)
    {
        $grades = Grade::where('id_grade', $id)->get();

        return view('administrator.update-data-kelas', compact('grades'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'grade_number' => 'required', 'number',
            'grade_name' => 'required', 'string','max:255',
        ]);
        
        Grade::where('id_grade', $request->id_grade)->update([
            'grade_number' => $request->grade_number, 
            'grade_name' => $request->grade_name, 
        ]);

        Session::flash('perbarui','Data Berhasil Diperbarui!');

        return redirect('/administrator/data-kelas');
    }

    public function delete($id)
    {
        Grade::where('id_grade', $id)->delete();

        Session::flash('hapus','Data Berhasil Dihapus!');

        return redirect('/administrator/data-kelas');
    }
}
