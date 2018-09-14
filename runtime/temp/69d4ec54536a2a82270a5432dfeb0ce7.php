<?php /*a:5:{s:93:"I:\Project\WebServer\www\project\Enterprise\application\index\view\news\newsClassifyShow.html";i:1534458199;s:78:"I:\Project\WebServer\www\project\Enterprise\application\index\view\layout.html";i:1527764072;s:85:"I:\Project\WebServer\www\project\Enterprise\application\index\view\public\header.html";i:1527771319;s:84:"I:\Project\WebServer\www\project\Enterprise\application\index\view\public\slide.html";i:1534459885;s:85:"I:\Project\WebServer\www\project\Enterprise\application\index\view\public\footer.html";i:1534440415;}*/ ?>
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
        <div class="language"> <span class="on">简</span> <span><a href="" id="StranLink">繁</a></span> </div>
        <div class="menu" id="menu">
            <ul>
                <li><a href="<?php echo url('index/Index/index'); ?>" class="">首页</a></li>
                <li>
                    <a href="<?php echo url('index/product/index'); ?>"  class="">产品中心</a>
                    <ul class="sub-menu">
                        <?php if(is_array($GoodsClassLists) || $GoodsClassLists instanceof \think\Collection || $GoodsClassLists instanceof \think\Paginator): $i = 0; $__LIST__ = $GoodsClassLists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$GoodsClassList): $mod = ($i % 2 );++$i;?>
                        <li class="menu-item"><a href="<?php echo url('index/Product/productClassifyShow',['GoodsClassId'=>$GoodsClassList['GoodsClassId']]); ?>"><?php echo htmlentities($GoodsClassList['ClassName']); ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo url('index/News/index'); ?>" class="">新闻动态</a>
                    <ul class="sub-menu">
                        <?php if(is_array($NewsClassLists) || $NewsClassLists instanceof \think\Collection || $NewsClassLists instanceof \think\Paginator): $i = 0; $__LIST__ = $NewsClassLists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$NewsClassList): $mod = ($i % 2 );++$i;?>
                        <li class="menu-item"><a href="<?php echo url('index/News/newsClassifyShow',['newsClassId'=>$NewsClassList['NewsClassId']]); ?>"><?php echo htmlentities($NewsClassList['ClassName']); ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo url('index/Cases/index'); ?>" class="">案例展示</a>
                    <ul class="sub-menu">
                        <?php if(is_array($CasesClassLists) || $CasesClassLists instanceof \think\Collection || $CasesClassLists instanceof \think\Paginator): $i = 0; $__LIST__ = $CasesClassLists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$CasesClassList): $mod = ($i % 2 );++$i;?>
                        <li class="menu-item"><a href="<?php echo url('index/Cases/caseClassifyShow',['caseClassId'=>$CasesClassList['CaseClassId']]); ?>"><?php echo htmlentities($CasesClassList['ClassName']); ?></a></li>
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
        <li><a target="_blank" title="<?php echo htmlentities((isset($webInfo['slide01_title']) && ($webInfo['slide01_title'] !== '')?$webInfo['slide01_title']:'幻灯大图一')); ?>"><img src="/static/index/images/default/<?php echo htmlentities((isset($webInfo['slide01_img']) && ($webInfo['slide01_img'] !== '')?$webInfo['slide01_img']:'1.jpg')); ?>"/></a></li>
        <li><a target="_blank" title="<?php echo htmlentities((isset($webInfo['slide02_title']) && ($webInfo['slide02_title'] !== '')?$webInfo['slide02_title']:'幻灯大图二')); ?>"><img src="/static/index/images/default/<?php echo htmlentities((isset($webInfo['slide02_img']) && ($webInfo['slide02_img'] !== '')?$webInfo['slide02_img']:'2.jpg')); ?>"/></a></li>
        <li><a target="_blank" title="<?php echo htmlentities((isset($webInfo['slide03_title']) && ($webInfo['slide03_title'] !== '')?$webInfo['slide03_title']:'幻灯大图三')); ?>"><img src="/static/index/images/default/<?php echo htmlentities((isset($webInfo['slide03_img']) && ($webInfo['slide03_img'] !== '')?$webInfo['slide03_img']:'3.jpg')); ?>"/></a></li>
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
      <h3><a href="<?php echo url('index/News/index'); ?>#container" title="新闻动态">新闻动态</a></h3>
      <ul>
          <?php if(is_array($NewsClassLists) || $NewsClassLists instanceof \think\Collection || $NewsClassLists instanceof \think\Paginator): $i = 0; $__LIST__ = $NewsClassLists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$NewsClassList): $mod = ($i % 2 );++$i;?>
          <li class="menu-item"><a href="<?php echo url('index/News/newsClassifyShow',['newsClassId'=>$NewsClassList['NewsClassId']]); ?>#container"><?php echo htmlentities($NewsClassList['ClassName']); ?></a></li>
          <?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div>
    <div class="widget">
      <h3>联系信息</h3>
      <div class="textwidget">
          <?php if(is_array($ContactInfo) || $ContactInfo instanceof \think\Collection || $ContactInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $ContactInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ContactInfoList): $mod = ($i % 2 );++$i;?>
          <p><img src="/static/index/about/images/online.jpg" alt="联系信息"/></p>
          <p><b>全国服务热线：<?php echo htmlentities((isset($ContactInfoList['telephone']) && ($ContactInfoList['telephone'] !== '')?$ContactInfoList['telephone']:'telephone【默认值】')); ?></b></p>
          <p><b>移动电话：</b><?php echo htmlentities((isset($ContactInfoList['cellphone']) && ($ContactInfoList['cellphone'] !== '')?$ContactInfoList['cellphone']:'cellphone【默认值】')); ?></p>
          <p><b>联系Q Q： </b><?php echo htmlentities((isset($ContactInfoList['qq']) && ($ContactInfoList['qq'] !== '')?$ContactInfoList['qq']:'qq【默认值】')); ?></p>
          <p><b>电子邮箱： </b><?php echo htmlentities((isset($ContactInfoList['email']) && ($ContactInfoList['email'] !== '')?$ContactInfoList['email']:'email【默认值】')); ?></p>
          <p><b>公司地址： </b><?php echo htmlentities((isset($ContactInfoList['address']) && ($ContactInfoList['address'] !== '')?$ContactInfoList['address']:'address【默认值】')); ?></p>
          <?php endforeach; endif; else: echo "" ;endif; ?>
      </div>
    </div>
  </div>
  <div class="main">
    <div class="newsBox">
      <h3><?php echo htmlentities($newsClassName); ?></h3>
      <ul>
        <?php if(is_array($newsInfo) || $newsInfo instanceof \think\Collection || $newsInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $newsInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$newsInfoList): $mod = ($i % 2 );++$i;?>
        <li>
            <span><?php echo htmlentities($newsInfoList['create_time']); ?></span><i class="icon-angle-right"></i>
            <a href="#<?php echo htmlentities($newsInfoList['newsId']); ?>" title="<?php echo htmlentities($newsInfoList['newsname']); ?>" target="_blank"><?php echo htmlentities($newsInfoList['newsname']); ?></a>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
        <div id="page"><?php echo $newsInfo; ?></div>
        <style>
            #page  ul li{
                float: left;
                width:20px;
                margin:10px;
            }

            #page li{
                padding:2px 10px;
                box-shadow: 5px 5px 5px #888888;
                border-radius:25px;
                border:#f0ad4e 1px solid;
            }

            #page a{
                padding:1px 10px 10px 6px;
                color:#f0ad4e;
            }

            #page a:hover{
                color: whitesmoke;
            }

            #page li:hover{
                background:orange;
            }
            #page .clear{
                display: none;
            }
        </style>
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
            <?php if(is_array($ContactInfo) || $ContactInfo instanceof \think\Collection || $ContactInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $ContactInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ContactInfoList): $mod = ($i % 2 );++$i;?>
            <div class="phone"> <i class="icon-phone"></i> <a href="tel:<?php echo htmlentities((isset($contact['telephone']) && ($contact['telephone'] !== '')?$contact['telephone']:'400-1234-5678')); ?>" rel="nofollow"><?php echo htmlentities((isset($ContactInfoList['telephone']) && ($ContactInfoList['telephone'] !== '')?$ContactInfoList['telephone']:'400-1234-5678【默认值】')); ?></a> </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <div class="copyright">
                <p>Copyright <a href="<?php echo htmlentities((isset($webInfo['realm']) && ($webInfo['realm'] !== '')?$webInfo['realm']:'https://www.geekln.cn/')); ?>" target="_blank"><?php echo htmlentities((isset($webInfo['title']) && ($webInfo['title'] !== '')?$webInfo['title']:'默认标题')); ?></a> Rights Reserved. <?php echo htmlentities((isset($webInfo['record']) && ($webInfo['record'] !== '')?$webInfo['record']:'川ICP备1234567-9号【默认值】')); ?> . 统计代码</p>
                <p> 企业站点系统 @ <a href="https://www.geekln.cn/" title="静影探风" target="_blank">静影探风</a>. </p>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div id="backTop"> <a href="#header" title="返回顶部"><i class="icon-arrow-up"></i></a> </div>
<div id="simplemodal-container"></div>
<script type="text/javascript" src="/static/index/about/js/responsiveslides-bxslider.min.js"></script>
<script type="text/javascript" src="/static/index/about/js/leonhere.js"></script>
<script type="text/javascript" src="/static/index/about/js/transform.js"></script>
</body>
</html>