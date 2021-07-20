<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Attendance;

class DataAbsensiController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $attendances = Attendance::leftjoin('users', 'attendances.id_santri', '=', 'users.id')->get();

        return view('administrator.data-absensi', compact('attendances'));
    }

    public function formCreate($id)
    {
        $attendances = Attendance::leftjoin('users', 'attendances.id_santri', '=', 'users.id')->where('id', $id)->get();

        return view('administrator.tambah-data-absensi', compact('attendances'));
    }


}
