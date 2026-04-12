<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    public function ViewStudentGroup()
    {
        $data['allData'] = StudentGroup::all();
        return view('backend.setup.student_group.view_group', $data);
    }

    public function AddStudentGroup()
    {
        return view('backend.setup.student_group.add_group');
    }

    public function StoreStudentGroup(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:student_groups,name',
        ]);

        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Group added successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('student.group.view')->with($notification);
    }

    public function EditStudentGroup($id)
    {
        $data['editData'] = StudentGroup::find($id);
        return view('backend.setup.student_group.edit_group', $data);
    }

    public function UpdateStudentGroup(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:student_groups,name,' . $id,
        ]);

        $data = StudentGroup::find($id);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Group updated successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('student.group.view')->with($notification);
    }

    public function DeleteStudentGroup($id)
    {
        $data = StudentGroup::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Student Group deleted successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('student.group.view')->with($notification);
    }
}
