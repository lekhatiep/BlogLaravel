<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{url('/')}}">Trang chủ</a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Introduce myself</a></li>
					<li><a href="/contact">Contact</a></li>
				</ul>
				<form class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default">Search</button>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						@if(Auth::check())
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>{{Auth::user()->name}}</b><b class="caret"></b></a>
						@else
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Account</b><b class="caret"></b></a>
						@endif
						<ul class="dropdown-menu">
						@if (Auth::check())
							<li><a href="#">Another action</a></li>
								@role('admin')
								<li><a href="{{route('admin.index')}}">Admin page</a></li>
							@endrole
								{{-- expr --}}
								<li><a href="{{route('logout')}}">Logout</a></li>
								@else
								<li><a href="{{route('login')}}">Login</a></li>
								<li><a href="{{route('register')}}">Register/Đăng kí</a></li>
								
							@endif						
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>