<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


/*Route::get('/', function () {
    return view('welcome');
});*/
use App\Employee;
/*Route::get('/', function () {	
	return view('Employees.home');
});*/
Route::resource('employees','EmployeesController');
Route::get('ajax_crud', ['as' => 'ajax.index', 'uses' => 'EmployeesAjaxController@index']);
Route::get('ajax_crud/{id}',['as' => 'ajax.edit', 'uses' => 'EmployeesAjaxController@edit']);
Route::post('ajax_crud_post',['as' => 'ajax.store', 'use' => 'EmployeesAjaxController@store']);
Route::put('ajax_crud/{id}',['as' => 'ajax.update', 'use' => 'EmployeesAjaxController@update']);
Route::delete('ajax_crud/{id}',['as' => 'ajax.delete', 'use' => 'EmployeesAjaxController@delete']);
/*Route::post('/ajax_crud',function(Request $request){
    $emp = Employee::create($request->all());

    return Response::json($emp);
});*/
Route::auth();

Route::get('/home', 'HomeController@index');
