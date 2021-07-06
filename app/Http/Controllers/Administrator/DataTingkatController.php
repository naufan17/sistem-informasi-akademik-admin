<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Grade;

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

        return view('administrator.data-tingkat', compact('grades'));
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

        Grade::create([
            'grade_number' => $request['grade_number'],
            'grade_name' => $request['grade_name'],
        ]);

        return redirect('/administrator/data-tingkat');
    }

    public function formUpdate($id)
    {
        $grades = Grade::where('id_grade', $id)->get();

        return view('administrator.update-data-tingkat', compact('grades'));
    }

    public function update(Request $request)
    {
        Grade::where('id_grade', $request->id_grade)->update([
            'grade_number' => $request->grade_number, 
            'grade_name' => $request->grade_name, 
        ]);

        return redirect('/administrator/data-tingkat');
    }
}
