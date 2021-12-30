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
        $santris = User::where('role', 'Santri')
                        ->where('status', 'Aktif')
                        ->get();

        return view('administrator.data-absensi', compact('santris'));
    }

    public function listAbsensi($id)
    {
        $santris = User::leftjoin('attendances', 'users.id', '=', 'attendances.id_santri')
                        ->where('id', $id)
                        ->get();

        return view('administrator.list-data-absensi', compact('santris'));
    }

    public function formCreate()
    {
        return view('administrator.tambah-data-absensi');
    }

    public function create(Request $request)
    {
        $request->validate([
            'attendance_mdnu' => 'required', 'number',
            'attendance_asrama' => 'required', 'number',
        ]);

        // $Attendance = Attendance::where('id_santri', $request->id_santri)->get();

        // if($Attendance !== null){
        //     Attendance::where('id_santri', $request->id_santri)->update([
        //         'attendance_mdnu' => $request->attendance_mdnu,
        //         'attendance_asrama' => $request->attendance_asrama,
        //     ]);
        // }else{
        //     Attendance::create([
        //         'minimum_attendance_mdnu' => '10',
        //         'attendance_mdnu' => $request['attendance_mdnu'],
        //         'minimum_attendance_asrama' => '15',
        //         'attendance_asrama' => $request['attendance_asrama'],
        //         'id_santri' => $request['id_santri'],
        //     ]);            
        // }

        Attendance::updateOrCreate([
            'id_santri' => $request->id_santri],
            ['minimum_attendance_mdnu' => '10', 
            'attendance_mdnu' => $request->attendance_mdnu,
            'minimum_attendance_asrama' => '15',
            'attendance_asrama' => $request->attendance_asrama,
        ]);

        // Attendance::upsert([
        //     'id_santri' => $request->id_santri,
        //     'minimum_attendance_mdnu' => '10',
        //     'attendance_mdnu' => $request->attendance_mdnu,
        //     'minimum_attendance_asrama' => '15',
        //     'attendance_asrama' => $request->attendance_asrama],
        //     ['id_santri'], 
        //     ['minimum_attendance_mdnu', 'attendance_mdnu', 'minimum_attendance_asrama', 'attendance_asrama']
        // );

        return redirect('/administrator/data-absensi');
    }
}
