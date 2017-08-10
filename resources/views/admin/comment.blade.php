@extends('admin.layouts.master')

@section('head.title')
Quản lý user
@stop
@section('page.title')
List users
@stop
@section('body.content')
<a class="btn btn-success" style="margin-bottom: 20px" href="#">Create User</a>
    <table class="table text-align" cellpadding="0" cellspacing="0" border="1">
    	<tr>
        <th>Name</th>
        <th>Email</th>
        <th>Nội dung</th>
        <th colspan="3">Action</th>

    </tr>
    @forelse($comments as $comment)
    <tr>
        <td>{{$user->name}}</td>
        <td>
            {{$comment->email}}
        </td>
        <td>{{$comment->comment}}</td>
        @endforelse
        <td><a href="{{route('comment.edit',$comment->id)}}">Edit Profile</a></td>
        <td>
            {!!Form::open(['route'=>['comment.destroy',$comment->id],'method'=>'delete'])!!}
            {!!Form::submit('delete',array('class'=>'btn btn-default btn-danger'))!!}
            {!!Form::close()!!}
        </td>
        <td>
          
              <!-- Modal -->
      
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