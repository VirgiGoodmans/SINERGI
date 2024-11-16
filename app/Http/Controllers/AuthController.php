<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $existingUser = User::where('email', $googleUser->getEmail())->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            $newUser = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'password' => bcrypt(Str::random(16)), // Password acak
            ]);
            Auth::login($newUser);
        }

        return redirect()->route('home');
    }

    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Handle registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        // Validasi input pengguna
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Login pengguna setelah registrasi
        Auth::login($user);

        // Redirect ke halaman home setelah berhasil registrasi
        return redirect()->route('home');
    }

    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // Validasi input login
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Cek kredensial pengguna
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('home');
        }

        // Jika gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    public function logout()
    {
        // Proses logout
        Auth::logout();

        // Redirect setelah logout
        return redirect()->route('home');
    }
}
