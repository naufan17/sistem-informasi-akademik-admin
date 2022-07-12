<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Administrator;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;

class DataAdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $administrators = Administrator::orderBy('name')->paginate(50);

        return view('administrator.data-admin', compact('administrators'));
    }

    public function formCreate()
    {
        return view('administrator.tambah-data-admin');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255|unique:administrators',
            'password' => 'required|min:8|confirmed',
        ]);

        Administrator::create([
            'name' => $request->name,
            'username' => $request->username,
            // 'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        VerifyEmail::createUrlUsing(function ($notifiable) {
            return URL::temporarySignedRoute(
                'administrator.verification.verify',
                Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
                [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification()),
                ]
            );
        });

        return redirect('/administrator/data-admin')->with('tambah','Data Berhasil Ditambahkan!');
    }

    public function formUpdate($id)
    {
        $administrators = Administrator::where('id', $id)->get();

        return view('administrator.update-data-admin', compact('administrators'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255|unique:administrators',
        ]);

        Administrator::where('id', $request->id)->update([
            'name' => $request->name, 
            'username' => $request->username, 
            // 'email' => $request->email,  
        ]);

        return redirect('/administrator/data-admin')->with('perbarui','Data Berhasil Diperbarui!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);
        
        Administrator::where('id', $request->id)->update([
            'password' => Hash::make($request->password), 
        ]);

        return redirect('/administrator/data-admin')->with('perbarui','Data Berhasil Diupdate');
    }

    public function destroy($id)
    {
        if(Auth::guard('administrator')->user()->id !=  $id){
            Administrator::where('id', $id)->delete();
            return redirect('/administrator/data-admin')->with('hapus','Data Berhasil Dihapus!');
        } else {
            return redirect('/administrator/data-admin')->with('hapus','Data Gagal Dihapus!');
        }
    }
}
