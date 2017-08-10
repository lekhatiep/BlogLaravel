@extends('admin.layouts.master')
@section('head.title')
Quản lý user
@stop
@section('page.title')
Edit role
@stop

@section('body.content')
 <form action="{{route('role.update',$role->id)}}" method="POST" role="form">
 	{{method_field('PATCH')}}
 	 {{csrf_field()}}
 	<div class="form-group">
 		<label for="">Name</label>
 		<input type="text" class="form-control" name="name" id="" placeholder="Name" value="{{$role->name}}">
 	</div>

 	<div class="form-group">
 		<label for="">Display Name</label>
 		<input type="text" class="form-control" name="display_name" id="" placeholder="Display Name" value="{{$role->display_name}}">
 	</div>

 	<div class="form-group">
 		<label for="">Description</label>
 		<input type="text" class="form-control" name="description" id="" placeholder="Description"value="{{$role->description}}">
 	</div>

 	<div class="form-group">
 		<h3>Permission</h3>
 		    @foreach($permissions as $permission)
 		     <input type="checkbox" {{in_array($permission->id,$role_permissions)?"checked":""}} name="permission[]"value="{{$permission->id}}"> {{$permission->name}}</br>
 		    @endforeach
 	</div>
 	 {{-- <div class="form-group text-left">
            <h3>Permissions</h3>
            @foreach($permissions as $permission)
    		<input type="checkbox"   name="permission[]" value="{{$permission->id}}" > {{$permission->name}} <br>
            @endforeach
    	</div> --}}
 	<button type="submit" class="btn btn-primary">Update</button>
 </form>  
@stop