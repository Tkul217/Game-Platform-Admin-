<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function blockUser(User $user, string $reason): void
    {
        $user->update([
            'blocked_reason' => $reason,
            'deleted_at' => now(),
        ]);
    }

    public function unblockUser(User $user): void
    {
        $user->update([
            'blocked_reason' => null,
            'deleted_at' => null,
        ]);
    }
}
