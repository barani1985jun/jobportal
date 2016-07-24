<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Employee;

use Response;
use View;

class EmployeesAjaxController extends Controller
{
    public function index() {
    	$employee = Employee::all();
    	return View::make('EmployeesAjax.index')->with('emp',$employee);
    }

    public function edit($id) {
    	$emp = Employee::find($id);
    	return Response::json($emp);
    }

    public function store(Request $request) {
    	/*$emp = Employee::create($request->all());
    	return Response::json($emp);*/
    	$emp = new Employee;
    	$emp->name = $request->name;
    	$emp->code = $request->code;
    	$emp->save();
    	return Response::json($emp);
    }
    public function update(Request $request, $id) {

    	$emp = Employee::find($id);
    	$emp->name = $request->name;
    	$emp->code = $request->code;
    	$emp->save();

    	return Response::json($emp);
    }

    public function delete($id) {
        $emp = Employee::destroy($id);
        return Response::json($emp);
    }
}
