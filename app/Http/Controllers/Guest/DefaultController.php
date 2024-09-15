<?php

namespace App\Http\Controllers\Guest;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;

class DefaultController extends Controller {
    //
    public function index(Request $request) {
        
        return view('default.index');
    }

    public function info(Request $request) {

        return view('default.info');
    }

    public function cs(Request $request) {
        
        return view('default.cs');
    }

    public function password(Request $request) {
        
        return view('default.password');
    }    

    public function login(Request $request) {
        return view('default.login');
    }

    public function doLogin(Request $request) {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        /*
        $credentials['password'] = Hash::make($credentials['password']);

        dd($credentials);
        */

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            return redirect()->intended(route('auth.notif'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register(Request $request) {
        return view('default.register');
    }

    public function doRegister(Request $request) {
        /*
        1. Validasi input.
        2. Masukan ke dalam database.
        3. Pastikan bahwa sistem akan melakukan verifikasi email.
        4. Tampilkan pesan sukses atau kesalahan ke dalam halaman registrasi.
        */

        DB::beginTransaction();

        try {

            // 1. Validasi input.
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'unique:'.User::class],
                'password' => ['required'],
            ]);

            // 2. Masukan ke dalam database.
            //$token = bin2hex(random_bytes(16));
            $token = Str::random(60);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->remember_token = $token;
            $user->save();

            // 3. Pastikan bahwa sistem akan melakukan verifikasi email.
            $url = route('guest.verification', ['id' => $user->id, 'token' => $token]);
            Mail::to($request->email)->send(new EmailVerification($url));

            // Commit transaction
            DB::commit();          

            // 4. Tampilkan pesan sukses atau kesalahan ke dalam halaman registrasi.
            return back()->with('success', 'Data registrasi berhasil disimpan! Segera periksa surel anda di ' . $request->email . ' untuk proses verifikasi.');
        } catch(Exception $e) {
            // Rollback transaction
            DB::rollBack();

            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function reset(Request $request) {
        return view('default.reset');
    }

    public function verify(Request $request, $id, $token) {

        try {
            $user = User::where('id', $id)->where('remember_token', $token)->first();

            $user->remember_token = null;
            $user->email_verified_at = now();
            $user->save();

            $request->session()->regenerate();
    
            Auth::login($user);            

            return redirect(route('auth.notif'));
        } catch(Exception $e) {
            $message = $e->getMessage();

            return view('default.verify', compact('message'));
        }
    }
}
