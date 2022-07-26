<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\company;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employee = employee::join('companies','companies.id','=','employees.company_id')
        ->select('employees.*','companies.Name')
        ->get();
        return view('Employee.employee',compact('employee'));
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

        $request->validate([
            "firstName" => "required",
            "email" => "required|email|unique:employees,email",
            "phone" => "required|numeric",
            "lastName" => "required",
            "company_id" => "required",
            "profilePicture" => "required",
        ]);

        $employee = new employee();
        $employee -> first_name = $request -> firstName;
        $employee -> last_name = $request -> lastName;
        $employee -> company_id  = $request -> company_id;
        $employee -> email  = $request -> email;
        $employee -> phone = $request -> phone;

        if($request->hasFile('profilePicture')) {
            $path = Storage::putFile('photos', new File($request->file('profilePicture')),'public');
            $employee -> profile_photo=  $path;
        };

        $employee -> save();
        return redirect('employee')->with('success','Successfully Created');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = company::all();
        $employee = employee::find($id);
        return view('Employee.employeeEdit',compact('employee','company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            "firstName" => "required",
            "email" => "required|email|unique:employees,email," .$id,
            "phone" => "required|numeric",
            "lastName" => "required",
            "company_id" => "required",

        ]);

        $employee = employee::find($id);
        $employee -> first_name = $request -> firstName;
        $employee -> last_name = $request -> lastName;
        $employee -> company_id  = $request -> company_id;
        $employee -> email  = $request -> email;
        $employee -> phone = $request -> phone;

        if($request->hasFile('profilePicture')) {
            $path = Storage::putFile('photos', new File($request->file('profilePicture')),'public');
            $employee -> profile_photo=  $path;
        };

        $employee -> save();
        return redirect('employee')->with('success','Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = employee::find($id);
        $employee->delete();
        return redirect('employee')->with('success','Successfully deleted');
    }

    public function AddEmployee(){
        $company = company::all();
        return view('Employee.employeeAdd', compact('company'));
    }
}
