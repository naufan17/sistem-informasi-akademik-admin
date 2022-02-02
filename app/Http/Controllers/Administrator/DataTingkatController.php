<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Support\Facades\Session;

class DataTingkatController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $grades = Grade::all();

        $filters = Grade::select('grade_name')
                        ->distinct()
                        ->get();

        return view('administrator.data-tingkat', compact('grades', 'filters'));
    }

    public function filterNamaTingkat(Request $request)
    {
        $grades = Grade::where('grade_name', $request->grade_name)->get();

        $filters = Grade::select('grade_name')
                        ->where('grade_name', $request->grade_name)
                        ->distinct()
                        ->get();

        return view('administrator.data-tingkat', compact('grades', 'filters'));
    }

    public function formCreate()
    {
        return view('administrator.tambah-data-tingkat');
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

        return redirect('/administrator/data-tingkat');
    }

    public function formUpdate($id)
    {
        $grades = Grade::where('id_grade', $id)->get();

        return view('administrator.update-data-tingkat', compact('grades'));
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

        return redirect('/administrator/data-tingkat');
    }

    public function delete($id)
    {
        Grade::where('id_grade', $id)->delete();

        Session::flash('hapus','Data Berhasil Dihapus!');

        return redirect('/administrator/data-tingkat');
    }
}
