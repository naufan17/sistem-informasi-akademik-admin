<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CumulativeStudy;
use App\Models\Grade;
use App\Models\Schedule;
use App\Models\User;

class DataNilaiController extends Controller
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

        return view('administrator.data-nilai', compact('courses', 'santris'));
    }

    public function formCreate($id)
    {
        $cumulativestudys = CumulativeStudy::leftjoin('users', 'cumulative_studies.id_santri', '=', 'users.id')
                                    ->leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                    ->orderBy('sem')
                                    ->where('id_santri', $id)
                                    ->get();

        return view('administrator.tambah-data-nilai', compact('cumulativestudys'));
    }
    
    public function create(Request $request)
    {
        CumulativeStudy::where('id_cumulative_study', $request->id_cumulative_study)->update([
            'minimum_score' => '75',
            'score' => $request->score,
        ]);

        return redirect('/administrator/data-nilai');
    }
}
