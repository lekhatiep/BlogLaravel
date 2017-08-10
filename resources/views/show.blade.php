@extends('partials.head')
@section('head.title','Home post')
<body>
	@include('post.nav')
	<div class="container-fluid">
	  <div class="row">
		<div class="col-xs-12 col-md-7 col-md-offset-1">
		
			<h3 class="text-center">{{$posts->title}}</h3>
			<div class="text-left">
				<p>{{$posts->body}}</p>
			</div>
			<div style="float: right;"><b>Đăng bởi: <small>{{$user->name}}</small></b></div>
		</div>
		<div class="col-md-7 col-md-offset-1">
			<h3><span class="glyphicon glyphicon-comment">{{$posts->comments()->count()}} Comments</span></h3>		
			@foreach($posts->comments as $comment)
				<div class="comment">
					<div class="author-info">
						<img src="{{"https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email)))."?s=50&d=identicon"}}" alt="" class="author-image">
						<div class="author-name">
							<h4>{{$comment->name}}</h4>
							<p class="author-time">{{date('F ns, Y - g:i A',strtotime($comment->created_at))}}</p>
						</div>
					</div>
					<div class="comment-content">
						{{$comment->comment}}
					</div>
				</div>
			@endforeach
		</div>

		
			{{-- expr --}}
		@role(['admin','manager'])
	    <div class="col-md-4" style="float: right;">
	    	<div class="well">
	    		<dl class="dl-horizontal">
	    			<dt>Slug: </dt>
	    			<span>{{$posts->slug}}</span>
	    		</dl>
	    		<dl class="dl-horizontal">
	    			<dt>Category: </dt>
	    			<span>{{$posts->category->name}}</span>
	    		</dl>			
	    		<dl class="dl-horizontal">
	    			<dt>Create at:</dt>
	    			<dd>{{date('d-m-y',strtotime($posts->created_at))}}</dd>
	    		</dl>
				<dl class="dl-horizontal">
					<dt>Last update:</dt>
					<dd>{{ date('d-m-y',strtotime($posts->updated_at))}}</dd>
				</dl>
	    		<div class="row">
	    			<div class="col-sm-6">
	    				{!!Html::linkRoute('post.edit','Edit',array($posts->id),array('class'=>'btn btn-primary btn-block'))!!}	    
	    				
	    			</div>
	    			<div class="col-sm-6">
	    				{!!Form::open(['route'=>['post.destroy',$posts->id],'method'=>'delete'])!!}
	    				{!!Form::submit('Delete',array('class'=>'btn btn-danger btn-block'))!!}
	    				{!!Form::close()!!}
	    				
	    			</div>	    			
	    		</div>
	    	</div>
	    </div>
	    @endrole
	    
	   	{{-- Comment form --}}
	   	@if(Auth::check())
		<div id="comment-form" class="col-md-7 col-md-offset-1">
		@foreach ($errors->all() as $error)
	      <div>
	      <li class="alert alert-danger">{{ $error }}</li>
	      </div>
	    @endforeach
		{{ Form::open(['route'=>['comments.store',$posts->id],'method'=>'POST'])}}
			<div class="row">
				<div class="col-md-6">
					{{ Form::hidden('user_id',$id_comment)}}
					{{ Form::hidden('name',$name_comment,['class'=>'form-control'])}}
				</div>
				<div class="col-md-6">
					{{ Form::hidden('email',$mail_comment,['class'=>'form-control'])}}
				</div>
				<div class="col-md-12">
					{{ Form::label('comment',"Comment:") }}
					{{ Form::textarea('comment',null,['class'=>'form-control','rows'=>3])}}
					<div class="col-md-4">
						{{ Form::submit('Add comment',['class'=>'btn btn-primary btn-success btn-block','style'=>'margin-top:20px'])}}
					</div>	
				</div>
			</div>
			{{Form::close()}}
		</div>
		@else
		<div id="comment-form" class="col-md-7 col-md-offset-1">
		{{ Form::open()}}
			<div class="row">
				<div class="col-md-6">
					{{ Form::label('name',"Name:")}}
					{{ Form::text('name',null,['class'=>'form-control'])}}
				</div>
				<div class="col-md-6">
					{{ Form::label('email','Email:')}}
					{{ Form::text('email',null,['class'=>'form-control'])}}
				</div>
				<div class="col-md-12">
					{{ Form::label('comment',"Comment:") }}
					{{ Form::textarea('comment',null,['class'=>'form-control'])}}
					{{ Form::button('Add comment',['class'=>'btn btn-primary btn-success btn-block'])}}
				</div>
			</div>
			{{Form::close()}}
		</div>
		<div>Đăng nhập để bình luận</div>
		@endif
	  </div>
	</div>
	
</body>
@extends('partials.footer')