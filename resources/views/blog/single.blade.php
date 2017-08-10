@include('partials.head')
@section('head.title','Home post')
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
            <div class="container">
               <div class="col-md-8 col-md-offset-1 float_left">
                  <div class="post-outer post-detail">
                     <div class="border_left"></div>
                     <div class="space-top"></div>
                     <div class="post-entry">
                        <div class="post-header text-center">
                           <h2><em>{{$post->title}}</em></h2>
                        </div>
                        <article class="frame-content">
                           <div class="post-content content-single">
                              <div class="text-posts">
                                 <p>
                                    {!!$post->body!!}
                                 </p>
                              </div>
                           </div>
                        </article>
                     </div>
                     <div class="border_right"></div>
                  </div>
               </div>
               <div class="col-md-3 float_right">
                     <div class="tag-cloud">
                        <h3>Tags cloud</h3>
                        <div class="line"></div>
                        <div class="tag">
                           @foreach($post->tags as $tag)
                              {{$tag->name}}
                           @endforeach
                        </div>
                     </div>
                  </div>
               <div class="post-space-child"></div>
               {{-- Comments post --}}
               <div class="col-md-7 col-md-offset-1">
                  <h3><span class="glyphicon glyphicon-comment">{{$post->comments()->count()}} Comments</span></h3>
                  @foreach($post->comments as $comment)
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
               {{-- End Comments post --}}
               @role(['admin','manager'])
               <div class="col-md-4" style="float: right;">
                  <div class="well">
                     <dl>
                        <dt>URL: </dt>
                        <dd><a href="{{route('blog.single',$post->slug)}}">{{route('blog.single',$post->slug)}}</a></dd>
                     </dl>
                     <dl>
                        <dt>
                           Category:
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
                           {!!Html::linkRoute('post.edit','Edit',array($post->id),array('class'=>'btn btn-primary btn-block'))!!}       
                        </div>
                        <div class="col-sm-6">
                           {!!Form::open(['route'=>['post.destroy',$post->id],'method'=>'delete'])!!}
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
                  {{ Form::open(['route'=>['comments.store',$post->id],'method'=>'POST'])}}
                  <div class="row">
                     <div class="col-md-6">
                        {{ Form::hidden('user_id',$post->user->id)}}
                        {{ Form::hidden('name',$post->user->name,['class'=>'form-control'])}}
                     </div>
                     <div class="col-md-6">
                        {{ Form::hidden('email',$post->user->email,['class'=>'form-control'])}}
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
            {{-- 
            <div class="col-xs-12 col-md-8 col-md-offset-1">
               <h3 class="text-center">{{$post->title}}</h3>
               <div class="text-left">
                  <p>{{$post->body}}</p>
               </div>
               <hr>
               <div class="tags"><b><span class="glyphicon glyphicon-tag"></span>TAGS</b>
                  @foreach($post->tags as $tag)
                  <span class="label label-warning">{{$tag->name}}</span>
                  @endforeach
               </div>
               <div style="float: right;"><b>Đăng bởi: <small>{{$user->name}}</small></b></div>
            </div>
            --}}
         </div>
      </div>
   </div>
</body>
@include('partials.footer')