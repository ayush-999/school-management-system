<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function ViewSubject()
    {
        $data['allData'] = Subject::all();
        return view('backend.setup.subject.view_subject', $data);
    }

    public function AddSubject()
    {
        return view('backend.setup.subject.add_subject');
    }

    public function StoreSubject(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:subjects,name',
        ]);

        $data = new Subject();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Subject added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('subject.view')->with($notification);
    }

    public function EditSubject($id)
    {
        $editData = Subject::find($id);
        return view('backend.setup.subject.edit_subject', compact('editData'));
    }

    public function UpdateSubject(Request $request, $id)
    {
        $data = Subject::find($id);
        $request->validate([
            'name' => 'required|unique:subjects,name,' . $data->id,
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Subject updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('subject.view')->with($notification);
    }

    public function DeleteSubject($id)
    {
        $data = Subject::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Subject deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('subject.view')->with($notification);
    }
}
