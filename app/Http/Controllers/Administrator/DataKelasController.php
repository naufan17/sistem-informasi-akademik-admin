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
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                        ->get();
        
        $santris = User::where('role', 'Santri')->get();

        return view('administrator.data-kelas', compact('courses', 'santris'));
    }

    public function filterSemester(Request $request)
    {
        $courses = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                        ->where('semester', $request->semester)
                        ->get();

        return view('administrator.data-kelas', compact('courses'));
    }

    public function formCreate($id)
    {
        $cumulativestudys = CumulativeStudy::leftjoin('users', 'cumulative_studies.id_santri', '=', 'users.id')
                                            ->leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                            ->orderBy('semester')
                                            ->where('id_santri', $id)
                                            ->get();

        $courses = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                        ->orderBy('semester')
                        ->get();

        return view('administrator.tambah-santri-kelas', compact('cumulativestudys', 'courses', 'id'));
    }

    public function create(Request $request)
    {
        CumulativeStudy::firstOrCreate([
            'id_santri' => $request['id_santri'],
            'id_course' => $request['id_course'],
        ]);

        return redirect()->route('administrator.data-kelas.form-create', [$request->id_santri]);
    }

    public function delete($id)
    {
        $id_santri = 0;
        foreach(CumulativeStudy::where('id_cumulative_study', $id)->get() as $cumulativestudys){
            $id_santri = $cumulativestudys->id_santri;
        }

        CumulativeStudy::where('id_cumulative_study', $id)->delete();
   
        return redirect()->route('administrator.data-kelas.form-create', [$id_santri]);
    }
}
