<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CumulativeStudy;
use App\Models\User;

class DataKelasController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {           
        if(date('m') <= 06 ){
        $courses = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->where('status_course', 'Aktif')
                        ->whereIn('sem', [2,4,6,8,10,12,14,16])
                        ->orderBy('sem')
                        ->get();

            $semester = "Genap";

        }elseif(date('m') > 06 ){
            $courses = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')
                            ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                            ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                            ->where('status_course', 'Aktif')
                            ->whereIn('sem', [1,3,5,7,9,11,13,15])
                            ->orderBy('sem')
                            ->get();

            $semester = "Ganjil";
        }

        return view('administrator.data-kelas', compact('courses', 'semester'));
    }

    public function filter(Request $request)
    {           
        if($request->semester == 'Genap'){
            $courses = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')
                            ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                            ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                            ->where('status_course', 'Aktif')
                            ->whereIn('sem', [2,4,6,8,10,12,14,16])
                            ->orderBy('sem')
                            ->get();

            $semester = "Genap";

        }elseif($request->semester == 'Ganjil'){
            $courses = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')
                            ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                            ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                            ->where('status_course', 'Aktif')
                            ->whereIn('sem', [1,3,5,7,9,11,13,15])
                            ->orderBy('sem')
                            ->get();

            $semester = "Ganjil";
        }

        return view('administrator.data-kelas', compact('courses', 'semester'));
    }

    public function detailKelas($id)
    {
        if(date('m') <= 06 ){
            $santris = CumulativeStudy::where('id_course', $id)
                                    ->leftjoin('users', 'cumulative_studies.id_santri', '=', 'users.id')
                                    ->where('year', date('Y')-1 . '/' . date('Y'))
                                    ->where('semester', 'Genap')
                                    ->get();
        }elseif(date('m') > 06 ){
            $santris = CumulativeStudy::where('id_course', $id)
                                    ->leftjoin('users', 'cumulative_studies.id_santri', '=', 'users.id')
                                    ->where('year', date('Y') . '/' . date('Y')+1)
                                    ->where('semester', 'Ganjil')
                                    ->get();
        }

        return view('administrator.data-santri-kelas', compact('santris'));
    }
}
