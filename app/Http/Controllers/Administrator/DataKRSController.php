<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CumulativeStudy;
use App\Models\Santri;
use Illuminate\Support\Facades\Session;

class DataKRSController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $santris = Santri::where('status', 'Aktif')
                        ->paginate(50);

        return view('administrator.data-krs', compact('santris'));
    }

    public function formCreate($id)
    {
        $cumulativestudys = CumulativeStudy::leftjoin('santris', 'cumulative_studies.id_santri', '=', 'santris.id')
                                            ->leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                            ->where('id_santri', $id)
                                            ->get();

        $courses = Course::leftjoin('ustadzs', 'courses.id_ustadz', '=', 'ustadzs.id')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                        ->where('status_course', 'Aktif')
                        ->get();

        return view('administrator.tambah-santri-krs', compact('cumulativestudys', 'courses', 'id'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'id_santri' => 'required', 'number',
            'id_course' => 'required', 'number',
        ]);

        if(date('m') <= 06 ){
            CumulativeStudy::firstOrCreate([
                'year' => date('Y')-1 . '/' . date('Y'),
                'semester' => 'Genap',
                'id_santri' => $request->id_santri,
                'id_course' => $request->id_course,
            ]);
    
        }elseif(date('m') > 06 ){
            CumulativeStudy::firstOrCreate([
                'year' => date('Y') . '/' . date('Y')+1,
                'semester' => 'Ganjil',
                'id_santri' => $request->id_santri,
                'id_course' => $request->id_course,
            ]);
        }

        Session::flash('tambah','Data Berhasil Ditambahkan!');

        return redirect()->route('administrator.data-krs.form-create', [$request->id_santri]);
    }

    public function delete($id)
    {
        $id_santri = 0;
        foreach(CumulativeStudy::where('id_cumulative_study', $id)->get() as $cumulativestudys){
            $id_santri = $cumulativestudys->id_santri;
        }

        CumulativeStudy::where('id_cumulative_study', $id)->delete();

        Session::flash('hapus','Data Berhasil Dihapus!');
   
        return redirect()->route('administrator.data-krs.form-create', [$id_santri]);
    }
}
