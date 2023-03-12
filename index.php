<?php
/**
 * Initial Plus Plus - 简约而不简单 还原本质 勿忘初心
 * 
 * 
 * @package Initial Plus Plus
 * @author YXJの笔记
 * @version 3.8.5
 * @link http://www.yxjnotes.top/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<div id="main">
<div class="post-near" style="height:30px;margin-top:20px;">
<img src="<?php $this->options->themeUrl('/img/spiker.png'); ?>" width="20px;" height="20px;" style="padding-left:5px;padding-top:5px;float:left;padding-buttom:5px;" alt="站点公告" /><marquee scrollamount="5" style="color:red;float:right;width:92%;" ><?php $this->options->Gonggao != ''?$this->options->Gonggao():Typecho_Widget::widget('Widget_Users_Admin')->screenName();?></marquee>
</div>
<div class="post-near">
<img  src="http://file.yxjnotes.top/blog/typecho/DwVPjf.jpg" alt="专注环保事业" width="100%" height="120" />
</div>
<?php if($this -> options -> Cms == '1'): ?><!-- CMS开关 -->
<div class="row">
<!--热评文章-->
<?php if (!empty($this->options->indexBlock) && in_array('ShowGoodPosts', $this->options->indexBlock)): ?>
<div class="col-mb-12 col-6 homebox">
    <div class="home-catagray" style="border-radius: 8px;">
       <h2 style="border-bottom: 1px dashed #ccc;padding-bottom: 10px; -webkit-margin-before: 0.5em; -webkit-margin-after: 0.5em;"><i class="iconfont  icon-lanmu"></i><a href="#">  热评文章</a></h2> 
       <ul class="hot">
            <?php getHotComments('10');?>
       </ul>
    </div>
</div>
<?php endif; ?>
<!--热门文章-->
<?php if (!empty($this->options->indexBlock) && in_array('ShowHotPosts', $this->options->indexBlock)): ?>
<div class="col-mb-12 col-6 homebox">
    <div class="home-catagray" style="border-radius: 8px;">
       <h2 style="border-bottom: 1px dashed #ccc;padding-bottom: 10px; -webkit-margin-before: 0.5em; -webkit-margin-after: 0.5em;"><i class="iconfont  icon-lanmu"></i><a href="#">  热门文章</a></h2> 
       <ul class="hot">
        <?php getHotViews('10');?>
       </ul>
    </div>
</div>
<?php endif; ?>
</div><!-- end .row -->
<?php endif; ?>
<?php while($this->next()): ?>
<article class="post<?php if ($this->options->PjaxOption && $this->hidden): ?> protected<?php endif; ?> liebiao">
<div class="post-content">
<?php if ($this->options->PjaxOption && $this->hidden): ?>
<h2 class="post-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
<form method="post">
<p class="word">请输入密码访问</p>
<p>
<input type="password" class="text" name="protectPassword" />
<input type="submit" class="submit" value="提交" />
</p>
</form>
<?php else: ?>
<?php if (postThumb($this)): ?>
<p class="thumb"><a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"><?php echo postThumb($this); ?></a></p>
<?php endif; ?>
<h2 class="post-title"style="border-bottom: 1px dashed #ccc;padding-bottom: 5px; -webkit-margin-before: 0.5em; -webkit-margin-after: 0.5em;"><?php $this->sticky(); ?><?php if(timeZone($this->date->timeStamp)) echo '<span class="original" title="最新笔记" style="color:red">最新</span>' ?><?php if ($this->fields->original == 1): ?><span class="original" title="作者原创">原创</span><?php endif; ?><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
<?php if (postSummaryContent($this)): ?>
<p class="postOutline"><i class=" iconfont icon-zhaiyao">    </i><?php echo postSummaryContent($this); ?></p>
<?php else: ?>
<p class="postOutline"><i class=" iconfont icon-zhaiyao">    </i><?php $this->excerpt(120, ''); ?></p>
<?php endif; ?>
<?php endif; ?>
<ul class="post-meta">
<!-- <?php if ($this->options->isauthor): ?><li class="iconfont icon-wo" title="作者"><a href="<?php $this->author->permalink(); ?>"><small>&nbsp;<?php $this->author(); ?></small></a></li><?php endif; ?> -->
<li class="iconfont icon-rili" title="发布日期"><small><?php $this->date('Y-n-j'); ?></small></li>
<li class="iconfont icon-lanmu"  title="污水处理"><small><?php $this->category(','); ?></small></li>
<?php if($this->allow('comment')): ?>
<li class="iconfont icon-pinglun" title="文章评论"><small><?php $this->commentsNum('0', '%d'); ?></small></li>
<?php else: ?>
<li class="iconfont icon-pinglun" title="评论关闭"><small>关闭</small></li>
<?php endif; ?>
<li class="iconfont icon-yanjing" title="文章阅读"><small><?php Postviews($this); ?></small></li>
<!-- <li  class="lbqw"><a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>" >阅读全文</a></li> -->
</ul>
</div>
</article>
<?php endwhile; ?>
<?php $this->pageNav('上一页', $this->options->AjaxLoad ? '查看更多' : '下一页', 2, '..', $this->options->AjaxLoad ? array('wrapClass' => 'page-navigator ajaxload') : ''); ?>
<?php if($this -> options -> Cms == '1'): ?><!-- CMS开关 -->
<div class="post-near">
<?php $this->options->postmiddleads1 != ''?$this->options->postmiddleads1():Typecho_Widget::widget('Widget_Users_Admin')->screenName();?>
</div>
<!--分类文章-->
<!--首页忽略某（247）分类文章，原代码Widget_Metas_Category_List替换Widget_Metas_Category_List@options','ignore=247-->
<div class="row">
<?php $this->widget('Widget_Metas_Category_List@options','ignore=247')->to($categories);?>
<?php while ($categories->next()): ?>
<div class="col-mb-12 col-6 homebox" style="border-radius: 8px;">
    <div class="home-catagray" style="border-radius: 8px;">
       <h2 style="border-bottom: 1px dashed #ccc;padding-bottom: 10px; -webkit-margin-before: 0.5em; -webkit-margin-after: 0.5em;"><i class="iconfont  icon-lanmu"></i><a href="<?php $categories->permalink(); ?>" target="_blank">  <?php $categories->name(); ?></a><span style="float:right;padding-right:20px;font-size:10px;"><small><a href="<?php $categories->permalink(); ?>" target="_blank"><i class="iconfont icon-dian"></i></a></small></span></h2> 
       <ul class="list">
       <?php $this->widget('Widget_Archive@index-' . $categories->mid, 'pageSize=10&type=category', 'mid=' . $categories->mid)->to($posts); ?>
       <?php while ($posts->next()): ?>
         <li>
		     <span><small><?php $posts->date('m-d'); ?></small></span><a href="<?php $posts->permalink(); ?>" target="_blank"><?php $posts->title(); ?></a><?php endwhile;?>
         </li>
       </ul>
    </div>
</div>
<?php endwhile; ?>
    </div><!-- end .row -->
<?php endif; ?>
<div class="post-near">
<?php $this->options->postmiddleads0 != ''?$this->options->postmiddleads0():Typecho_Widget::widget('Widget_Users_Admin')->screenName();?>
</div>

<div class="post-near mobile">
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowGoodPosts', $this->options->sidebarBlock)): ?>
<section class=" widget">
<div class="widget-title iconfont icon-top">&nbsp;好评文章</div>
<ul class="widget-list">
<?php Contents_Post_Initial($this->options->postsListSize, 'commentsNum'); ?>
</ul>
</section>
<?php endif; ?>
</div>
<div class="post-near mobile">
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowHotPosts', $this->options->sidebarBlock)): ?>
<section class="widget">
<div class="widget-title iconfont icon-remen">&nbsp;热门文章</div>
<ul class="widget-list">
<?php Contents_Post_Initial($this->options->postsListSize, 'views'); ?>
</ul>
</section>
<?php endif; ?>
</div>

<div class="post-near mobile">
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowTag', $this->options->sidebarBlock)): ?>
<section class="widget1">
<div class="widget-title iconfont icon-biaoqian">&nbsp;专业术语</div>
<ul class="widget-tile">
<?php $this->widget('Widget_Metas_Tag_Cloud@sidebar', 'sort=mid&ignoreZeroCount=1&desc=0&limit=30')->to($tags); ?>
<?php if($tags->have()): ?>
<?php while($tags->next()): ?>
<li class="right-tags"><a href="<?php $tags->permalink(); ?>" <?php if (!empty($this->options->colortags) && in_array('sidebar', $this->options->colortags)) { echo colortags(); } ?> title="污水处理安装调试-<?php $tags->name(); ?>"><?php $tags->name(); ?></a></li>
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
</div>
<div class="post-near">
<?php if (!empty($this->options->ShowLinks) && in_array('sidebar', $this->options->ShowLinks)): ?>
<section class="widget1">
<div class="widget-title iconfont icon-youlian" style="border-bottom: 1px dashed #ccc;padding-bottom: 10px; -webkit-margin-before: 0.5em; -webkit-margin-after: 0.5em;">&nbsp;友情链接<span style="float:right;margin-right:30px;"><a href="<?php echo FindContents('page-links.php', 'order', 'a', 1)[0]['permalink']; ?>" title="申请友链"><small>申请友链+</small></a></span></div>
<ul class="widget-tile">
<?php Links($this->options->IndexLinksSort); ?>
<?php if (FindContents('page-links.php', 'order', 'a', 1)): ?>
<!--<li class="more"><a href="<?php echo FindContents('page-links.php', 'order', 'a', 1)[0]['permalink']; ?>">more...</a></li>-->
<?php endif; ?>
</ul>
</section>
<?php endif; ?>
</div>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>