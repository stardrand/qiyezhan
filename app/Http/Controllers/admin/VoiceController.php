<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Voice;
use Illuminate\Http\Request;

class VoiceController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 展示
     */
    public function lists(){
        $model=new User();
        $res=$model::get()->toArray();
        $title=new Voice();
        $data=$title::paginate(5);
//        dd($data);
        return view('admin.voice.list',['res'=>$res,'data'=>$data]);
    }

}
