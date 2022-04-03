<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\CumulativeStudy;
use App\Models\Grade;
use App\Models\ImportSantri;
use App\Models\Santri;

class DataSantriController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $santris = Santri::where('status', 'Aktif')
                        ->orderBy('name')
                        ->paginate(50);

        $filter_grade_number = Grade::select('grade_number')
                                    ->distinct()
                                    ->get();
                                    
        $filter_grade_name = Grade::select('grade_name')
                                ->distinct()
                                ->get();

        $grade_number = Grade::select('grade_number')
                            ->limit(1);

        $grade_name = Grade::select('grade_name')
                            ->limit(1);

        $filter_status = Santri::select('status')
                                ->distinct()
                                ->get();

        $status = Santri::select('status')
                        ->where('status', 'Aktif')
                        ->distinct()
                        ->get();

        return view('administrator.data-santri', compact('santris', 'grade_number', 'grade_name', 'filter_grade_number', 'filter_grade_name', 'status', 'filter_status'));
    }

    public function formCreate()
    {
        return view('administrator.tambah-data-santri');
    }

    public function create(Request $request)
    {
        $request->validate([
            'id' => 'required', 'number', 'max:255',
            'name' => 'required', 'string', 'max:255',
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ]);

        Santri::create([
            'id' => $request->id,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => 'Santri',
            'status' => 'Aktif',
        ]);

        return redirect('/administrator/data-santri')->with('tambah','Data Berhasil Ditambahkan!');
    }

    public function formImport()
    {
        return view('administrator.import-data-santri');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');
        $nama_file = rand().$file->getClientOriginalName();
        $file->move('file_santri', $nama_file);
        Excel::import(new ImportSantri, public_path('/file_santri/'.$nama_file));

        return redirect('/administrator/data-santri')->with('tambah','Data Berhasil Diimport!');
    }

    public function filter(Request $request)
    {
        if(date('m') <= 06 ){
            $santris = CumulativeStudy::leftjoin('santris', 'cumulative_studies.id_santri', '=', 'santris.id')
                                    ->leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                    ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                                    ->where('year', date('Y')-1 . '/' . date('Y'))
                                    ->where('semester', 'Genap')
                                    ->where('status', 'Aktif')
                                    ->where('grade_number', $request->grade_number)
                                    ->where('grade_name', $request->grade_name)
                                    ->orderBy('name')
                                    ->paginate(50);

        }elseif(date('m') > 06 ){
            $santris = CumulativeStudy::leftjoin('santris', 'cumulative_studies.id_santri', '=', 'santris.id')
                                    ->leftjoin('courses', 'cumulative_studies.id_course', '=', 'courses.id_course')
                                    ->leftjoin('grades', 'courses.id_grade', '=', 'grades.id_grade')
                                    ->where('year', date('Y') . '/' . date('Y')+1)
                                    ->where('semester', 'Ganjil')
                                    ->where('status', 'Aktif')
                                    ->where('grade_number', $request->grade_number)
                                    ->where('grade_name', $request->grade_name)
                                    ->orderBy('name')
                                    ->paginate(50);
        }

        $filter_grade_number = Grade::select('grade_number')
                                    ->distinct()
                                    ->get();

        $filter_grade_name = Grade::select('grade_name')
                                ->distinct()
                                ->get();

        $grade_number = Grade::select('grade_number')
                            ->where('grade_number', $request->grade_number)
                            ->distinct()
                            ->get();

        $grade_name = Grade::select('grade_name')
                            ->where('grade_name', $request->grade_name)
                            ->distinct()
                            ->get();

        $status = Santri::select('status')
                        ->where('status', 'Aktif')
                        ->distinct()
                        ->get();

        $filter_status = Santri::select('status')
                                ->distinct()
                                ->get();
        
        return view('administrator.data-santri', compact('santris', 'grade_number', 'grade_name', 'filter_grade_number', 'filter_grade_name', 'status', 'filter_status'));
    }

    public function filterStatus(Request $request)
    {
        $santris = Santri::where('status', $request->status)
                        ->orderBy('name')
                        ->paginate(50);

        $filter_grade_number = Grade::select('grade_number')
                                    ->distinct()
                                    ->get();

        $filter_grade_name = Grade::select('grade_name')
                                ->distinct()
                                ->get();

        $grade_number = Grade::select('grade_number')
                            ->limit(1);

        $grade_name = Grade::select('grade_name')
                            ->limit(1);

        $status = Santri::select('status')
                        ->where('status', $request->status)
                        ->distinct()
                        ->get();

        $filter_status = Santri::select('status')
                                ->distinct()
                                ->get();
        
        return view('administrator.data-santri', compact('santris', 'grade_number', 'grade_name', 'filter_grade_number', 'filter_grade_name', 'status', 'filter_status'));
    }

    public function formUpdate($id)
    {
        $santris = Santri::where('id', $id)
                        ->get();

        return view('administrator.update-data-santri', compact('santris'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'id' => 'required', 'number', 'max:255',
            'name' => 'required', 'string', 'max:255',
            'status' => 'required', 'string',
        ]);

        Santri::where('id', $request->id)->update([
            'id' => $request->id,
            'name' => $request->name,  
            'status' => $request->status,  
        ]);

        return redirect('/administrator/data-santri')->with('perbarui','Data Berhasil Diperbarui!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ]);

        Santri::where('id', $request->id)->update([
            'password' => Hash::make($request->password), 
        ]);

        return redirect('/administrator/data-santri')->with('perbarui','Data Berhasil Diupdate');
    }

    public function destroy($id)
    {
        Santri::where('id', $id)->delete();

        return redirect('/administrator/data-santri')->with('hapus','Data Berhasil Dihapus!');
    }

    public function detailSantri($id)
    {
        $santris = Santri::where('id', $id)->get();
        
        return view('administrator.detail-data-santri', compact('santris'));
    }

    public function sampleImport()
    {
        $path = storage_path('app/public/' . 'data_sample_santri.xlsx');

        return response()->download($path);
    }
}
