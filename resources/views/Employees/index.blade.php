@extends('Employees.layouts.master')

@section('title','Add New Employee')

@section('content')
	
	<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Code</td>
            <td>Name</td>
            <td>Designation</td>
            <td>Department</td>
            <td>Location</td>
            <td>Status</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($emp as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>            
            <td>{{ $value->code }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->designation }}</td>
            <td>{{ $value->department }}</td>
            <td>{{ $value->location }}</td>
            <td>@if($value->status == 1) Active @else InActive @endif</td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

               	<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a style="padding-bottom:5px" class="btn btn-small btn-info" href="{{ URL::to('employees/'.$value->id . '/edit') }}">Edit this Nerd</a>
                {{ Form::open(array('route' => array('employees.destroy', $value->id), 'method' => 'DELETE')) }}
                	{{ Form::submit('Delete', array('class' => 'btn btn-small btn-info'))}}
                {{ Form::close() }}

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection