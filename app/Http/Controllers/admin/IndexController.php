<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cate;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 后台首页
     */
    public function index(){
        return view('admin.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 导航添加页
     */
    public function cateadd(){
        return view('admin.cateadd');
    }

    /**
     * @param Request $request
     * 导航添加
     */
    public function cadd(Request $request){
        $catename=$request->post('catename');
        if(empty($catename)){
            $arr=[
                'code'=>'300',
                'msg'=>'导航名称未填',
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
        $is_show=$request->post('is_show');
        $sort=$request->post('sort');
        if(empty($sort)){
            $arr=[
                'code'=>'300',
                'msg'=>'排序未填',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $createtime=time();
        $model=new Cate();
        $res=$model::where(['catename'=>$catename])->first();
        if(!empty($res)){
            $arr=[
                'code'=>'300',
                'msg'=>'该导航已存在',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $model->catename=$catename;
            $model->url=$url;
            $model->is_show=$is_show;
            $model->sort=$sort;
            $model->createtime=$createtime;
            if($model->save()){
                $arr=[
                    'code'=>'200',
                    'msg'=>'添加成功',
                    'sult'=>[]
                ];
                return json_encode($arr,JSON_UNESCAPED_UNICODE);
            }else{
                $arr=[
                    'code'=>'300',
                    'msg'=>'添加失败',
                    'sult'=>[]
                ];
                return json_encode($arr,JSON_UNESCAPED_UNICODE);
            }
        }


    }

    /**
     * 展示页
     */
    public function catelist(){
        $model=new Cate();
        $res=$model::where(['is_del'=>1])->orderByRaw('sort desc')->paginate(5);
//        paginate(5)
//        dd($res);
        return view('admin.catelist',['res'=>$res]);
    }

    /**
     * @param Request $request
     * 删除
     */
    public function del(Request $request){
        $id=$request->post('id');
//        echo $id;
        $model=new Cate();
        $res=$model::where(['id'=>$id])->first();
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
     * 修改
     */
    public function update($id){
        $model=new Cate();
        $res=$model::where(['id'=>$id])->first()->toArray();
//        dd($res);
        return view('admin.cateupdate',['res'=>$res]);
    }

    /**
     * @param Request $request
     * @return string
     * 修改
     */
    public function updates(Request $request){
        $catename=$request->post('catename');
        if(empty($catename)){
            $arr=[
                'code'=>'300',
                'msg'=>'导航名称未填',
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
        $is_show=$request->post('is_show');
        $sort=$request->post('sort');
        if(empty($sort)){
            $arr=[
                'code'=>'300',
                'msg'=>'排序未填',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $createtime=time();
        $id=$request->post('id');
        $model=new Cate();
        $res=$model::where(['id'=>$id])->first();
        if(empty($res)){
            $arr=[
                'code'=>'400',
                'msg'=>'非法操作',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $res->catename=$catename;
            $res->url=$url;
            $res->is_show=$is_show;
            $res->sort=$sort;
            $res->createtime=$createtime;
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

    /**
     * 是否展示急点急改
     */
    public function dianshow(Request $request){
        $is_show=$request->post('is_show');
        $id=$request->post('id');
        if($is_show==1){
            $is_show=2;
        }else if($is_show==2){
            $is_show=1;
        }
        $model=new Cate();
        $res=$model::where(['id'=>$id])->first();
        $res->is_show=$is_show;
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
}
