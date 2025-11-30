<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $user = User::all();
        return view('dashboard', ['user' => $user]);
    }
}
