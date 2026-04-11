<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // Define all permissions
        $permissions = [
            // User Management Permissions
            'view_users',
            'create_user',
            'edit_user',
            'delete_user',
            'export_users',
            
            // Subject Management Permissions
            'view_subjects',
            'create_subject',
            'edit_subject',
            'delete_subject',
            
            // Class Management Permissions
            'view_classes',
            'create_class',
            'edit_class',
            'delete_class',
            
            // Student Management Permissions
            'view_students',
            'create_student',
            'edit_student',
            'delete_student',
            'mark_attendance',
            
            // Mark/Grade Management Permissions
            'view_marks',
            'create_marks',
            'edit_marks',
            'delete_marks',
            'publish_results',
            
            // Report Permissions
            'view_reports',
            'export_reports',
            'generate_report',
            
            // System Permissions
            'manage_permissions',
            'manage_roles',
            'view_activity_log',
            'system_settings',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission], ['guard_name' => 'web']);
        }

        // Create roles
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin'], ['guard_name' => 'web']);
        $adminRole = Role::firstOrCreate(['name' => 'admin'], ['guard_name' => 'web']);
        $teacherRole = Role::firstOrCreate(['name' => 'teacher'], ['guard_name' => 'web']);
        $managerRole = Role::firstOrCreate(['name' => 'manager'], ['guard_name' => 'web']);
        $studentRole = Role::firstOrCreate(['name' => 'student'], ['guard_name' => 'web']);

        // Assign all permissions to super_admin
        $superAdminRole->syncPermissions(Permission::all());

        // Assign specific permissions to admin
        $adminPermissions = [
            'view_users',
            'create_user',
            'edit_user',
            'delete_user',
            'export_users',
            'view_subjects',
            'create_subject',
            'edit_subject',
            'delete_subject',
            'view_classes',
            'create_class',
            'edit_class',
            'delete_class',
            'view_students',
            'create_student',
            'edit_student',
            'delete_student',
            'view_marks',
            'view_reports',
            'export_reports',
            'manage_permissions',
            'view_activity_log',
            'system_settings',
        ];
        $adminRole->syncPermissions($adminPermissions);

        // Assign specific permissions to teacher
        $teacherPermissions = [
            'view_students',
            'mark_attendance',
            'create_marks',
            'edit_marks',
            'view_marks',
            'view_reports',
            'export_reports',
        ];
        $teacherRole->syncPermissions($teacherPermissions);

        // Assign specific permissions to manager
        $managerPermissions = [
            'view_users',
            'view_students',
            'view_classes',
            'view_marks',
            'view_reports',
            'export_reports',
            'generate_report',
        ];
        $managerRole->syncPermissions($managerPermissions);

        // Assign specific permissions to student
        $studentPermissions = [
            'view_reports',
        ];
        $studentRole->syncPermissions($studentPermissions);

        $this->command->info('✅ Permissions and Roles created successfully!');
    }
}
