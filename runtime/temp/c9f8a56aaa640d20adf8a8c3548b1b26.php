<?php /*a:5:{s:74:"D:\WebServer\www\project\Enterprise\application\index\view\news\index.html";i:1527766035;s:70:"D:\WebServer\www\project\Enterprise\application\index\view\layout.html";i:1527764072;s:77:"D:\WebServer\www\project\Enterprise\application\index\view\public\header.html";i:1527771319;s:76:"D:\WebServer\www\project\Enterprise\application\index\view\public\slide.html";i:1528077890;s:77:"D:\WebServer\www\project\Enterprise\application\index\view\public\footer.html";i:1527779201;}*/ ?>
<!DOCTYPE html>
<html xmlns:wb="http://open.weibo.com/wb" lang="zh-CN">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="Cache-Control" content="no-transform"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <meta http-equiv="Content-Language" content="zh-CN" />
    <meta name="keywords" content="<?php echo htmlentities((isset($webInfo['keywords']) && ($webInfo['keywords'] !== '')?$webInfo['keywords']:'默认关键字')); ?>" />
    <meta name="description" content="<?php echo htmlentities((isset($webInfo['description']) && ($webInfo['description'] !== '')?$webInfo['description']:'默认描述')); ?>" />
    <link rel="shortcut icon" type="image/x-icon" href="/static/index/skin/ecms079/images/favicon.ico" />
    <title><?php echo htmlentities((isset($webInfo['title']) && ($webInfo['title'] !== '')?$webInfo['title']:'默认主题')); ?></title>
    <link rel="stylesheet" type="text/css" href="/static/index/skin/ecms079/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/static/index/skin/ecms079/css/font-awesome.min.css" />
    <script src="/static/index/skin/ecms079/js/common.js" type="text/javascript"></script>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/static/index/skin/ecms079/js/respond.min.js" ></script>
    <![endif]-->
    <!--[if IE 7]>
    <link rel="stylesheet" href="/static/index/skin/ecms079/css/font-awesome-ie7.min.css" >
    <![endif]-->
    <script src="https://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div id="header">
    <div class="header">
        <div class="logo"> <a href="index.htm" title="<?php echo htmlentities((isset($webInfo['title']) && ($webInfo['title'] !== '')?$webInfo['title']:'默认主题')); ?>"><img src="/static/index/skin/ecms079/images/logo.png" alt="<?php echo htmlentities((isset($webInfo['title']) && ($webInfo['title'] !== '')?$webInfo['title']:'默认主题')); ?>"/></a> </div>
        <div class="searchBtn"><a name="search"></a></div>
        <div class="language"> <span class="on">简</span> <span><a href="" id="StranLink">繁</a></span> </div>
        <div class="menu" id="menu">
            <ul>
                <li><a href="<?php echo url('index/Index/index'); ?>" class="">首页</a></li>
                <li>
                    <a href="<?php echo url('index/product/index'); ?>"  class="">产品中心</a>
                    <ul class="sub-menu">
                        <?php if(is_array($GoodsClassLists) || $GoodsClassLists instanceof \think\Collection || $GoodsClassLists instanceof \think\Paginator): $i = 0; $__LIST__ = $GoodsClassLists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$GoodsClassList): $mod = ($i % 2 );++$i;?>
                        <li class="menu-item"><a href="?GoodsClassId=<?php echo htmlentities($GoodsClassList['GoodsClassId']); ?>"><?php echo htmlentities($GoodsClassList['ClassName']); ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo url('index/News/index'); ?>" class="">新闻动态</a>
                    <ul class="sub-menu">
                        <?php if(is_array($NewsClassLists) || $NewsClassLists instanceof \think\Collection || $NewsClassLists instanceof \think\Paginator): $i = 0; $__LIST__ = $NewsClassLists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$NewsClassList): $mod = ($i % 2 );++$i;?>
                        <li class="menu-item"><a href="?NewsClassId=<?php echo htmlentities($NewsClassList['NewsClassId']); ?>"><?php echo htmlentities($NewsClassList['ClassName']); ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo url('index/Cases/index'); ?>" class="">案例展示</a>
                    <ul class="sub-menu">
                        <?php if(is_array($CasesClassLists) || $CasesClassLists instanceof \think\Collection || $CasesClassLists instanceof \think\Paginator): $i = 0; $__LIST__ = $CasesClassLists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$CasesClassList): $mod = ($i % 2 );++$i;?>
                        <li class="menu-item"><a href="?CaseClassId=<?php echo htmlentities($CasesClassList['CaseClassId']); ?>"><?php echo htmlentities($CasesClassList['ClassName']); ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li>
                <li><a href="<?php echo url('index/Contact/index'); ?>" class="">联系我们</a></li>
                <li><a href="<?php echo url('index/About/index'); ?>" class="">关于我们</a></li>
                <li><a href="<?php echo url('index/Message/index'); ?>" class="">在线留言</a></li>
                <li><a href="<?php echo url('index/Service/index'); ?>" class="">我们的服务</a></li>
            </ul>
        </div>
    </div>
    <div class="clear"></div>
</div>
<div class="rslides_container">
    <ul class="rslides" id="slider">
        <li><a target="_blank" title="<?php echo htmlentities((isset($webInfo['slide01_title']) && ($webInfo['slide01_title'] !== '')?$webInfo['slide01_title']:'幻灯大图一')); ?>"><img src="/static/index/images/default/<?php echo htmlentities((isset($webInfo['slide01_img']) && ($webInfo['slide01_img'] !== '')?$webInfo['slide01_img']:'1.jpg')); ?>" alt="<?php echo htmlentities((isset($webInfo['slide01_title']) && ($webInfo['slide01_title'] !== '')?$webInfo['slide01_title']:'幻灯大图一')); ?>"/></a></li>
        <li><a target="_blank" title="<?php echo htmlentities((isset($webInfo['slide02_title']) && ($webInfo['slide02_title'] !== '')?$webInfo['slide02_title']:'幻灯大图二')); ?>"><img src="/static/index/images/default/<?php echo htmlentities((isset($webInfo['slide02_img']) && ($webInfo['slide02_img'] !== '')?$webInfo['slide02_img']:'2.jpg')); ?>" alt="<?php echo htmlentities((isset($webInfo['slide02_title']) && ($webInfo['slide02_title'] !== '')?$webInfo['slide02_title']:'幻灯大图二')); ?>"/></a></li>
        <li><a target="_blank" title="<?php echo htmlentities((isset($webInfo['slide03_title']) && ($webInfo['slide03_title'] !== '')?$webInfo['slide03_title']:'幻灯大图三')); ?>"><img src="/static/index/images/default/<?php echo htmlentities((isset($webInfo['slide03_img']) && ($webInfo['slide03_img'] !== '')?$webInfo['slide03_img']:'3.jpg')); ?>" alt="<?php echo htmlentities((isset($webInfo['slide03_title']) && ($webInfo['slide03_title'] !== '')?$webInfo['slide03_title']:'幻灯大图二')); ?>"/></a></li>
    </ul>
</div>
<div id="breadcrumb">
    <div class="breadcrumb">
        <div class="right">
            <h3>关注微博</h3>
            <div class="weibo">
                <wb:follow-button uid="<?php echo htmlentities((isset($contact['weibo']) && ($contact['weibo'] !== '')?$contact['weibo']:'5312068257')); ?>" type="red_1" width="67" height="24" ></wb:follow-button>
            </div>
        </div>
        <div class="left">
            <h3>动态新闻</h3>
            <div class="notice">
                <ul class="newsList">
                    <?php $count = '1'; if(is_array($NewsInfos) || $NewsInfos instanceof \think\Collection || $NewsInfos instanceof \think\Paginator): $i = 0; $__LIST__ = $NewsInfos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$NewsInfoList): $mod = ($i % 2 );++$i;if($count < 7): ?>
                        <li><a href="<?php echo htmlentities($NewsInfoList['newsId']); ?>" title="<?php echo htmlentities($NewsInfoList['newsname']); ?>" target="_blank"><?php echo htmlentities($NewsInfoList['newsname']); ?></a></li>
                        <?php endif; $count = $count+1; endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <ul class="swap">
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="container">
  <div class="sidebar">
    <div class="sideMenu">
      <h3><a href="index.htm" tppabs="http://ecms079.99yuanma.net:8889/news/" title="新闻动态" target="_blank">新闻动态</a></h3>
      <ul>
        <li><a href="gongsi/index.htm" tppabs="http://ecms079.99yuanma.net:8889/news/gongsi/" title="公司动态">公司动态</a></li><li><a href="hangye/index.htm" tppabs="http://ecms079.99yuanma.net:8889/news/hangye/" title="行业动态">行业动态</a></li>      </ul>
    </div>
    <div class="widget">
      <h3>联系信息</h3>
      <div class="textwidget">
        <p><img src="/static/index/skin/ecms079/images/online.jpg" tppabs="http://ecms079.99yuanma.net:8889/skin/ecms079/images/online.jpg" alt="联系信息"/></p>
        <p><b>全国服务热线：400-1234-5678</b></p>
        <p><b>移动电话：</b>13888888888</p>
        <p><b>联系Q Q： </b>123456789</p>
        <p><b>电子邮箱： </b>12345678@qq.com</p>
        <p><b>公司地址： </b>山东省济南市高新区英才路2号</p>
      </div>
    </div>
  </div>
  <div class="main">
    <div class="newsBox">
      <h3>新闻动态</h3>
      <ul>
        <li> <span>2015-12-07</span><i class="icon-angle-right"></i><a href="gongsi/2015-12-07/40.html" tppabs="http://ecms079.99yuanma.net:8889/news/gongsi/2015-12-07/40.html" title="展会策划之超维震撼亮相2014深圳礼品展" target="_blank">展会策划之超维震撼亮相2014深圳礼品展</a> </li><li> <span>2015-12-07</span><i class="icon-angle-right"></i><a href="gongsi/2015-12-07/35.html" tppabs="http://ecms079.99yuanma.net:8889/news/gongsi/2015-12-07/35.html" title="打造尚品魔芋全新品牌形象" target="_blank">打造尚品魔芋全新品牌形象</a> </li><li> <span>2015-12-07</span><i class="icon-angle-right"></i><a href="gongsi/2015-12-07/36.html" tppabs="http://ecms079.99yuanma.net:8889/news/gongsi/2015-12-07/36.html" title="喜贺签约佛山赛玛电子科技旗下新品牌策划及VI设计" target="_blank">喜贺签约佛山赛玛电子科技旗下新品牌策划及VI设计</a> </li><li> <span>2015-12-07</span><i class="icon-angle-right"></i><a href="gongsi/2015-12-07/32.html" tppabs="http://ecms079.99yuanma.net:8889/news/gongsi/2015-12-07/32.html" title="品牌VI设计之“租车在线”品牌部分提案鉴赏" target="_blank">品牌VI设计之“租车在线”品牌部分提案鉴赏</a> </li><li> <span>2015-12-07</span><i class="icon-angle-right"></i><a href="gongsi/2015-12-07/34.html" tppabs="http://ecms079.99yuanma.net:8889/news/gongsi/2015-12-07/34.html" title="品牌策划应邀参加贵阳保得公司品牌发展培训交流会" target="_blank">品牌策划应邀参加贵阳保得公司品牌发展培训交流会</a> </li><li> <span>2015-12-07</span><i class="icon-angle-right"></i><a href="gongsi/2015-12-07/27.html" tppabs="http://ecms079.99yuanma.net:8889/news/gongsi/2015-12-07/27.html" title="品牌VI设计之王子电下品牌形象策划提案部分鉴赏" target="_blank">品牌VI设计之王子电下品牌形象策划提案部分鉴赏</a> </li><li> <span>2015-12-07</span><i class="icon-angle-right"></i><a href="gongsi/2015-12-07/28.html" tppabs="http://ecms079.99yuanma.net:8889/news/gongsi/2015-12-07/28.html" title="品牌设计成功签约香港依云格格SPA品牌形象设计" target="_blank">品牌设计成功签约香港依云格格SPA品牌形象设计</a> </li><li> <span>2015-12-07</span><i class="icon-angle-right"></i><a href="hangye/2015-12-07/26.html" tppabs="http://ecms079.99yuanma.net:8889/news/hangye/2015-12-07/26.html" title="设计公司哪家好" target="_blank">设计公司哪家好</a> </li><li> <span>2015-12-07</span><i class="icon-angle-right"></i><a href="hangye/2015-12-07/25.html" tppabs="http://ecms079.99yuanma.net:8889/news/hangye/2015-12-07/25.html" title="包装设计的步骤" target="_blank">包装设计的步骤</a> </li><li> <span>2015-12-07</span><i class="icon-angle-right"></i><a href="hangye/2015-12-07/24.html" tppabs="http://ecms079.99yuanma.net:8889/news/hangye/2015-12-07/24.html" title="某某工作室谈标识设计的含义" target="_blank">某某工作室谈标识设计的含义</a> </li>
      </ul>
      <div class="pagenavi"> &nbsp;<span class='page now-page'>1</span>&nbsp;<a href="index_2.html" tppabs="http://ecms079.99yuanma.net:8889/news/index_2.html">2</a><a href="index_2.html" tppabs="http://ecms079.99yuanma.net:8889/news/index_2.html"><span class="page">››</span></a> </div>
    </div>
  </div>
</div>
<div id="footer">
    <div class="footLine"></div>
    <div class="footer">
        <div class="footLeft">
            <div class="pageslist">
                <ul>
                    <li><a href="<?php echo url('index/Message/index'); ?>" title="在线留言" target="_blank">在线留言</a></li>
                    <li><a href="<?php echo url('index/Contact/index'); ?>" title="联系我们" target="_blank">联系我们</a></li>
                    <li><a href="<?php echo url('index/About/index'); ?>" title="关于我们" target="_blank">关于我们</a></li>
                    <li><a href="<?php echo url('index/Service/index'); ?>" title="我们的服务" target="_blank">我们的服务</a></li>
                </ul>
            </div>
            <div class="socialSns">
                <a class="weibo" rel="nofollow" target="_blank">新浪微博</a>
                <a class="tencent" rel="nofollow" target="_blank">腾讯微博</a>
                <a class="qzone" rel="nofollow" target="_blank">QQ空间</a>
            </div>
            <div class="friendlinks">
                <ul>
                    <li><strong>友情链接：</strong></li>
                    <?php if(is_array($link) || $link instanceof \think\Collection || $link instanceof \think\Paginator): $i = 0; $__LIST__ = $link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
                    <li><a href="<?php echo htmlentities($list['realm']); ?>" target="_blank"><?php echo htmlentities($list['title']); ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <div class="footRight">
            <div class="phone"> <i class="icon-phone"></i> <a href="tel:<?php echo htmlentities((isset($contact['telephone']) && ($contact['telephone'] !== '')?$contact['telephone']:'400-1234-5678')); ?>" rel="nofollow"><?php echo htmlentities((isset($contact['telephone']) && ($contact['telephone'] !== '')?$contact['telephone']:'400-1234-5678')); ?></a> </div>
            <div class="copyright">
                <p>Copyright <a href="<?php echo htmlentities((isset($webInfo['realm']) && ($webInfo['realm'] !== '')?$webInfo['realm']:'https://www.geekln.cn/')); ?>" target="_blank"><?php echo htmlentities((isset($webInfo['title']) && ($webInfo['title'] !== '')?$webInfo['title']:'默认标题')); ?></a> Rights Reserved. <?php echo htmlentities((isset($webInfo['record']) && ($webInfo['record'] !== '')?$webInfo['record']:'川ICP备1234567-9号')); ?> . 统计代码</p>
                <p> 企业站点系统 @ <a href="https://www.geekln.cn/" title="静影探风" target="_blank">静影探风</a>. </p>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div id="backTop"> <a href="#header" title="返回顶部"><i class="icon-arrow-up"></i></a> </div>
<div id="simplemodal-container"></div>
<div id="searchbar">
    <p>全站搜索</p>
    <form onSubmit="return checkSearchForm()" method="post" name="searchform" action="http://ecms079.99yuanma.net:8889/e/search/index.php" >
        <input type="hidden" value="title" name="show">
        <input type="hidden" value="1" name="tempid">
        <input type="hidden" value="news" name="tbname">
        <input name="mid" value="1" type="hidden">
        <input name="dopost" value="search" type="hidden">
        <input type="text" name="keyboard" id="edtSearch" class="text" value="输入搜索关键词" onblur="if($(this).val() == ''){$(this).val('输入搜索关键词');}" onfocus="if($(this).val() == '输入搜索关键词'){$(this).val('');}" x-webkit-speech=""/>
        <input type="submit" id="btnPost" name="submit" class="submit" value="搜索"/>
    </form>
</div>
<script type="text/javascript" src="/static/index/skin/ecms079/js/responsiveslides-bxslider.min.js"></script>
<script type="text/javascript" src="/static/index/skin/ecms079/js/leonhere.js"></script>
<script type="text/javascript" src="/static/index/skin/ecms079/js/transform.js"></script>
</body>
</html>