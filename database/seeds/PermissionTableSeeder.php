<?php
use App\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissons =[
                [
                    'name'=>'permission-read',
                    'display_name'=>'permission Listing',
                    'description'=>'see only list'
                    ],
                [
                    'name'=>'permission-create',
                    'display_name'=>'create permission',
                    'description'=>'Create new permission'
                ],
                [
                    'name'=>'permission-edit',
                    'display_name' =>'Edit permission',
                    'description'=>'Edit permission'
                ],
                [
                    'name'=>'permission-delete',
                    'display'=>'delete permission',
                    'description'=>'Delete permission'

                ]
        ];    
        foreach ($permissons as $key => $value) {
            	Permission::create($value);
            }    
    }
}
