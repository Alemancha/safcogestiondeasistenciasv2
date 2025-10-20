<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (session()->has('auth_user')) {
            return redirect()->route('dashboard');
        }

        return view('login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $identifier = $validated['email'];
        $query = Usuario::query();

        if (filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
            $user = $query->where('Email', $identifier)->first();
        } else {
            $user = $query->where('NombreUser', $identifier)->first();
        }

        if ($user && ($this->checkPassword($validated['password'], $user->Password))) {
            $request->session()->regenerate();
            $this->persistSession($user);

            return redirect()->route('dashboard');
        }

        return back()
            ->withInput($request->only('email'))
            ->with('error', 'Usuario o contraseña incorrectos');
    }

    public function logout()
    {
        session()->forget(['auth_user', 'user']);

        return redirect()->route('login');
    }

    private function checkPassword(string $plain, string $stored): bool
    {
        return Hash::check($plain, $stored) || hash_equals($stored, $plain);
    }

    private function persistSession(Usuario $user): void
    {
        session([
            'auth_user' => [
                'id' => $user->IdUser,
                'name' => trim($user->NombreUser . ' ' . $user->Apellido),
                'email' => $user->Email,
            ],
            'user' => $user->Email,
        ]);
    }
}
