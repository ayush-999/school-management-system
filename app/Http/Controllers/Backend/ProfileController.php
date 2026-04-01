<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function ProfileView()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.user.view_profile', compact('user'));
    }

    public function ProfileEdit()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('backend.user.edit_profile', compact('editData'));
    }

    public function ProfileUpdate(Request $request, $id)
    {
        // Validation
        $validatedData = $request->validate([
            'user_type' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'gender' => 'nullable',
            'mobile' => 'nullable',
            'address_recipient_name' => 'nullable',
            'address_house_building' => 'nullable',
            'address_street_colony' => 'nullable',
            'address_landmark' => 'nullable',
            'address_city' => 'nullable',
            'address_pincode' => 'nullable',
            'address_state' => 'nullable',
            'address_country' => 'nullable',
        ]);

        $data = User::find($id);
        $data->user_type = $request->user_type;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->gender = $request->gender;
        $data->mobile = $request->mobile;

        // Format and save address
        if ($request->has('address_recipient_name') && !empty($request->address_recipient_name)) {
            $addressLines = [
                $request->address_recipient_name,
                $request->address_house_building,
                $request->address_street_colony,
            ];

            // Add landmark if provided
            if (!empty($request->address_landmark)) {
                $addressLines[] = $request->address_landmark;
            }

            // Add city with PIN code
            if (!empty($request->address_city) && !empty($request->address_pincode)) {
                $addressLines[] = $request->address_city . ' - ' . $request->address_pincode;
            }

            // Add state and country
            if (!empty($request->address_state) && !empty($request->address_country)) {
                $addressLines[] = $request->address_state . ', ' . $request->address_country;
            }

            $data->address = implode("\n", array_filter($addressLines));
        }

        $data->save();

        $notification = array(
            'message' => 'User updated successfully.',
            'alert-type' => 'info'
        );
        return redirect()->route('users.view')->with($notification);
    }
}
