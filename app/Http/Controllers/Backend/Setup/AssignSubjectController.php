<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
    public function ViewAssignSubject()
    {
        return view('backend.setup.assign_subject.view_assign_subject');
    }

    public function AddAssignSubject()
    {
        return view('backend.setup.assign_subject.add_assign_subject');
    }

    public function StoreAssignSubject(Request $request)
    {
        // Logic to store assigned subjects
    }

    public function EditAssignSubject($class_id)
    {
        return view('backend.setup.assign_subject.edit_assign_subject');
    }

    public function UpdateAssignSubject(Request $request, $class_id)
    {
        // Logic to update assigned subjects
    }

    public function DetailsAssignSubject($class_id)
    {
        return view('backend.setup.assign_subject.details_assign_subject');
    }
}
