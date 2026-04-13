<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeesCategory;

class FeesCategoryController extends Controller
{
    public function ViewFeesCategory()
    {
        $data['allData'] = FeesCategory::all();
        return view('backend.setup.fees_category.view_fees_category', $data);
    }

    public function AddFeesCategory()
    {
        return view('backend.setup.fees_category.add_fees_category');
    }

    public function StoreFeesCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:fees_categories,name',
        ]);

        $data = new FeesCategory();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Fees Category added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('fees.category.view')->with($notification);
    }

    public function EditFeesCategory($id)
    {
        $editData = FeesCategory::find($id);
        return view('backend.setup.fees_category.edit_fees_category', compact('editData'));
    }

    public function UpdateFeesCategory(Request $request, $id)
    {
        $data = FeesCategory::find($id);
        $request->validate([
            'name' => 'required|unique:fees_categories,name,' . $data->id,
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Fees Category updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('fees.category.view')->with($notification);
    }

    public function DeleteFeesCategory($id)
    {
        $data = FeesCategory::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Fees Category deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('fees.category.view')->with($notification);
    }
}
