<?php

namespace App\Http\Controllers;

use App\Repositories\AdminRepository;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function __invoke(AdminRepository $repository): View
    {
        $data = $repository->getAll();

        return view('admins.index', [
            'admins' => $data
        ]);
    }
}
