<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mapel;

class DataMapelController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mapels = Mapel::all();

        return view('administrator.data-mapel', compact('mapels'));
    }

    public function formTambah()
    {
        return view('administrator.tambah-data-mapel');
    }
}
