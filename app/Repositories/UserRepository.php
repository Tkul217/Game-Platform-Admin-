<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository
{
    public function getAll(int $limit = 10): LengthAwarePaginator
    {
        return User::query()
            ->orderBy('id', 'desc')
            ->paginate($limit);
    }

    public function getById(int $id): User
    {
        return User::findOrFail($id);
    }
}
