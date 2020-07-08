<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\Cate;
use App\Models\Catgory;
use App\Models\Title;
use App\Models\Voice;
use Illuminate\Http\Request;

class VueController extends Controller
{
    public function cate(){
        //导航
        $model=new Cate();
        $cate=$model::where(['is_show'=>1,'is_del'=>1])->get()->toArray();
        //分类
        $category=new Catgory();
        $gory=$category::where(['is_list'=>1,'is_del'=>1])->get()->toArray();
        //内容
        $title=new Title();
        $titleinfo=$title::where(['c_id'=>$gory[0]['id']])->limit(5)->get()->toArray();

        $res=[
            'cate'=>$cate,
            'gory'=>$gory,
            'title'=>$titleinfo,
        ];
        return json_encode($res,JSON_UNESCAPED_UNICODE);
    }

    public function titlesou(Request $request){
        $c_id=$request->post('c_id');
        $title=new Title();
        $titleinfo=$title::where(['c_id'=>$c_id])->limit(5)->get()->toArray();
        return json_encode($titleinfo,JSON_UNESCAPED_UNICODE);
    }
}
