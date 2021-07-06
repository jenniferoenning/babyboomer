<?php

namespace App\Http\Controllers;

use App\Scopes\ActiveScope;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        
        return view('dashboard', [
            'usersCount' => $usersCount,
        ]);
    }
}
