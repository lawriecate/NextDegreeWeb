<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class SearchController extends Controller
{
    public function search(Request $request)
    {
    	$query = $request->query;
    	// retrieve people by name
    	//$people = User::where('name',$query,'LIKE')->get();


    	// retrieve people by skills
    }
}
