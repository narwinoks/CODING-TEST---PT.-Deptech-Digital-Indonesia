<?php

namespace App\Http\Controllers\Web\V1;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        return view('features.employee.index');
    }
    public function create(Request $request)
    {
        return view('features.employee.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
        ]);
        $data = $request->only('email', 'first_name', 'last_name', 'phone', 'address', 'gender');
        if (Employee::create($data)) {
            return redirect()->route('employee.index')->with('success', 'Add Data Employee Success');
        } else {
            return redirect()->route('employee.index')->with('danger', 'Add Data Employee Failed');
        }
    }
    public function edit(Request $request, $id)
    {
        $employee = Employee::find($id);
        return view('features.employee.update', compact('employee'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $data = $request->only('email', 'first_name', 'last_name', 'phone', 'address', 'gender');
        $employee = Employee::find($request->id);
        if ($employee) {
            $employee->update($data);
            return redirect()->route('employee.index')->with('success', 'Update Employee Success');
        } else {
            return redirect()->route('employee.index')->with('danger', 'Data Not Found');
        }
    }

    public function destroy(Request $request, $id)
    {
        $employee = Employee::find($id);
        if ($employee) {
            $employee->delete();
            return redirect()->route('employee.index')->with('success', 'Delete Employee Success');
        } else {
            return redirect()->route('employee.index')->with('danger', 'Data Not Found');
        }
    }
}
