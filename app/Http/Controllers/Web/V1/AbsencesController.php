<?php

namespace App\Http\Controllers\Web\V1;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $startDate = Carbon::createFromFormat('Y-m-d', $request->start_date);
        $endDate = Carbon::createFromFormat('Y-m-d', $request->end_date);
        $duration = $endDate->diffInDays($startDate) + 1;
        $allAbsence = $duration + $this->countAbsence($request->employee_id);
        if ($allAbsence > 5) {
            return redirect()->back()->with('danger', 'Total Pengajuan cuti anda dalam tahun ini sudah maksimal !');
        }
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
        $startDate = Carbon::createFromFormat('Y-m-d', $request->start_date);
        $endDate = Carbon::createFromFormat('Y-m-d', $request->end_date);
        $duration = $endDate->diffInDays($startDate) + 1;
        $allAbsence = $duration + $this->countAbsenceEdit($request->employee_id, $request->id);
        if ($allAbsence > 5) {
            return redirect()->back()->with('danger', 'Total Pengajuan cuti anda dalam tahun ini sudah maksimal !');
        }
        $absence = Absence::find($request->id);
        if ($absence) {
            $absence->update($data);
            return redirect()->route('absences.index')->with('success', 'Edit Data Success !');
        } else {
            return redirect()->route('absences.index')->with('danger', 'edit data failed !');
        }
    }

    public static function countAbsence($employee_id)
    {
        $startDate = Carbon::now()->startOfYear();  // Get the start date of the current year
        $endDate = Carbon::now()->endOfYear();  // Get the end date of the current year
        $totalDuration = Absence::where('employee_id', $employee_id)
            ->whereBetween('start_date', [$startDate, $endDate])
            ->whereBetween('end_date', [$startDate, $endDate])
            ->sum(DB::raw('DATEDIFF(end_date, start_date) + 1'));

        return (int)  $totalDuration;
    }
    public static function countAbsenceEdit($employee_id, $absence_id)
    {
        $startDate = Carbon::now()->startOfYear();  // Get the start date of the current year
        $endDate = Carbon::now()->endOfYear();  // Get the end date of the current year
        $totalDuration = Absence::where('id', '!=', $absence_id)->where('employee_id', $employee_id)
            ->whereBetween('start_date', [$startDate, $endDate])
            ->whereBetween('end_date', [$startDate, $endDate])
            ->sum(DB::raw('DATEDIFF(end_date, start_date) + 1'));

        return (int)  $totalDuration;
    }
}
