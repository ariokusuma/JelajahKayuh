<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    // Routing Controllers
    public function register() {
        return view('auth.register');
    }

    public function login() {
        return view('auth.login');
    }


    // ===== Actions Controllers =====

        /**
     * Action - Register
     */

    public function register_action(Request $request) {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'nohp' => 'required',
            'email' => 'required|email|unique:users',
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
            'password' => [
                'required',
                'confirmed',
                // 'min:8',
                // 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
                // function ($attribute, $value, $fail) {
                //     if (strlen($value) < 8) {
                //         throw ValidationException::withMessages([
                //             'password' => 'Password harus memiliki setidaknya 8 karakter.',
                //         ]);
                //     }
                //     if (preg_match('/^[a-zA-Z]+$/', $value)) {
                //         throw ValidationException::withMessages([
                //             'password' => 'Password tidak boleh berupa huruf semua.',
                //         ]);
                //     }
                //     if (preg_match('/^\d+$/', $value)) {
                //         throw ValidationException::withMessages([
                //             'password' => 'Password tidak boleh berupa angka semua.',
                //         ]);
                //     }
                //     if (!preg_match('/[@$!%*?&]/', $value)) {
                //         throw ValidationException::withMessages([
                //             'password' => 'Password harus memiliki setidaknya satu karakter khusus.',
                //         ]);
                //     }
                // },
            ],
        ],
    );


        $user = new User([
            'role' => 1,
            'name' => $request->name,
            'nohp' => $request->nohp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public'); // Save the photo to the 'public/photos' directory
            $user->photo = $photoPath;
        }

        $user->save();

        return redirect()->route('login')->with('success', 'Registrasi Berhasil!');
    }

    /**
     * Action - Login
     */

    public function login_action(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            $user = Auth::user();
            $role = $user->role;

            if ($role == 0) {
                // Admin User
                return redirect()->intended('dashboard');
            } else {
                // Normal User
                return redirect()->intended('/');
            }
        }

        // return back()->withErrors([
        return back()->with([
            'loginError' => 'Gagal Login',
        ])->onlyInput('email');
    }

    /**
     * Logout
     */
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }




}
