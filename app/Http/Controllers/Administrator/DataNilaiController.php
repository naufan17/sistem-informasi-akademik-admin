<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CumulativeStudy;
use App\Models\User;

class DataNilaiController extends Controller
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
                        ->get();

        $santris = User::where('role', 'Santri')
                        ->where('status', 'Aktif')
                        ->get();

        return view('administrator.data-nilai', compact('courses', 'santris'));
    }

    public function formCreate($id)
    {
        $cumulativestudys = CumulativeStudy::leftjoin('users', 'cumulative_studies.id_santri', '=', 'users.id')
                                    ->leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                    ->orderBy('sem')
                                    ->where('id_santri', $id)
                                    ->get();

        return view('administrator.tambah-data-nilai', compact('cumulativestudys'));
    }
    
    public function create(Request $request)
    {
        $request->validate([
            'score' => 'required', 'number',
        ]);

        CumulativeStudy::where('id_cumulative_study', $request['id_cumulative_study'])->update([
            'minimum_score' => '60',
            'score' => $request['score'],
        ]);

        // CumulativeStudy::upsert([
        //     'id_cumulative_study' => $request->id_cumulative_study,
        //     'year' => $request->year,
        //     'semester' => $request->semester,
        //     'minimum_score' => '75',
        //     'score' => $request->score,
        //     'id_santri' => $request->id_santri,
        //     'id_course' => $request->id_course,
        // ],['id_cumulative_study', 'year', 'semester', 'id_santri', 'id_course'],['minimum_score', 'score']);

        return redirect('/administrator/data-nilai');
    }
}
