<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Role;
class UserController extends Controller
{
    //
    public function __construct(){

    }
    public function index(){
    	$users=User::all();
    	$Allrole=Role::all();
    	return view('admin.user',compact(['users','Allrole']));
    }
    public function create(){

    }
    public function store(){

    }
    public function edit(){

    }
    public function update(Request $request, $id){
    	$user=User::find($id);
    	$roles =$request->roles;
    	DB::table('role_user')->where('user_id',$id)->delete();
    	foreach ($roles as $role) {
    		$user->attachRole($role);
    	}
    	return redirect()->route('user.index');
    }
    public function destroy(){

    }

}
