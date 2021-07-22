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
        $attendances = User::leftjoin('attendances', 'users.id', '=', 'attendances.id_santri')->where('role', 'Santri')->get();

        return view('administrator.data-absensi', compact('attendances'));
    }

    public function formCreate($id)
    {
        $attendances = User::leftjoin('attendances', 'users.id', '=', 'attendances.id_santri')->where('role', 'Santri')->where('id', $id)->get();
        // $attendances = Attendance::leftjoin('users', 'attendances.id_santri', '=', 'users.id')->where('id', $id)->get();

        return view('administrator.tambah-data-absensi', compact('attendances'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'day' => 'required', 'string','max:255',
            'time_begin' => 'required', 'string','max:255',
            'time_end' => 'required', 'string','max:255',
        ]);

        Schedule::create([
            'day' => $request['day'],
            'time_begin' => $request['time_begin'],
            'time_end' => $request['time_end'],
        ]);

        return redirect('/administrator/data-jadwal');
    }
}
