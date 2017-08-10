@extends('admin.layouts.master')
@section('body.content')
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				{!! Form::model($category,['route'=>['category.update',$category->id],'method'=>'PUT'])!!}
				{!!Form::label('Name Category')!!}</br>
				{!!Form::text('name',null,array('class'=>'form-control'))!!}<br>
				{{Form::submit('Save changes',['class'=>'btn btn-success btn-block'])}}
				{!!Form::close()!!}
			</div>
		</div>
	</div>
@stop
