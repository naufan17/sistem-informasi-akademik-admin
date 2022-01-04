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
        
        $idSantri = $id;    

        return view('administrator.list-data-absensi', compact('santris', 'idSantri'));
    }

    public function formCreate($id)
    {
        $idSantri = $id;

        return view('administrator.tambah-data-absensi', compact('idSantri'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'attendance_mdnu' => 'required', 'number',
            'attendance_asrama' => 'required', 'number',
        ]);

        // Attendance::updateOrCreate([
        //     'id_santri' => $request->id_santri],
        //     ['minimum_attendance_mdnu' => '10', 
        //     'attendance_mdnu' => $request->attendance_mdnu,
        //     'minimum_attendance_asrama' => '15',
        //     'attendance_asrama' => $request->attendance_asrama,
        // ]);

        // Attendance::create([
        //     'id_santri' => $request->id_santri,
        //     'minimum_attendance_mdnu' => '10', 
        //     'attendance_mdnu' => $request->attendance_mdnu,
        //     'minimum_attendance_asrama' => '15',
        //     'attendance_asrama' => $request->attendance_asrama,
        // ]);


        if(date('m') <= 06 ){
            Attendance::create([
                'year' => date('Y'),
                'semester' => 'Genap',
                'id_santri' => $request->id_santri,
                'minimum_attendance_mdnu' => '10', 
                'attendance_mdnu' => $request->attendance_mdnu,
                'minimum_attendance_asrama' => '15',
                'attendance_asrama' => $request->attendance_asrama,
            ]);
    
        }elseif(date('m') > 06 ){
            Attendance::create([
                'year' => date('Y'),
                'semester' => 'Ganjil',
                'id_santri' => $request->id_santri,
                'minimum_attendance_mdnu' => '10', 
                'attendance_mdnu' => $request->attendance_mdnu,
                'minimum_attendance_asrama' => '15',
                'attendance_asrama' => $request->attendance_asrama,
            ]);
        }

        return redirect()->route('administrator.data-absensi.list', [$request->id_santri]);

        // return redirect('/administrator/data-absensi');
    }
}
