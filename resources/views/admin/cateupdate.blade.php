<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改导航</title>
<link rel="stylesheet" type="text/css" href="../css/css.css" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="../img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">导航管理</a>&nbsp;-</span>&nbsp;查看修改
			</div>
		</div>
		<div class="page ">
			<!-- 会员注册页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>导航修改</span>
				</div>
                <input type="hidden" id="id" value="{{$res['id']}}" class="input3" />
				<div class="baBody">
					<div class="bbD">
						导航名称：<input type="text" id="catename" value="{{$res['catename']}}" class="input3" />
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						url：<input type="text" id="url" class="input3" value="{{$res['url']}}"/>
					</div>
					<div class="bbD">
                        &nbsp;&nbsp;
						是否显示：<input type="radio" name="is_show" value="1" {{$res['is_show']==1?'checked':''}} class="is_show" />是
						<input type="radio" name="is_show" value="2" {{$res['is_show']==2?'checked':''}} class="is_show" />否
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						排序：<input type="text" class="input3" value="{{$res['sort']}}" id="sort"/>
					</div>
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" id="updates">修改</button>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script>
	$(document).on('click','#updates',function(){
		var id=$("#id").val();
        var catename=$("#catename").val();
        var url=$("#url").val();
        var is_show=$(".is_show:checked").val();
        var sort=$("#sort").val();
        console.log(is_show);
        $.ajax({
            url: "{{'/updates'}}",
            type: 'post',
            data: {catename:catename,url:url,is_show:is_show,sort:sort,id:id},
            dataType: 'json',
            success: function (res) {
                   if(res.code=='200'){
                       if (confirm("修改成功")){
                           window.location.href="/catelist"
                       }
                   }else{
					   window.location.href="/update/"+id
                       alert(res.msg);
                   }
            }
        });
	});
</script>