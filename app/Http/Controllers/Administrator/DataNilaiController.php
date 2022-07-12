<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CumulativeStudy;
use App\Models\Grade;
use Illuminate\Http\Request;

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

        }elseif(date('m') > 06 ){
            $courses = Course::leftjoin('ustadzs', 'courses.id_ustadz', '=', 'ustadzs.id')
                            ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                            ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                            ->where('status_course', 'Aktif')
                            ->get();
        }

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

        return view('administrator.data-nilai', compact('courses', 'grade_number', 'grade_name', 'filter_grade_number', 'filter_grade_name'));
    }

    public function filter(Request $request)
    {           
        if(date('m') <= 06 ){
        $courses = Course::leftjoin('ustadzs', 'courses.id_ustadz', '=', 'ustadzs.id')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->where('status_course', 'Aktif')
                        ->where('grade_number', $request->grade_number)
                        ->where('grade_name', $request->grade_name)
                        ->get();

        }elseif(date('m') > 06 ){
            $courses = Course::leftjoin('ustadzs', 'courses.id_ustadz', '=', 'ustadzs.id')
                            ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                            ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                            ->where('status_course', 'Aktif')
                            ->where('grade_number', $request->grade_number)
                            ->where('grade_name', $request->grade_name)
                            ->get();
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

        return view('administrator.data-nilai', compact('courses', 'semester', 'grade_number', 'grade_name', 'filter_grade_number', 'filter_grade_name'));
    }

    public function santriNilai($id)
    {
        $filter_semesters = CumulativeStudy::select('semester')
                                            ->where('id_course', $id)
                                            ->distinct()
                                            ->get();

        $filter_years = CumulativeStudy::select('year')
                                        ->where('id_course', $id)
                                        ->distinct()
                                        ->get();
        
        $id_course = $id;

        if(date('m') <= 06 ){
            $santris = CumulativeStudy::leftjoin('santris', 'cumulative_studies.id_santri', '=', 'santris.id')
                                    ->where('year', date('Y')-1 . '/' . date('Y'))
                                    ->where('semester', 'Genap')
                                    ->where('id_course', $id)
                                    ->orderBy('name')
                                    ->get();

            $semesters = CumulativeStudy::select('semester')
                                        ->where('id_course', $id)
                                        ->where('semester', 'Genap')
                                        ->where('year', date('Y')-1 . '/' . date('Y'))
                                        ->distinct()
                                        ->get();

            $years = CumulativeStudy::select('year')
                                    ->where('id_course', $id)
                                    ->where('semester', 'Genap')
                                    ->where('year', date('Y')-1 . '/' . date('Y'))
                                    ->distinct()
                                    ->get();

        }elseif(date('m') > 06 ){
            $santris = CumulativeStudy::leftjoin('santris', 'cumulative_studies.id_santri', '=', 'santris.id')
                                    ->where('year', date('Y') . '/' . date('Y')+1)
                                    ->where('semester', 'Ganjil')
                                    ->where('id_course', $id)
                                    ->orderBy('name')
                                    ->get();

            $semesters = CumulativeStudy::select('semester')
                                        ->where('id_course', $id)
                                        ->where('semester', 'Ganjil')
                                        ->where('year', date('Y') . '/' . date('Y')+1)
                                        ->distinct()
                                        ->get();

            $years = CumulativeStudy::select('year')
                                    ->where('id_course', $id)
                                    ->where('semester', 'Ganjil')
                                    ->where('year', date('Y') . '/' . date('Y')+1)
                                    ->distinct()
                                    ->get();
        }

        return view('administrator.update-data-nilai', compact('santris', 'filter_semesters', 'filter_years', 'semesters', 'years', 'id_course'));
    }

    public function filterSemester(Request $request)
    {
        $filter_semesters = CumulativeStudy::select('semester')
                                            ->where('id_course', $request->id)
                                            ->distinct()
                                            ->get();

        $filter_years = CumulativeStudy::select('year')
                                        ->where('id_course', $request->id)
                                        ->distinct()
                                        ->get();

        $id_course = $request->id;

        $santris = CumulativeStudy::leftjoin('santris', 'cumulative_studies.id_santri', '=', 'santris.id')
                                ->where('id_course', $request->id)
                                ->where('semester', $request->semester)
                                ->where('year', $request->year)
                                ->orderBy('name')
                                ->get();
                
        $semesters = CumulativeStudy::select('semester')
                                    ->where('id_course', $request->id)
                                    ->where('semester', $request->semester)
                                    ->distinct()
                                    ->get();
        
        $years = CumulativeStudy::select('year')
                                ->where('id_course', $request->id)
                                ->where('year', $request->year)
                                ->distinct()
                                ->get();

        return view('administrator.update-data-nilai', compact('santris', 'filter_semesters', 'filter_years', 'semesters', 'years', 'id_course'));
    }

    public function createNilai(Request $request)
    {
        $request->validate([
            'id_cumulative_study' => 'required', 'number',
            'score' => 'required', 'number',
        ]);

        // dump($request);

        for($x = 1; $x <= count($request->id_cumulative_study); $x++){
            CumulativeStudy::where('id_cumulative_study', $request->id_cumulative_study[$x])->update([
                'minimum_score' => 60,
                'score' => $request->score[$x],
            ]);
        }

        return redirect()->route('administrator.data-nilai.santri', [$request->id_course])->with('tambah','Data Berhasil Disimpan!');
    }
}
