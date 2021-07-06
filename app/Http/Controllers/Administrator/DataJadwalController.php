<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Schedule;

class DataJadwalController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $schedules = Schedule::all();

        return view('administrator.data-jadwal', compact('schedules'));
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

        Schedule::create([
            'day' => $request['day'],
            'time_begin' => $request['time_begin'],
            'time_end' => $request['time_end'],
        ]);

        return redirect('/administrator/data-jadwal');
    }

    public function formUpdate($id)
    {
        $schedules = Schedule::where('id_schedule', $id)->get();

        return view('administrator.update-data-jadwal', compact('schedules'));
    }

    public function update(Request $request)
    {
        Schedule::where('id_schedule', $request->id_schedule)->update([
            'day' => $request->day, 
            'time_begin' => $request->time_begin, 
            'time_end' => $request->time_end, 
        ]);

        return redirect('/administrator/data-jadwal');
    }
}
