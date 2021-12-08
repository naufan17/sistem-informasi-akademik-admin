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
        $santris = User::leftjoin('attendances', 'users.id', '=', 'attendances.id_santri')->where('role', 'Santri')->get();

        return view('administrator.data-absensi', compact('santris'));
    }

    public function formCreate($id)
    {
        $santris = User::leftjoin('attendances', 'users.id', '=', 'attendances.id_santri')->where('id', $id)->get();

        return view('administrator.tambah-data-absensi', compact('santris'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'attendance_mdnu' => 'required', 'number',
            'attendance_asrama' => 'required', 'number',
        ]);

        $Attendance = Attendance::where('id_santri', $request->id_santri)->get();

        if($Attendance !== null){
            Attendance::where('id_santri', $request->id_santri)->update([
                'attendance_mdnu' => $request->attendance_mdnu,
                'attendance_asrama' => $request->attendance_asrama,
            ]);
        }else{
            Attendance::create([
                'minimum_attendance_mdnu' => '80',
                'attendance_mdnu' => $request['attendance_mdnu'],
                'minimum_attendance_asrama' => '80',
                'attendance_asrama' => $request['attendance_asrama'],
                'id_santri' => $request['id_santri'],
            ]);            
        }


        // Attendance::updateOrCreate([
        //     'minimum_attendance_mdnu' => '80',
        //     'attendance_mdnu' => $request['attendance_mdnu'],
        //     'minimum_attendance_asrama' => '80',
        //     'attendance_asrama' => $request['attendance_asrama'],
        //     'id_santri' => $request['id_santri'],
        // ]);

        return redirect('/administrator/data-absensi');
    }
}
