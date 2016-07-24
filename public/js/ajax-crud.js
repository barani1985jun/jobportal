$(document).ready( function() {

	var url = 'JobPortal/public/ajax_crud';
	
	// Display Form to add new employee

	$("#btn-add").click(function() {
		$("#btn-save").val("add");
		$("#employee").trigger("reset");
		$("#myModal").modal('show');
	});

	// Open Model to display form to edit employee

	$(".open-modal").click( function () {
		var emp_id = $(this).val();

		$.get('ajax_crud/' + emp_id, function(data) {
			//console.log(data);
			$("#emp_id").val(data.id);
			$("#name").val(data.name);
			$("#code").val(data.code);
			$("#btn-save").val('update');
			$("#myModal").modal('show');			
		});
 	});


 	// Delete a record

 	$(".delete-task").click (function (){
 		var emp_id = $(this).val();

 		$.ajax({
 			type: "DELETE",
 			url: 'ajax_crud/' + emp_id,
 			success: function(data) {
 				console.log(data);
 				$("#emp"+emp_id).remove();
 			},
 			error: function (reason) {
 				console.log('Error:',reason);

 			}
 		});

 	});

 	$("#btn-save").click( function (e) {
 		$.ajaxSetup({
 			headers: {
 				'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
 			}
 		})

 		//e.preventDefault();
 		var state = $("#btn-save").val();
 		//Fetch the form data
 		var formData = {
 			name: $("#name").val(),
 			code: $("#code").val()
 		}

 		var type = 'POST';
 		var url = 'ajax_crud_post';
 		var emp_id = $("#emp_id").val();

 		if(state == 'update') {
 			type = 'PUT';
 			url += "/" + emp_id;
 		}

 		console.log(formData);

 		$.ajax({
 			type: type,
 			url: url, 			
 			data: formData,
 			dataType: 'json',
 			success: function (data) {
 				console.log(data);
 				var newEmp = "<tr id='emp" + data.id + "'><td>" + data.id + "</td><td>" + data.code + "</td><td>" + data.name + "</td>";
 				newEmp += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">Edit</button>';
 				newEmp += '<button class="btn btn-danger btn-xs btn-delete delete-task" value="' + data.id + '"Delete</button>';

 				if(state == "add") {
 					$("#tasks-list").append(newEmp); 					
 				} else {
 					$("#emp"+emp_id).replaceWith(newEmp);
 				}

 				$("#employee").trigger('reset');
 				$("#myModal").modal('hide');
 			},
 			error: function (reason) {
 				console.log('Error:', reason);
 			}

 		});





























 	})
});