<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeesCategoryAmount;
use App\Models\FeesCategory;
use App\Models\StudentClass;

class FeesAmountController extends Controller
{
    public function ViewFeesAmount()
    {
        // $data['allData'] = FeesCategoryAmount::all();
        $data['allData'] = FeesCategoryAmount::select('fees_category_id')->groupBy('fees_category_id')->get();
        return view('backend.setup.fees_amount.view_fees_amount', $data);
    }

    public function AddFeesAmount()
    {
        $data['fees_categories'] = FeesCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fees_amount.add_fees_amount', $data);
    }

    public function StoreFeesAmount(Request $request)
    {
        $countClass = count($request->class_id);
        if ($countClass != NULL) {
            for ($i = 0; $i < $countClass; $i++) {
                $fees_amount = new FeesCategoryAmount();
                $fees_amount->fees_category_id = $request->fees_category_id;
                $fees_amount->class_id = $request->class_id[$i];
                $fees_amount->amount = $request->amount[$i];
                $fees_amount->save();
            }
        }

        $notification = array(
            'message' => 'Fees Amount Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('fees.amount.view')->with($notification);
    }

    public function EditFeesAmount($fees_category_id)
    {
        $data['editData'] = FeesCategoryAmount::where('fees_category_id', $fees_category_id)->orderBy('class_id', 'asc')->get();
        $data['fees_categories'] = FeesCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fees_amount.edit_fees_amount', $data);
    }

    public function UpdateFeesAmount(Request $request, $fees_category_id)
    {
        if ($request->class_id == NULL) {
            $notification = array(
                'message' => 'You did not select any class amount.',
                'alert-type' => 'error'
            );

            return redirect()->route('fees.amount.edit', $fees_category_id)->with($notification);
        } else {
            $countClass = count($request->class_id);
            FeesCategoryAmount::where('fees_category_id', $fees_category_id)->delete();
            for ($i = 0; $i < $countClass; $i++) {
                $fees_amount = new FeesCategoryAmount();
                $fees_amount->fees_category_id = $request->fees_category_id;
                $fees_amount->class_id = $request->class_id[$i];
                $fees_amount->amount = $request->amount[$i];
                $fees_amount->save();
            }
        }

        $notification = array(
            'message' => 'Fees Amount Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('fees.amount.view')->with($notification);
    }

    public function DetailsFeesAmount($fees_category_id)
    {
        $data['detailsData'] = FeesCategoryAmount::where('fees_category_id', $fees_category_id)->orderBy('class_id', 'asc')->get();
        return view('backend.setup.fees_amount.details_fees_amount', $data);
    }
}
