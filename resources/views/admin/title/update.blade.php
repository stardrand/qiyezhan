<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改内容</title>
<link rel="stylesheet" type="text/css" href="../../css/css.css" />
<script type="text/javascript" src="../../js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="../../img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">内容管理</a>&nbsp;-</span>&nbsp;查看-修改
			</div>
		</div>
		<div class="page ">
			<!-- 会员注册页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>内容修改</span>
				</div>
				<div class="baBody">
					<input type="hidden" id="id" value="{{$data['id']}}" class="input3" />
					<div class="bbD">
						&nbsp;&nbsp;
						分类：<select name="c_id">
								<option value="">--请选择--</option>
								@foreach($res as $k=>$v)
								<option value="{{$v['id']}}" {{$v['id']==$data['c_id']?'selected':''}} class="c_id">{{$v['catname']}}</option>
								@endforeach
							</select>
					</div>
					<div class="bbD">
						标题：<input type="text" id="title_name" value="{{$data['title_name']}}" class="input3" />
					</div>
					<div class="bbD">
						来源：<input type="text" id="from" value="{{$data['from']}}" class="input3" />
					</div>
					<div class="bbD">
						&nbsp;&nbsp;
						内容：<textarea id="content">{{$data['content']}}</textarea>
					</div>
					<div class="bbD">
						是否显示：<input type="radio" name="is_show" value="1" {{$data['is_show']==1?'checked':''}} class="is_show" />是
								<input type="radio" name="is_show" value="2" {{$data['is_show']==2?'checked':''}} class="is_show" />否
					</div>
					<div class="bbD">
						排序：<input type="text" class="input3" value="{{$data['sorts']}}" id="sorts"/>
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
		var id=$("#id").val();
        var c_id=$(".c_id:selected").val();
		var title_name=$("#title_name").val();
		var from=$("#from").val();
		var content=$("#content").val();
		var is_show=$(".is_show:checked").val();
        var sorts=$("#sorts").val();
        console.log(id);
		console.log(c_id);
		console.log(title_name);
		console.log(from);
		console.log(content);
		console.log(is_show);
		console.log(sorts);
        $.ajax({
            url: "{{'/title/upd'}}",
            type: 'post',
            data: {id:id,c_id:c_id,title_name:title_name,from:from,content:content,is_show:is_show,sorts:sorts},
            dataType: 'json',
            success: function (res) {
//                console.log(res);
                   if(res.code=='200'){
                     window.location.href="{{'/title/list'}}"
                   }else{
                       alert(res.msg);
                   }
            }
        });
	});
</script>