@include('partials.head')
@section('title','ABC')
<style type="text/css">
	* {box-sizing:border-box}
body {font-family: Verdana,sans-serif;}
.mySlides {display:none}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #868383;
  font-size: 15px;
  padding: 8px 12px;
  position: relative;
  /*bottom: 8px;*/
  width: 100%;
  height: 65px;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #868383;
  font-size: 12px;
  padding: 8px 12px;
  bottom: 8px;
  position: absolute;
  /*top: 0;*/
}

/* The dots/bullets/indicators */
.dot {
  height: 13px;
  width: 13px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 4s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  
  	0% 	 {opacity: 0;}
    50%  {opacity:.5}
    100% {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
.mySlides.fade img {
    height: auto;
    width: 100%;
}
.text >p{
	font-size: 20px;
}
</style>
<body>
	@include('post.nav')
	<div class="container-fluid site-background">
		<div class="site-background-img">
		<div class="row">
			<div class="">
				<div class="banner-top">
					<img src="/images/banner.jpg" alt="">
				</div>	
			</div>
		</div>
	  	<div class="row">
		<div class="col-xs-12 col-md-10 text-center">
			<h3><em>LIST POST</em></h3>	
		</div>
	    <div class="col-md-2">
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
	    	<div class="col-md-8 col-md-offset-1">
			    @foreach($posts as $post)    	
			    	<div class="post-outer">
			    		<div class="border_left"></div>
			    		<div class="space-top"></div>
			    		<div class="post-entry">
			    			<div class="post-header">
				    			<h2><em>{{$post->title}}</em></h2>
				    			<div style="color: orange">
				    			<small>Posted by : {{$post->user->name}} | <i>{{date('d F y',strtotime($post->created_at))  }}</i></small>	
				    			</div>
				    		</div>
					    	<article class="frame-content">
					    		<div class="post-home-image">
					    			@if($post->image)
					    			<img src="{{asset('images/'.$post->image)}}">		 
					    			@else
					    			<img src="images/img-demo.jpg">
					    			@endif
						    	</div>
						    	<div class="middle_space"></div>	 		    		
				    			<div class="post-content">
				    				<div class="text-post">
				    					<p>
							    		{{substr(strip_tags($post->body),0,200)}}{{strlen($post->body)>200?"...":""}}
							    		</p>
				    				</div>
					    			<div class="btn_more">
					    				<div class="btn_read_more">
					    					<a href="{{route('blog.single',$post->slug)}}">Read more</a>
					    				</div>
					    			</div>
				    			</div>	    				    		
					    	</article>		    		
			    		</div>
			    		<div class="border_right"></div>	    	
			    	</div>
			    	<div class="post-space-child">
			    	</div>
			   	 @endforeach
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
		    <div class="col-md-3">
		    	<div class="tag-cloud">
		    		<h3>Featured Review</h3>
		    		<div class="line"></div>
					<div class="slideshow-container">
					<?php $num=1; ?>
					@foreach($posts_slide as $slide)
						<div class="mySlides fade">
						  <div class="text">
						  	<p>{{$slide->title}}</p>
						  </div>
						  <div class="datetext">
						  	<small style="color:#DB5B43;">{{date('d F y',strtotime($slide->created_at))}}</small>
						  </div>
						  @if($slide->image)
						  	<img src="{{asset('images/'.$slide->image)}}">
						  @else
						  	<img src="images/img-demo.jpg" style="width:100%">
						  @endif						  
						  <div class="numbertext">{{$num++}}/3</div>
						</div>
					@endforeach
					</div>
					 <br>

					<div style="text-align:center">
					  <span class="dot"></span> 
					  <span class="dot"></span> 
					  <span class="dot"></span> 
					</div>
		    	</div>
		    </div>
		    <div class="col-md-3">
		    	<div class="tag-cloud tag">
		    		<h3>Tags</h3>
		    		<div class="line"></div>
		    		<div class="tag">
		    		@foreach($tags as $tag)
		    			<span>{{$tag ->name}}</span>
					@endforeach
		    		</div>
		    	</div>
		    </div>
		    <div class="col-md-3">
		    	<div class="tag-cloud reading">
		    		<h3>What I'm reading</h3>
		    		<div class="line"></div>
		    		<div class="tag">
		    			@foreach($posts as $key=>$value)
		    				@if($key==0)
			    			<div class="title">{{$value->title}}</div>
			    				@if($value->image)
			    					<img src="{{asset('images/'.$value->image)}}" alt=""/>
			    				@else
			    					<img src="images/img-demo.jpg" alt=""/>
			    				@endif		    			
		    				@endif
		    			@endforeach
		    		</div>
		    	</div>
		    </div>
	    </div>
	    <div class="text-center">
	    		{{ $posts->links() }}
	    	</div>
	  </div>
	</div>
	</div>
	
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script>

</body>
@include('partials.footer')
	
						    		