<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AttendanceImport;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx',
        ]);

        try {
            $import = new AttendanceImport;
            Excel::import($import, $request->file('file'));

            return response()->json(['message' => 'Attendance data uploaded successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to upload attendance data'], 500);
        }
    }

    public function getEmployeeAttendance($id)
    {
        $employeeAttendance = DB::table('attendances')
            ->where('employee_id', $id)
            ->get();

        $totalWorkingHours = $employeeAttendance->sum('working_hours');

        return response()->json([
            'employee_id' => $id,
            'attendance' => $employeeAttendance,
            'total_working_hours' => $totalWorkingHours,
        ]);
    }
}