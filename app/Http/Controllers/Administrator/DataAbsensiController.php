<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Support\Facades\Session;

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
                        ->paginate(50);

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

        if(date('m') <= 06 ){
            Attendance::create([
                'year' => date('Y')-1 . '/' . date('Y'),
                'semester' => 'Genap',
                'id_santri' => $request->id_santri,
                'minimum_attendance_mdnu' => '15', 
                'attendance_mdnu' => $request->attendance_mdnu,
                'minimum_attendance_asrama' => '10',
                'attendance_asrama' => $request->attendance_asrama,
            ]);
        }elseif(date('m') > 06 ){
            Attendance::create([
                'year' => date('Y') . '/' . date('Y')+1,
                'semester' => 'Ganjil',
                'id_santri' => $request->id_santri,
                'minimum_attendance_mdnu' => '15', 
                'attendance_mdnu' => $request->attendance_mdnu,
                'minimum_attendance_asrama' => '10',
                'attendance_asrama' => $request->attendance_asrama,
            ]);
        }

        Session::flash('tambah','Data Berhasil Ditambahkan!');

        return redirect()->route('administrator.data-absensi.list', [$request->id_santri]);
    }

    public function formUpdate($id)
    {
        $attendances = Attendance::where('id_attendance', $id)->get();

        return view('administrator.update-data-absensi', compact('attendances'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'attendance_mdnu' => 'required', 'number',
            'attendance_asrama' => 'required', 'number',
        ]);
        
        Attendance::where('id_attendance', $request->id_attendance)->update([
            'minimum_attendance_mdnu' => '10', 
            'attendance_mdnu' => $request->attendance_mdnu,
            'minimum_attendance_asrama' => '15',
            'attendance_asrama' => $request->attendance_asrama,
        ]);

        Session::flash('perbarui','Data Berhasil Diperbarui!');

        return redirect()->route('administrator.data-absensi.list', [$request->id_santri]);
    }

    public function delete($id)
    {
        $id_santri = 0;
        foreach(Attendance::where('id_attendance', $id)->get() as $attendances){
            $id_santri = $attendances->id_santri;
        }

        Attendance::where('id_attendance', $id)->delete();

        Session::flash('hapus','Data Berhasil Dihapus!');

        return redirect()->route('administrator.data-absensi.list', [$id_santri]);
    }
}
