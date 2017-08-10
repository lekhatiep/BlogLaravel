<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Role;
use App\Permission;

class RoleController extends Controller
{
    //
    public function index(){
    	 // $roles = DB::table('roles')->get();
    	$roles=Role::all();

         return view('admin.role.index',compact('roles'));
    }
    public function create(){
    	$permissions = Permission::all();
    	// print_r($permissions);
    	return view('admin.role.create',compact('permissions'));
    }
  //   public function store(Request $request)
  //   {
  //   	// dd($request->all());
  //   	// $role=Role::create($request->except(['permission','_token']));
  //   	$role= new Role();
  //   	$role->name=$request->input('name');
  //   	$role->display_name=$request->input('display_name');
  //   	$role->description=$request->input('description');
  //   	$role->save();
  //   	if (is_array($request->getPermissions()) || is_object($request->getPermissions())) {
  //   		foreach($request->input('permission') as $key=>$value){
  //   		$role->attachPermission($value);
  //   		}
		// }
    	
  //   	return redirect()->route('role.index')->withMessage('Role created');;
  //   } 
     public function store(Request $request)
    {
        $role=Role::create($request->except(['permission','_token']));

        foreach ($request->permission as $key=>$value){
            $role->attachPermission($value);
        }

        return redirect()->route('role.index')->withMessage('role created');

    }
    public function edit($id){
        $role= Role::find($id);
        $permissions = Permission::all();
        $role_permissions = $role->perms()->pluck('id','id')->toArray();
        return view('admin.role.edit',compact(['role','role_permissions','permissions']));    
    }
    public function update(Request $request,$id){
        // dd('update');
        $role=Role::find($id);
        $role->name=$request->name;
        $role->display_name=$request->display_name;
        $role->description=$request->description;
        $role->save();
        DB::table('permission_role')->where('role_id',$id)->delete();
        foreach($request->permission as $key=>$value){
          $role->attachPermission($value);
        }
        return redirect()->route('role.index')->withMessage('role update');
    }
    public function destroy($id)
    {
      // dd('delete');
      DB::table("roles")->where('id',$id)->delete();
      return back()->withMessage('Role deleted');
    }
}
