@extends('admin.layouts.master')
@section('body.content')
	<div class="container">
		<div class="row">
			<div class="row">
			<div class="col-md-8">
			@foreach ($errors->all() as $error)
	      	<div>
	     	 <li class="alert alert-danger">{{ $error }}</li>
	      	</div>
	      	@endforeach
			<div class="col-md-4">
				{!! Form::model($tag,['route'=>['tag.update',$tag->id],'method'=>'PUT'])!!}
				{!!Form::label('Name Tag')!!}</br>
				{!!Form::text('name',null,array('class'=>'form-control'))!!}<br>
				{{Form::submit('Save changes',['class'=>'btn btn-success btn-block'])}}
				{!!Form::close()!!}
			</div>
		</div>
	</div>
@stop
