<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\Cate;
use App\Models\Catgory;
use App\Models\Title;
use App\Models\Voice;
use Illuminate\Http\Request;

class TitleController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 内容添加页
     */
    public function title(){
        return view('index.liuyan');
    }

    /**
     * @param Request $request
     * 内容添加
     */
    public function titleadd(Request $request){
        $phiz=$request->post('phiz');
        if(empty($phiz)){
            $arr=[
                'code'=>'300',
                'msg'=>'请选择表情',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $name=$request->post('name');
        if(empty($name)){
            $arr=[
                'code'=>'300',
                'msg'=>'请填写姓名',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $content=$request->post('content');
        if(empty($content)){
            $arr=[
                'code'=>'300',
                'msg'=>'留言内容未填',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }

        $model=new Voice();
        $model->u_id=session('indexuser_id');
        $model->name=$name;
        $model->phiz=$phiz;
        $model->content=$content;
        $model->viocetime=time();

        if($model->save()){
            $arr=[
                'code'=>'200',
                'msg'=>'留言成功',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $arr=[
                'code'=>'300',
                'msg'=>'留言错误',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }

    }
}
