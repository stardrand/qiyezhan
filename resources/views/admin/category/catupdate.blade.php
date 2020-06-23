<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改分类</title>
<link rel="stylesheet" type="text/css" href="../../css/css.css" />
<script type="text/javascript" src="../../js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="../../img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">分页管理</a>&nbsp;-</span>&nbsp;查看修改
			</div>
		</div>
		<div class="page ">
			<!-- 会员注册页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>分类修改</span>
				</div>
                <input type="hidden" id="id" value="{{$res['id']}}" class="input3" />
				<div class="baBody">
					<div class="bbD">
						分类名称：<input type="text" id="catname" value="{{$res['catname']}}" class="input3" />
					</div>
					<div class="bbD">
						&nbsp;&nbsp;
						分类组序号：<input type="text" id="catgory" class="input3" value="{{$res['catgory']}}" />
					</div>
					<div class="bbD">
                        &nbsp;&nbsp;
						是否显示：<input type="radio" name="is_list" value="1" {{$res['is_list']==1?'checked':''}} class="is_list" />是
						<input type="radio" name="is_list" value="2" {{$res['is_list']==2?'checked':''}} class="is_list" />否
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
        var catname=$("#catname").val();
        var catgory=$("#catgory").val();
        var is_list=$(".is_list:checked").val();
        console.log(id);
        console.log(catname);
        console.log(catgory);
        console.log(is_list);
        console.log(sort);
        $.ajax({
            url: "{{'/category/updates'}}",
            type: 'post',
            data: {catgory:catgory,catname:catname,is_list:is_list,id:id},
            dataType: 'json',
            success: function (res) {
                   if(res.code=='200'){
                       if (confirm("修改成功")){
                           window.location.href="/category/list"
                       }
                   }else{
					   window.location.href="/category/update/"+id
                       alert(res.msg);
                   }
            }
        });
	});
</script>