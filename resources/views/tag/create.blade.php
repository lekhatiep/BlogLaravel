@include('partials.head')
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
			@foreach ($errors->all() as $error)
	      <div>
	      <li class="alert alert-danger">{{ $error }}</li>
	      </div>
	    @endforeach
				{{Form::open(['route'=>'tag.store','method'=>'POST'])}}
				{{Form::label('Tag')}}</br>
				{{Form::text('name',null,['class'=>'form-group'])}}<br>
				{{Form::submit('create a tag',['class'=>'btn btn-success'])}}
				{{Form::close()}}
				{{-- <form action="{{ route('category.store')}}" method="POST">
					{{csrf_field()}}
					<label for="category">Category</label>
					<input type="text" name="category">
					<input type="submit" value="create ">
				</form> --}}
			</div>
		</div>
	</div>
<body>
</html>

