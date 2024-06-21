<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Title;

class TitleController extends Controller
{
    public function store(Request $request, $employeeId)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
        ]);

        $title = new Title($request->all());
        $title->emp_no = $employeeId;
        $title->save();

        return response()->json($title, 201);
    }

    public function destroy($employeeId, $title, $fromDate)
    {
        $titleRecord = Title::where('emp_no', $employeeId)
            ->where('title', $title)
            ->where('from_date', $fromDate)
            ->firstOrFail();
        $titleRecord->delete();
        return response()->json(null, 204);
    }
}
