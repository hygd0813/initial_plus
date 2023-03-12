<?php
/**
 * 归档
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
</div>
<?php
$this->widget('Widget_Contents_Post_Recent', 'pageSize='.Typecho_Widget::widget('Widget_Stat')->publishedPostsNum)->to($archives);
$year=0; $mon=0;
$output = '<div id="archives">';
while($archives->next()){
	$year_tmp = date('Y',$archives->created);
	$mon_tmp = date('m',$archives->created);
	if ($mon > $mon_tmp) {
		$output .= '</ul></li>';
	}
	if ($year > $year_tmp) {
		$output .= '</ul>';
	}
	if ($year != $year_tmp) {
		$year = $year_tmp;
		$output .= '<font class="iconfont icon-rili titleicon">&nbsp;'.date('Y 年',$archives->created).'</font><ul>';
	}
	if ($mon != $mon_tmp) {
		$mon = $mon_tmp;
		$output .= '<li><h4>'.date('m 月',$archives->created).'</h4><ul>'; 
	}
	if ($this->options->PjaxOption && $archives->hidden) {
		$output .= '<li>'.date('d日：',$archives->created).'<a>'. $archives->title .'</a></li>';
	} else {
		$output .= $archives->commentsNum ? '<li>'.date('d日：',$archives->created).'<a href="'.$archives->permalink .'">'. $archives->title .'</a><span class="mcount" style="float:right;">('.$archives->commentsNum.')</span></li>' : '<li>'.date('d日：',$archives->created).'<a href="'.$archives->permalink .'">'. $archives->title .'</a></li>';
	}
}
$output .= '</ul></li></ul></div>';
echo $output;
?>
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