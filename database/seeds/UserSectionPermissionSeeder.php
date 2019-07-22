<?php

use Illuminate\Database\Seeder;

use App\Models\PermissionSection;
use App\Models\PermissionModule;
use App\Models\Permission;

class UserSectionPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sequenceNumber = PermissionSection::max('sequence_number') + 1;
        
        $permissionSection = new PermissionSection;

        $permissionSection->sequence_number = $sequenceNumber;
        $permissionSection->name = "Users"; 
        $permissionSection->alias = "users_section";
        $permissionSection->save();

        $permissionModuleSequenceNumber = $permissionSection->permissionModules()->max('sequence_number') + 1;
        
        $permissionModule = new PermissionModule;
        $permissionModule->permission_section_id = $permissionSection->id; 
        $permissionModule->sequence_number = $permissionModuleSequenceNumber;
        $permissionModule->name = "User Authentication";
        $permissionModule->alias = "user_authentication";
        $permissionModule->save();

        $permissionSequenceNumber = $permissionModule->permissions()->max('sequence_number') + 1;
        
        $viewPermission =  new Permission;
        $viewPermission->permission_module_id = $permissionModule->id;
        $viewPermission->name = "View Users";
        $viewPermission->alias = "view_users";
        $viewPermission->sequence_number = $permissionSequenceNumber;
        $viewPermission->save();

        $permissionSequenceNumber = $permissionSequenceNumber + 1; 

        $createPermission =  new Permission;
        $createPermission->permission_module_id = $permissionModule->id;
        $createPermission->name = "Create Users";
        $createPermission->alias = "create_users";
        $createPermission->sequence_number = $permissionSequenceNumber;
        $createPermission->save();

        $permissionSequenceNumber = $permissionSequenceNumber + 1;

        $editPermission =  new Permission;
        $editPermission->permission_module_id = $permissionModule->id;
        $editPermission->name = "Edit Users";
        $editPermission->alias = "edit_users";
        $editPermission->sequence_number = $permissionSequenceNumber;
        $editPermission->save();

        $permissionSequenceNumber = $permissionSequenceNumber + 1;

        $deletePermission =  new Permission;
        $deletePermission->permission_module_id = $permissionModule->id;
        $deletePermission->name = "Delete Users";
        $deletePermission->alias = "delete_users";
        $deletePermission->sequence_number = $permissionSequenceNumber;
        $deletePermission->save();
    }
}
