<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Schedule;
use Illuminate\Http\Request;

class DataJadwalController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $schedules = Schedule::orderBy('day', 'desc')
                            ->orderBy('day', 'desc')
                            ->get();

        $filter_grade_number = Grade::select('grade_number')
                                    ->distinct()
                                    ->get();

        $filter_grade_name = Grade::select('grade_name')
                                    ->distinct()
                                    ->get();

        $filter_day = Schedule::select('day')
                            ->orderBy('day', 'desc')
                            ->distinct()
                            ->get();
        
        $grade_number = Grade::select('grade_number')
                            ->limit(1);
        
        $grade_name = Grade::select('grade_name')
                            ->limit(1);
        
        $day = Schedule::select('day')
                        ->limit(1);     

        return view('administrator.data-jadwal', compact('schedules', 'grade_number', 'grade_name', 'day', 'filter_grade_number', 'filter_grade_name', 'filter_day'));
    }

    public function filterHari(Request $request)
    {
        $schedules = Schedule::where('day', $request->day)
                            ->orderBy('day', 'desc')
                            ->orderBy('time_begin')
                            ->get();

        $filter_grade_number = Grade::select('grade_number')
                                    ->distinct()
                                    ->get();

        $filter_grade_name = Grade::select('grade_name')
                                    ->distinct()
                                    ->get();

        $filter_day = Schedule::select('day')
                            ->orderBy('day', 'desc')
                            ->distinct()
                            ->get();

        $grade_number = Grade::select('grade_number')
                            ->limit(1);

        $grade_name = Grade::select('grade_name')
                            ->limit(1);

        $day = Schedule::select('day')
                        ->where('day', $request->day)
                        ->distinct()
                        ->get();

        return view('administrator.data-jadwal', compact('schedules', 'grade_number', 'grade_name', 'day', 'filter_grade_number', 'filter_grade_name', 'filter_day'));
    }

    public function filterKelas(Request $request)
    {
        $schedules = Course::leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                        ->where('status_course', 'Aktif')
                        ->where('grade_number', $request->grade_number)
                        ->where('grade_name', $request->grade_name)
                        ->orderBy('day', 'desc')
                        ->orderBy('time_begin')
                        ->get();

        $grade_number = Grade::select('grade_number')
                            ->where('grade_number', $request->grade_number)
                            ->distinct()
                            ->get();

        $grade_name = Grade::select('grade_name')
                            ->where('grade_name', $request->grade_name)
                            ->distinct()
                            ->get();

        $filter_day = Schedule::select('day')
                            ->orderBy('day', 'desc')
                            ->distinct()
                            ->get();

        $filter_grade_number = Grade::select('grade_number')
                                    ->distinct()
                                    ->get();

        $filter_grade_name = Grade::select('grade_name')
                                ->distinct()
                                ->get();

        $day = Schedule::select('day')
                        ->limit(1); 

        return view('administrator.data-jadwal', compact('schedules', 'grade_number', 'grade_name', 'day', 'filter_grade_number', 'filter_grade_name', 'filter_day'));
    }

    public function formCreate()
    {
        return view('administrator.tambah-data-jadwal');
    }

    public function create(Request $request)
    {
        $request->validate([
            'day' => 'required|string',
            'time_begin' => 'required|string',
            'time_end' => 'required|string',
        ]);

        Schedule::firstOrCreate([
            'day' => $request->day, 
            'time_begin' => $request->time_begin, 
            'time_end' => $request->time_end,
        ]);

        return redirect('/administrator/data-jadwal')->with('tambah','Data Berhasil Ditambahkan!');
    }

    public function formUpdate($id)
    {
        $schedules = Schedule::where('id_schedule', $id)->get();

        return view('administrator.update-data-jadwal', compact('schedules'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'day' => 'required|string',
            'time_begin' => 'required|string',
            'time_end' => 'required|string',
        ]);
        
        Schedule::where('id_schedule', $request->id_schedule)->update([
            'day' => $request->day, 
            'time_begin' => $request->time_begin, 
            'time_end' => $request->time_end, 
        ]);

        return redirect('/administrator/data-jadwal')->with('perbarui','Data Berhasil Diperbarui');
    }

    public function delete($id)
    {
        Schedule::where('id_schedule', $id)->delete();

        return redirect('/administrator/data-jadwal')->with('hapus','Data Berhasil Dihapus!');
    }
}
