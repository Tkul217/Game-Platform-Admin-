<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    public function __construct(
        protected UserRepository $userRepository,
    )
    {
    }

    public function blockUser(int $userId, string $reason): void
    {
        $user = $this->userRepository->getById($userId);

        $user->update([
            'blocked_reason' => $reason,
            'deleted_at' => now(),
        ]);
    }

    public function unblockUser(int $userId): void
    {
        $user = $this->userRepository->getById($userId);

        $user->update([
            'blocked_reason' => null,
            'deleted_at' => null,
        ]);
    }
}
