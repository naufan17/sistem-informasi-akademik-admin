<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CumulativeStudy;
use App\Models\Grade;
use App\Models\Santri;

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

        return view('administrator.data-krs', compact('santris', 'grade_number', 'grade_name', 'filter_grade_number', 'filter_grade_name'));
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

        return view('administrator.data-krs', compact('santris', 'grade_number', 'grade_name', 'filter_grade_number', 'filter_grade_name'));
    }

    public function formCreate($id)
    {
        if(date('m') <= 06 ){
            $cumulativestudys = CumulativeStudy::leftjoin('santris', 'cumulative_studies.id_santri', '=', 'santris.id')
                                                ->leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                                ->where('id_santri', $id)
                                                ->where('semester', 'Genap')
                                                ->where('year', date('Y')-1 . '/' . date('Y'))
                                                ->get();

            $semesters = CumulativeStudy::select('semester')
                                        ->where('id_santri', $id)
                                        ->where('semester', 'Genap')
                                        ->where('year', date('Y')-1 . '/' . date('Y'))
                                        ->distinct()
                                        ->get();
        
            $years = CumulativeStudy::select('year')
                                    ->where('id_santri', $id)
                                    ->where('semester', 'Genap')
                                    ->where('year', date('Y')-1 . '/' . date('Y'))
                                    ->distinct()
                                    ->get();
        
        }elseif(date('m') > 06 ){
            $cumulativestudys = CumulativeStudy::leftjoin('santris', 'cumulative_studies.id_santri', '=', 'santris.id')
                                                ->leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                                ->where('id_santri', $id)
                                                ->where('semester', 'Ganjil')
                                                ->where('year', date('Y') . '/' . date('Y')+1)
                                                ->get();
            
            $semesters = CumulativeStudy::select('semester')
                                        ->where('id_santri', $id)
                                        ->where('semester', 'Ganjil')
                                        ->where('year', date('Y') . '/' . date('Y')+1)
                                        ->distinct()
                                        ->get();
                
            $years = CumulativeStudy::select('year')
                                    ->where('id_santri', $id)
                                    ->where('semester', 'Ganjil')
                                    ->where('year', date('Y') . '/' . date('Y')+1)
                                    ->distinct()
                                    ->get();
        }

        $courses = Course::leftjoin('ustadzs', 'courses.id_ustadz', '=', 'ustadzs.id')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                        ->where('status_course', 'Aktif')
                        ->orderBy('grade_name')
                        ->orderBy('grade_number')
                        ->get();

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

        $filter_semesters = CumulativeStudy::select('semester')
                                        ->where('id_santri', $id)
                                        ->distinct()
                                        ->get();

        $filter_years = CumulativeStudy::select('year')
                                        ->where('id_santri', $id)
                                        ->distinct()
                                        ->get();

        $id_santri = $id;

        return view('administrator.tambah-santri-krs', compact('cumulativestudys', 'courses', 'filter_semesters', 'filter_years', 'semesters', 'years', 'filter_grade_number', 'filter_grade_name', 'grade_number', 'grade_name', 'id_santri'));
    }

    public function filterSemester(Request $request)
    {
        $cumulativestudys = CumulativeStudy::leftjoin('santris', 'cumulative_studies.id_santri', '=', 'santris.id')
                                            ->leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                            ->where('id_santri', $request->id)
                                            ->where('semester', $request->semester)
                                            ->where('year', $request->year)
                                            ->get();

        $semesters = CumulativeStudy::select('semester')
                                    ->where('id_santri', $request->id)
                                    ->where('semester', $request->semester)
                                    ->where('year', $request->year)
                                    ->distinct()
                                    ->get();
            
        $years = CumulativeStudy::select('year')
                                ->where('id_santri', $request->id)
                                ->where('semester', $request->semester)
                                ->where('year', $request->year)
                                ->distinct()
                                ->get();

        $courses = Course::leftjoin('ustadzs', 'courses.id_ustadz', '=', 'ustadzs.id')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                        ->where('status_course', 'Aktif')
                        ->orderBy('grade_name')
                        ->orderBy('grade_number')
                        ->get();

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

        $filter_semesters = CumulativeStudy::select('semester')
                                        ->where('id_santri', $request->id)
                                        ->distinct()
                                        ->get();

        $filter_years = CumulativeStudy::select('year')
                                        ->where('id_santri', $request->id)
                                        ->distinct()
                                        ->get();
                                    
        $id_santri = $request->id;
        
        return view('administrator.tambah-santri-krs', compact('cumulativestudys', 'courses', 'filter_semesters', 'filter_years', 'semesters', 'years', 'filter_grade_number', 'filter_grade_name', 'grade_number', 'grade_name', 'id_santri'));
    }

    public function filterKelas(Request $request)
    {   
        if(date('m') <= 06 ){
            $cumulativestudys = CumulativeStudy::leftjoin('santris', 'cumulative_studies.id_santri', '=', 'santris.id')
                                                ->leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                                ->where('id_santri', $request->id)
                                                ->where('semester', 'Genap')
                                                ->where('year', date('Y')-1 . '/' . date('Y'))
                                                ->distinct()
                                                ->get();

            $semesters = CumulativeStudy::select('semester')
                                        ->where('id_santri', $request->id)
                                        ->where('semester', 'Genap')
                                        ->where('year', date('Y')-1 . '/' . date('Y'))
                                        ->distinct()
                                        ->get();
        
            $years = CumulativeStudy::select('year')
                                    ->where('id_santri', $request->id)
                                    ->where('semester', 'Genap')
                                    ->where('year', date('Y')-1 . '/' . date('Y'))
                                    ->distinct()
                                    ->get();

        }elseif(date('m') > 06 ){
            $cumulativestudys = CumulativeStudy::leftjoin('santris', 'cumulative_studies.id_santri', '=', 'santris.id')
                                                ->leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                                ->where('id_santri', $request->id)
                                                ->where('semester', 'Ganjil')
                                                ->where('year', date('Y') . '/' . date('Y')+1)
                                                ->distinct()
                                                ->get();
            
            $semesters = CumulativeStudy::select('semester')
                                        ->where('id_santri', $request->id)
                                        ->where('semester', 'Ganjil')
                                        ->where('year', date('Y') . '/' . date('Y')+1)
                                        ->distinct()
                                        ->get();
                
            $years = CumulativeStudy::select('year')
                                    ->where('id_santri', $request->id)
                                    ->where('semester', 'Ganjil')
                                    ->where('year', date('Y') . '/' . date('Y')+1)
                                    ->distinct()
                                    ->get();                                       
        }

        $courses = Course::leftjoin('ustadzs', 'courses.id_ustadz', '=', 'ustadzs.id')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')
                        ->where('status_course', 'Aktif')
                        ->where('grade_name', $request->grade_name)
                        ->where('grade_number', $request->grade_number)
                        ->orderBy('grade_name')
                        ->orderBy('grade_number')
                        ->get();

        $filter_grade_number = Grade::select('grade_number')
                                    ->distinct()
                                    ->get();

        $filter_grade_name = Grade::select('grade_name')
                                ->distinct()
                                ->get();

        $grade_number = Grade::select('grade_number')
                            ->where('grade_name', $request->grade_name)
                            ->where('grade_number', $request->grade_number)
                            ->get();
    
        $grade_name = Grade::select('grade_name')
                            ->where('grade_name', $request->grade_name)
                            ->where('grade_number', $request->grade_number)
                            ->get();

        $filter_semesters = CumulativeStudy::select('semester')
                                        ->where('id_santri', $request->id)
                                        ->distinct()
                                        ->get();

        $filter_years = CumulativeStudy::select('year')
                                        ->where('id_santri', $request->id)
                                        ->distinct()
                                        ->get();

        $id_santri = $request->id;

        return view('administrator.tambah-santri-krs', compact('cumulativestudys', 'courses', 'filter_semesters', 'filter_years', 'semesters', 'years', 'filter_grade_number', 'filter_grade_name', 'grade_number', 'grade_name', 'id_santri'));
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
            
            // CumulativeStudy::firstOrCreate([
            //     'year' => date('Y')-1 . '/' . date('Y'),
            //     'semester' => 'Ganjil',
            //     'id_santri' => $request->id_santri,
            //     'id_course' => $request->id_course,
            // ]);
    
        }elseif(date('m') > 06 ){
            CumulativeStudy::firstOrCreate([
                'year' => date('Y') . '/' . date('Y')+1,
                'semester' => 'Ganjil',
                'id_santri' => $request->id_santri,
                'id_course' => $request->id_course,
            ]);
            
            // CumulativeStudy::firstOrCreate([
            //     'year' => date('Y') . '/' . date('Y')+1,
            //     'semester' => 'Genap',
            //     'id_santri' => $request->id_santri,
            //     'id_course' => $request->id_course,
            // ]);
        }

        return redirect()->back()->with('tambah','Data Berhasil Ditambahkan!');
    }

    public function delete($id)
    {
        CumulativeStudy::where('id_cumulative_study', $id)->delete();
   
        return redirect()->back()->with('hapus','Data Berhasil Dihapus!');
    }
}
