<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\CumulativeStudy;
use App\Models\Grade;
use App\Models\Santri;
use Illuminate\Support\Facades\Session;

class DataAbsensiController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $santris = Santri::where('status', 'Aktif')
                        ->orderBy('name')
                        ->paginate(50);

        $filter_grade_number = Grade::select('grade_number')
                                    ->distinct()
                                    ->get();
                        
        $filter_grade_name = Grade::select('grade_name')
                                ->distinct()
                                ->get();

        $grade_number = Grade::select('grade_number')
                            ->limit(1);

        $grade_name = Grade::select('grade_name')
                            ->limit(1);

        return view('administrator.data-absensi', compact('santris', 'grade_number', 'grade_name', 'filter_grade_number', 'filter_grade_name'));
    }

    public function filter(Request $request)
    {
        if(date('m') <= 06 ){
            $santris = CumulativeStudy::leftjoin('santris', 'cumulative_studies.id_santri', '=', 'santris.id')
                                    ->leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                    ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                                    ->where('year', date('Y')-1 . '/' . date('Y'))
                                    ->where('semester', 'Genap')
                                    ->where('status', 'Aktif')
                                    ->where('grade_number', $request->grade_number)
                                    ->where('grade_name', $request->grade_name)
                                    ->orderBy('name')
                                    ->paginate(50);

        }elseif(date('m') > 06 ){
            $santris = CumulativeStudy::leftjoin('santris', 'cumulative_studies.id_santri', '=', 'santris.id')
                                    ->leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                    ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                                    ->where('year', date('Y') . '/' . date('Y')+1)
                                    ->where('semester', 'Ganjil')
                                    ->where('status', 'Aktif')
                                    ->where('grade_number', $request->grade_number)
                                    ->where('grade_name', $request->grade_name)
                                    ->orderBy('name')
                                    ->paginate(50);
        }

        $filter_grade_number = Grade::select('grade_number')
                                    ->distinct()
                                    ->get();

        $filter_grade_name = Grade::select('grade_name')
                                ->distinct()
                                ->get();

        $grade_number = Grade::select('grade_number')
                            ->where('grade_number', $request->grade_number)
                            ->distinct()
                            ->get();

        $grade_name = Grade::select('grade_name')
                        ->where('grade_name', $request->grade_name)
                        ->distinct()
                        ->get();

        return view('administrator.data-absensi', compact('santris', 'grade_number', 'grade_name', 'filter_grade_number', 'filter_grade_name'));
    }

    public function listAbsensi($id)
    {
        $santris = Santri::leftjoin('attendances', 'santris.id', '=', 'attendances.id_santri')
                        ->where('id', $id)
                        ->get();
        
        $idSantri = $id;    

        return view('administrator.list-data-absensi', compact('santris', 'idSantri'));
    }

    public function formCreate($id)
    {
        $idSantri = $id;

        return view('administrator.tambah-data-absensi', compact('idSantri'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'attendance_mdnu' => 'required', 'number',
            'attendance_asrama' => 'required', 'number',
        ]);

        if(date('m') <= 06 ){
            Attendance::create([
                'year' => date('Y')-1 . '/' . date('Y'),
                'semester' => 'Genap',
                'id_santri' => $request->id_santri,
                'minimum_attendance_mdnu' => '15', 
                'attendance_mdnu' => $request->attendance_mdnu,
                'minimum_attendance_asrama' => '10',
                'attendance_asrama' => $request->attendance_asrama,
            ]);
        }elseif(date('m') > 06 ){
            Attendance::create([
                'year' => date('Y') . '/' . date('Y')+1,
                'semester' => 'Ganjil',
                'id_santri' => $request->id_santri,
                'minimum_attendance_mdnu' => '15', 
                'attendance_mdnu' => $request->attendance_mdnu,
                'minimum_attendance_asrama' => '10',
                'attendance_asrama' => $request->attendance_asrama,
            ]);
        }

        Session::flash('tambah','Data Berhasil Ditambahkan!');

        return redirect()->route('administrator.data-absensi.list', [$request->id_santri]);
    }

    public function formUpdate($id)
    {
        $attendances = Attendance::where('id_attendance', $id)->get();

        return view('administrator.update-data-absensi', compact('attendances'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'attendance_mdnu' => 'required', 'number',
            'attendance_asrama' => 'required', 'number',
        ]);
        
        Attendance::where('id_attendance', $request->id_attendance)->update([
            'minimum_attendance_mdnu' => '10', 
            'attendance_mdnu' => $request->attendance_mdnu,
            'minimum_attendance_asrama' => '15',
            'attendance_asrama' => $request->attendance_asrama,
        ]);

        Session::flash('perbarui','Data Berhasil Diperbarui!');

        return redirect()->route('administrator.data-absensi.list', [$request->id_santri]);
    }

    public function delete($id)
    {
        $id_santri = 0;
        foreach(Attendance::where('id_attendance', $id)->get() as $attendances){
            $id_santri = $attendances->id_santri;
        }

        Attendance::where('id_attendance', $id)->delete();

        Session::flash('hapus','Data Berhasil Dihapus!');

        return redirect()->route('administrator.data-absensi.list', [$id_santri]);
    }
}
