<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegistrationController extends Controller
{
    // Langkah 1: Tunjuk halaman pilih peranan
    public function showRoleSelection()
    {
        return view('auth.register-role'); // Kita akan cipta view ini
    }

    // Langkah 2: Tunjuk borang pelajar
    public function showStudentForm()
    {
        return view('auth.register-student'); // Kita akan cipta view ini
    }

    // Langkah 3: Simpan data pelajar
    public function storeStudent(Request $request): RedirectResponse
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'date'],
            'class' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        DB::transaction(function () use ($request) {
            $user = User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role' => 'pelajar',
            ]);

            $user->student()->create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'dob' => $request->dob,
                'class' => $request->class,
                'bio' => $request->bio,
            ]);

            event(new Registered($user));
            Auth::login($user);
        });

        return redirect('/dashboard-pelajar'); // Arahkan ke dashboard pelajar
    }

    // Langkah 4: Tunjuk borang guru
    public function showTeacherForm()
    {
        return view('auth.register-teacher'); // Kita akan cipta view ini
    }

    // Langkah 5: Simpan data guru
    public function storeTeacher(Request $request): RedirectResponse
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'date'],
            'class' => ['required', 'string', 'max:255'],
            'year' => ['required', 'string', 'max:4'],
            'bio' => ['nullable', 'string'],
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        DB::transaction(function () use ($request) {
            $user = User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role' => 'guru',
            ]);

            $user->teacher()->create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'dob' => $request->dob,
                'class' => $request->class,
                'year' => $request->year,
                'bio' => $request->bio,
            ]);

            event(new Registered($user));
            Auth::login($user);
        });
        
        return redirect('/dashboard-guru'); // Arahkan ke dashboard guru
    }
}
