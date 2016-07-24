<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">
  
  <!-- Trigger the modal with a button -->
  <!-- <nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('nerds') }}">Nerd Alert</a>
    </div> -->
    <!-- <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('employees') }}" class="btn btn-info btn-lg"  >View All Employees</a></li>
        <li><a href="{{ URL::to('employees/create') }}" class="btn btn-info btn-lg" data-toggle="modal" data- target="#myModal">Add new Employee</a>
    </ul> 
  </nav> -->
  <div>
  	<a href="{{ URL::to('employees') }}" class="btn btn-info btn-lg"  >View All Employees</a>  	
  	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add new Employee</button>
  	 
  </div>
  @if(Session::has('message'))
  		<div class="alert alert info">{{ Session::get('message')}}</div>
  @endif
  
  {{ Html ::ul($errors->all()) }}
  
  @yield('content')
  
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">

       		{{ Form::open(array('url' => 'employees', 'class' => 'form-horizontal'))}}
       			
       			<div class="form-group row">
				  	{{ Form::label('code', 'Code', array('class' => "col-sm-2 form-control-label")) }}
				  	<div class="col-sm-10">
				  		{{ Form::text('code',  old('code'), array( 'id' => 'code', 'placeholder' => 'Employee Code', 'class' => 'form-control'))}}
				  	</div>	
			  	</div>

			  	<div class="form-group row">
				  	{{ Form::label('name', 'Name', array('class' => "col-sm-2 form-control-label")) }}
				  	<div class="col-sm-10">
				  		{{ Form::text('name',  old('name'), array( 'id' => 'name', 'placeholder' => 'Employee Name', 'class' => 'form-control'))}}
				  	</div>	
			  	</div>

			  	<div class="form-group row">
				  	{{ Form::label('designation','Designation',array('class' => "col-sm-2 form-control-label")) }}
				  	<div class="col-sm-10">
				  		{{ Form::select('designation',$designation,old('designation'),['id' => 'designation', 'placeholder' => 'Employee Designation', 'class' => 'form-control'])}}
				  	</div>	
			  	</div>

			  	<div class="form-group row">
				  	{{ Form::label('department','Department',array('class' => "col-sm-2 form-control-label")) }}
				  	<div class="col-sm-10">
				  		{{ Form::select('department',$department,old('department'),['id' => 'department','placeholder' => 'Employee Department','class' => 'form-control'])}}
				  	</div>	
			  	</div>

			  	<div class="form-group row">
				  	{{ Form::label('location','Location',array('class' => "col-sm-2 form-control-label")) }}
				  	<div class="col-sm-10">
				  		{{ Form::select('location',$location,old('location'),['id' => 'location','placeholder' => 'Employee Location','class' => 'form-control'])}}
				  	</div>	
			  	</div>

			  	<div class="form-group row">
			  		{{ Form::label('status', 'Status', array('class' => "col-sm-2 form-control-label")) }}	   
			    	<div class="col-sm-10">
				      <div class="checkbox">
				        <label>
				          {{ Form::checkbox('status','1',true)}}				          
				        </label>
				      </div>
			    	</div>
			  	</div>
			  	<div class="form-group row">
			  		{{ Form::label('gender', 'Gender', array('class' => "col-sm-2 form-control-label")) }}	   
			    	<div class="col-sm-5">
				      <div class="radio">
				        <label>
				          {{ Form::radio('gender','female')}} Female			          
				        </label>				        
				      </div>
			    	</div>
			    	<div class="col-sm-5">
				      <div class="radio">
				        <label>
				          {{ Form::radio('gender','male')}} Male				          
				        </label>
				      </div>
			    	</div>
			  	</div>
			  	{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
       		{{ Form::close() }}
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</body>
</html>
