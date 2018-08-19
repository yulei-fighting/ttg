<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Input;

class MatchController extends Controller
{
    //比赛首页展示
    public function index(){
    	$data = DB::table('match_info') -> leftJoin('player as a','match_info.playerA_id','=','a.id')  -> leftJoin('player as b','match_info.playerB_id','=','b.id')  -> select('match_info.*', 'a.name as A_name', 'b.name as B_name') -> get();
    	//dump($data);
    	//die();
    	return view('admin.match.index',compact('data'));
    }

    //添加比赛
    public function add(Request $request){
    	if($request->isMethod('POST')){
    		$data = $request->only(['math_name','date','time','stage','playerA_id','playerB_id','item','nation','city']);
    		// dump($data);
    		// die();
    		$res = DB::table('match_info') -> insert($data);
    		if($res){
    			// 成功
    			$response = ['code' => 0,'msg' => '比赛添加成功！'];
    		}else{
    			// 失败
    			$response = ['code' => 1,'msg' => '比赛添加失败！'];
    		}
    		// 返回
    		return response() -> json($response);
    	}else{
    		$data = DB::table('player') -> select('id','name') ->get();
    	// dump($data);
    	// die();
    	return view('admin.match.add',compact('data'));
    	}
    }

    //获取运动员B的数据
    public function getPlayerB(){
    	// 获取ajax请求的playerA_id
    	$id = (int) Input::get('id');
    	// 查询match_info数据表获取playerB_id，结果是一个类的二维数组
    	$b_id = DB::table('match_info') -> where('playerA_id',$id) -> select('playerB_id') -> get();
    	// 循环输出playerB_id保存到$data中
    	$data = [];
    	for($i=0;$i<count($b_id);$i++){
    		$data[] = $b_id[$i]->playerB_id;
    	}
    	// 查询查询player数据表，返回playerB的id和姓名
    	$b_name = DB::table('player') -> whereIn('id',$data) -> select('id','name') ->get();
    	// 输出json数据
    	//dump($b_name);
    	return response() -> json($b_name);
    }

    //删除比赛
    public function del(){
    	$id = Input::get('id');
    	// dump($id);
    	// die
    	$res = DB::table('match_info') -> where('id',$id) -> delete();
    	if($res){
			// 成功
			$response = ['code' => 0,'msg' => '运动员删除成功！'];
		}else{
			// 失败
			$response = ['code' => 1,'msg' => '运动员删除失败！'];
		}
		// 返回
		return response() -> json($response);
    }

    //修改比赛
    public function edit(Request $request){
    	if($request -> isMethod('POST')){
    		/*dump($request);
    		die();*/
    		$id = Input::get('id');
    		$data = $request->only(['math_name','date','time','stage','playerA_id','playerB_id','item','nation','city']);
    		/*dump($id);
    		dump($data);
    		die();*/
    		$res = DB::table('match_info') -> where('id',$id) -> update($data);
	    	if($res){
				// 成功
				$response = ['code' => 0,'msg' => '运动员修改成功！'];
			}else{
				// 失败
				$response = ['code' => 1,'msg' => '运动员修改失败！'];
			}
			// 返回
			return response() -> json($response);
    	}else{
    		$id = Input::get('id');
    		$data1 = DB::table('match_info') -> where('id',$id) -> first();
    		$data = DB::table('player') -> select('id','name') ->get();
    		/*dump($data1);
    		dump($data);
    		die();*/
    		return view('admin.match.edit',compact('data1','data'));
    	}
    }
}
