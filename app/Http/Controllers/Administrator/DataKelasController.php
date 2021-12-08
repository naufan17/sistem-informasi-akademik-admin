<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CumulativeStudy;
use App\Models\Grade;
use App\Models\Schedule;
use App\Models\User;

class DataKelasController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')->get();

        return view('administrator.data-kelas', compact('courses'));
    }

    public function filterSemester(Request $request)
    {
        $courses = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')->where('semester', $request->semester)->get();

        return view('administrator.data-kelas', compact('courses'));
    }

    public function listSantriIn($id)
    {
        $courses = Course::where('id_course', $id)
                        ->leftjoin('users', 'courses.id_ustadz', '=', 'users.id')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')->get();

        $santriin = CumulativeStudy::where('id_course', $id)
                                    ->leftjoin('users', 'cumulative_studies.id_santri', '=', 'users.id')->get();

        $santris = User::where('role', 'santri')->where('status', 'Aktif')->get();

        return view('administrator.tambah-santri-kelas', compact('santriin', 'santris', 'courses'));
    }

    public function create(Request $request)
    {
        CumulativeStudy::create([
            'id_santri' => $request['id_santri'],
            'id_course' => $request['id_course'],
        ]);

        return redirect()->route('administrator.data-kelas.list-santri', ['id_course' => $request->id_course]);
    }
}
