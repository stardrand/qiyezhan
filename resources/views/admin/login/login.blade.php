<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录-有点</title>
<link rel="stylesheet" type="text/css" href="../css/public.css" />
<link rel="stylesheet" type="text/css" href="../css/page.css" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/public.js"></script>
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
				<p class="p1">登录</p>
				<p class="p2">有点人员登录</p>
			</div>
			<!-- 输入框 -->
			<div class="lgD">
				<img class="img1" src="../img/logName.png" />
                <input type="text" placeholder="输入用户名" id="uname" />
			</div>
			<div class="lgD">
				<img class="img1" src="../img/logPwd.png" />
                <input type="password" placeholder="输入用户密码" id="pwd"/>
			</div>
            <div class="lgD">
                <a href="/admin/reg" class="p2">无账号？ 点我注册</a>
            </div>
			<div class="logC">
				<button id="loginadd">登 录</button>
			</div>
		</div>
	</div>
	<!-- 登录body  end -->

	<!-- 登录页面底部 -->
	<div class="logFoot">
		<p class="p1">版权所有：星灵网络科技有限公司</p>
		<p class="p2">星灵网络科技有限公司 登记序号：苏ICP备11003649号-2</p>
	</div>
	<!-- 登录页面底部end -->
</body>
</html>
<script>
	$(document).on('click','#loginadd',function(){
		var uname=$("#uname").val();
		var pwd=$("#pwd").val();
		$.ajax({
			url: "{{'/admin/loginadd'}}",
			type: 'post',
			data: {uname:uname,pwd:pwd},
			dataType: 'json',
			success: function (res) {
				if(res.code=='200'){
					window.location.href="{{'/admin'}}"
				}else{
					alert(res.msg);
				}
			}
		});
	});
</script>