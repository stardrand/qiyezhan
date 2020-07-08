<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>权限展示</title>
<link rel="stylesheet" type="text/css" href="../css/css.css" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="../img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">权限管理</a>&nbsp;-</span>&nbsp;查看
			</div>
		</div>
		<div class="page">
			<!-- banner页面样式 -->
			<div class="banner">
				<!-- banner 表格 显示 -->
				<div class="banShow">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td width="66px" class="tdColor tdC">ID</td>
							<td width="125px" class="tdColor">权限名称</td>
                            <td width="125px" class="tdColor">路由</td>
							<td width="125px" class="tdColor">操作</td>
						</tr>
						@foreach($res as $k=>$v)
                        <tr pid="{{$v['pid']}}">
                            <td>{{$v['pid']}}</td>
                            <td>{{$v['pname']}}</td>
                            <td>{{$v['url']}}</td>
							<td><a href="/prev/update/{{$v['pid']}}"><img class="operation"
									src="../img/update.png"></a><img class="operation delban"
								src="../img/delete.png"></td>
						</tr>
						@endforeach
					</table>
					<div class="paging pagination">{{$res->links()}}</div>
				</div>
				<!-- banner 表格 显示 end-->
			</div>
			<!-- banner页面样式end -->
		</div>
	</div>
</body>
<script type="text/javascript">
    $(document).on('click','.delban',function(){
        var id=$(this).parents('tr').attr('pid');
        console.log(id);
        if(confirm("你确定要删除此条记录吗？")){
            $.ajax({
                url: "/prev/del",
                data: {id: id},
                dataType: "json",
                type: "post",
                success: function (res) {
                    if (res.code=='200') {
                        window.location = "";
                    } else {
                        alert(res.msg);
                    }
                }
            });
        }
    });



</script>
</html>