<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Institution;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('admin.institutions');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.edit_institution')->with('submit_to',action('InstitutionController@store'))->with('institution',new Institution);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $institution = new Institution;
        $institution->name = $request->name;
        $institution->slug = $request->slug;
        $institution->domain = $request->slug;
      
        if($request->enable_registration == "true") {
            $institution->enable_registration = true;
        } else {
            $institution->enable_registration = false;
        }
        $institution->save();
        return redirect(action('InstitutionController@index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($institution)
    {
        return view('admin.edit_institution')->with('institution',$institution)->with('submit_to',action('InstitutionController@update',$institution))->with('method','PUT');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $institution)
    {
        $institution->name = $request->name;
        $institution->slug = $request->slug;
        $institution->domain = $request->domain;
      
        if($request->enable_registration == "true") {
            $institution->enable_registration = true;
        } else {
            $institution->enable_registration = false;
        }
        $institution->save();
        return redirect(action('InstitutionController@edit',$institution->id));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function autocompleteJson()
    {
        $results = array();
        foreach(Institution::all() as $institution) 
        {
            $results[] = array('value'=>$institution->id,'title'=>$institution->name,'url'=>'#','text'=>$institution->name);
        }
        return response()->json($results);
    }
}
