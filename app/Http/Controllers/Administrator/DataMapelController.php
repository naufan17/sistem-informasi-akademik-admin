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

    public function filter(Request $request)
    {
        $grades = Grade::all();
        $schedules = Schedule::all();
        $courses = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')->where('day', $request->day)->get();

        return view('administrator.data-mapel', compact('grades', 'schedules', 'courses'));
    }

    public function formCreate()
    {
        $grades = Grade::all();
        $schedules = Schedule::all();
        $ustadzs = User::where('role', 'ustadz')->get();

        return view('administrator.tambah-data-mapel', compact('schedules', 'ustadzs', 'grades'));
    }

    public function create(Request $request)
    {
        Course::create([
            'id' => $request->id,
            'course' => $request->course,
            'book' => $request->book,
            'id_grade' => $request->id_grade,
            'id_schedule' => $request->id_schedule,
            'id_ustadz' => $request->id_ustadz
        ]);

        return redirect('administrator/data-mapel');
    }

    public function formUpdate($id)
    {
        $grades = Grade::all();
        $schedules = Schedule::all();
        $ustadzs = User::where('role', 'ustadz')->get();
        $courses = Course::where('id_course', $id)
                        ->leftjoin('users', 'courses.id_ustadz', '=', 'users.id')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')->get();

        return view('administrator.update-data-mapel', compact('grades', 'schedules', 'ustadzs', 'courses'));
    }

    public function update(Request $request)
    {
        Course::where('id_course', $request->id_course)->update([
            'id_course' => $request->id_course,
            'course' => $request->course,
            'book' => $request->book,
            'id_grade' => $request->id_grade,
            'id_schedule' => $request->id_schedule,
            'id_ustadz' => $request->id_ustadz
        ]);

        return redirect('/administrator/data-mapel');
    }

    public function destroy($id)
    {
        Course::where('id_course', $id)->delete();

        return redirect('/administrator/data-mapel');
    }
}
