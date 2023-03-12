<?php
/**
 * 链接
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
<ul class="links">
<?php if ($this->options->InsideLinksIcon): ?>
<script>function erroricon(obj){var a=obj.parentNode,i=document.createElement("i");i.appendChild(document.createTextNode("★"));a.removeChild(obj);a.insertBefore(i,a.childNodes[0])}</script>
<?php endif; ?>
<?php Links($this->options->InsideLinksSort, $this->options->InsideLinksIcon ? 1 : 0); ?>
</ul>
</div>
</div>
</article>
<?php $this->need('comments.php'); ?>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>