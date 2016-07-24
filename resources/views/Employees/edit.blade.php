@extends('Employees.layouts.master')

@section('title', 'Edit Employee')

@section('content')
{{ Html::ul($errors->all()) }}
<div class="modal-body">

       		{{ Form::model($employee, array('route' => ['employees.update', $employee->id], 'method' => 'PUT', 'class' => 'form-horizontal'))}}
       			
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
				  		{{ Form::select('designation',$designation,old('designation'),['id' => 'designation',  'class' => 'form-control'])}}
				  	</div>	
			  	</div>

			  	<div class="form-group row">
				  	{{ Form::label('department','Department',array('class' => "col-sm-2 form-control-label")) }}
				  	<div class="col-sm-10">
				  		{{ Form::select('department',$department,$employee->department,['id' => 'department','class' => 'form-control'])}}
				  	</div>	
			  	</div>

			  	<div class="form-group row">
				  	{{ Form::label('location','Location',array('class' => "col-sm-2 form-control-label")) }}
				  	<div class="col-sm-10">
				  		{{ Form::select('location',$location,$employee->location,['id' => 'location','class' => 'form-control'])}}
				  	</div>	
			  	</div>

			  	<div class="form-group row">
			  		{{ Form::label('status', 'Status', array('class' => "col-sm-2 form-control-label")) }}	   
			    	<div class="col-sm-10">
				      <div class="checkbox">
				        <label>
				          {{ Form::checkbox('status','1',$employee->status)}}				          
				        </label>
				      </div>
			    	</div>
			  	</div>
			  	<div class="form-group row">
			  		{{ Form::label('gender', 'Gender', array('class' => "col-sm-2 form-control-label")) }}	   
			    	<div class="col-sm-5">
				      <div class="radio">
				        <label>
				          {{ Form::radio('gender','female',$employee->gender)}} Female			          
				        </label>				        
				      </div>
			    	</div>
			    	<div class="col-sm-5">
				      <div class="radio">
				        <label>
				          {{ Form::radio('gender','male',$employee->gender)}} Male				          
				        </label>
				      </div>
			    	</div>
			  	</div>
			  	{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
       		{{ Form::close() }}          
        </div>

@endsection