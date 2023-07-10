<?php

namespace App\Http\Controllers\Web\V1;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $admin = User::count();
        $employee = Employee::count();
        $absence = Absence::count();
        return view('features.home.index', compact('admin', 'employee', 'absence'));
    }
}
