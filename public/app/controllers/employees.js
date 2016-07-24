app.controller ('employeesController', function($scope, $http, API_URL,$log) {

	// Get all employee detail 

	$http.get('employees')
		.success(function(response) {			
			$scope.employees = response;
		})
		.error(function(reason) {
			$scope.fail = "Unable to Get Employee Detail";
		});

		$scope.toggle = function(modestate,id) {
			$scope.modalstate = modestate;

			switch (modestate) {
				case 'add': 
					$scope.form_title = 'Add New Employee';
					$scope.employee = '';
					break;
				case 'edit' :
					$scope.form_title = 'Employee Details';
					$scope.id = id;
					$http.get('employees/'+ id)
					.success(function(response) {
						$scope.employee = response;
						//console.log(response);
						//console.log($scope.employee);
					})
					.error (function(reason) {
						$scope.fail = "Unable to get employee Detail";
						console.log($scope.fail);
					});					
					break;
				default:
					break;
			}
			//console.log($scope.id);
			$('#myModal').modal('show');
		}

		$scope.save = function(modalstate,id) {
			var url = 'employees';
			var method = 'POST';
			var Indata = {firstname:$scope.employee.firstname,lastname:$scope.employee.lastname,email:$scope.employee.email,phone:$scope.employee.phone}
			if(modalstate == 'edit') {
				url += '/' + id;
				method = 'PUT';
			}
			$http({
				method : method,
				url : url,												
				data: {firstname:$scope.employee.firstname,lastname:$scope.employee.lastname,email:$scope.employee.email,phone:$scope.employee.phone},
				headers : {'Content-Type':'application/x-www-form-urlencode'}
			})
			.success(function (response) {
				//console.log(params);
				//console.log($scope.employee);
				//console.log(modalstate);
				//console.log(id);
				console.log(method);
				console.log(url);
				console.log(response);
				//location.reload();
			})
			.error(function (reason) {
				// console.log(data);
				//console.log($scope.employee);
				//console.log(modalstate);
				//console.log(params);
				console.log(method);
				console.log(url);
				console.log(reason);
			});
		}

		$scope.confirmDelete = function(id) {
			var action = confirm('Are you sure you want to delete the record ?');
			if(action){
				$http({
					method:'DELETE',
					url:'employees/'+id
				})
				.success(function(response){					
					console.log(response);
					location.reload();
				})
				.error(function(reason) {
					console.log(reason);
				});
			} else {
				return false;
			}
		}

});