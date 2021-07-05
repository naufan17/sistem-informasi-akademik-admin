<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Schedule;
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
        $grades = Grade::all();
        $schedules = Schedule::all();
        $courses = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')->get();

        return view('administrator.data-mapel', compact('grades', 'schedules', 'courses'));
    }

    public function formCreate()
    {
        $grades = Grade::all();
        $schedules = Schedule::all();
        $ustadzs = User::where('role', 'ustadz')->get();

        return view('administrator.tambah-data-mapel', compact('grades', 'schedules', 'ustadzs'));
    }

    public function create(Request $request)
    {
        Course::create([
            'id' => $request->id,
            'course' => $request->course,
            'book' => $request->book,
            'semester' => $request->semester,
            'id_grade' => $request->id_grade,
            'id_schedule' => $request->id_schedule,
            'id_ustadz' => $request->id_ustadz
        ]);

        return redirect('administrator/data-mapel');
    }

    public function filter(Request $request)
    {
        $grades = Grade::all();
        $schedules = Schedule::all();
        $courses = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')->where('day', $request->day)->get();

        return view('administrator.data-mapel', compact('grades', 'schedules', 'courses'));
    }
}
