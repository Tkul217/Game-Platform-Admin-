<?php

namespace App\Repositories;

use App\Models\Admin;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminRepository
{
    public function getAll(int $limit = 10): LengthAwarePaginator
    {
        return Admin::query()
            ->paginate($limit);
    }
}
