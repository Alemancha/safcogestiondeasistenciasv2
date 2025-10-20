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
        ], [
            'email.required' => 'Ingrese su usuario o correo electrónico.',
            'password.required' => 'Ingrese su contraseña.',
        ]);

        $identifier = trim($validated['email']);
        $password = $validated['password'];

        $user = Usuario::query()
            ->where(function ($query) use ($identifier) {
                $query->where('Email', $identifier)
                    ->orWhere('NombreUser', $identifier);
            })
            ->first();

        if ($user && $this->checkPassword($password, $user->Password)) {
            $request->session()->regenerate();
            $this->persistSession($user);

            return redirect()->intended(route('dashboard'));
        }

        return back()
            ->withInput($request->only('email'))
            ->with('error', 'Las credenciales proporcionadas no son válidas.')
            ->withErrors([
                'auth' => 'Las credenciales proporcionadas no son válidas.',
            ]);
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'Has cerrado sesión correctamente.');
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
                'username' => $user->NombreUser,
            ],
            'user' => $user->Email,
        ]);
    }
}
