<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;

class StudentYearController extends Controller
{
    public function ViewStudentYear()
    {
        $data['allData'] = StudentYear::all();
        return view('backend.setup.student_year.view_year', $data);
    }

    public function AddStudentYear()
    {
        return view('backend.setup.student_year.add_year');
    }

    public function StoreStudentYear(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_years,name',
        ]);

        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year added successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('student.year.view')->with($notification);
    }

    public function EditStudentYear($id)
    {
        $editData = StudentYear::find($id);
        return view('backend.setup.student_year.edit_year', compact('editData'));
    }

    public function UpdateStudentYear(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_years,name,' . $id,
        ]);

        $data = StudentYear::find($id);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year updated successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('student.year.view')->with($notification);
    }

    public function DeleteStudentYear($id)
    {
        $data = StudentYear::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Student Year deleted successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('student.year.view')->with($notification);
    }
}
