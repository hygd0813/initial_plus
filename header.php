<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN">
<meta http-equiv="Content-Language" content="zh-cn">
<meta name="sogou_site_verification" content="jcLvpgmpAy" />
<meta  http-equiv="Content-Type" content="text/html; charset=<?php $this->options->charset(); ?>" />
 <meta name="renderer" content="webkit"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<?php if ($this->options->scalable): ?>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no" />
<?php else: ?>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=2, user-scalable=yes" />
<?php endif; ?>
<?php if ($this->options->favicon): ?>
<link rel="shortcut icon" href="<?php $this->options->favicon(); ?>" />
<?php endif; ?>
<title><?php $this->archiveTitle(array(
'category'  =>  _t('分类 %s 下的文章'),
'search'    =>  _t('包含关键字 %s 的文章'),
'tag'       =>  _t('标签 %s 下的文章'),
'date'      =>  _t('在 %s 发布的文章'),
'author'    =>  _t('作者 %s 发布的文章')
), '', ' - '); ?><?php $this->options->title(); ?> - <?php $this->options->subTitle(); ?></title>
<meta name="description" content="<?php $d=$this->fields->summaryContent;if(empty($d) || !$this->is('single')){if($this->getDescription()){echo $this->getDescription();}}else{ echo $d;};?>">
<meta name="keywords"  content="<?php $k=$this->fields->keyword;if(empty($k) || !$this->is('single')){echo $this->keywords();}else{ echo $k;};?>">
<?php $this->header('keywords=&description='); ?>
<link rel="stylesheet" href="<?php cjUrl('jscss/OwO.min.css'); ?>">
<?php if ($this->options->sitenocolr): ?>
<style>html{filter: grayscale(100%);-webkit-filter: grayscale(100%);-moz-filter: grayscale(100%);-ms-filter: grayscale(100%);-o-filter: grayscale(100%);filter: url("data:image/svg+xml;utf8,#grayscale");filter: progid:DXImageTransform.Microsoft.BasicImage(grayscale=1);-webkit-filter: grayscale(1);}</style>
<?php endif; ?>
<link rel="stylesheet" href="<?php skinUrl('jscss/','.css'); ?>" id="<?php skinUrl('','','id'); ?>" />
<?php if (!empty($this->options->skinoptions) && in_array('radius', $this->options->skinoptions)): ?>
<link rel="stylesheet" href="<?php cjUrl('jscss/style-border-radius.css'); ?>" />
<?php endif; ?>
<?php if ($this->options->prism): ?>
<link rel="stylesheet" href="<?php cjUrl('jscss/prism.css'); ?>" />
<?php endif; ?>
<?php if ($this->options->fancybox): ?>
<link rel="stylesheet" href="<?php if ($this->options->cjCDN == 'sf'): ?>//cdn.staticfile.org/fancybox/3.5.7/jquery.fancybox.min.css<?php elseif ($this->options->cjCDN == 'zj'): ?>//s0.pstatp.com/cdn/expire-1-M/fancybox/3.5.7/jquery.fancybox.min.css<?php elseif ($this->options->cjCDN == 'bmt'): ?>//lib.baomitu.com/fancybox/3.5.7/jquery.fancybox.min.css<?php elseif ($this->options->cjCDN == 'bt'): ?>//cdn.bootcss.com/fancybox/3.5.7/jquery.fancybox.min.css<?php else: cjUrl('jscss/jquery.fancybox.min.css'); endif; ?>" />
<?php endif; ?>
<?php if ($this->options->CustomCss): ?>
<style><?php $this->options->CustomCss(); ?></style>
<?php endif; ?>
<link rel="stylesheet" href="<?php cjUrl('jscss/font/iconfont.css'); ?>">
<link rel="stylesheet" href="<?php cjUrl('jscss/grid.css'); ?>">
<link rel='stylesheet' href="<?php cjUrl('slide/slide.css'); ?>">
<link href="//at.alicdn.com/t/font_2122935_b2r2ekk4of7.css" rel="stylesheet" type="text/css">
<!-- 百度星火计划-->
<?php if($this->is('post')): ?>
<meta property="og:type" content="article"/>
<meta property="article:published_time" content="<?php $this->date('c'); ?>"/>
<meta property="article:author" content="<?php $this->options->title(); ?>" />
<meta property="article:author" content="<?php $this->author(); ?>" />
<meta property="article:published_first" content="<?php $this->options->title() ?>, <?php $this->permalink() ?>" />
<meta property="og:title" content="<?php $this->title() ?>" />
<meta property="og:url" content="<?php $this->permalink() ?>" />
<?php endif; ?>
<!-- 百度星火计划END-->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4962709126690252"
     crossorigin="anonymous"></script>
</head>
<body id="stylebg" <?php if ($this->options->HeadFixed): ?>class="head-fixed"<?php endif; ?> style="background-image:url('<?php skinUrl('img/','.jpg'); ?>');">
<header id="header">
<div class="container clearfix">
<div class="site-name">
<h1>
<a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php if ($this->options->logoUrl && ($this->options->titleForm == 'logo' || $this->options->titleForm == 'all')): ?><img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" title="<?php $this->options->title() ?>" />   <?php endif; ($this->options->titleForm == 'logo' && $this->options->logoUrl) ? '' : ($this->options->customTitle ? $this->options->customTitle() : $this->options->title()) ?>
</a>
</h1>
</div>
<script>function Navswith(){document.getElementById("header").classList.toggle("on")}</script>
<button id="nav-swith" onclick="Navswith()"><span></span></button>
<div id="nav">
<div id="site-search">
<form id="search" method="post" action="<?php $this->options->siteUrl(); ?>">
<input type="text" id="s" name="s" class="text" placeholder=" 请输入关键字搜索 " required />
<button type="submit"></button>
</form>
</div>
<ul class="nav-menu">
<li><a  class="iconfont icon-icon" href="<?php $this->options->siteUrl(); ?>">首页</a></li>
<li><a  class="iconfont icon-xiangce" href="http://www.yxjnotes.top/category/photos/" target="_blank"  title="污水处理笔记-相册">相册</a></li>
<li><a  class="iconfont icon-shipin" href="http://www.yxjnotes.top/category/video/" target="_blank"  title="污水处理笔记-视频">视频</a></li>
<?php if (!empty($this->options->Navset) && in_array('ShowCategory', $this->options->Navset)): if (in_array('AggCategory', $this->options->Navset)): ?>
<li class="menu-parent"><a class="iconfont Categorya" onclick="document.getElementById('Category').classList.toggle('Categoryactive');"><?php if ($this->options->CategoryText): $this->options->CategoryText(); else: ?>分类<?php endif; ?></a>
<ul id="Category">
<?php
endif;
$this->widget('Widget_Metas_Category_List')->to($categorys);
while($categorys->next()):
if ($categorys->levels == 0):
$children = $categorys->getAllChildren($categorys->mid);
if (empty($children)):
?>
<li><a  class="iconfont  icon-lanmu" href="<?php $categorys->permalink(); ?>" title="污水处理<?php $categorys->name(); ?>">&nbsp;<?php $categorys->name(); ?></a></li>
<?php else: ?>
<li class="menu-parent">
<a  class="iconfont  icon-lanmu" href="<?php $categorys->permalink(); ?>" title="污水处理<?php $categorys->name(); ?>">&nbsp;<?php $categorys->name(); ?></a>
<ul class="menu-child">
<?php foreach ($children as $mid) {
$child = $categorys->getCategory($mid); ?>
<li><a  class="iconfont  icon-lanmu" href="<?php echo $child['permalink'] ?>" title="污水处理<?php echo $child['name']; ?>">&nbsp;<?php echo $child['name']; ?></a></li>
<?php } ?>
</ul>
</li>
<?php
endif;
endif;
endwhile;
?>
<?php if (in_array('AggCategory', $this->options->Navset)): ?>
</ul>
</li>
<?php
endif;
endif;
if (!empty($this->options->Navset) && in_array('ShowPage', $this->options->Navset)):
if (in_array('AggPage', $this->options->Navset)):
?>
<li class="menu-parent"><a class="iconfont PageTexta" onclick="document.getElementById('PageText').classList.toggle('PageTextactive');"><?php if ($this->options->PageText): $this->options->PageText(); else: ?>其他<?php endif; ?></a>
<ul id="PageText">
<?php
endif;
$this->widget('Widget_Contents_Page_List')->to($pages);
while($pages->next()):
?>
<li><a class="iconfont  icon-yemian" href="<?php $pages->permalink(); ?>" title="《YXJの笔记》<?php $pages->title(); ?>">&nbsp;&nbsp;<?php $pages->title(); ?></a></li>
<?php endwhile;
if (in_array('AggPage', $this->options->Navset)): ?>
</ul>
</li>
<?php endif;
endif; ?>
<li  class="menu-parent"><a  title="《YXJの笔记》会员中心">会员<i class="iconfont icon-down"></i></a>
<ul>
<?php if ($this->user->hasLogin()) :?>
   <li><a href="<?php $this->options->adminUrl(); ?>" target="_blank">后台 (<?php $this->user->screenName(); ?>)</a></li>
   <li><a class="iconfont  icon-fabiao" href="<?php $this->options->adminUrl('write-post.php')?>" target="_blank">&nbsp;新建文章</a></li>
   <li><a  class="iconfont  icon-zhuxiao" href="<?php $this->options->logoutUrl(); ?>"<?php if ($this->options->PjaxOption): ?> no-pjax<?php endif; ?>>&nbsp;&nbsp;退出</a></li>
<?php else :?>
   <li><a  class="iconfont  icon-login" href="<?php $this->options->adminUrl(); ?>" target="_blank">&nbsp;&nbsp;登录</a></li>
   <li><a  class="iconfont  icon-zhuce" href="<?php $this->options->registerUrl(); ?>" target="_blank">&nbsp;&nbsp;注册</a></li>
<?php endif;?>
</ul></li>
</ul>
</div>
</div>
</header>
<div id="body">
<div class="container clearfix">