<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Adminuser;
use App\Models\Role;
use App\Models\Uret;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * 注册
     */
    public function reg(){
        return view('admin.login.reg');
    }

    /**
     * 注册执行
     */
    public function regadd(Request $request){
        $uname=$request->post('uname');
        if(empty($uname)){
            $arr=[
                'code'=>'300',
                'msg'=>'用户名未填',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $pwd=$request->post('pwd');
        if(empty($pwd)){
            $arr=[
                'code'=>'300',
                'msg'=>'密码未填',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
//        dd(encrypt($pwd));
        $adminuser=new Adminuser();
        $adminuser->uname=$uname;
        $adminuser->pwd=encrypt($pwd);
        if($adminuser->save()){
            $arr=[
                'code'=>'200',
                'msg'=>'ok',
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

    /**
     * 登陆
     */
    public function login(){
        return view('admin.login.login');
    }

    /**
     * 登陆执行
     */
    public function loginadd(Request $request){
        $uname=$request->post('uname');
        if(empty($uname)){
            $arr=[
                'code'=>'300',
                'msg'=>'用户名未填',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $pwd=$request->post('pwd');
        if(empty($pwd)){
            $arr=[
                'code'=>'300',
                'msg'=>'密码未填',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }

        $adminuser=new Adminuser();
        $res=$adminuser::where(['uname'=>$uname])->first();
        if(empty($res)){
            $arr=[
                'code'=>'300',
                'msg'=>'登录错误',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            if(decrypt($res['pwd'])==$pwd){
                session(['user'=>['id'=>$res['id'],'uname'=>$uname]]);
                $request->session()->save();
                $arr=[
                    'code'=>'200',
                    'msg'=>'ok',
                    'sult'=>[]
                ];
                return json_encode($arr,JSON_UNESCAPED_UNICODE);
            }else{
                $arr=[
                    'code'=>'300',
                    'msg'=>'信息错误',
                    'sult'=>[]
                ];
                return json_encode($arr,JSON_UNESCAPED_UNICODE);
            }
        }
    }

    /**
     * @param Request $request
     * 退出
     */
    public function out(Request $request){
        session(['user'=>null]);
        $request->session()->save();
        return redirect('/admin/login');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 用户展示
     */
    public function userlist(){
        $model=new Adminuser();
//        $res=$model::paginate(5);
        $res=$model::leftjoin('uret','adminuser.id','=','uret.uid')
            ->leftjoin('role','uret.rid','=','role.rid')
            ->where(['role.is_del'=>1])
            ->paginate(5);

        return view('admin.user.list',['res'=>$res]);
    }

    /**
     * 用户添加角色
     */
    public function userrole($id){
        $model=new Role();
        $res=$model::get();
        return view('admin.user.addrole',['res'=>$res,'id'=>$id]);
    }
    /**
     * 用户添加角色
     */
    public function roleadd(Request $request){
        $id=$request->post('uid');
//        dd($id);
        if(empty($id)){
            $arr=[
                'code'=>'300',
                'msg'=>'非法操作',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $rid=$request->post('rid');
        if(empty($rid)){
            $arr=[
                'code'=>'300',
                'msg'=>'非法操作',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
//        dd($rid);
        $model=new Uret();
        $ret=$model::where(['uid'=>$id])->first();
        if(!empty($ret)){
            $arr=[
                'code'=>'500',
                'msg'=>'角色已授权',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $model->uid=$id;
            $model->rid=$rid;
//            implode(',',$rid);
            if($model->save()){
                $arr=[
                    'code'=>'200',
                    'msg'=>'角色授权成功',
                    'sult'=>[]
                ];
                return json_encode($arr,JSON_UNESCAPED_UNICODE);
            }else{
                $arr=[
                    'code'=>'300',
                    'msg'=>'角色授权失败',
                    'sult'=>[]
                ];
                return json_encode($arr,JSON_UNESCAPED_UNICODE);
            }
        }

    }

}
