<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>内容展示</title>
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
					href="#">内容管理</a>&nbsp;-</span>&nbsp;查看
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
							<td width="315px" class="tdColor">标题</td>
							<td width="308px" class="tdColor">分类</td>
                            <td width="308px" class="tdColor">来源</td>
                            <td width="308px" class="tdColor">内容</td>
							<td width="215px" class="tdColor">是否显示</td>
							<td width="180px" class="tdColor">排序</td>
							<td width="125px" class="tdColor">添加时间</td>
							<td width="125px" class="tdColor">操作</td>
						</tr>
						@foreach($data as $k=>$v)
						<tr uid="{{$v['id']}}">
                            <td>{{$v['id']}}</td>
							<td>{{$v['title_name']}}</td>

							<td>@foreach($res as $key=>$value)
                                @if($v['c_id']==$value['id'])
                                    {{$value['catname']}}
                                    @endif
                                @endforeach
                            </td>
							<td>{{$v['from']}}</td>
                            <td>{{$v['content']}}</td>
							<td class="is_show" show="{{$v['is_show']}}">
								@if($v['is_show']==1)
									是
								@elseif($v['is_show']==2)
									否
								@endif
							</td>
							<td><span class="zsort">{{$v['sorts']}}</span><input type="text" class="sorts" value="{{$v['sorts']}}"/></td>
							<td>{{date("Y-m-d h:i:s",$v['times'])}}</td>
							<td><a href="/title/update/{{$v['id']}}"><img class="operation"
									src="../img/update.png"></a><img class="operation delban"
								src="../img/delete.png"></td>
						</tr>
						@endforeach
					</table>
					<div class="paging pagination">{{$data->links()}}</div>
				</div>
				<!-- banner 表格 显示 end-->
			</div>
			<!-- banner页面样式end -->
		</div>
	</div>
</body>
<script type="text/javascript">
    $(document).on('click','.delban',function(){
        var id=$(this).parents('tr').attr('uid');
        console.log(id);
        if(confirm("你确定要删除此条记录吗？")){
            $.ajax({
                url: "/title/del",
                data: {id: id},
                dataType: "json",
                type: "post",
                success: function (res) {
//                    console.log(res);
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
$(document).on('click','.is_show',function(){
    var id=$(this).parents('tr').attr('uid');
    var is_show=$(this).attr('show');
    $.ajax({
        url: "{{'/title/dshow'}}",
        type: 'post',
        data: {is_show:is_show,id:id},
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

    //排序急点急改
    $(document).ready(function(){
        $('.sorts').hide();
        //显示文本框
        $(document).on('click','.zsort',function(){
            $(this).hide();
            $(this).next().show();
        });
        //失去焦点
        $(document).on('blur','.sorts',function(){
            var id=$(this).parents('tr').attr('uid');
            var sorts=$(this).val();
            $.ajax({
                url: "{{'/title/updatesort'}}",
                type: 'post',
                data: {sorts:sorts,id:id},
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
    });

</script>
</html>