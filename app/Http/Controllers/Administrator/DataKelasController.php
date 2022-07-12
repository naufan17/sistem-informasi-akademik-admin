<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\Request;

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
            'grade_number' => 'required',
            'grade_name' => 'required|string',
        ]);

        Grade::firstOrCreate([
            'grade_number' => $request->grade_number, 
            'grade_name' => $request->grade_name, 
        ]);

        return redirect('/administrator/data-kelas')->with('tambah','Data Berhasil Ditambahkan!');
    }

    public function formUpdate($id)
    {
        $grades = Grade::where('id_grade', $id)->get();

        return view('administrator.update-data-kelas', compact('grades'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'grade_number' => 'required',
            'grade_name' => 'required|string',
        ]);
        
        Grade::where('id_grade', $request->id_grade)->update([
            'grade_number' => $request->grade_number, 
            'grade_name' => $request->grade_name, 
        ]);

        return redirect('/administrator/data-kelas')->with('perbarui','Data Berhasil Diperbarui!');
    }

    public function delete($id)
    {
        Grade::where('id_grade', $id)->delete();

        return redirect('/administrator/data-kelas')->with('hapus','Data Berhasil Dihapus!');
    }
}
