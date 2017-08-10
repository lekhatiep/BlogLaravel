@extends('admin.layouts.master')
@section('title',"$tag->name Tags")
@section('body.content')
	<div class="row">
		<div class="col-md-8">
			<h2>{{$tag->name}} <small>{{$tag->posts->count()}} POST</small></h2>
		</div>
		<div class="col-md-4">
			<div class="col-md-2">
				<a href="{{route('tag.edit',$tag->id)}}" class="btn btn-primary pull-right btn-clock">Edit</a>
			</div>
			<div class="col-md-2">
				{{Form::open(['route'=>['tag.destroy',$tag->id],'method'=>'delete','id'=>'form-delete'])}}
				{{-- {{Form::submit('Delete')}} --}}
				<span  class="btn btn-danger pull-right btn-clock"onclick="$('#form-delete').submit();"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
			{{Form::close()}}
			</div>				
		</div>
	</div>

	<div class="row">
		<div class="col-md-8">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Title</th>
					<th>Tag</th>
				</thead>
				<tbody>
					@foreach($tag->posts as $post)
					<tr>
						<td>{{$post->id}}</td>
						<td>{{$post->title}}</td>
						<td>
						@foreach($post->tags as $tag)
							<span class="label label-warning">{{$tag->name}}</span>
						@endforeach
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop
