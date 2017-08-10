@extends('admin.layouts.master')
@section('body.content')
		<div class="row">
			<div class="col-md-4" style="float: left;">
				<table class="table table-hover" border="1">
					<tr>
						<th>Tags</th>
						<th>Actions</th>
					</tr>
						@foreach($tags as $tag)
					<tr>
						<td>{{$tag->name}}</td>
						<td>
							<a href="{{ route('tag.show',$tag->id)}}"><span class="glyphicon glyphicon-eye-open"></span></span></a>
							
						</td>
						
					</tr>
						@endforeach					
				</table>
			</div>
			<div class="col-md-5">
				@foreach ($errors->all() as $error)
			      	<div>
			      	<li class="alert alert-danger">{{ $error }}</li>
		     		 </div>
	   			 @endforeach
				{{Form::open(['route'=>'tag.store','method'=>'POST'])}}
				{{Form::label('Tag')}}</br>
				{{Form::text('name',null,['class'=>'form-group'])}}<br>
				{{Form::submit('create a tag',['class'=>'btn btn-success'])}}
				{{Form::close()}}
			</div>
		</div>
@stop
