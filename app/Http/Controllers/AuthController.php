<?php
 
namespace App\Http\Controllers;
use App\Mail\KirimEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
 
class AuthController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
 
    public function register()
    {
        return view('auth/register');
    }
 
    public function registerSave(Request $request)
    {
        // Cek apakah pendaftaran sebagai admin dibatasi
    if ($request->type == '1') { // Jika user memilih role Admin
        $adminCount = User::where('type', '1')->count();
        if ($adminCount >= 2) {
            return redirect()->back()->with('error', 'Pendaftaran admin sudah mencapai batas maksimal.');
        }
    }
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'type' => 'required',
            'password' => 'required|confirmed'
        ])->validate();
 
        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'type' => $request->type,
            'password' => Hash::make($request->password),
        ]);

        // Kirim email ke user
    Mail::to($users->email)->send(new KirimEmail((object) [
        'name' => $users->name,
        'email' => $users->email,
        'password' => $request->password, // Jangan lupa hash password di database
    ]));
 
        return redirect()->route('login', compact('users'));
    }
 
    public function login()
    {
        return view('auth/login');
    }
 
    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();
 
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
 
        $request->session()->regenerate();
 
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin/home');
        } else {
            return redirect()->route('home');
        }
         
        return redirect()->route('dashboard');
    }
 
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
 
        $request->session()->invalidate();
 
        return redirect('/login');
    }
 
    public function profile()
    {
        return view('userprofile');
    }
}
