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
        $grades = Grade::all();
        $schedules = Schedule::all();
        $courses = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')->get();

        return view('administrator.data-nilai', compact('grades', 'schedules', 'courses'));
    }

    public function formCreate($id)
    {
        $santris = CumulativeStudy::where('id_course', $id)->leftjoin('users', 'cumulative_studies.id_santri', '=', 'users.id')->get();

        return view('administrator.tambah-nilai-santri', compact('santris'));
    }

}
