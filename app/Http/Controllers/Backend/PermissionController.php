<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Show permissions management page
     */
    public function ManagePermissions()
    {
        $data['allUsers'] = User::all();
        $data['allRoles'] = Role::all();
        $data['allPermissions'] = Permission::all()->groupBy('guard_name');
        $user = Auth::user();

        return view('backend.user.manage_permissions', array_merge($data, compact('user')));
    }

    /**
     * Assign permission to user
     */
    public function AssignPermission(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'permission' => 'required|string',
            'action' => 'required|in:assign,revoke',
        ]);

        $user = User::find($validated['user_id']);
        $permission = $validated['permission'];

        try {
            if ($validated['action'] === 'assign') {
                $user->givePermissionTo($permission);
                $message = "Permission '{$permission}' assigned successfully.";
                $alert_type = 'success';
            } else {
                $user->revokePermissionTo($permission);
                $message = "Permission '{$permission}' revoked successfully.";
                $alert_type = 'success';
            }
        } catch (\Exception $e) {
            $message = "Error: " . $e->getMessage();
            $alert_type = 'error';
        }

        return redirect()->route('permissions.manage')->with([
            'message' => $message,
            'alert-type' => $alert_type,
        ]);
    }

    /**
     * Assign role to user
     */
    public function AssignRole(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|string',
            'action' => 'required|in:assign,revoke',
        ]);

        $user = User::find($validated['user_id']);
        $role = $validated['role'];

        try {
            if ($validated['action'] === 'assign') {
                $user->assignRole($role);
                $message = "Role '{$role}' assigned successfully.";
                $alert_type = 'success';
            } else {
                $user->removeRole($role);
                $message = "Role '{$role}' revoked successfully.";
                $alert_type = 'success';
            }
        } catch (\Exception $e) {
            $message = "Error: " . $e->getMessage();
            $alert_type = 'error';
        }

        return redirect()->route('permissions.manage')->with([
            'message' => $message,
            'alert-type' => $alert_type,
        ]);
    }

    /**
     * Update multiple permissions for a user
     */
    public function UpdateUserPermissions(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'permissions' => 'array',
            'permissions.*' => 'string',
        ]);

        $user = User::find($validated['user_id']);
        $selectedPermissions = $validated['permissions'] ?? [];

        try {
            // Revoke all permissions first
            $user->syncPermissions($selectedPermissions);
            
            $message = "Permissions updated successfully for " . $user->name;
            $alert_type = 'success';
        } catch (\Exception $e) {
            $message = "Error: " . $e->getMessage();
            $alert_type = 'error';
        }

        return redirect()->route('permissions.manage')->with([
            'message' => $message,
            'alert-type' => $alert_type,
        ]);
    }

    /**
     * Get user permissions via AJAX
     */
    public function GetUserPermissions($userId)
    {
        $user = User::find($userId);
        
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json([
            'permissions' => $user->getPermissionNames(),
            'roles' => $user->getRoleNames(),
        ]);
    }
}
