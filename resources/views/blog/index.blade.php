@include('partials.head')
@section('title','ABC')
<body>
	@include('post.nav')
	<div class="container-fluid">
	  <div class="row">
		<div class="col-xs-12 col-md-10 text-center">
			<h3>Bài viết gần đây</h3>	
		</div>
	    <div class="col-md-2">
	    	@role(['admin','manager'])
	    		{{-- expr --}}
	    		<a href="{{route('post.create')}}" class="btn btn-primary">Creat new post</a>
	    	@endrole
	    	{{Auth::check() ?"Logged in":"Logged out"}}
	    </div>
	    {{-- <div class="col-md-12">
	    	<table class="table">
	    		<tr>
	    			<th>ID</th>
		    		<th>Title</th>
		    		<th>Content</th>
		    		<th>Control</th>
	    		</tr>    		
	    			@foreach ($posts as $post)
	    			<tr>
	    			<td>{{$post->id}}</td>
					<td>{{$post->title}}</td>
					<td>{{ substr($post->body,0,5)}}{{strlen($post->body)>5 ?"...":""}}</td>
					<td>{{date('M j,y',strtotime($post->created_at))}}</td>
					<td><a href="{{route('post.show',$post->id)}}" class="btn btn-default">View</a><span> | </span><a href="{{route('post.edit',$post->id)}}" class="btn btn-default">Edit</a></td>
					</tr>
					@endforeach
	    		
	    	</table>
	    	
	    </div> --}}
	    <div class="container">
	    	<div class="col-md-8 col-md-offset-2">
		    @foreach($posts as $post)	    	
		    	<div class="post-outer">
		    		<div class="post-entry">
		    			<div class="post-home-image">
			    		<img src="images/img-demo.jpg">		    		
				    	</div>
				    	<article>
				    		<div class="post-header">
			    			<h3>{{$post->title}}</h3>
			    			<div style="color: orange">
			    			<small>Posted by : {{$post->user->name}} | <i>{{date('d F y',strtotime($post->created_at))  }}</i></small>	
			    			</div>
			    			<div class="post-content">
				    			<p>
					    		{{substr($post->body,0,200)}}{{strlen($post->body)>200?"...":""}}
					    		</p>
					    		<button class="btn-default"><a href="{{route('blog.single',$post->slug)}}">Read more</a></button>
			    			</div>	    	
			    		</div>
				    	</article>		    		
		    		</div>		    	
		    	</div>
		    @endforeach
		    </div>

	    </div>
	    <div class="text-center">
	    		{{ $posts->links() }}
	    	</div>
	  </div>
	</div>
	
</body>
@include('partials.footer')