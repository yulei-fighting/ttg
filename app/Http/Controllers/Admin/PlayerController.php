<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Input;
use Storage;

class PlayerController extends Controller
{
    //运动员首页展示
    public function index(){
    	$data = DB::table('player')->get();
    	//dump($data);
    	//展示视图
    	return view('admin.player.index',compact('data'));
    }

    //运动员添加
    public function add(Request $request){
    	// if(Input::method() == 'POST'){
    	// 	$data = Input::all();
    	// 	unset($data['_token']);
    	// 	dump($data);
    	if($request -> isMethod('POST')){
    		$data = $request -> all();
    		//$pic = $request -> file('photo');
    		unset($data['_token']);
    		unset($data['photo']);
    		//获取文件的扩展名称
    		//$ext = $pic -> getClientOriginalExtension();
    		//生成新的文件名
    		//$picname = time().'.'.$ext;
    		//$result = Storage::disk('public') -> put($picname,file_get_contents($pic -> path()));
    		//$picPath = $pic -> path();
    		//$ret = $request -> file('photo') -> store('public');
    		$path = Storage::putFile('public', $request->file('photo'));
    		$picname = pathinfo($path,PATHINFO_BASENAME);
    		//dump($name);
    		$data['photo'] = '/storage/'.$picname;
    		//dump($data);
    		$res = DB::table('player') -> insertGetId($data);
    		//dump($res);
    		if($res){
    			// 成功
    			//$response = ['code' => 0,'msg' => '运动员添加成功！'];
    			echo '<script type="text/javascript">alert("运动员添加成功！");</script>';
    			//return redirect(route('admin.player.add'));
    			return view('admin.player.add');
    		}else{
    			// 失败
    			//$response = ['code' => 1,'msg' => '运动员添加失败！'];
    			echo '<script type="text/javascript">alert("运动员添加失败！");</script>';
    			//return redirect(route('admin.player.add'));
    			return view('admin.player.add');
    		}
    		//dump($response['msg']);
    		// 返回
    		//return response() -> json($response);
    		//return redirect(route('admin.player.add'));
    		//echo '<script type="text/javascript">alert("<h1>$response["msg"]</h1>");location.href="add.blade.php";</script>';
    	}else{
    		return view('admin.player.add');
    	}
    }

    //运动员删除
    public function del(Request $request){
    	//$data = Input::all();
    	$id = $request['id'];
    	//$id = $_POST['id'];
    	//dump($id);
  		//$res=$db->delete('users',$uid);
		// if($res>0){
		// 	$lists=$db->getALL('users');
		// 	$smarty->assign('lists',$lists);
		// 	$smarty->display('list.html');
		// }else{
		// 	echo false;
		// }
		$ret = DB::table('player')->where('id',$id)->delete();
		if($ret){
			// 成功
			$response = ['code' => 0,'msg' => '运动员删除成功！'];
		}else{
			// 失败
			$response = ['code' => 1,'msg' => '运动员删除失败！'];
		}
		// 返回
		return response() -> json($response);
	}

	//运动员修改
	public function edit(Request $request){
		if($request->isMethod('POST')){
			$id = $request['id'];
			$data = $request -> all();
    		unset($data['_token']);
    		unset($data['photo']);
    		unset($data['id']);
    		//$picPath = $pic -> path();
    		//$ret = $request -> file('photo') -> store('public');
    		$path = Storage::putFile('public', $request->file('photo'));
    		$picname = pathinfo($path,PATHINFO_BASENAME);
    		//dump($name);
    		$data['photo'] = '/storage/'.$picname;
    		$res = DB::table('player') -> where('id',$id) -> update($data);
    		//dump($res);
    		if($res){
    			// 成功
    			echo '<script type="text/javascript">alert("运动员修改成功！");</script>';
    			//return redirect(route('player_index'));
    		}else{
    			// 失败
    			echo '<script type="text/javascript">alert("运动员修改失败！");</script>';
    			//return redirect(route('player_index'));
    		}
		}else{
			$id = $request['id'];
			$data = DB::table('player')->where('id', $id)->first();
			//dump($data);
			return view('admin.player.edit',compact('data'));
		}
	}
}
