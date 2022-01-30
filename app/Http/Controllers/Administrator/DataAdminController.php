<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administrator;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class DataAdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $administrators = Administrator::paginate(50);

        return view('administrator.data-admin', compact('administrators'));
    }

    public function formCreate()
    {
        return view('administrator.tambah-data-admin');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required', 'string', 'max:255',
            'username' => 'required', 'string', 'max:255',
            // 'email' => 'required', 'string', 'email', 'max:255', 'unique:administrators',
            'password' => 'required', 'string', 'confirmed', 'min:8',
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

        return redirect(route('administrator.data-admin'));
    }

    public function formUpdate($id)
    {
        $administrators = Administrator::where('id', $id)->get();

        return view('administrator.update-data-admin', compact('administrators'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required', 'string', 'max:255',
            'username' => 'required', 'string', 'max:255',
            // 'email' => 'required', 'string', 'email', 'max:255', 'unique:administrators',
        ]);

        Administrator::where('id', $request->id)->update([
            'name' => $request->name, 
            'username' => $request->username, 
            // 'email' => $request->email,  
        ]);

        return redirect('/administrator/data-admin');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required', 'string', 'confirmed', 'min:8',
        ]);
        
        Administrator::where('id', $request->id)->update([
            'password' => Hash::make($request->password), 
        ]);

        return redirect('/administrator/data-admin');
    }

    public function destroy($id)
    {
        Administrator::where('id', $id)->delete();

        return redirect('/administrator/data-admin');
    }
}
