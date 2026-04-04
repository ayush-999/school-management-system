<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function UserView()
    {
        $data['allData'] = User::all();
        $user = Auth::user();
        return view('backend.user.view_user', array_merge($data, compact('user')));
    }

    public function UserAdd()
    {
        $user = Auth::user();
        return view('backend.user.add_user', compact('user'));
    }

    public function UserEdit($id)
    {
        $editData = User::find($id);
        $user = Auth::user();
        return view('backend.user.edit_user', compact('editData', 'user'));
    }

    public function UserStore(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'user_type' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->user_type = $request->user_type;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $notification = array(
            'message' => 'User created successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('users.view')->with($notification);
    }


    public function UserUpdate(Request $request, $id)
    {
        // Validation
        $validatedData = $request->validate([
            'user_type' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $data = User::find($id);
        $data->user_type = $request->user_type;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();

        $notification = array(
            'message' => 'User updated successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('users.view')->with($notification);
    }

    public function UserDelete($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();

            $notification = array(
                'message' => 'User deleted successfully.',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'User not found.',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('users.view')->with($notification);
    }
}
