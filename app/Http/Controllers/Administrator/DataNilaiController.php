<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CumulativeStudy;
use App\Models\User;
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
        $santris = User::where('role', 'Santri')
                        ->where('status', 'Aktif')
                        ->paginate(50);

        return view('administrator.data-nilai', compact('santris'));
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
            'id_cumulative_study' => 'required', 'number',
            'score' => 'required', 'number',
        ]);
        
        CumulativeStudy::where('id_cumulative_study', $request->id_cumulative_study)->update([
            'minimum_score' => '60',
            'score' => $request->score,
        ]);

        Session::flash('tambah','Data Berhasil Disimpan!');

        return redirect('/administrator/data-nilai');
    }
}
