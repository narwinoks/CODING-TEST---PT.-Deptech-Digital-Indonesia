<?php

namespace App\Http\Controllers\Web\V1;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use App\Models\Employee;
use Illuminate\Http\Request;

class AbsencesController extends Controller
{
    public function index(Request $request)
    {
        return view('features.absences.index');
    }
    public function create(Request $request)
    {
        $employees = Employee::all();
        return view('features.absences.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required'
        ]);
        $data = $request->only('employee_id', 'start_date', 'end_date', 'description');
        if (Absence::create($data)) {
            return redirect()->route('absences.index')->with('success', 'Pengajuan CutI berhasil !');
        } else {
            return redirect()->route('absences.index')->with('danger', 'Pengajuan Cuti Gagal !');
        }
    }

    public function destroy(Request $request, $id)
    {
        $absence = Absence::find($id);
        if ($absence) {
            $absence->delete();
            return redirect()->route('absences.index')->with('success', 'Delete Data Success');
        } else {
            return redirect()->route('absences.index')->with('danger', 'Data Not Found');
        }
    }
    public function edit(Request $request, $id)
    {
        $employees = Employee::all();
        $absence = Absence::find($id);
        return view('features.absences.update', compact('employees', 'absence'));
    }
    public function  update(Request $request)
    {

        $request->validate([
            'employee_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required'
        ]);
        $data = $request->only('employee_id', 'start_date', 'end_date', 'description');
        $absence = Absence::find($request->id);
        if ($absence) {
            $absence->update($data);
            return redirect()->route('absences.index')->with('success', 'Edit Data Success !');
        } else {
            return redirect()->route('absences.index')->with('danger', 'edit data failed !');
        }
    }
}
