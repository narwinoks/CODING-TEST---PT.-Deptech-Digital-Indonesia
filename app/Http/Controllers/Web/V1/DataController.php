<?php

namespace App\Http\Controllers\Web\V1;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function dataAdmin(Request $request)
    {
        $data = User::all();
        return datatables()->of($data)
            ->rawColumns(['first_name', 'last_name', 'email',  'action'])
            ->addColumn('action', 'features.admin.action')

            ->addIndexColumn()
            ->toJson();
    }
    public function dataEmployee(Request $request)
    {
        $data = Employee::all();
        return datatables()->of($data)
            ->rawColumns(['first_name', 'last_name', 'email', 'phone', 'gender', 'address', 'action'])
            ->addColumn('action', 'features.employee.action')

            ->addIndexColumn()
            ->toJson();
    }
    public function dataAbsences(Request $request)
    {
        $data = Absence::with('employee')->orderBy('created_at', 'DESC')->get();
        return datatables()->of($data)
            ->rawColumns(['first_name', 'last_name', 'email', 'phone', 'gender', 'address', 'action'])
            ->addColumn('action', 'features.employee.action')
            ->addIndexColumn()
            ->toJson();
    }
}
