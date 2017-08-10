@extends('partials.main')
@section('title','Contact')
@section('content')
	@include('post.nav')
	<div class="site-background-img">
		<div class="">
			<div class="banner-top">
				<img src="/images/banner.jpg" alt="">
			</div>	
		</div>	
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h3>Contact with me</h3>
				{{Form::open(['route'=>'sendContact'])}}
				<div class="form-group">
					{{Form::label('Email')}}
					{{Form::text('email',null,['class'=>'form-control'])}}
				</div>
				<div class="form-group">
					{{Form::label('Subject')}}
					{{Form::text('subject',null,['class'=>'form-control'])}}
				</div>
				<div class="form-group">
					
					{{Form::textarea('message',null,['class'=>'form-control'])}}
				</div>
				{{Form::submit('Send',['class'=>'btn btn-success'])}}
				{{Form::close()}}
			</div>
			<div class="col-md-3">
		    	<div class="tag-cloud">
		    		<h3>Follow me</h3>
		    		<div class="line"></div>
		    		<div class="tag">
		    		<span><i class="fa fa-facebook" aria-hidden="true"></i></span>
		    		<span><i class="fa fa-twitter" aria-hidden="true"></i></span>
		    		<span><i class="fa fa-google-plus" aria-hidden="true"></i></span>
		    		</div>
		    	</div>
		    </div>
		</div>
	</div>
@stop