<!DOCTYPE html>
<html lang="en-US">
<head>
	<!-- <meta name="csrf_token" content="{{ csrf_token() }}" /> -->
	<meta name="_token" content="{!! csrf_token() !!}"/>
    <title>Laravel Ajax CRUD Example</title>

    <!-- Load Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-narrow">
    	<h2>Laravel Ajax </h2>
    	<button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Employee</button>

        <div>
        	<!-- Table-to-load-the-Employee Data -->
            <table class="table">
                <thead>
                    <tr>
			            <td>ID</td>
			            <td>Code</td>
			            <td>Name</td>
			            <!-- <td>Designation</td>
			            <td>Department</td>
			            <td>Location</td>
			            <td>Status</td>
			            <td>Actions</td> -->
        			</tr>
                </thead>
                <tbody id="tasks-list" name="tasks-list">
                	@foreach($emp as $value)                    
                    <tr id="emp{{$value->id}}">
                    	<td>{{ $value->id }}</td>            
			            <td>{{ $value->code }}</td>
			            <td>{{ $value->name }}</td>
			            <!-- <td>{{ $value->designation }}</td>
			            <td>{{ $value->department }}</td>
			            <td>{{ $value->location }}</td>
			            <td>@if($value->status == 1) Active @else InActive @endif</td>  -->                   
                        <td>
                            <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$value->id}}">Edit</button>
                            <button class="btn btn-danger btn-xs btn-delete delete-task" value="{{$value->id}}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End of Table -->

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Create New User</h4>
                        </div>
                        <div class="modal-body">
                            <form id="employee" name="employee" class="form-horizontal" novalidate="">

                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="code" name="code" placeholder="Code" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="name" value="">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" value="add">Save</button>
                            <input type="hidden" id="emp_id" name="emp_id
                            " value="0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript">
		$.ajaxSetup({
		   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});
	</script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{asset('js/ajax-crud.js')}}"></script>

</body>
</html>