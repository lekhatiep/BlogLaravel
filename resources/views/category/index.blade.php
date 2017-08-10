@extends('admin.layouts.master')
@section('body.content')
		<div class="row">
			<div class="col-md-5" style="float: left;">
				<table  border="1" id="example" class="display table table-hover" cellspacing="0" width="100%">
					<thead>
					<tr>
						<th>id</th>
						<th>name</th>
						<th>action</th>
					</tr>		
					</thead>
						{{-- @foreach($categories as $category)
					<tr>
						<td>{{$category->name}}</td>
						<td>
							<a href="{{ route('category.edit',$category->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
							{{Form::open(['route'=>['category.destroy',$category->id],'method'=>'delete'])}}
							{{Form::submit('Delete')}}
							{{Form::close()}}
						</td>
					</tr>
						@endforeach		 --}}			
				</table>
			</div>
			<div class="col-md-5">
				@foreach ($errors->all() as $error)
		      <div>
		      <li class="alert alert-danger">{{ $error }}</li>
		      </div>
	   	 @endforeach
				{{Form::open(['route'=>'category.store','method'=>'POST'])}}
				{{Form::label('Category')}}</br>
				{{Form::text('name',null,['class'=>'form-group'])}}<br>
				{{Form::submit('create category',['class'=>'btn btn-success'])}}
				{{Form::close()}}
				
			</div>		
		</div>
@stop
@section('add_script')
	<script type="text/javascript">
	
   $(function(){
   		 $('#example').DataTable({
       	processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name'},
            { data: 'action',name: 'action',oderable:false,searchable:false}        
        ]		       
    	});

   });
   
	</script>
@stop
