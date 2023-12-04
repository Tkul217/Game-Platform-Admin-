<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(
        protected UserService $userService,
        protected UserRepository $userRepository,
    )
    {
    }

    public function index(): View
    {
        $data = $this->userRepository->getAll();

        return view('users.index', [
            'users' => $data,
        ]);
    }

    public function show(User $user): View
    {
        return view('users.show', [
            'user' => $user,
        ]);
    }
}
