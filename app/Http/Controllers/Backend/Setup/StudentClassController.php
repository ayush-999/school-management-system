<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    public function ViewStudentClass()
    {
        $data['allData'] = StudentClass::all();
        return view('backend.setup.student_class.view_class', $data);
    }

    public function AddStudentClass()
    {
        return view('backend.setup.student_class.add_class');
    }

    public function StoreStudentClass(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:student_classes,name',
        ]);

        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class added successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('student.class.view')->with($notification);
    }

    public function EditStudentClass($id)
    {
        $editData = StudentClass::find($id);
        return view('backend.setup.student_class.edit_class', compact('editData'));
    }

    public function UpdateStudentClass(Request $request, $id)
    {
        $data = StudentClass::find($id);
        $request->validate([
            'name' => 'required|unique:student_classes,name,' . $data->id,
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class updated successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('student.class.view')->with($notification);
    }

    public function DeleteStudentClass($id)
    {
        $data = StudentClass::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Student Class deleted successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('student.class.view')->with($notification);
    }
}
