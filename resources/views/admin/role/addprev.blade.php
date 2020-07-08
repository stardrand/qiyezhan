<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>角色权限</title>
<link rel="stylesheet" type="text/css" href="../../css/css.css" />
<script type="text/javascript" src="../../js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="../../img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">角色权限</a>&nbsp;-</span>&nbsp;
			</div>
		</div>
		<div class="page ">
			<!-- 会员注册页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>角色权限添加</span>
				</div>
				<div class="baBody">
                    <input type="hidden" class="input3" id="rid" value="{{$rid}}"/>
					<div class="bbD">
						权限名称：
						<input type="checkbox" class="pid" value="*">所有权限
                        @foreach($res as $k=>$v)
                        <input type="checkbox" class="pid" value="{{$v['pid']}}">{{$v['pname']}}
                        @endforeach
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
        var rid=$("#rid").val();
        var pid=[];
        $(".pid:checked").each(function(i,n){
				pid.push(n.value);
        });
        $.ajax({
            url: "{{'/role/pret/add'}}",
            type: 'post',
            data: {rid:rid,pid:pid},
            dataType: 'json',
            success: function (res) {
                console.log(res);
                   if(res.code=='200'){
                       alert(res.msg);
                     window.location.href="{{'/role/list'}}"
                   }else{
                       window.location.href="{{'/role/prev/'}}"+rid;
                       alert(res.msg);
                   }
            }
        });
	});
</script>