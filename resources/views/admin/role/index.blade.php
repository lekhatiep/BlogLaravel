@extends('admin.layouts.master')

@section('head.title')
Quản lý user
@stop
@section('page.title')
List Role
@stop
@section('body.content')
<a class="btn btn-success" href="{{route('role.create')}}">Create Role</a>
    <table class="table" cellpadding="0" cellspacing="0">
    	<tr>
        <th>Name</th>
        <th>Display Name</th>
        <th>Description</th>
    </tr>
    @forelse($roles as $role)
    <tr>
        <td>{{$role->name}}</td>
        <td>{{$role->display_name}}</td>
        <td>{{$role->description}}</td>
        <td><a href="{{route('role.edit',$role->id)}}">Edit</a></td>
        <td>
            {!!Form::open(['route'=>['role.destroy',$role->id],'method'=>'delete'])!!}
            {!!Form::submit('delete',array('class'=>'btn btn-default btn-dangerous'))!!}
            {!!Form::close()!!}
        </td>
    </tr>
    @empty
    <tr>
	    <td>
	    	NO role
	    </td>
    </tr>
    @endforelse 	
    </table>
    


   {{--  @foreach($roles as $role)
    <li>{{$role->name}}</li>
    <li>{{$role->display_name}}</li>
    <li>{{$role->description}}</li>	
	@endforeach --}}
@stop