<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pret;
use App\Models\Prev;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 添加页
     */
    public function add(){
        return view('admin.role.add');
    }

    /**
     * @param Request $request
     * 添加
     */
    public function adds(Request $request){
        $rname=$request->post('rname');
        if(empty($rname)){
            $arr=[
                'code'=>'300',
                'msg'=>'角色名称未填',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $model=new Role();
        $res=$model::where(['r_name'=>$rname])->first();
        if(!empty($res)){
            $arr=[
                'code'=>'300',
                'msg'=>'该角色已存在',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $model->r_name=$rname;
            if($model->save()){
                $arr=[
                    'code'=>'200',
                    'msg'=>'添加角色成功',
                    'sult'=>[]
                ];
                return json_encode($arr,JSON_UNESCAPED_UNICODE);
            }else{
                $arr=[
                    'code'=>'300',
                    'msg'=>'添加角色失败',
                    'sult'=>[]
                ];
                return json_encode($arr,JSON_UNESCAPED_UNICODE);
            }
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 展示
     */
    public function lists(){
        $rue=new Pret();
        $det=new Prev();
        $data=new Role();
//        $res=$data::where(['is_del'=>1])->paginate(5);
//        return view('admin.role.list',['res'=>$res]);

        $role=$data::where(['is_del'=>1])->get()->toArray();
//        dd($role);
        foreach($role as $k=>$v){
                $pret=$rue::where(['rid'=>$v['rid']])->get('pid')->toArray();
//            dd($pret);
                $role[$k]['pid']=$pret[0]['pid'];
        }
//        dd($role);
        foreach($role as $k=>$v) {
            $role[$k]['pid'] = explode(',', $v['pid']);
        };
//        print_r($role);
            $prev=$det::where(['is_del'=>1])->get()->toArray();
//        print_r($prev);
        return view('admin.role.list',['res'=>$role,'prev'=>$prev]);
//        dd($role);


//        $res=$data::leftjoin('pret','role.rid','=','pret.rid')
//            ->leftjoin('prev','pret.pid','=','prev.pid')
//            ->where(['prev.is_del'=>1])
//            ->paginate(5);
//        return view('admin.role.list',['res'=>$res]);
//        dd($res);
    }

    /**
     * @param Request $request
     * 删除
     */
    public function del(Request $request){
        $id=$request->post('id');
        $model=new Role();
        $res=$model::where(['rid'=>$id])->first();
        $res->is_del=2;
        if($res->save()){
            $arr=[
                'code'=>'200',
                'msg'=>'',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $arr=[
                'code'=>'300',
                'msg'=>'系统错误',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * @param $id
     * 修改页
     */
    public function update($id){
        $model=new Role();
        $res=$model::where(['rid'=>$id])->first()->toArray();
        return view('admin.role.update',['res'=>$res]);
    }

    /**
     * @param Request $request
     * 修改
     */
    public function upd(Request $request){
        $id=$request->post('rid');
//        echo $id;exit;
        if(empty($id)){
            $arr=[
                'code'=>'300',
                'msg'=>'非法操作',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $r_name=$request->post('rname');
//        echo $r_name;exit;
        if(empty($r_name)){
            $arr=[
                'code'=>'300',
                'msg'=>'非法操作',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }

        $model=new Role();
        $res=$model::where(['rid'=>$id])->first();
        $res->r_name=$r_name;
        if($res->save()){
            $arr=[
                'code'=>'200',
                'msg'=>'修改成功',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $arr=[
                'code'=>'300',
                'msg'=>'修改失败',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
    }


    /**
     * 链接对应权限页面
     */
    public function prev($id){
        $model=new Prev();
        $res=$model::get()->toArray();
        return view('admin.role.addprev',['res'=>$res,'rid'=>$id]);
    }
    /**
     * 链接对应权限
     */
    public function prevadd(Request $request){
        $rid=$request->post('rid');
        if(empty($rid)){
            $arr=[
                'code'=>'300',
                'msg'=>'非法操作',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $pid=$request->post('pid');
        if(empty($pid)){
            $arr=[
                'code'=>'300',
                'msg'=>'非法操作',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $model=new Pret();
        $model->rid=$rid;
        $model->pid=implode(',',$pid);
        if($model->save()){
            $arr=[
                'code'=>'200',
                'msg'=>'赋权成功',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $arr=[
                'code'=>'300',
                'msg'=>'赋权失败',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
    }

}
