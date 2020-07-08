<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Prev;
use Illuminate\Http\Request;

class PrevController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 添加页
     */
    public function add(){
        return view('admin.prev.add');
    }

    /**
     * @param Request $request
     * 添加
     */
    public function adds(Request $request){
        $pname=$request->post('pname');
        if(empty($pname)){
            $arr=[
                'code'=>'300',
                'msg'=>'角色名称未填',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $url=$request->post('url');
        if(empty($url)){
            $arr=[
                'code'=>'300',
                'msg'=>'url未填',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $model=new Prev();
        $res=$model::where(['pname'=>$pname])->first();
        if(!empty($res)){
            $arr=[
                'code'=>'300',
                'msg'=>'该权限已存在',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $model->pname=$pname;
            $model->url=$url;
            if($model->save()){
                $arr=[
                    'code'=>'200',
                    'msg'=>'添加权限成功',
                    'sult'=>[]
                ];
                return json_encode($arr,JSON_UNESCAPED_UNICODE);
            }else{
                $arr=[
                    'code'=>'300',
                    'msg'=>'添加权限失败',
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
        $data=new Prev();
        $res=$data::where(['is_del'=>1])->paginate(5);
        return view('admin.prev.list',['res'=>$res]);
    }

    /**
     * @param Request $request
     * 删除
     */
    public function del(Request $request){
        $id=$request->post('id');
        $model=new Prev();
        $res=$model::where(['pid'=>$id])->first();
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
        $model=new Prev();
        $res=$model::where(['pid'=>$id])->first()->toArray();
        return view('admin.prev.update',['res'=>$res]);
    }

    /**
     * @param Request $request
     * 修改
     */
    public function upd(Request $request){
        $id=$request->post('pid');
//        echo $id;exit;
        if(empty($id)){
            $arr=[
                'code'=>'300',
                'msg'=>'非法操作',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $pname=$request->post('pname');
        if(empty($pname)){
            $arr=[
                'code'=>'300',
                'msg'=>'非法操作',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $url=$request->post('url');
        if(empty($url)){
            $arr=[
                'code'=>'300',
                'msg'=>'非法操作',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }

        $model=new Prev();
        $res=$model::where(['pid'=>$id])->first();
        $res->pname=$pname;
        $res->url=$url;
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
}
