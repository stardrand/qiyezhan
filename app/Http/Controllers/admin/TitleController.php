<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cate;
use App\Models\Catgory;
use App\Models\Title;
use Illuminate\Http\Request;

class TitleController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 内容添加页
     */
    public function add(){
        $model=new Catgory();
        $res=$model::get()->toArray();
//        dd($res);
        return view('admin.title.add',['res'=>$res]);
    }

    /**
     * @param Request $request
     * 内容添加
     */
    public function adds(Request $request){
        $c_id=$request->post('c_id');
        if(empty($c_id)){
            $arr=[
                'code'=>'300',
                'msg'=>'分类为选择未填',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $title_name=$request->post('title_name');
        if(empty($title_name)){
            $arr=[
                'code'=>'300',
                'msg'=>'标题未填',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $from=$request->post('from');
        if(empty($from)){
            $arr=[
                'code'=>'300',
                'msg'=>'来源未填',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $content=$request->post('content');
        if(empty($content)){
            $arr=[
                'code'=>'300',
                'msg'=>'内容未填',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $is_show=$request->post('is_show');
        $sorts=$request->post('sorts');
        if(empty($sorts)){
            $arr=[
                'code'=>'300',
                'msg'=>'排序未填',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $times=time();
        $model=new Title();
        $res=$model::where(['title_name'=>$title_name])->first();
        if(!empty($res)){
            $arr=[
                'code'=>'300',
                'msg'=>'该内容已存在',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $model->c_id=$c_id;
            $model->title_name=$title_name;
            $model->from=$from;
            $model->content=$content;
            $model->is_show=$is_show;
            $model->sorts=$sorts;
            $model->times=$times;
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 展示
     */
    public function lists(){
        $model=new Catgory();
        $res=$model::get()->toArray();
        $title=new Title();
        $data=$title::where(['is_del'=>1])->orderByRaw('sorts desc')->paginate(5);
        return view('admin.title.list',['res'=>$res,'data'=>$data]);
    }

    /**
     * @param Request $request
     * 删除
     */
    public function del(Request $request){
        $id=$request->post('id');
//        echo $id;
        $model=new Title();
        $res=$model::where(['id'=>$id])->first();
//        dd($res);
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
     * 是否展示急点急改
     */
    public function dshow(Request $request){
        $is_show=$request->post('is_show');
        $id=$request->post('id');
        if($is_show==1){
            $is_show=2;
        }else if($is_show==2){
            $is_show=1;
        }
        $model=new Title();
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

    /**
     * @param Request $request
     * 排序
     */
    public function updatesort(Request $request){
        $id=$request->post('id');
        $sorts=$request->post('sorts');
        $model=new Title();
        $res=$model::where(['id'=>$id])->first();
        $res->sorts=$sorts;
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
        $model=new Catgory();
        $res=$model::get()->toArray();
        $title=new Title();
        $data=$title::where(['id'=>$id])->first()->toArray();
        return view('admin.title.update',['data'=>$data,'res'=>$res]);
    }

    /**
     * @param Request $request
     * 修改
     */
    public function upd(Request $request){
        $id=$request->post('id');
        if(empty($id)){
            $arr=[
                'code'=>'300',
                'msg'=>'非法操作',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $c_id=$request->post('c_id');
        if(empty($c_id)){
            $arr=[
                'code'=>'300',
                'msg'=>'分类为选择未填',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $title_name=$request->post('title_name');
        if(empty($title_name)){
            $arr=[
                'code'=>'300',
                'msg'=>'标题未填',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $from=$request->post('from');
        if(empty($from)){
            $arr=[
                'code'=>'300',
                'msg'=>'来源未填',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $content=$request->post('content');
        if(empty($content)){
            $arr=[
                'code'=>'300',
                'msg'=>'内容未填',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $is_show=$request->post('is_show');
        $sorts=$request->post('sorts');
        if(empty($sorts)){
            $arr=[
                'code'=>'300',
                'msg'=>'排序未填',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }

        $times=time();
        $model=new Title();
        $res=$model::where(['id'=>$id])->first();
//        dd($res);
        $res->c_id=$c_id;
        $res->title_name=$title_name;
        $res->from=$from;
        $res->content=$content;
        $res->is_show=$is_show;
        $res->sorts=$sorts;
        $res->times=$times;
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
