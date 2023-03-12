<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="main">
<div class="breadcrumbs mianbao iconfont icon-shouye">
<a href="<?php $this->options->siteUrl(); ?>">返回首页</a> &raquo; <?php $this->archiveTitle(array(
'category'  =>  _t('分类 【%s】 下的文章'),
'search'    =>  _t('包含关键字 【%s】 的文章'),
'tag'       =>  _t('标签 【%s】 下的文章'),
'date'      =>  _t('在 【%s】 发布的文章'),
'author'    =>  _t('作者 【%s】 发布的文章')
), '', ''); ?></div>
<?php if ($this->getDescription()): ?>
<div class="fenlei-miaoshu"><b>分类描述：  </b><?php echo $this->getDescription(); ?></div>
<?php endif; ?>
<div class="post-near">
<?php $this->options->postmiddleads0 != ''?$this->options->postmiddleads():Typecho_Widget::widget('Widget_Users_Admin')->screenName();?>
</div>
<div class="post-near yc">
<!--<?php $this->options->postmiddleads != ''?$this->options->postmiddleads():Typecho_Widget::widget('Widget_Users_Admin')->screenName();?>-->
<ul class="widget-tile">
<?php $this->widget('Widget_Metas_Tag_Cloud@sidebar', 'sort=mid&ignoreZeroCount=1&desc=0&limit=30')->to($tags); ?>
<?php if($tags->have()): ?>
<?php while($tags->next()): ?>
<li class="right-tags"><a href="<?php $tags->permalink(); ?>" <?php if (!empty($this->options->colortags) && in_array('sidebar', $this->options->colortags)) { echo colortags(); } ?>  title="污水处理设备仪表-<?php $tags->name(); ?>"><?php $tags->name(); ?></a></li>
<?php endwhile; ?>
<?php if (FindContents('page-tags.php')): ?>
<li class="right-tags" ><a href="<?php echo FindContents('page-tags.php')[0]['permalink']; ?>" <?php if (!empty($this->options->colortags) && in_array('sidebar', $this->options->colortags)) { echo colortags(); } ?>>more...</a></li>
<?php endif; ?>
<?php else: ?>
<li>暂无标签</li>
<?php endif; ?>
</ul>
</div>
<?php if ($this->have()): ?>
<?php while($this->next()): ?>
<article class="post<?php if ($this->options->PjaxOption && $this->hidden): ?> protected<?php endif; ?> liebiao">
<div class="post-content">
<?php if ($this->options->PjaxOption && $this->hidden): ?>
<h2 class="post-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
<form method="post">
<p class="word">请输入密码访问</p>
<p><input type="password" class="text" name="protectPassword" /><input type="submit" class="submit" value="提交" /></p>
</form>
<?php else: ?>
<?php if (postThumb($this)): ?>
<p class="thumb"><a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"><?php echo postThumb($this); ?></a></p>
<?php endif; ?>
<h2 class="post-title"style="border-bottom: 1px dashed #ccc;padding-bottom: 5px; -webkit-margin-before: 0.5em; -webkit-margin-after: 0.5em;"><?php if(timeZone($this->date->timeStamp)) echo '<span class="original" title="最新笔记" style="color:red;">最新</span>' ?><?php if ($this->fields->original == 1): ?><span class="original" title="作者原创">原创</span><?php endif; ?><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
<?php if (postSummaryContent($this)): ?>
<p class="postOutline"><i class=" iconfont icon-zhaiyao">&nbsp;&nbsp;</i><?php echo postSummaryContent($this); ?></p>
<?php else: ?>
<p class="postOutline"><i class=" iconfont icon-zhaiyao">&nbsp;&nbsp;</i><?php $this->excerpt(200, ''); ?></p>
<?php endif; ?>
<?php endif; ?>
<ul class="post-meta">
<!--<?php if ($this->options->isauthor): ?><li class="iconfont icon-wo" title="作者"><small><?php $this->author(); ?></small></li><?php endif; ?>-->
<li class="iconfont icon-rili" title="发布日期"><small><?php $this->date('Y-n-d'); ?></small></li>
<li class="iconfont icon-lanmu" title="文章分类"><small><?php $this->category(',', false); ?></small></li>
<?php if($this->allow('comment')): ?>
<li class="iconfont icon-pinglun" title="文章评论"><small><?php $this->commentsNum('0', '%d'); ?></small></li>
<?php else: ?>
<li class="iconfont icon-pinglun" title="评论关闭"><small>&nbsp;关闭</small></li>
<?php endif; ?>
<li class="iconfont icon-yanjing" title="文章阅读"><small>&nbsp;<?php Postviews($this); ?></small></li>
<!-- <span style="float:right;font-size:12px;color:#999; class="lbqw""><a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>" >阅读全文</a></span> -->
</ul></div></article>
<?php endwhile; ?>
<?php else: ?>
<article class="post">
<h2 class="post-title" style="text-align: center;">没有找到内容</h2>
</article>
<?php endif; ?>
<?php $this->pageNav('上一页', $this->options->AjaxLoad ? '查看更多' : '下一页', 2, '..', $this->options->AjaxLoad ? array('wrapClass' => 'page-navigator ajaxload') : ''); ?>
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
<ul class="post-near">
<?php $this->options->postmiddleads1 != ''?$this->options->postmiddleads1():Typecho_Widget::widget('Widget_Users_Admin')->screenName();?>
</ul>
<!--<div class="post-near mobile">
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowGoodPosts', $this->options->sidebarBlock)): ?>
<section class=" widget">
<div class="widget-title iconfont icon-top">&nbsp;好评文章</div>
<ul class="widget-list">
<?php Contents_Post_Initial($this->options->postsListSize, 'commentsNum'); ?>
</ul>
</section>
<?php endif; ?>
</div>-->
<div class="post-near mobile">
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
<section class="widget">
<div class="widget-title iconfont icon-new">&nbsp;最新文章</div>
<ul class="widget-list">
<?php Contents_Post_Initial($this->options->postsListSize); ?>
</ul>
</section>
<?php endif; ?>
</div>
<!--<div class="post-near mobile">
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowHotPosts', $this->options->sidebarBlock)): ?>
<section class="widget">
<div class="widget-title iconfont icon-remen">&nbsp;热门文章</div>
<ul class="widget-list">
<?php Contents_Post_Initial($this->options->postsListSize, 'views'); ?>
</ul>
</section>
<?php endif; ?>
</div>-->
<div class="post-near mobile">
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowTag', $this->options->sidebarBlock)): ?>
<section class="widget1">
<div class="widget-title iconfont icon-biaoqian">&nbsp;专业术语</div>
<ul class="widget-tile">
<?php $this->widget('Widget_Metas_Tag_Cloud@sidebar', 'sort=mid&ignoreZeroCount=1&desc=0&limit=30')->to($tags); ?>
<?php if($tags->have()): ?>
<?php while($tags->next()): ?>
<li class="right-tags"><a href="<?php $tags->permalink(); ?>" <?php if (!empty($this->options->colortags) && in_array('sidebar', $this->options->colortags)) { echo colortags(); } ?> title="<?php $tags->name(); ?>"><?php $tags->name(); ?></a></li>
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
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>