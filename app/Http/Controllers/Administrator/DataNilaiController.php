<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\CumulativeStudy;
use App\Models\Santri;
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
        $santris = Santri::where('status', 'Aktif')
                        ->paginate(50);

        return view('administrator.data-nilai', compact('santris'));
    }

    public function formCreate($id)
    {
        $cumulativestudys = CumulativeStudy::leftjoin('santris', 'cumulative_studies.id_santri', '=', 'santris.id')
                                    ->leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
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
