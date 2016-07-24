<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Validator;
use App\Http\Requests;
use App\Employee;
use View;
use App\Location;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    var $location;
    var $department;
    var $designation;

    public function __construct() {
        $this->location = Location::pluck('country_name','country_code');
    }

    public function index()
    {
        $employee = Employee::select('id','code','name','designation','department','location','status')->get();
        return view('Employees.index',['emp' => $employee, 'location' => $this->location, 'designation' => ['1' => 'WB', '2' => 'WD', '3' => 'HR', '4' => 'BD'], 'department' => ['design' => 'Design', 'dev' => 'Development','HR' => 'Human Resoure', 'SA' => 'Sys Admin']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'code' => 'required',
            'name' => 'required',
            'designation' => 'required',
            'department' => 'required',
             'location' => 'required',
            'gender' => 'required',
            'status' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            Session::flash('error', 'Enter all fileds');
            return Redirect::to('employees')->withErrors($validator)->withInput($request->all());
        } else {

            $emp = new Employee;         
            $emp->code = $request->input('code');
            $emp->name = $request->input('name');
            $emp->designation = $request->input('designation');
            $emp->department = $request->input('department');
            $emp->location = $request->input('location');
            $emp->gender = $request->input('gender');
            $emp->status = $request->input('status');
            $emp->save();

            Session::flash('message', 'Successfully Employee has been created ');
            return Redirect::to('employees');
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Employee::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emp = Employee::find($id);       
        return view('Employees.edit',['employee' => $emp, 'location' => $this->location, 'designation' => ['1' => 'WB', '2' => 'WD', '3' => 'HR', '4' => 'BD'], 'department' => ['design' => 'Design', 'dev' => 'Development','HR' => 'Human Resoure', 'SA' => 'Sys Admin']]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $rules = [
            'code' => 'required',
            'name' => 'required',
            'designation' => 'required',
            'department' => 'required',
             'location' => 'required',
            'gender' => 'required',
            'status' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            Session::flash('error', 'Enter all fileds');
            return Redirect::to('employees')->withErrors($validator)->withInput($request->all());
        } else {

            $emp = Employee::find($id);         
            $emp->code = $request->input('code');
            $emp->name = $request->input('name');
            $emp->designation = $request->input('designation');
            $emp->department = $request->input('department');
            $emp->location = $request->input('location');
            $emp->gender = $request->input('gender');
            $emp->status = $request->input('status');
            $emp->save();

            Session::flash('message', 'Successfully Employee has been updated ');
            return Redirect::to('employees');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp = Employee::find($id);
        if($emp) {
            $emp->delete();
            Session::flash('message', 'Successfully Employee has been updated ');
            return Redirect::to('employees');
        } else {
            Session::flash('error', 'Unable to Delete the record ');
            return Redirect::to('employees');
        }
    }
}
