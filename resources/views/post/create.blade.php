@extends('partials.main')
@section('title','Create post')
@section('add_css')
	<link rel="stylesheet" href="/css/select2.min.css">
@stop
@section('content')
	@include('post.nav')
	@include('partials._messageSession')
	<div class="container-fluid">
	  <div class="row">
		<div class="col-xs-12 col-md-6 col-md-offset-3 text-center">
			<h3>Create post</h3>
			@php
				if(Auth::check()){
					$id=Auth::id();
					echo $id;
				}
			@endphp
			@if (count($errors) > 0)
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		           {{--  {{
		            	$errors->first('header.*') ? 'has-error' : ''
		            	}} --}}
		        </ul>
		    </div>
			@endif
			{!!Form::open(['route'=>'post.store', 'files'=>'true'])!!}
				{!!Form::label('Title')!!}
				{!!Form::text('title',null,array('class'=>'form-control','id'=>'title'))!!}<br>
				{!!Form::label('Slug')!!}
				{!!Form::text('slug',null,array('class'=>'form-control','id'=>'slug'))!!}
				{!!Form::label('Category')!!}
				<select name="category_id" id="" class="form-control">
					@foreach($categories as $category)
						<option value="{{$category->id}}">{{$category->name}}</option>
					@endforeach
				</select>

				{{-- tag --}}
				{{Form::label('Tag')}}
				<select name="tags[]" class="select-tag form-control" multiple="multiple">
				@foreach($tags as $tag)
					<option value="{{$tag->id}}">{{$tag->name}}</option>
				@endforeach
				</select>
				{{-- end tag --}}
				
				{{ Form::label('featured_image','Feartured Image') }}
				{{ Form::file('featured_img') }}

				{!!Form::hidden('user_id',$id)!!}<br>
				{!!Form::label('Content')!!}
				{!!Form::textarea('content',null,array('class'=>'form-control','id'=>'body-content'))!!}<br>
				{!!Form::submit('Create post',array('class'=>'btn btn-success btn-lg btn-block'))!!}
			{!!Form::close()!!}
		</div>
	    	
	  </div>
	</div>
	
		@section('add_script')
			
			<script src="/js/select2.min.js"></script>
			<script>
			  tinymce.init({
				  selector: '#body-content',  // change this value according t
				  plugin: 'a_tinymce_plugin',
				  a_plugin_option: true,
				  a_configuration_option: 400,		  
				  plugins: "image",
			  });
				// $.noConflict();
				jQuery( document ).ready(function() {
				  
				  $(".select-tag").select2();
				  $("#title").blur(function(){
				  		title = $('#title').val();
				  		title = title.trim();
				  		//slug=title.replace(/\s/g,"-")
				  		slug=title.split(" ").join("-");
				  		document.getElementById("slug").value = slug;
				  });

				});
				
				
			</script>
		@stop
@stop

	
