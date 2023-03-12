<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="secondary" style="border-radius:8px;">
<div class="sidebar"  style="border-radius:8px;">
<!-- slide焦点图 -->
<section class="widget">
<div id="featured-content">
<div class="featured-slider">
<div class="csslider1 autoplay img-zoom-in">
<input name="cs_anchor1" autocomplete="off" id="cs_slide1_0" type="radio" class="cs_anchor slide" >
<input name="cs_anchor1" autocomplete="off" id="cs_slide1_1" type="radio" class="cs_anchor slide" >
<input name="cs_anchor1" autocomplete="off" id="cs_slide1_2" type="radio" class="cs_anchor slide" >
<input name="cs_anchor1" autocomplete="off" id="cs_slide1_3" type="radio" class="cs_anchor slide" >
<input name="cs_anchor1" autocomplete="off" id="cs_play1" type="radio" class="cs_anchor" checked>
<input name="cs_anchor1" autocomplete="off" id="cs_pause1" type="radio" class="cs_anchor" >
<ul>
<div style="width: 100%; visibility: hidden; font-size: 0px; line-height: 0;">
<img src="<?php cjUrl('slide/1.jpg'); ?>" alt="活性污泥法工艺调试运行参数控制详解" />
<img src="<?php cjUrl('slide/2.jpg'); ?>" alt="活性污泥指示性微生物图谱" />
<img src="<?php cjUrl('slide/3.jpg'); ?>" alt="污水处理新理论与新技术--彭永臻" />
<img src="<?php cjUrl('slide/4.jpg'); ?>" alt="IC 厌氧罐的调试" />
</div>
<li class="num0 img"><a href="http://www.yxjnotes.top/archives/283.html" target="_blank" ><img src="<?php cjUrl('slide/1.jpg'); ?>" alt="活性污泥法工艺调试运行参数控制详解" /></a></li>
<li class="num1 img"><a href="http://www.yxjnotes.top/archives/1283.html" target="_blank" ><img src="<?php cjUrl('slide/2.jpg'); ?>" alt="活性污泥指示性微生物图谱" /></a></li>
<li class="num2 img"><a href="http://www.yxjnotes.top/archives/522.html" target="_blank" ><img src="<?php cjUrl('slide/3.jpg'); ?>" alt="污水处理新理论与新技术--彭永臻" /></a></li>
<li class="num2 img"><a href="http://www.yxjnotes.top/archives/522.html" target="_blank" ><img src="<?php cjUrl('slide/4.jpg'); ?>" alt="IC 厌氧罐的调试" /></a></li>
</ul>
<div class="cs_bullets">
<label class="num0" for="cs_slide1_0"><span class="cs_point"></span></label>
<label class="num1" for="cs_slide1_1"><span class="cs_point"></span></label>
<label class="num2" for="cs_slide1_2"><span class="cs_point"></span></label>
<label class="num2" for="cs_slide1_2"><span class="cs_point"></span></label>
</div>
</div>
</div>
</div>
</section>

<!--<?php if ((!empty($this->options->sidebarBlock) && in_array('sitestat', $this->options->sidebarBlock)) || (!empty($this->options->ShowWhisper) && in_array('sidebar', $this->options->ShowWhisper)) || $this->user->hasLogin()): ?>
<section class="widget" style="padding:20px 0 10px 0;">
<div class="widget-title iconfont icon-icon_shiguangji" style="margin-top: 50px;">&nbsp;站点统计</div>
<ul class="widget-list" style="margin-top: 15px;">
<?php if (!empty($this->options->ShowWhisper) && in_array('sidebar', $this->options->ShowWhisper)): ?>
<?php Whisper(1,$this->user->uid); ?>
<?php if ($this->user->pass('editor', true) && (!FindContents('page-whisper.php') || isset(FindContents('page-whisper.php')[1]))): ?>
<li class="notice"><b>仅管理员可见: </b><br><?php echo FindContents('page-whisper.php') ? '发现多个"轻语"模板页面，已自动选取内容最多的页面作为展示，请删除多余模板页面。' : '未找到"轻语"模板页面，请检查是否创建模板页面。' ?></li></ul>
<?php endif; ?>
<?php endif; ?>
<?php if ((!empty($this->options->sidebarBlock) && in_array('sitestat', $this->options->sidebarBlock)) || $this->user->hasLogin()): ?>
<ul class="stat-meta">
<?php if($this->user->hasLogin()): ?>
<li><?php echo $this->options->birthday?round((time() - strtotime($this->options->birthday)) / 86400, 0) . '':'0'; ?><br>运行</li>
<li><?php echo userstat($this->user->uid,'post'); ?><br>文章</li>
<li><?php echo userstat($this->user->uid,'comment'); ?><br>评论</li>
<li><?php echo userstat($this->user->uid,'attachment'); ?><br>附件</li>
<?php else: ?>
<li><?php echo $this->options->birthday?round((time() - strtotime($this->options->birthday)) / 86400, 0) . '':'0'; ?><br>运行</li>
<li><?php Typecho_Widget::widget('Widget_Stat')->to($stat); $stat->publishedPostsNum() ?><br>文章</li>
<li><?php $stat->categoriesNum() ?><br>分类</li>
<li><?php $stat->publishedCommentsNum() ?><br>评论</li>
<?php endif; ?>
</ul>
<?php endif; ?>
</ul>
</section>
<?php endif; ?>-->

<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
<section class="widget">
<div class="widget-title iconfont icon-pinglun">&nbsp;最新回复</div>
<ul class="widget-list">
<?php Contents_Comments_Initial(5, in_array('IgnoreAuthor', $this->options->sidebarBlock)); ?><!-- $this->options->commentsListSize 代替前面数字8 -->
</ul>
</section>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
<section class="widget">
<div class="widget-title iconfont icon-new">&nbsp;最新文章</div>
<ul class="widget-list">
<?php Contents_Post_Initial($this->options->postsListSize); ?>
</ul>
</section>
<?php endif; ?>
<?php $this->need('images.php'); ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowGoodPosts', $this->options->sidebarBlock)): ?>
<section class=" widget">
<div class="widget-title iconfont icon-top">&nbsp;热评文章</div>
<ul class="widget-list">
<?php Contents_Post_Initial($this->options->postsListSize, 'commentsNum'); ?>
</ul>
</section>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowHotPosts', $this->options->sidebarBlock)): ?>
<section class="widget">
<div class="widget-title iconfont icon-remen">&nbsp;热门文章</div>
<ul class="widget-list">
<?php Contents_Post_Initial($this->options->postsListSize, 'views'); ?>
</ul>
</section>
<?php endif; ?>
<section class="widget">
<p>
<a href="http://106.37.208.243:8068/GJZ/Business/Publish/Main.html" target="_blank" rel="nofollow" title="地表水实时监测查询平台" ><img name="2" src="http://file.yxjnotes.top/blog/typecho/uWve2T.jpg" width="100%" height="100" alt="地表水实时监测平台" style="border-radius:8px;"/></a><br><br>
<a href="http://1.202.247.200/netreport/netreport/index" target="_blank" rel="nofollow" title="环保部环境污染网上举报平台"><img name="4" src="http://file.yxjnotes.top/blog/typecho/uWvZGV.jpg" width="100%" height="100" alt="环保部环境污染网上举报平台" style="border-radius:8px;"/></a></p>	
</section>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
<section class="widget">
<div class="widget-title iconfont icon-fenlei2">&nbsp;文章分类</div>
<ul class="widget-tile">
<?php $this->widget('Widget_Metas_Category_List')
->parse('<li class="right-fenlei"><a href="{permalink} "  title="污水处理笔记之{name}">{name}</a></li>'); ?>
</ul>
</section>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowTag', $this->options->sidebarBlock)): ?>
<section class="widget">
<div class="widget-title iconfont icon-biaoqian">&nbsp;专业术语</div>
<ul class="widget-tile">
<?php $this->widget('Widget_Metas_Tag_Cloud@sidebar', 'sort=mid&ignoreZeroCount=1&desc=0&limit=20')->to($tags); ?>
<?php if($tags->have()): ?>
<?php while($tags->next()): ?>
<li class="right-tags"><a href="<?php $tags->permalink(); ?>" <?php if (!empty($this->options->colortags) && in_array('sidebar', $this->options->colortags)) { echo colortags(); } ?>  title="污水处理工艺笔记-<?php $tags->name(); ?>"><?php $tags->name(); ?></a></li>
<?php endwhile; ?>
<?php if (FindContents('page-tags.php')): ?>
<li class="right-tags" ><a href="<?php echo FindContents('page-tags.php')[0]['permalink']; ?>" <?php if (!empty($this->options->colortags) && in_array('sidebar', $this->options->colortags)) { echo colortags(); } ?>>more...</a></li>
<?php endif; ?>
<?php else: ?>
<li>暂无标签</li>
<?php endif; ?>
</ul>
</section>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
<section class="widget">
<div class="widget-title iconfont icon-guidang">&nbsp;文章归档</div>
<ul class="widget-list">
<?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=Y 年 n 月')
->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
</ul>
</section>
<?php endif; ?>
<!--<?php if (!empty($this->options->ShowLinks) && in_array('sidebar', $this->options->ShowLinks)): ?>
<section class="widget">
<div class="widget-title iconfont icon-youlian">&nbsp;友情链接</div>
<ul class="widget-tile">
<?php Links($this->options->IndexLinksSort); ?>
<?php if (FindContents('page-links.php', 'order', 'a', 1)): ?>
<li class="more"><a href="<?php echo FindContents('page-links.php', 'order', 'a', 1)[0]['permalink']; ?>">more...</a></li>
<?php endif; ?>
</ul>
</section>
<?php endif; ?>-->
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
<section class="widget">
<div class="widget-title iconfont icon-shezhi">&nbsp;站点导航</div>
<ul class="widget-list">
<li><a href="<?php $this->options->feedUrl(); ?>" target="_blank">文章 RSS</a></li>
<li><a href="<?php $this->options->commentsFeedUrl(); ?>" target="_blank">评论 RSS</a></li>
<li><a href="//www.yxjnotes.top/sitemap.xml" target="_blank">网站 MAP</a></li>
<li><a href="//www.yxjnotes.top/links/" target="_blank">网址 LINKS</a></li>
</ul>
</section>
<?php endif; ?>
<section class="widget">
<?php $this->options->postrightads != ''?$this->options->postrightads():Typecho_Widget::widget('Widget_Users_Admin')->screenName(); ?>
</section>
<section class="widget">
<div class="widget-title iconfont icon-biaoqian">&nbsp;<a href="http://www.yxjnotes.top/category/asks/" rel="_blank">每日一题</a><span id="tp-weather-widget" style="float:right;margin-right:5px;padding:0 5px 0 5px;border:1px dashed #999;border-radius: 5px;color:red;"></span></div>
<ul style="margin:0 0 10px -10px;list-style-type:circle;"><?php $this->widget('Widget_Archive@index1', 'pageSize=1&type=category', 'mid=218')->parse('<li><a href="{permalink}"><h6 style="color:green;">{title}</h6></a><small>{content}</small></li>');?></ul>
</section>
<script>
  (function(a,h,g,f,e,d,c,b){b=function(){d=h.createElement(g);c=h.getElementsByTagName(g)[0];d.src=e;d.charset="utf-8";d.async=1;c.parentNode.insertBefore(d,c)};a["SeniverseWeatherWidgetObject"]=f;a[f]||(a[f]=function(){(a[f].q=a[f].q||[]).push(arguments)});a[f].l=+new Date();if(a.attachEvent){a.attachEvent("onload",b)}else{a.addEventListener("load",b,false)}}(window,document,"script","SeniverseWeatherWidget","//cdn.sencdn.com/widget2/static/js/bundle.js?t="+parseInt((new Date().getTime() / 100000000).toString(),10)));
  window.SeniverseWeatherWidget('show', {
    flavor: "slim",
    location: "WX4FBXXFKE4F",
    geolocation: true,
    language: "auto",
    unit: "c",
    theme: "auto",
    token: "09294720-659e-441b-9dec-5d0338103bea",
    hover: "enabled",
    container: "tp-weather-widget"
  })
</script>
</div>
</div>
