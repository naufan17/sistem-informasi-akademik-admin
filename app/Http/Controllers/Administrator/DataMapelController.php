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
        $courses = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                        ->orderBy('semester')->get();

        return view('administrator.data-mapel', compact('courses'));
    }

    public function filterSemester(Request $request)
    {
        $courses = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')->where('semester', $request->semester)->get();

        return view('administrator.data-mapel', compact('courses'));
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
        $request->validate([
            'id' => 'required', 'number',
            'course' => 'required', 'string','max:255',
            'book' => 'required', 'string','max:255',
            'semester' => 'required', 'number',
            'id_grade' => 'required', 'number',
            'id_schedule' => 'required', 'number',
            'id_ustadz' => 'required', 'number',
        ]);

        Course::create([
            'id' => $request['id'],
            'course' => $request['course'],
            'book' => $request['book'],
            'semester' => $request['semester'],
            'id_grade' => $request['id_grade'],
            'id_schedule' => $request['id_schedule'],
            'id_ustadz' => $request['id_ustadz'],
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
            'semester' => $request->semester,
            'id_grade' => $request->id_grade,
            'id_schedule' => $request->id_schedule,
            'id_ustadz' => $request->id_ustadz,
        ]);

        return redirect('/administrator/data-mapel');
    }

    public function destroy($id)
    {
        Course::where('id_course', $id)->delete();

        return redirect('/administrator/data-mapel');
    }
}
