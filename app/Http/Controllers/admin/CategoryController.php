<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Catgory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 分类添加页
     */
    public function add(){
        return view('admin.category.add');
    }

    /**
     * @param Request $request
     * 分类添加
     */
    public function adds(Request $request){
        $catname=$request->post('catname');
        if(empty($catname)){
            $arr=[
                'code'=>'300',
                'msg'=>'分类名称未填',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $catgory=$request->post('catgory');
        if(empty($catgory)){
            $arr=[
                'code'=>'300',
                'msg'=>'分类组序号未填',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $is_list=$request->post('is_list');
        $addtime=time();
        $model=new Catgory();
        $res=$model::where(['catname'=>$catname])->first();
        if(!empty($res)){
            $arr=[
                'code'=>'300',
                'msg'=>'该导航已存在',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $model->catname=$catname;
            $model->catgory=$catgory;
            $model->is_list=$is_list;
            $model->addtime=$addtime;
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
    public function lists(){
        $model=new Catgory();
        $res=$model::where(['is_del'=>1])->paginate(5);
//        dd($res);
        return view('admin.category.list',['res'=>$res]);
    }

    /**
     * @param Request $request
     * 删除
     */
    public function del(Request $request){
        $id=$request->post('id');
//        echo $id;
        $model=new Catgory();
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
        $model=new Catgory();
        $res=$model::where(['id'=>$id])->first()->toArray();
//        dd($res);
        return view('admin.category.catupdate',['res'=>$res]);
    }

    /**
     * @param Request $request
     * @return string
     * 修改
     */
    public function updates(Request $request){
        $catname=$request->post('catname');
//        dd($catname);
        if(empty($catname)){
            $arr=[
                'code'=>'300',
                'msg'=>'分类名称未填',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $catgory=$request->post('catgory');
        if(empty($catgory)){
            $arr=[
                'code'=>'300',
                'msg'=>'分类组序号未填',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $is_list=$request->post('is_list');
        $addtime=time();
        $id=$request->post('id');
        $model=new Catgory();
        $res=$model::where(['id'=>$id])->first();
        if(empty($res)){
            $arr=[
                'code'=>'400',
                'msg'=>'非法操作',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $res->catname=$catname;
            $res->catgory=$catgory;
            $res->is_list=$is_list;
            $res->addtime=$addtime;
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
    public function dshow(Request $request){
        $is_list=$request->post('is_list');
        $id=$request->post('id');
        if($is_list==1){
            $is_list=2;
        }else if($is_list==2){
            $is_list=1;
        }
        $model=new Catgory();
        $res=$model::where(['id'=>$id])->first();
        $res->is_list=$is_list;
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
     * @param Request $request
     * 排序急点急改
     */
    public function updatesort(Request $request){
        $id=$request->post('id');
        $sort=$request->post('sort');
        $model=new Catgory();
        $res=$model::where(['id'=>$id])->first();
        $res->sort=$sort;
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
