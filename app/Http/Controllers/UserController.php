<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

    public function block(Request $request, User $user): RedirectResponse
    {
        $this->userService->blockUser($user, $request->get('reason'));

        return redirect()->route('user.show');
    }

    public function unblock(User $user): RedirectResponse
    {
        $this->userService->unblockUser($user);

        return redirect()->route('user.show');
    }
}
