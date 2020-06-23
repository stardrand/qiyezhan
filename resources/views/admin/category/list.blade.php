<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>分类展示</title>
<link rel="stylesheet" type="text/css" href="../css/css.css" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="../img/coin02.png" /><span><a href="/admin">首页</a>&nbsp;-&nbsp;<a
					href="#">分类管理</a>&nbsp;-</span>&nbsp;查看
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
							<td width="315px" class="tdColor">分页名称</td>
							<td width="308px" class="tdColor">分类组序号</td>
							<td width="215px" class="tdColor">是否显示</td>
							<td width="180px" class="tdColor">排序</td>
							<td width="125px" class="tdColor">添加时间</td>
							<td width="125px" class="tdColor">操作</td>
						</tr>
						@foreach($res as $k=>$v)
						<tr uid="{{$v['id']}}">
							<td>{{$v['id']}}</td>
							<td>{{$v['catname']}}</td>
							<td>{{$v['catgory']}}</td>
							<td class="is_list" list="{{$v['is_list']}}">
								@if($v['is_list']==1)
									是
								@elseif($v['is_list']==2)
									否
								@endif
							</td>
							<td>{{date("Y-m-d h:i:s",$v['addtime'])}}</td>
							<td><a href="/category/update/{{$v['id']}}"><img class="operation"
									src="../img/update.png"></a><img class="operation delban"
								src="../img/delete.png"></td>
						</tr>
						@endforeach
					</table>
					<div class="paging pagination">{{ $res->links() }}</div>
				</div>
				<!-- banner 表格 显示 end-->
			</div>
			<!-- banner页面样式end -->
		</div>
	</div>
	<!-- 删除弹出框 -->
	<div class="banDel">
		<div class="delete">
			<div class="close">
				<a><img src="../img/shanchu.png" /></a>
			</div>
			<p class="delP1">你确定要删除此条记录吗？</p>
			<p class="delP2">
				<a href="#" class="ok yes" onclick="del()">确定</a><a class="ok no">取消</a>
			</p>
		</div>
	</div>
	<!-- 删除弹出框  end-->
</body>
<script type="text/javascript">
    $(document).on('click','.delban',function(){
        var id=$(this).parents('tr').attr('uid');
//        console.log(id);
        if(confirm("你确定要删除此条记录吗？")){
            $.ajax({
                url: "/category/del",
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


//是否显示急点急改
$(document).on('click','.is_list',function(){
    var id=$(this).parents('tr').attr('uid');
    var is_list=$(this).attr('list');
    $.ajax({
        url: "{{'/category/dshow'}}",
        type: 'post',
        data: {is_list:is_list,id:id},
        dataType: 'json',
        success: function (res) {
            if(res.code=='200'){
                window.location.href=""
            }else{
                alert(res.msg);
            }
        }
    });
});
</script>
</html>