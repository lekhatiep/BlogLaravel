@extends('partials.main')
@section('title','Edit post')
@section('add_css')
	<link rel="stylesheet" href="/css/select2.min.css">
@stop
@section('content')
	@include('post.nav')
	@include('partials._messageSession')
	<div class="container-fluid">
	<div class="container-fluid">
		@if (count($errors) > 0)
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
	  <div class="row">
		
			{!! Form::model($post,['route'=>['post.update',$post->id],'method'=>'PUT','files'=>'true'])!!}
				<div class="col-xs-12 col-md-8 text-center">
				{!!Form::label('Title')!!}</br>
				{!!Form::text('title',null,array('class'=>'form-control'))!!}<br>

				{!!Form::label('Slug')!!}</br>
				{!!Form::text('slug',null,['class'=>'form-control'])!!}

				{!!Form::label('Category')!!}
				{!!Form::select('category_id', $cats, null,['class'=>'form-control'])!!}

				{!!Form::label('Tag')!!}
				{!!Form::select('tags[]', $tags, null,['class'=>'form-control all-tag','multiple'=>'multiple',])!!}

				{!!Form::label('Featured image','Update Featured Image')!!}
				{!!Form::file('featured_img')!!}

				{!!Form::label('Body')!!}
				{!!Form::textarea('body',null,array('class'=>'form-control', 'id'=>'body-content'))!!}
				</div>
		
	    <div class="col-md-4">
	    	<div class="well"> 
	    		<dl>
	    			<dt>Slug:</dt>
	    			<dd>{{$post->slug}}</dd>
	    		</dl>
	    		<dl>
	    			<dt>
	    				Categories:	    				
	    			</dt>
	    			<dd>
	    				{{$post->category->name}}
	    			</dd>
	    		</dl> 		
	    		<dl class="dl-horizontal">
	    			<dt>Create at:</dt>
	    			<dd>{{date('d-m-y',strtotime($post->created_at))}}</dd>
	    		</dl>
				<dl class="dl-horizontal">
					<dt>Last update:</dt>
					<dd>{{ date('d-m-y',strtotime($post->updated_at))}}</dd>
				</dl>
	    		<div class="row">
	    			<div class="col-sm-6">
						{!!Html::linkRoute('blog.single','Cancel',array($post->slug),array('class'=>'btn btn-danger btn-block'))!!}	    				
	    			</div>
	    			<div class="col-sm-6">
	    				{{Form::submit('Save changes',['class'=>'btn btn-success btn-block'])}}
	    				{{-- {!!Html::linkRoute('post.update','Save changes',array($posts->id),array('class'=>'btn btn-success btn-block'))!!} --}}
	    			</div>
	    		</div>
	    	</div>
	    </div>
	    {!!Form::close()!!}
	  </div>
	 @php
	 	
	 	print_r($post->tags()->allRelatedIds()->toArray());
	 @endphp
	</div>
	@section('add_script')
		<script src="/js/select2.min.js"></script>
		<script type="text/javascript">
			$('.all-tag').select2();
			  $('.all-tag').select2().val({{json_encode($post->tags()->allRelatedIds())}}).trigger("change");
			//  var id = $posts->tags()->allRelatedIds()->toArray();
			// console.log(id);
		</script>
		<script>
			
			tinymce.init({
			  selector: '#body-content',  // change this value according t
			  plugin: 'a_tinymce_plugin',
			  a_plugin_option: true,
			  a_configuration_option: 400,		  
			  plugins: "image",
			});
		</script>
	@stop
@stop