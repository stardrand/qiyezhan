<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改角色</title>
<link rel="stylesheet" type="text/css" href="../../css/css.css" />
<script type="text/javascript" src="../../js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="../../img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">角色管理</a>&nbsp;-</span>&nbsp;查看-修改
			</div>
		</div>
		<div class="page ">
			<!-- 会员注册页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>角色修改</span>
				</div>
				<div class="baBody">
					<input type="hidden" class="input3" value="{{$res['rid']}}" id="rid"/>
					<div class="bbD">
						角色名称：<input type="text" class="input3" value="{{$res['r_name']}}" id="rname"/>
					</div>
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" id="add">修改</button>
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
		var rid=$("#rid").val();
        var rname=$("#rname").val();
        $.ajax({
            url: "{{'/role/upd'}}",
            type: 'post',
            data: {rid:rid,rname:rname},
            dataType: 'json',
            success: function (res) {
                   if(res.code=='200'){
                     window.location.href="{{'/role/list'}}"
                   }else{
                       alert(res.msg);
                   }
            }
        });
	});
</script>