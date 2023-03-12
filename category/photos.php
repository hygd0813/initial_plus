<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="main">
<div class="breadcrumbs mianbao iconfont icon-shouye">
<a href="<?php $this->options->siteUrl(); ?>">返回首页</a> &raquo; <?php $this->archiveTitle(array('category'  =>  _t('【%s】')), '', ''); ?></div>
<ul class="post-near">
<?php $this->options->postmiddleads != ''?$this->options->postmiddleads():Typecho_Widget::widget('Widget_Users_Admin')->screenName();?>
</ul>
<?php if ($this->getDescription()): ?>
<div class="fenlei-miaoshu"><?php echo $this->getDescription(); ?></div>
<?php endif; ?>
<?php if ($this->have()): ?>
<div class="photos">
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
<a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>">
<div class="fpic1">
<div class="fpic2">
<?php if (postThumb($this)): ?>
<?php echo postThumb($this); ?>
<?php else: ?>
<?php if ($this->options->lazyimg): ?>
<img src="<?php cjUrl('img/postThumb-load.gif'); ?>" data-original="<?php cjUrl('img/category-photos.png'); ?>">
<?php else: ?>
<img src="<?php cjUrl('img/category-photos.png'); ?>">
<?php endif; ?>	
<?php endif; ?>	
</div>
<div class="fpic-wenzi">
<li class="fpic-title">&nbsp;<?php $this->title() ?></li>
<li class="fpic-meta">&nbsp;<?php $this->date(); ?></li>
</div>
</div>
</a>
<?php endif; ?>
</div>
</article>
<?php endwhile; ?>
</div>
<?php else: ?>
<article class="post">
<h2 class="post-title" style="text-align: center;">没有找到内容</h2>
</article>
<?php endif; ?>
<?php $this->pageNav('上一页', $this->options->AjaxLoad ? '查看更多' : '下一页', 2, '..', $this->options->AjaxLoad ? array('wrapClass' => 'page-navigator ajaxload') : ''); ?>
<ul class="post-near">
<?php $this->options->postmiddleads0 != ''?$this->options->postmiddleads0():Typecho_Widget::widget('Widget_Users_Admin')->screenName();?>
</ul>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>