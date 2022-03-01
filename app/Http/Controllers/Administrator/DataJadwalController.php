<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Support\Facades\Session;

class DataJadwalController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $schedules = Schedule::orderBy('day', 'desc')
                            ->orderBy('time_begin')
                            ->get();

        $filters = Schedule::select('day')
                            ->distinct()
                            ->get();

        return view('administrator.data-jadwal', compact('schedules', 'filters'));
    }

    public function filterHari(Request $request)
    {
        $schedules = Schedule::where('day', $request->day)
                            ->orderBy('day', 'desc')
                            ->orderBy('time_begin')
                            ->get();

        $filters = Schedule::select('day')
                            ->where('day', $request->day)
                            ->distinct()
                            ->get();

        return view('administrator.data-jadwal', compact('schedules', 'filters'));
    }

    public function formCreate()
    {
        return view('administrator.tambah-data-jadwal');
    }

    public function create(Request $request)
    {
        $request->validate([
            'day' => 'required', 'string','max:255',
            'time_begin' => 'required', 'string','max:255',
            'time_end' => 'required', 'string','max:255',
        ]);

        Schedule::firstOrCreate([
            'day' => $request->day, 
            'time_begin' => $request->time_begin, 
            'time_end' => $request->time_end,
        ]);

        Session::flash('tambah','Data Berhasil Ditambahkan!');

        return redirect('/administrator/data-jadwal');
    }

    public function formUpdate($id)
    {
        $schedules = Schedule::where('id_schedule', $id)->get();

        return view('administrator.update-data-jadwal', compact('schedules'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'day' => 'required', 'string','max:255',
            'time_begin' => 'required', 'string','max:255',
            'time_end' => 'required', 'string','max:255',
        ]);
        
        Schedule::where('id_schedule', $request->id_schedule)->update([
            'day' => $request->day, 
            'time_begin' => $request->time_begin, 
            'time_end' => $request->time_end, 
        ]);

        Session::flash('perbarui','Data Berhasil Diperbarui');

        return redirect('/administrator/data-jadwal');
    }

    public function delete($id)
    {
        Schedule::where('id_schedule', $id)->delete();

        Session::flash('hapus','Data Berhasil Dihapus!');

        return redirect('/administrator/data-jadwal');
    }
}
