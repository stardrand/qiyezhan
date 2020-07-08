﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>简洁大气政府机关对外新闻资讯门户网站模板</title>
<meta name="keywords" content="简洁大气,政府机关,对外,新闻资讯,门户网站模板" />
<meta name="description" content="简洁大气政府机关对外新闻资讯门户网站模板下载。下载文件包含首页、列表页、详情页、留言页等4张HTML静态网页模板。" /> 
<meta name="author" content="js代码(www.jsdaima.com)" />
<meta name="copyright" content="js代码(www.jsdaima.com)" />
<link href="css/base.css" rel="stylesheet" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<link href="css/jquery.slideBox.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.slideBox.min.js" type="text/javascript"></script>
<script type="text/javascript"  src="js/nav.js"></script>
    <script type="text/javascript" src="../js/vue.js"></script>
    <script src="https://cdn.staticfile.org/axios/0.18.0/axios.min.js"></script>
<script>
//jQuery(function($){
//	$('#newspic').slideBox({
//		duration : 0.3,//滚动持续时间，单位：秒
//		easing : 'linear',//swing,linear//滚动特效
//		delay : 5,//滚动延迟时间，单位：秒
//		hideClickBar : false,//不自动隐藏点选按键
//		clickBarRadius : 10
//	});
//});
</script>
</head>
<body>
<div id="cate">
<div class="header">
  <div class="container">
    <div id="weather"></div>
    <div class="toptxt"><a href="/index/login">登陆</a>|<a href="/index/reg">注册</a><a href="#">加入收藏</a><a href="#">设为首页</a></div>
    <div class="logo"><a href="#"><img src="images/logo.png" /></a></div>
    <div class="search">
      <input type="text" class="ipt-sea" placeholder="请输入搜索关键词" />
      <a href="javascript:;">搜索</a> </div>
  </div>
</div>


{{--导航--}}
<div class="nav">
  <ul class="" id="navul">
      <li class="active" ><a href="#">首页</a></li>
    <li v-for="cate in catedata"><a href="${cate['url']}">${cate['catename']}</a></li>
  </ul>
</div>


<script  type="text/javascript"> 
$(".navbg").capacityFixed();
</script>
<div class="container container_col">
  <div class="news-notice">
    <div class="indnews">
      <div class="news-pic">
        <div id="newspic" class="slideBox">
          <ul class="items">
            <li><a href="#" title="本会召开第一届第一次主任会议和委员会议1"><img src="upload/newsimg.jpg"></a></li>
            <li><a href="#" title="本会召开第一届第一次主任会议和委员会议2"><img src="upload/newsimg.jpg"></a></li>
            <li><a href="#" title="本会召开第一届第一次主任会议和委员会议3"><img src="upload/newsimg.jpg"></a></li>
            <li><a href="#" title="本会召开第一届第一次主任会议和委员会议4"><img src="upload/newsimg.jpg"></a></li>
            <li><a href="#" title="本会召开第一届第一次主任会议和委员会议5"><img src="upload/newsimg.jpg"></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="news-txt" id="news">

        {{--分类--}}
      <div class="news-title">
        <div class="news-name tab-nav j-tab-nav">
        	<a href="javascript:void(0);" class="current" v-for="init in category" @click="cateinfo">
            <input type="hidden" value="${init['id']}">${init['catname']}<i></i></a>
        </div>
        <a href="#" class="more">更多 >></a>
      </div>


      <div class="tab-con">
      <div class="j-tab-con">
      <div class="tab-con-item news-con" style="display: block;">
        <div class="hotnews">
          <h1>${titledate[0]['title_name']}</h1>
          <div class="hotcon"><a href="#">${titledate[0]['content']}</a></div>
        </div>
        <ul class="newslist" v-for="title in titledate">
          <li><a href="#">${title['title_name']}</a><span>date("Y-m-d H:i:s",${title['times']})</span></li>
        </ul>
      </div>
      <div class="tab-con-item news-con" style="display: none;">
        <div class="hotnews">
          <h1>2本会召开第一届第一次主任会议和委员会议</h1>
          <div class="hotcon"><a href="#">2017年2月20日，中卫仲裁委员会召开了中卫仲裁委员会第一届第一次主任会议和第一届第一次委员会议。会议由中卫市委常委、副市长、中卫仲裁委员会主任袁诗鸣主持。副主任李斌、郝正智、姜丽丽，委员盛建宁、张学文、俞正荣、李宝庆、王占强等出席了会议...</a></div>
        </div>
        <ul class="newslist">
          <li><a href="#">本会开展加强仲裁工作推进会议</a><span>09-10</span></li>
          <li><a href="#">本会召开第一届仲裁员聘任会议</a><span>09-10</span></li>
          <li><a href="#">本会与市中级人民法院就建立仲裁与诉讼衔接机制召开座谈会</a><span>09-10</span></li>
          <li><a href="#">宁夏仲裁工作座谈会在我市召开</a><span>09-10</span></li>
          <li><a href="#">"一带一路"仲裁发展交流会在我市召开</a><span>09-10</span></li>
        </ul>
      </div>
      <div class="tab-con-item news-con" style="display: none;">
        <div class="hotnews">
          <h1>3本会召开第一届第一次主任会议和委员会议</h1>
          <div class="hotcon"><a href="#">2017年2月20日，中卫仲裁委员会召开了中卫仲裁委员会第一届第一次主任会议和第一届第一次委员会议。会议由中卫市委常委、副市长、中卫仲裁委员会主任袁诗鸣主持。副主任李斌、郝正智、姜丽丽，委员盛建宁、张学文、俞正荣、李宝庆、王占强等出席了会议...</a></div>
        </div>
        <ul class="newslist">
          <li><a href="#">本会开展加强仲裁工作推进会议</a><span>09-10</span></li>
          <li><a href="#">本会召开第一届仲裁员聘任会议</a><span>09-10</span></li>
          <li><a href="#">本会与市中级人民法院就建立仲裁与诉讼衔接机制召开座谈会</a><span>09-10</span></li>
          <li><a href="#">宁夏仲裁工作座谈会在我市召开</a><span>09-10</span></li>
          <li><a href="#">"一带一路"仲裁发展交流会在我市召开</a><span>09-10</span></li>
        </ul>
      </div>
      <div class="tab-con-item news-con" style="display: none;">
        <div class="hotnews">
          <h1>4本会召开第一届第一次主任会议和委员会议</h1>
          <div class="hotcon"><a href="#">2017年2月20日，中卫仲裁委员会召开了中卫仲裁委员会第一届第一次主任会议和第一届第一次委员会议。会议由中卫市委常委、副市长、中卫仲裁委员会主任袁诗鸣主持。副主任李斌、郝正智、姜丽丽，委员盛建宁、张学文、俞正荣、李宝庆、王占强等出席了会议...</a></div>
        </div>
        <ul class="newslist">
          <li><a href="#">本会开展加强仲裁工作推进会议</a><span>09-10</span></li>
          <li><a href="#">本会召开第一届仲裁员聘任会议</a><span>09-10</span></li>
          <li><a href="#">本会与市中级人民法院就建立仲裁与诉讼衔接机制召开座谈会</a><span>09-10</span></li>
          <li><a href="#">宁夏仲裁工作座谈会在我市召开</a><span>09-10</span></li>
          <li><a href="#">"一带一路"仲裁发展交流会在我市召开</a><span>09-10</span></li>
        </ul>
      </div>
      
      </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="fwzn">
    <div class="tit">服<br />
      务<br />
      指<br />
      南</div>
    <div class="iconlist"> <a href="#" class="icon1">
      <div class="pic"><img src="images/zhinan01.png" /></div>
      <p>仲裁须知</p>
      </a>
      <a href="#" class="icon1">
      <div class="pic"><img src="images/zhinan06.png" /></div>
      <p>受案范围</p>
      </a>
       <a href="#" class="icon2">
      <div class="pic"><img src="images/zhinan02.png" /></div>
      <p>立案提交材料</p>
      </a> <a href="#" class="icon3">
      <div class="pic"><img src="images/zhinan03.png" /></div>
      <p>财产及证据保全</p>
      </a> <a href="#" class="icon5">
      <div class="pic"><img src="images/zhinan05.png" /></div>
      <p>仲裁程序</p>
      </a> <a href="#" class="icon6">
      <div class="pic"><img src="images/zhinan04.png" /></div>
      <p>仲裁条款</p>
      </a> <a href="#" class="icon7">
      <div class="pic"><img src="images/zhinan07.png" /></div>
      <p>常用文书</p>
      </a> </div>
  </div>
  <div class="col-box">
    <div class="news-txt col-3">
      <div class="news-title">
        <div class="name">仲裁规则<i></i></div>
        <div class="smalllist"> <a href="#">仲裁规则</a> <a href="#">法律法规</a> <a href="#">统计数据</a> </div>
        <a href="#" class="more">更多 >></a> </div>
      <div class="news-con">
        <ul class="newslist">
          <li><a href="#">本会开展加强仲裁工作推进会议</a><span>09-10</span></li>
          <li><a href="#">本会召开第一届仲裁员聘任会议</a><span>09-10</span></li>
          <li><a href="#">本会与市中级人民法院就建立仲裁与诉讼衔接机制召开座谈会</a><span>09-10</span></li>
          <li><a href="#">宁夏仲裁工作座谈会在我市召开</a><span>09-10</span></li>
          <li><a href="#">“一带一路”仲裁发展交流会在我市召开</a><span>09-10</span></li>
          <li><a href="#">宁夏仲裁工作座谈会在我市召开</a><span>09-10</span></li>
        </ul>
      </div>
    </div>
    <div class="news-txt col-3">
      <div class="news-title">
        <div class="name">仲裁员<i></i></div>
        <div class="smalllist"> <a href="#">仲裁员名册</a> <a href="#">仲裁员守则</a> </div>
        <a href="#" class="more">更多 >></a> </div>
      <div class="news-con">
        <ul class="newslist">
          <li><a href="#">本会开展加强仲裁工作推进会议</a><span>09-10</span></li>
          <li><a href="#">本会召开第一届仲裁员聘任会议</a><span>09-10</span></li>
          <li><a href="#">本会与市中级人民法院就建立仲裁与诉讼衔接机制召开座谈会</a><span>09-10</span></li>
          <li><a href="#">宁夏仲裁工作座谈会在我市召开</a><span>09-10</span></li>
          <li><a href="#">“一带一路”仲裁发展交流会在我市召开</a><span>09-10</span></li>
          <li><a href="#">宁夏仲裁工作座谈会在我市召开</a><span>09-10</span></li>
        </ul>
      </div>
    </div>
    <div class="news-txt col-3 last">
      <div class="news-title">
        <div class="name">法律法规<i></i></div>
        <a href="#" class="more">更多 >></a> </div>
      <div class="news-con">
        <ul class="newslist">
          <li><a href="#">本会开展加强仲裁工作推进会议</a><span>09-10</span></li>
          <li><a href="#">本会召开第一届仲裁员聘任会议</a><span>09-10</span></li>
          <li><a href="#">本会与市中级人民法院就建立仲裁与诉讼衔接机制召开座谈会</a><span>09-10</span></li>
          <li><a href="#">宁夏仲裁工作座谈会在我市召开</a><span>09-10</span></li>
          <li><a href="#">“一带一路”仲裁发展交流会在我市召开</a><span>09-10</span></li>
          <li><a href="#">宁夏仲裁工作座谈会在我市召开</a><span>09-10</span></li>
        </ul>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="col-box">
    <div class="col-2-l">
      <div class="tit">在线服务</div>
      <div class="list"> 
        <div class="ct">
          <a href="#" class="color_bj color-1"><div class="pic"><img src="images/zxfw1.png" /></div><p>注册登记</p></a>
        </div>
        <div class="ct">
          <a href="#" class="color_bj color-2"><div class="pic"><img src="images/zxfw2.png" /></div><p>在线立案</p></a>
        </div>
        <div class="ct">
          <a href="#" class="color_bj color-3"><div class="pic"><img src="images/zxfw3.png" /></div><p>在线审批</p></a>
        </div>
        <div class="ct">
          <a href="#" class="color_bj color-4"><div class="pic"><img src="images/zxfw4.png" /></div><p>在线咨询</p></a>
        </div>
        <div class="ct">
          <a href="#" class="color_bj color-5"><div class="pic"><img src="images/zxfw5.png" /></div><p>在线调解</p></a>
        </div>
        <div class="ct">
          <a href="#" class="color_bj color-6"><div class="pic"><img src="images/zxfw6.png" /></div><p>在线查询</p></a>
        </div>
        <div class="ct last">
          <a href="#" class="color_bj color-7"><div class="pic"><img src="images/zxfw7.png" /></div><p>电子送达</p></a>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    
    
  </div>
  <div class="col-box">
    <div class="col-2-r">
      <div class="tit">格式合同</div>
      <div class="tit" style="margin-left:307px;">示范条款</div>
      <div class="tit" style="margin-left:420px; background: url(images/jsq2.png) 0 9px no-repeat;">费用速算</div>
      <div class="clearfix"></div>
      <div class="sfbox">
      	<div class="gsht">
        	<ul class="newslist htlist">
          <li><a href="#">本会开展加强仲裁工作推进会议</a><span>09-10</span></li>
          <li><a href="#">本会召开第一届仲裁员聘任会议</a><span>09-10</span></li>
          <li><a href="#">本会与市中级人民法院就建立仲裁与诉讼衔接机制召开座谈会</a><span>09-10</span></li>
          <li><a href="#">宁夏仲裁工作座谈会在我市召开</a><span>09-10</span></li>
          <li><a href="#">"一带一路"仲裁发展交流会在我市召开</a><span>09-10</span></li>
          <li><a href="#">宁夏仲裁工作座谈会在我市召开</a><span>09-10</span></li>
        </ul>
        </div>
        <div class="sftxt">
          <div class="info">将民商事案子发展到仲裁机构办理有四种办法：<br />
            ①在合同中写上以上条款若发生纠纷提交仲裁机构仲裁的条款；<br />
            ②后来补充仲裁协议；<br />
            ③临时邀请仲裁；<br />
            ④在签订合同的同时就约定先予仲裁。<br />
            其中第一种是最基本方式。<br />
            根据《中华人民共和国仲裁法》和《最高人民法院关于适用（中华人民共和国仲裁法）》相关规定中华人民共和国仲裁法中华人民共和国仲裁法中华人民共和国仲裁法中华人民共和国仲裁法中华人民共和国仲裁法</div>
          <a href="#">[查看详情]</a> </div>
        <div class="jisuan">
          <div class="jsbox"> <span>争议金额</span>
            <div class="jsq">
              <input type="text" class="ipt-jsq" placeholder="输入金额..." />
              <a href="javascript:;">计算</a> </div>
          </div>
          <div class="jsjg">
            <div class="tab">案件受理费：<span>0.00元</span></div>
            <div class="tab">案件处理费：<span>0.00元</span></div>
            <div class="tab last">总计：<span>0.00元</span></div>
          </div>
          <div class="smtxt">仅供参考，计算结果以立案室的计算为准</div>
          <div class="xxlinks"> <a href="#" class="fl">案件受理费标准>></a> <a href="#" class="fr">案件处理费标准>></a> </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="clearfix"></div>
    
    
  </div>
  <div class="linksbox" id="link">
    <div class="txtlisttit linktit"> <span>友情链接</span>
      <div class="tab-nav j-tab-nav"> <a href="javascript:void(0);" class="current">省内各州市网站</a> <a href="javascript:void(0);" class="">州内各县市网站</a> <a href="javascript:void(0);" class="">党群部门</a> <a href="javascript:void(0);" class="">政府部门</a> <a href="javascript:void(0);" class="">乡镇部门</a> </div>
    </div>
    <div class="listcon tab-con">
      <div class="j-tab-con">
        <div class="tab-con-item linkcon" style="display: block;">
          <ul class="linkslist">
            <li><a href="#" target="_blank">市政府官方</a></li>
            <li><a href="#" target="_blank">市市政府官方政府官方</a></li>
            <li><a href="#" target="_blank">市政府官方</a></li>
            <li><a href="#" target="_blank">市政府官方</a></li>
            <li><a href="#" target="_blank">市政府官方</a></li>
            <li><a href="#" target="_blank">市政府官方</a></li>
            <li><a href="#" target="_blank">市政府官方</a></li>
            <li><a href="#" target="_blank">市政府官方</a></li>
            <li><a href="#" target="_blank">市政府官方</a></li>
            <li><a href="#" target="_blank">市政府官方</a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="tab-con-item linkcon" style="display: none;">
          <ul class="linkslist">
            <li><a href="#" target="_blank">市政府官方</a></li>
            <li><a href="#" target="_blank">市政府官方</a></li>
            <li><a href="#" target="_blank">市政府官方</a></li>
            <li><a href="#" target="_blank">市政府官方</a></li>
            <li><a href="#" target="_blank">市政府官方</a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="tab-con-item linkcon" style="display: none;">
          <ul class="linkslist">
            <li><a href="#" target="_blank">市政府官方</a></li>
            <li><a href="#" target="_blank">市政府官方</a></li>
            <li><a href="#" target="_blank">市政府官方</a></li>
            <li><a href="#" target="_blank">市政府官方</a></li>
            <li><a href="#" target="_blank">市政府官方</a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="tab-con-item linkcon" style="display: none;">
          <ul class="linkslist">
            <li><a href="#" target="_blank">市政府官方</a></li>
            <li><a href="#" target="_blank">市政府官方</a></li>
            <li><a href="#" target="_blank">市政府官方</a></li>
            <li><a href="#" target="_blank">市政府官方</a></li>
            <li><a href="#" target="_blank">市政府官方</a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="tab-con-item linkcon" style="display: none;">
          <ul class="linkslist">
            <li><a href="#" target="_blank">市政府官方</a></li>
            <li><a href="#" target="_blank">市政府官方</a></li>
            <li><a href="#" target="_blank">市政府官方</a></li>
            <li><a href="#" target="_blank">市政府官方</a></li>
            <li><a href="#" target="_blank">市政府官方</a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="foot">
  <div class="ft-menu">
    <div class="container">
    	<div class="menu">
        	<dl>
            	<dt>首页</dt>
                <dd>
                	<a href="#"></a>
                </dd>
            </dl>
            <dl>
            	<dt>关于我们</dt>
                <dd>
                	<a href="#">关于中仲</a>
                </dd>
            </dl>
            <dl>
            	<dt>仲裁动态</dt>
                <dd>
                	<a href="#">仲裁动态</a>
                </dd>
            </dl>
            <dl>
            	<dt>仲裁员</dt>
                <dd>
                	<a href="#">仲裁员名册</a>
                    <a href="#">仲裁员守则</a>
                </dd>
            </dl>
            <dl>
            	<dt>法律制度</dt>
                <dd>
                	<a href="#">仲裁规则</a>
                    <a href="#">法律法规</a>
                    <a href="#">统计数据</a>
                </dd>
            </dl>
            <dl>
            	<dt>在线服务</dt>
                <dd>
                	<a href="#">在线咨询</a>
                    <a href="#">立案申请</a>
                </dd>
            </dl>
            <dl>
                <dd class="last">
                	<p>联系地址：中卫市沙坡头区清风路55号（市财政局后楼四楼）</p>
                    <p>邮政编码：755000</p>
                    <p>咨询电话：0955-7674885</p>
                    <p>电子邮件：baidu@163.com</p>
                    <p>网　　址：www.baidu.com</p>
                </dd>
            </dl>
            <div class="clearfix"></div>
        </div>
        <div class="ewm">
        	<img src="images/ewm.png" />
            <p>扫码关注公众号</p>
        </div>
        <div class="clearfix"></div>
    </div>
  </div>
  <div class="cop">
    <div class="container">&copy; 2018 XX公司&nbsp;&nbsp;ICP备XXXXXXXX号&nbsp;&nbsp;技术支持：<a style="color:#b7c1c6;" href="http://www.jsdaima.com/" title="js代码" target="_blank">js代码</a></div>
  </div>
</div>
</div>
<script src="js/Tabs.js"></script> 
<script type="text/javascript">
	$(function() {
		$("#link").rTabs({
			bind : 'hover',
			animation : 'fadein',
			auto:false
		});
	})
</script>
<script type="text/javascript">
	$(function() {
		$("#news").rTabs({
			bind : 'hover',
			animation : 'fadein',
			auto:false
		});
	})
</script>
</body>
</html>
<script>
{{--页面加载--}}
    var vm = new Vue({
        delimiters:['${','}'],
        el:"#cate",
        data:{
            catedata:null,
            category:null,
            titledate:null,
        },
        mounted(){
        var url="/index/cate";
        axios.post(url).then(function(res){
            console.log(res);
            vm.catedata=res.data.cate;
            vm.category=res.data.gory;
            vm.titledate=res.data.title;
        });
    },
//分类点击
        methods:{
            cateinfo:function() {
////                var c_id=
//                var url = "/index/titlesou";
//                var date = {
//                    c_id: c_id,
//                };
//                console.log(date);
////                axios.post(url, date).then(function (res) {
////
////                });
            }
        },

    });

</script>
