<?php
/**
 * iframe引用框架
 *
 * @package custom
 */
?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="main" style="width:100%;">
<div class="post-biaoti">
<h2 class="post-title"><?php if ($this->fields->original == 1): ?><span class="original" title="作者原创">原创</span><?php endif; ?><?php $this->title() ?></h2>
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
<div class="thumb post-toutu<?php if (!$this->content): ?>1<?php endif; ?>"><?php echo postThumb($this); ?></div>
<?php endif; ?>
<?php if ($this->content): ?>
<div class="post-wenzhang">
<div class="post-content">
<p><iframe  src="<?php $this->fields->iframeurl(); ?>"  frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="10px" width=100% height=800></iframe></p>
<hr/><?php echo parseContent($this); ?>
</div>
</article>
<?php endif; ?>
<?php $this->need('comments.php'); ?>
</div>
<?php $this->need('footer.php'); ?>