<?php
/**
 * 专业术语
 *
 * @package custom
 */
?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="main">
<div class="post-biaoti">
<h2 class="post-title"><?php $this->title() ?></h2>
<ul class="post-meta">
<?php if ($this->options->isauthor): ?><li class="iconfont icon-wo" title="作者">&nbsp;<a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a></li><?php endif; ?>
<li class="iconfont icon-rili" title="发布日期">&nbsp;<?php $this->date('Y-m-d  g:i A'); ?></li>
<?php if($this->allow('comment')): ?>
<li class="iconfont icon-pinglun" title="文章评论">&nbsp;<a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('暂无', '%d'); ?></a></li>
<?php else: ?>
<li class="iconfont icon-pinglun" title="评论关闭">&nbsp;关闭</li>
<?php endif; ?>
<li class="iconfont icon-yanjing" title="文章阅读">&nbsp;<?php Postviews($this); ?></li>
</ul>
</div>
<?php if (!empty($this->options->Breadcrumbs) && in_array('Pageshow', $this->options->Breadcrumbs)): ?>
<div class="breadcrumbs post-mianbao iconfont icon-shouye">
<a href="<?php $this->options->siteUrl(); ?>">返回首页</a> &raquo; <?php $this->title() ?>
</div>
<?php endif; ?>
<article class="post post-zhengwen">
<?php if (postThumb($this)): ?>
<div class="thumb post-toutu"><?php echo postThumb($this); ?></div>
<?php endif; ?>
<div class="post-wenzhang">
<div class="post-content">
<?php echo parseContent($this); ?>
<font class="iconfont icon-biaoqian titleicon">&nbsp;专业术语</font>
<ul class="widget-tile">
<?php $this->widget('Widget_Metas_Tag_Cloud@page', 'sort=count&ignoreZeroCount=1&desc=1&limit=0')->to($tags); ?>
<?php if($tags->have()): ?>
<?php while($tags->next()): ?>
<li class="right-tags"><a href="<?php $tags->permalink(); ?>" <?php if (!empty($this->options->colortags) && in_array('page', $this->options->colortags)) { echo colortags(); } ?> title="<?php $tags->count(); ?> 篇文章"><?php $tags->name(); ?>（<?php $tags->count(); ?>）</a></li>
<?php endwhile; ?>
<?php else: ?>
<li>暂无标签</li>
<?php endif; ?>
</ul>
</div>
</article>
   <div class="row">
<!--热评文章-->
<?php if (!empty($this->options->indexBlock) && in_array('ShowGoodPosts', $this->options->indexBlock)): ?>
<div class="col-mb-12 col-6 homebox">
    <div class="home-catagray" style="border-radius: 8px;">
       <h3 style="border-bottom: 1px dashed #ccc;padding-bottom: 10px; -webkit-margin-before: 0.5em; -webkit-margin-after: 0.5em;"><a href="#">⁜  热评文章</a></h3> 
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
       <h3 style="border-bottom: 1px dashed #ccc;padding-bottom: 10px; -webkit-margin-before: 0.5em; -webkit-margin-after: 0.5em;"><a href="#">⁜  热门文章</a></h3> 
       <ul class="hot">
        <?php getHotViews('10');?>
       </ul>
    </div>
</div>
<?php endif; ?>
</div>
<?php $this->need('comments.php'); ?>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>