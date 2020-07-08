<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加权限</title>
<link rel="stylesheet" type="text/css" href="../css/css.css" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="../img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">权限管理</a>&nbsp;-</span>&nbsp;添加
			</div>
		</div>
		<div class="page ">
			<!-- 会员注册页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>权限添加</span>
				</div>
				<div class="baBody">
					<div class="bbD">
						权限名称：<input type="text" class="input3" id="pname"/>
					</div>
					<div class="bbD">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						路由：<input type="text" class="input3" id="url"/>
					</div>
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" id="add">添加</button>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script>
	$(document).on('click','#add',function(){
        var pname=$("#pname").val();
		var url=$("#url").val();
        $.ajax({
            url: "{{'/prev/adds'}}",
            type: 'post',
            data: {pname:pname,url:url},
            dataType: 'json',
            success: function (res) {
                   if(res.code=='200'){
                     window.location.href="{{'/prev/list'}}"
                   }else{
                       alert(res.msg);
                   }
            }
        });
	});
</script>