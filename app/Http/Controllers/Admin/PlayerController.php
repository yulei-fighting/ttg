<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PlayerController extends Controller
{
    //运动员首页展示
    public function index(){
    	$data = DB::table('player')->get();
    	//dump($data);

    	//展示视图
    	return view('admin.player.index',compact('data'));
    }
}
