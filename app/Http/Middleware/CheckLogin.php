<?php

namespace App\Http\Middleware;

use App\Models\Adminuser;
use App\Models\Pret;
use App\Models\Prev;
use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user=session('user');
        if(!$user){
            return redirect('/admin/login');
        }

        $url=$request->url();
        $url=substr($url,17);
        if($url!='/admin'){
            $uid=session('user.id');
            $Adminuser=new Adminuser();
            $uret=$Adminuser::leftjoin('uret','adminuser.id','=','uret.uid')
                ->leftjoin('role','uret.rid','=','role.rid')
                ->leftjoin('pret','role.rid','=','pret.rid')
                ->where('adminuser.id',$uid)->get()->toArray();
//        dd($uret);
            if($uret[0]['pid']!='*'){
                $pret=new Prev();
                foreach($uret as $k=>$v){
                    $uret[$k]['pid']=explode(',',$v['pid']);
                }
                foreach($uret as $k=>$v){
                    foreach($v['pid'] as $kk=>$vv){
                        $where=[
                            ['pid','=',$vv],
                            ['is_del','=',1]
                        ];
                        $rue[]=$pret::where($where)->get()->toArray();
                    }
                }
//                dd($rue);
                foreach($rue as $k=>$v){
                    $urls[]=$rue[$k][0]['url'];
                }
                if(!in_array($url,$urls)){
//                    echo "<script>alert('无权限访问')</script>";exit;
                    echo '没有权限访问';exit;
                }
//                dd($urls);
            }
        }

        return $next($request);
    }
}
