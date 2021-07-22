<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CumulativeStudy;
use App\Models\Grade;
use App\Models\Schedule;
use App\Models\User;

class DataKelasController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $grades = Grade::all();
        $schedules = Schedule::all();
        $courses = Course::leftjoin('users', 'courses.id_ustadz', '=', 'users.id')
                        ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                        ->leftjoin('schedules', 'courses.id_schedule', '=', 'schedules.id_schedule')->get();

        return view('administrator.data-kelas', compact('grades', 'schedules', 'courses'));
    }

    public function listSantri($id)
    {
        $santriin = CumulativeStudy::where('id_course', $id)
                                    ->leftjoin('users', 'cumulative_studies.id_santri', '=', 'users.id')->get();

        $santris = User::where('role', 'santri')->where('status', 'Aktif')->get();

        return view('administrator.tambah-santri-kelas', compact('santriin', 'santris'));
    }

    public function createSantri($id)
    {
        CumulativeStudy::create([
            'id' => $request['id'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
        ]);

        return redirect('/administrator/data-kelas');
    }
}
