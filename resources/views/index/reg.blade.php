<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册</title>
<link rel="stylesheet" type="text/css" href="../css/public.css" />
<link rel="stylesheet" type="text/css" href="../css/page.css" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/public.js"></script>
<script type="text/javascript" src="../js/vue.js"></script>
<script src="https://cdn.staticfile.org/axios/0.18.0/axios.min.js"></script>
</head>
<body>

	<!-- 登录页面头部 -->
	<div class="logHead">
		<img src="../img/logLOGO.png" />
	</div>
	<!-- 登录页面头部结束 -->

	<!-- 登录body -->
	<div class="logDiv">
		<img class="logBanner" src="../img/logBanner.png" />
		<div class="logGet">
			<!-- 头部提示信息 -->
			<div class="logD logDtip">
				<p class="p1">注册</p>
				<p class="p2">有点人员注册</p>
			</div>
			<!-- 输入框 -->
            <div id="use">
			    <div class="lgD">
			    	<img class="img1" src="../img/logName.png" />
                    <input type="text" v-model="username" placeholder="输入用户名" />
			    </div>
			    <div class="lgD">
			    	<img class="img1" src="../img/logPwd.png" />
                    <input type="password" v-model="pwd" placeholder="输入用户密码" />
			    </div>
                <div class="lgD">
                    <a href="/index/login" class="p2">已有账号？ 点我登录</a>
                </div>
			    <div class="logC">
			    	<button type="button" @click="reg"> 注 册</button>
                    {{--<input type="button" @click="reg" value="注 册">--}}
			    </div>
            </div>
		</div>
	</div>
	<!-- 登录body  end -->
	<!-- 登录页面底部 -->
	<div class="logFoot">
		<p class="p1">版权所有：星灵网络科技有限公司</p>
		<p class="p2">星灵网络科技有限公司 登记序号：苏ICP备11003578号-2</p>
	</div>
	<!-- 登录页面底部end -->
</body>
</html>
<script>
    new Vue({
        el:"#use",
        data:{
            username:null,
            pwd:null,
        },
        methods:{
            reg:function(){
                var username=this.username;
                var pwd=this.pwd;
                var url="/index/regadd";
                var date={
                    username:username,
                    pwd:pwd,
                };
                console.log(date);
                axios.post(url,date).then(function(res){
//                    console.log(res);
                    if(res.data.code=='200'){
                        window.location.href = "/index/login";
                    }else{
                        alert(res.data.msg);
                    }
                });
            }
        }
    });
</script>