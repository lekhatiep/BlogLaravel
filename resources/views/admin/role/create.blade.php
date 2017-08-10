@extends('admin.layouts.master')
@section('head.title')
Quản lý user
@stop
@section('page.title')
Page Create Role
@stop

@section('body.content')
 <form action="{{route('role.store')}}" method="POST" role="form">
 	 {{csrf_field()}}
 	<div class="form-group">
 		<label for="">Name</label>
 		<input type="text" class="form-control" name="name" id="" placeholder="Name">
 	</div>

 	<div class="form-group">
 		<label for="">Display Name</label>
 		<input type="text" class="form-control" name="display_name" id="" placeholder="Display Name">
 	</div>

 	<div class="form-group">
 		<label for="">Description</label>
 		<input type="text" class="form-control" name="description" id="" placeholder="Description">
 	</div>

 	<div class="form-group">
 		<h3>Permission</h3>
 		    @foreach($permissions as $value)
 		     <input type="checkbox" name="permission[]" value="{{$value->id}}"> {{$value->name}}</br>
 		    @endforeach
 	</div>
 	 {{-- <div class="form-group text-left">
            <h3>Permissions</h3>
            @foreach($permissions as $permission)
    		<input type="checkbox"   name="permission[]" value="{{$permission->id}}" > {{$permission->name}} <br>
            @endforeach
    	</div> --}}
 	<button type="submit" class="btn btn-primary">Submit</button>
 </form>  
@stop