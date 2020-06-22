<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加导航</title>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">导航管理</a>&nbsp;-</span>&nbsp;添加
			</div>
		</div>
		<div class="page ">
			<!-- 会员注册页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>导航添加</span>
				</div>
				<div class="baBody">
					<div class="bbD">
						导航名称：<input type="text" id="catename" class="input3" />
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						url：<input type="text" id="url" class="input3" />
					</div>
					<div class="bbD">
                        &nbsp;&nbsp;
						是否显示：<input type="radio" name="is_show" value="1" checked class="is_show" />是
						<input type="radio" name="is_show" value="2" class="is_show" />否
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						排序：<input type="text" class="input3" id="sort"/>
					</div>
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" id="cateadd">添加</button>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script>
	$(document).on('click','#cateadd',function(){
        var catename=$("#catename").val();
        var url=$("#url").val();
        var is_show=$(".is_show:checked").val();
        var sort=$("#sort").val();
//        console.log(is_show);
        $.ajax({
            url: "{{'/cadd'}}",
            type: 'post',
            data: {catename:catename,url:url,is_show:is_show,sort:sort},
            dataType: 'json',
            success: function (res) {
//                console.log(res);
                   if(res.code=='200'){
                     window.location.href="{{'/catelist'}}"
                   }else{
                       alert(res.msg);
                   }
            }
        });
	});
</script>