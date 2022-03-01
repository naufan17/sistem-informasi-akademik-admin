<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Schedule;
use App\Models\Ustadz;
use Illuminate\Support\Facades\Session;

class DataMapelController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::leftjoin('ustadzs', 'courses.id_ustadz', '=', 'ustadzs.id')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                        ->where('status_course', 'Aktif')
                        ->orderBy('grade_name')
                        ->orderBy('grade_number')
                        ->get();

        $status = Course::select('status_course')
                        ->where('status_course', 'Aktif')
                        ->distinct()
                        ->get();

        $filters_status = Course::select('status_course')
                                ->distinct()
                                ->get();

        return view('administrator.data-mapel', compact('courses', 'status', 'filters_status'));
    }

    public function filterStatus(Request $request)
    {
        $courses = Course::leftjoin('ustadzs', 'courses.id_ustadz', '=', 'ustadzs.id')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                        ->where('status_course', $request->status_course)
                        ->get();

        $status = Course::select('status_course')
                        ->where('status_course', $request->status_course)
                        ->distinct()
                        ->get();

        $filters_status = Course::select('status_course')
                                ->distinct()
                                ->get();

        return view('administrator.data-mapel', compact('courses', 'status', 'filters_status'));
    }

    public function formCreate()
    {
        $grades = Grade::all();

        $schedules = Schedule::all();

        $ustadzs = Ustadz::where('status', 'Aktif')->get();

        return view('administrator.tambah-data-mapel', compact('schedules', 'ustadzs', 'grades'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'id_course' => 'required', 'number',
            'course' => 'required', 'string','max:255',
            'book' => 'required', 'string','max:255',
            'id_grade' => 'required', 'number',
            'id_schedule' => 'required', 'number',
            'id_ustadz' => 'required', 'number',
        ]);

        Course::firstOrCreate([
            'id_course' => $request->id_course,
            'course' => $request->course,
            'book' => $request->book,
            'status_course' => 'Aktif',
            'id_grade' => $request->id_grade,
            'id_schedule' => $request->id_schedule,
            'id_ustadz' => $request->id_ustadz,
        ]);

        Session::flash('tambah','Data Berhasil Ditambahkan!');

        return redirect('administrator/data-mapel');
    }

    public function formUpdate($id)
    {
        $grades = Grade::all();

        $schedules = Schedule::all();

        $ustadzs = Ustadz::where('status', 'Aktif')->get();

        $courses = Course::where('id_course', $id)
                        ->leftjoin('ustadzs', 'courses.id_ustadz', '=', 'ustadzs.id')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                        ->get();

        return view('administrator.update-data-mapel', compact('grades', 'schedules', 'ustadzs', 'courses'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id_course' => 'required', 'number',
            'course' => 'required', 'string','max:255',
            'book' => 'required', 'string','max:255',
            'status_course' => 'required', 'string',
            'id_grade' => 'required', 'number',
            'id_schedule' => 'required', 'number',
            'id_ustadz' => 'required', 'number',
        ]);
        
        Course::where('id_course', $request->id_course)->update([
            'id_course' => $request->id_course,
            'course' => $request->course,
            'book' => $request->book,
            'status_course' => $request->status_course,
            'id_grade' => $request->id_grade,
            'id_schedule' => $request->id_schedule,
            'id_ustadz' => $request->id_ustadz,
        ]);

        Session::flash('perbarui','Data Berhasil Diperbarui!');

        return redirect('/administrator/data-mapel');
    }

    public function destroy($id)
    {
        Course::where('id_course', $id)->delete();

        Session::flash('hapus','Data Berhasil Dihapus!');

        return redirect('/administrator/data-mapel');
    }
}
