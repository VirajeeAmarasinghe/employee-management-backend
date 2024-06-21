<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salary;

class SalaryController extends Controller
{
    public function store(Request $request, $employeeId)
    {
        $request->validate([
            'salary' => 'required|numeric',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
        ]);

        $salary = new Salary($request->all());
        $salary->emp_no = $employeeId;
        $salary->save();

        return response()->json($salary, 201);
    }

    public function destroy($employeeId, $fromDate)
    {
        $salary = Salary::where('emp_no', $employeeId)
            ->where('from_date', $fromDate)
            ->firstOrFail();
        $salary->delete();
        return response()->json(null, 204);
    }
}
