<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function login(): View
    {
        return view('login.index');
    }

    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if (auth('admin')->attempt($data)) {
            $request->session()->regenerate();

            return redirect()->intended();
        }

        return redirect()->back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }


}
