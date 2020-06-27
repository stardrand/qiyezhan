<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言展示</title>
<link rel="stylesheet" type="text/css" href="../../css/css.css" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="../img/coin02.png" /><span><a href="/admin">首页</a>&nbsp;-&nbsp;<a
					href="#">留言管理</a>&nbsp;-</span>&nbsp;查看
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
							<td width="315px" class="tdColor">留言姓名</td>
							<td width="308px" class="tdColor">留言内容</td>
							<td width="215px" class="tdColor">留言表情</td>
							<td width="125px" class="tdColor">留言时间</td>
							<td width="125px" class="tdColor">操作</td>
						</tr>
						@foreach($data as $k=>$v)
						<tr>
							<td>{{$v['id']}}</td>
							<td>
								@foreach($res as $key=>$value)
									@if($v['u_id']==$value['id'])
									{{$value['username']}}
									@endif
								@endforeach
							</td>
							<td>{{$v['content']}}</td>
							<td>
                                @if($v['phiz']==1)
                                <img border="0" src="../images/face2.gif">
                                @elseif($v['phiz']==2)
                                <img border="0" src="../images/face1.gif">
                                @elseif($v['phiz']==3)
                                <img border="0" src="../images/face3.gif">
                                @elseif($v['phiz']==4)
                                <img border="0" src="../images/face4.gif">
                                @elseif($v['phiz']==5)
                                <img border="0" src="../images/face5.gif">
                                @elseif($v['phiz']==6)
                                <img border="0" src="../images/face6.gif">
                                @elseif($v['phiz']==7)
                                <img border="0" src="../images/face7.gif">
                                @elseif($v['phiz']==8)
                                <img border="0" src="../images/face8.gif">
                                @elseif($v['phiz']==9)
                                <img border="0" src="../images/face9.gif">
                                @elseif($v['phiz']==10)
                                <img border="0" src="../images/face10.gif">
                                @endif
							</td>
							<td>{{date("Y-m-d h:i:s",$v['voicetime'])}}</td>
							<td><a href="#"><img class="operation"
									src="../img/update.png"></a><img class="operation delban"
								src="../img/delete.png">
                            </td>
						</tr>
						@endforeach
					</table>
					<div class="paging pagination">{{ $data->links() }}</div>
				</div>
				<!-- banner 表格 显示 end-->
			</div>
			<!-- banner页面样式end -->
		</div>
	</div>

</body>
<script type="text/javascript">

</script>
</html>