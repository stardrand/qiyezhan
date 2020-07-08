<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegController extends Controller
{
    /**
     * 注册页
     */
    public function reg(){
        return view('index.reg');
    }

    /**
     * 注册
     */
    public function regadd(Request $request){
        $username=$request->post('username');
        $pwd=$request->post('pwd');
        if(empty($username)){
            $arr=[
                'code'=>'300',
                'msg'=>'用户名不能为空',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        if(empty($pwd)){
            $arr=[
                'code'=>'300',
                'msg'=>'密码不能为空',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $model=new User();
        $user=$model::where(['username'=>$username])->first();
        if(!empty($user)){
            $arr=[
                'code'=>'300',
                'msg'=>'用户已存在',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $model->username=$username;
            $model->pwd=encrypt($pwd);
            if($model->save()){
                $arr=[
                    'code'=>'200',
                    'msg'=>'注册成功',
                    'sult'=>[]
                ];
                return json_encode($arr,JSON_UNESCAPED_UNICODE);
            }else{
                $arr=[
                    'code'=>'300',
                    'msg'=>'注册失败',
                    'sult'=>[]
                ];
                return json_encode($arr,JSON_UNESCAPED_UNICODE);
            }
        }

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 登陆页
     */
    public function login(){
        return view('index.login');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 登陆
     */
    public function loginadd(Request $request){
        $username=$request->post('username');
        $pwd=$request->post('pwd');
        if(empty($username)){
            $arr=[
                'code'=>'300',
                'msg'=>'用户名不能为空',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        if(empty($pwd)){
            $arr=[
                'code'=>'300',
                'msg'=>'密码不能为空',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $model=new User();
        $user=$model::where(['username'=>$username])->first()->toArray();
        if(empty($user)){
            $arr=[
                'code'=>'300',
                'msg'=>'未找到该用户',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            if(decrypt($user['pwd'])==$pwd){
                session(['indexuser_id'=>$user['id']]);
                $request->session()->save();
                $arr=[
                    'code'=>'200',
                    'msg'=>'登录成功',
                    'sult'=>[]
                ];
                return json_encode($arr,JSON_UNESCAPED_UNICODE);
            }else{
                $arr=[
                    'code'=>'300',
                    'msg'=>'密码错误',
                    'sult'=>[]
                ];
                return json_encode($arr,JSON_UNESCAPED_UNICODE);
            }
        }
    }

}
