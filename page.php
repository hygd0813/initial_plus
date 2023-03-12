<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="main">
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
<?php $this->options->postmiddleads != ''?$this->options->postmiddleads():Typecho_Widget::widget('Widget_Users_Admin')->screenName();?>
<?php echo parseContent($this); ?>
<?php if ($this->attachment->isImage): ?>
     <p><h3>“<?php $this->attachment->name();?>”的描述：</h3><br/><span style="padding-left:40px;"><?php $this->attachment->description();?></span></p>
<?php $this->options->postmiddleads != ''?$this->options->postmiddleads():Typecho_Widget::widget('Widget_Users_Admin')->screenName();?>	 
<?php endif; ?>

</div>
<li id="like">
<?php if ($this->options->WeChat || $this->options->Alipay || $this->options->customqr3 || $this->options->postqr): ?>
<button class="like-bnt iconfont icon-Qr_code" title="手机扫码" onclick="qr()"></button>
<div id="qr" style="display: none;">
<?php if ($this->options->WeChat): ?>
<div style="display: inline-block">
<a rel="group">
<img src="<?php echo customqr(1,1); ?>" alt="<?php echo customqr(1); ?>">
</a>
<p><?php echo customqr(1); ?></p>
</div>
<?php endif; ?>
<?php if ($this->options->Alipay): ?>
<div style="display: inline-block">
<a rel="group">
<img src="<?php echo customqr(2,1); ?>" alt="<?php echo customqr(2); ?>">
</a>
<p><?php echo customqr(2); ?></p>
</div>
<?php endif; ?>
<?php if ($this->options->customqr3): ?>
<div style="display: inline-block">
<a rel="group">
<img src="<?php echo customqr(3,1); ?>" alt="<?php echo customqr(3); ?>">
</a>
<p><?php echo customqr(3); ?></p>
</div>
<?php endif; ?>
<?php if ($this->options->postqr): ?>
<div style="display: inline-block">
<a rel="group">
<img src="<?php $this->options->themeUrl(); ?>qrcode.php?size=240&text=<?php $this->permalink(); ?>" alt="网页二维码">
</a>
<p>网页二维码</p>
</div>
<?php endif; ?>
</div>
<?php endif; ?>
</li>
<li id="theend">- The end! -</li>
<p class="tags iconfont icon-biaoqian">&nbsp;标签: <?php $this->tags(', ', true, 'none'); ?></p>
<?php if ($this->fields->original && $this->fields->original != 1 && $this->fields->original != 2): ?><p class="tags iconfont icon-zhuanzai">&nbsp;转载: <a href="###" onclick="window.open('<?php $this->fields->original(); ?>','_blank')">原文链接</a></p>
<p class="license"><?php echo $this->options->LicenseInfo ? $this->options->LicenseInfo : '本文采用 <a rel="license nofollow" href="https://creativecommons.org/licenses/by-sa/4.0/" target="_blank">知识共享署名-相同方式共享 4.0 国际许可协议</a> 进行许可。' ?></p>
<?php elseif ($this->fields->original == 1 || $this->fields->original == 2): ?><p class="license iconfont icon-wo">&nbsp;本文作者: <a title="本文作者" href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a></p>
<p class="license iconfont icon-link">&nbsp;本文链接: <a href="<?php $this->permalink() ?>"><?php $this->permalink() ?></a></p>
<p class="license">&copy;&nbsp;版权申明: <?php echo $this->options->LicenseInfo ? $this->options->LicenseInfo : '本文采用 <a rel="license nofollow" href="https://creativecommons.org/licenses/by-sa/4.0/" target="_blank">知识共享署名-相同方式共享 4.0 国际许可协议</a> 进行许可。' ?>解释权归 <a href="<?php $this->options->siteUrl() ?>"><?php $this->options->title() ?></a> 所有，转载请注明出处。</p>
<?php else: ?>
<p class="tags iconfont icon-link">&nbsp;本文链接: <a href="<?php $this->permalink() ?>"><?php $this->permalink() ?></a></p>
<p class="license"><?php echo $this->options->LicenseInfo ? $this->options->LicenseInfo : '本文采用 <a rel="license nofollow" href="https://creativecommons.org/licenses/by-sa/4.0/" target="_blank">知识共享署名-相同方式共享 4.0 国际许可协议</a> 进行许可。' ?></p>
<?php endif; ?>
</div>
<?php endif; ?>
</article>
<?php $this->need('comments.php'); ?>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>