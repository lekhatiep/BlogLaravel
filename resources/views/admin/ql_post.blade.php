@extends('admin.layouts.master')

@section('head.title')
Quản lý Post
@stop
@section('page.title')
List Post
@stop
@section('body.content')
<a class="btn btn-success" style="margin-bottom: 20px" href="{{route('post.create')}}">Create post</a>
    <table class="table table-hover" cellpadding="0" cellspacing="0" border="1">
    	<tr>
        <th>Title</th>
        <th>Nội dung</th>
        <th>Tác giả</th>
        <th colspan="3">Action</th>

    </tr>
    @forelse($posts as $post)
    <tr>
        <td>{{$post->title}}</td>
        <td>
            {{str_limit(strip_tags($post->body), 100) }}
        </td>
        <td>
           {{$post->user->name}}
        </td>
        <td>
          <a href="{{route('post.edit',$post->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
          <a href="{{route('blog.single',$post->slug)}}" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></a>
        </td>
       {{--  <td>
            {!!Form::open(['route'=>['user.destroy',$user->id],'method'=>'delete'])!!}
            {!!Form::submit('delete',array('class'=>'btn btn-default btn-danger'))!!}
            {!!Form::close()!!}
        </td> --}}
        
             
        
    </tr>
    @empty
    <tr>
	    <td colspan="4" class="text-center">
	    	<h3>NO ANYTHING POST</h3>
	    </td>
    </tr>
    @endforelse 	
    </table>

  

@stop