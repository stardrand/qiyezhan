<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户角色</title>
<link rel="stylesheet" type="text/css" href="../../css/css.css" />
<script type="text/javascript" src="../../js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="../../img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">用户角色</a>&nbsp;-</span>&nbsp;
			</div>
		</div>
		<div class="page ">
			<!-- 会员注册页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>用户角色添加</span>
				</div>
				<div class="baBody">
                    <input type="hidden" class="input3" id="uid" value="{{$id}}"/>
					<div class="bbD">
						角色名称：
                        @foreach($res as $k=>$v)
                        <input type="radio" class="rid" name="rid" value="{{$v['rid']}}">{{$v['r_name']}}
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
        var uid=$("#uid").val();
        var rid=$(".rid:checked").val();
//        var rid=[];
//        $(".rid:checked").each(function(i,n){
//				rid.push(n.value);
//        });
        $.ajax({
            url: "{{'/user/userrole'}}",
            type: 'post',
            data: {uid:uid,rid:rid},
            dataType: 'json',
            success: function (res) {
                if(res.code=='200'){
                    alert(res.msg);
                    window.location.href="{{'/user/userlist'}}"
                }else if(res.code=='500'){
                    alert(res.msg);
                    window.location.href="{{'/user/userlist'}}"
                }else{
                    window.location.href="{{'/user/roleadd/'}}"+uid;
                    alert(res.msg);
                }
            }
        });
	});
</script>