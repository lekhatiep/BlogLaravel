@extends('admin.layouts.master')

@section('head.title')
Quản lý user
@stop
@section('page.title')
List users
@stop
@section('body.content')
<a class="btn btn-success" style="margin-bottom: 20px" href="{{route('user.create')}}">Create User</a>
    <table class="table text-align" cellpadding="0" cellspacing="0" border="1">
    	<tr>
        <th>Name</th>
        <th>Role</th>
        <th colspan="3">Action</th>

    </tr>
    @forelse($users as $user)
    <tr>
        @if($user->name!='admin')
        <td>{{$user->name}}</td>
        <td>
             @forelse($user->roles as $roles)
            {{$roles->name}}
            <br>
            @empty
            No role
        </td>
        @endforelse
        <td><a href="{{route('user.edit',$user->id)}}">Edit Profile</a></td>
        <td>
            {!!Form::open(['route'=>['user.destroy',$user->id],'method'=>'delete'])!!}
            {!!Form::submit('delete',array('class'=>'btn btn-default btn-danger'))!!}
            {!!Form::close()!!}
        </td>
        <td>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal-{{$user->id}}">
              Edit role
            </button>

              <!-- Modal -->
        <div class="modal fade" id="myModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">ROLE of {{$user->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{route('user.update',$user->id)}}" method="post" role="form" id="form-{{$user->id}}">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group">
                        <select name="roles[]" multiple>
                            @foreach($Allrole as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="$('#form-{{$user->id}}').submit();">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        </td>
        @endif
    </tr>
    @empty
    <tr>
	    <td>
	    	NO role
	    </td>
    </tr>
    @endforelse 	
    </table>

  

@stop