<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CumulativeStudy;
use Illuminate\Support\Facades\Session;

class DataNilaiController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {           
        if(date('m') <= 06 ){
        $courses = Course::leftjoin('ustadzs', 'courses.id_ustadz', '=', 'ustadzs.id')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->where('status_course', 'Aktif')
                        ->get();

            $semester = "Genap";

        }elseif(date('m') > 06 ){
            $courses = Course::leftjoin('ustadzs', 'courses.id_ustadz', '=', 'ustadzs.id')
                            ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                            ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                            ->where('status_course', 'Aktif')
                            ->get();

            $semester = "Ganjil";
        }

        return view('administrator.data-nilai', compact('courses', 'semester'));
    }

    public function santriNilai($id)
    {
        if(date('m') <= 06 ){
            $santris = CumulativeStudy::where('id_course', $id)
                                    ->leftjoin('santris', 'cumulative_studies.id_santri', '=', 'santris.id')
                                    ->where('year', date('Y')-1 . '/' . date('Y'))
                                    ->where('semester', 'Genap')
                                    ->orderBy('name')
                                    ->get();
        }elseif(date('m') > 06 ){
            $santris = CumulativeStudy::where('id_course', $id)
                                    ->leftjoin('santris', 'cumulative_studies.id_santri', '=', 'santris.id')
                                    ->where('year', date('Y') . '/' . date('Y')+1)
                                    ->where('semester', 'Ganjil')
                                    ->orderBy('name')
                                    ->get();
        }

        return view('administrator.update-data-nilai', compact('santris'));
    }

    public function createNilai(Request $request)
    {
        $request->validate([
            'id_cumulative_study' => 'required', 'number',
            'score' => 'required', 'number',
        ]);

        // dump($request);
        
        CumulativeStudy::where('id_cumulative_study', $request->id_cumulative_study)->update([
            'minimum_score' => 60,
            'score' => $request->score,
        ]);

        // if(date('m') <= 06 ){
        //     CumulativeStudy::upsert([
        //         'id_cumulative_study' => $request->id_cumulative_study,
        //         'year' => date('Y')-1 . '/' . date('Y'),
        //         'semester' => 'Genap',
        //         'id_santri' => $request->id_santri,
        //         'id_course' => $request->id_course,
        //         'minimum_score' => 60,
        //         'score' => $request->score,
        //     ], ['id_cumulative_study', 'year', 'semester', 'id_santri', 'id_course'], ['minimum_score', 'score']);
    
        // }elseif(date('m') > 06 ){
        //     CumulativeStudy::upsert([
        //         'id_cumulative_study' => $request->id_cumulative_study,
        //         'year' => date('Y') . '/' . date('Y')+1,
        //         'semester' => 'Ganjil',
        //         'id_santri' => $request->id_santri,
        //         'id_course' => $request->id_course,
        //         'minimum_score' => 60,
        //         'score' => $request->score,
        //     ],['id_cumulative_study', 'year', 'semester', 'id_santri', 'id_course'], ['minimum_score', 'score']);
        // }

        Session::flash('tambah','Data Berhasil Disimpan!');

        return redirect('/administrator/data-nilai');
    }
}
