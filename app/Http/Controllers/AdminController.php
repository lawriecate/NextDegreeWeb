<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;
use App\File;
use Auth;
use App\User;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // data calculations
        $results = array();
        for($i = 0; $i<=29;$i++) {
            $days_ago = strtotime(date('Y-m-d') . '23:59') - (86400*$i);
            $query_time = date('Y-m-d H:i:s',$days_ago);

            $users = User::where('created_at','<=',$query_time)->count();
            $results[] = array('day'=>date('Y-m-d',$days_ago),'no_users'=>$users);
        }
        return view('admin.dashboard')->with('user_data',$results);
    }


}
