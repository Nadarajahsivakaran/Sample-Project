<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = company::all();
        return view('Company.company',compact('company'));
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
            "name" => "required",
            "email" => "required|email|unique:companies,email",
            "telephone" => "required|numeric",
            "logo" => "required",
            "cover_image" => "required",
            "website" => "required",
        ]);

        $company = new company();
        $company -> Name = $request -> name;
        $company -> email  = $request -> email;
        $company -> telephone = $request -> telephone;

        if($request->hasFile('logo')) {
            $path = Storage::putFile('photos', new File($request->file('logo')),'public');
            $company->logo =  $path;
        };

        if ($request->hasFile('cover_image')) {
            $path = Storage::putFile('photos', new File($request->file('cover_image')),'public');
            $company->cover_images = $path;
        };

        $company -> website = $request -> website;
        $company -> details = $request -> details;
        $company -> save();
        return redirect('company')->with('success','Successfully Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(company $company)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = company::find($id);
        return view('Company.companyEdit',compact('company'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:companies,email,".$id,
            "telephone" => "required|numeric",
            "website" => "required",
        ]);

        $company = company::find($id);
        $company -> Name = $request -> name;
        $company -> email  = $request -> email;
        $company -> telephone = $request -> telephone;

        if($request->hasFile('logo')) {
            $path = Storage::putFile('photos', new File($request->file('logo')),'public');
            $company->logo =  $path;
        }

        if ($request->hasFile('cover_image')) {
            $path = Storage::putFile('photos', new File($request->file('cover_image')),'public');
            $company->cover_images = $path;
        }

        $company -> website = $request -> website;
        $company -> details = $request -> details;
        $company -> save();
        return redirect('company')->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = company::find($id);
        $company -> delete();
        return redirect('company')->with('success','Successfully Deleted');
    }
}
