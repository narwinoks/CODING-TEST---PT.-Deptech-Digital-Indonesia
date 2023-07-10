<?php

namespace App\Http\Controllers\Web\V1;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeAbsenceController extends Controller
{
    public function index(Request $request)
    {
        return view('features.absences.employee.index');
    }
    public function show(Request $request, $id)
    {
        $data = Employee::where('id', $id)->with('absence')->first();
        return view('features.absences.employee.show', compact('data'));
    }
}
