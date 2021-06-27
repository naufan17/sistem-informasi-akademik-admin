<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;

class DataMapelController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')->get();

        return view('administrator.data-mapel', compact('courses'));
    }

    public function formTambah()
    {
        $ustadzs = User::where('role', 'ustadz')->get();

        return view('administrator.tambah-data-mapel', compact('ustadzs'));
    }

    public function Tambah(Request $request)
    {
        Course::create([
            'id' => $request->id,
            'course' => $request->course,
            'book' => $request->book,
            'grade' => $request->grade,
            'schedule' => $request->schedule,
            'semester' => $request->semester,
            'id_ustadz' => $request->id_ustadz
        ]);

        return redirect('administrator/data-mapel');
    }
}
