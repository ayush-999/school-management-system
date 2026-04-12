<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;

class StudentShiftController extends Controller
{
    public function ViewStudentShift()
    {
        $data['allData'] = StudentShift::all();
        return view('backend.setup.student_shift.view_shift', $data);
    }

    public function AddStudentShift()
    {
        return view('backend.setup.student_shift.add_shift');
    }

    public function StoreStudentShift(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ]);

        $shift = new StudentShift();
        $shift->name = $request->name;
        $shift->save();

        $notification = array(
            'message' => 'Student Shift added successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('student.shift.view')->with($notification);
    }

    public function EditStudentShift($id)
    {
        $editData = StudentShift::find($id);
        return view('backend.setup.student_shift.edit_shift', compact('editData'));
    }

    public function UpdateStudentShift(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:student_shifts,name,' . $id,
        ]);

        $shift = StudentShift::find($id);
        $shift->name = $request->name;
        $shift->save();

        $notification = array(
            'message' => 'Student Shift updated successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('student.shift.view')->with($notification);
    }

    public function DeleteStudentShift($id)
    {
        $shift = StudentShift::find($id);
        $shift->delete();

        $notification = array(
            'message' => 'Student Shift deleted successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('student.shift.view')->with($notification);
    }
}
