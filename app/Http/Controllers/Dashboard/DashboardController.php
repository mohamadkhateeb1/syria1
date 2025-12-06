<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        // 1. استخدم اسم (جمع) للمجموعة

        // 2. أرسل المتغير بنفس الاسم (جمع، حرف صغير)
        return view('dashboard.pages.home');
    }
}