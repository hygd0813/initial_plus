<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="main">
<div class="post-biaoti">
<h2 class="post-title"><?php if ($this->fields->original == 1): ?><span class="original" title="作者原创">原创</span><?php endif; ?><?php $this->title() ?></h2>
<ul class="post-meta">
<!--<?php if ($this->options->isauthor): ?><li class="iconfont icon-wo" title="作者">&nbsp;<a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a></li><?php endif; ?>-->
<li class="iconfont icon-rili" title="发布日期">&nbsp;<?php $this->date('Y-m-d g:i a'); ?></li>
<li class="iconfont icon-fenlei" title="文章分类">&nbsp;<?php $this->category(','); ?></li>
<?php if($this->allow('comment')): ?>
<li class="iconfont icon-pinglun" title="文章评论">&nbsp;<a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('暂无', '%d'); ?></a></li>
<?php else: ?>
<li class="iconfont icon-pinglun" title="评论关闭">&nbsp;关闭</li>
<?php endif; ?>
<li class="iconfont icon-yanjing" title="文章阅读">&nbsp;<?php Postviews($this); ?></li>
<li  title="编辑"><?php if($this->user->hasLogin()):?><a href="<?php $this->options->adminUrl(); ?>write-post.php?cid=<?php echo $this->cid;?>" target="_blank"><b> <span style="color:red;">编辑</span></b></a></li><?php endif;?>
<!--<li  title="字体大小"><span class="smaller textdx">/ a </span><span class="bigger textdx"> A&nbsp; </span> </li>-->
</ul>
</div>
<?php if (!empty($this->options->Breadcrumbs) && in_array('Postshow', $this->options->Breadcrumbs)): ?>
<div class="breadcrumbs post-mianbao iconfont icon-shouye">
<a href="<?php $this->options->siteUrl(); ?>">首页</a> &raquo; <?php $this->category(); ?> &raquo; <?php if (!empty($this->options->Breadcrumbs) && in_array('Text', $this->options->Breadcrumbs)): ?>正文<?php else: $this->title(); endif; ?>

<div class="share" style="float:right;margin:0 0 10px 0;"><div class="bshare-custom icon-medium">
   <a title="分享到微信" class="bshare-weixin"></a> <a title="分享到新浪微博" class="bshare-sinaminiblog"></a>
 </div></div>
<script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=1&amp;lang=zh"></script>
<script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>

</div>
<?php endif; ?>
<article class="post<?php if ($this->options->PjaxOption && $this->hidden): ?> protected<?php endif; ?> post-zhengwen">
<?php if (postThumb($this)): ?>
<div class="thumb post-toutu"><?php echo postThumb($this); ?></div>
<?php endif; ?>
<div class="thumb post-toutu"><!--<a href="" rel="nofollow" target="_blank" title="荒野孤灯"><img src="http://file.yxjnotes.top/img/hygd.jpg" alt="荒野孤灯" width="100%" height="120" /></a>--><?php $this->options->postmiddleads != ''?$this->options->postmiddleads():Typecho_Widget::widget('Widget_Users_Admin')->screenName();?></div>
<div class="post-wenzhang">
<div class="post-content">
<?php echo parseContent($this); ?>
<li id="like">
<?php if ($this->options->WeChat || $this->options->Alipay || $this->options->customqr3 || $this->options->postqr): ?>
<button class="like-bnt iconfont icon-ai-code" title="手机扫码" onclick="qr()">&nbsp;&nbsp;二维码</button>
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
<?php $this->options->postmiddleads != ''?$this->options->postmiddleads():Typecho_Widget::widget('Widget_Users_Admin')->screenName();?>
<li id="theend">-   The End   -</li>
</div>
<p class="tags iconfont icon-biaoqian">&nbsp;标签: &nbsp;<?php $this->tags(', ', true, 'none'); ?></p><p class="tags iconfont icon-gengxin" title="最近更新">&nbsp;更新:&nbsp;<?php echo date('Y-m-d H:i:s', $this->modified);?> By <a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></p>
<?php if ($this->fields->original && $this->fields->original != 1 && $this->fields->original != 2): ?><p class="tags iconfont icon-zhuanzai">&nbsp;转载: <a href="<?php $this->fields->original(); ?>" target=" _blank" rel="nofollow">链接</a></p>
<p class="license"><?php echo $this->options->LicenseInfo ? $this->options->LicenseInfo : '本文采用 <a rel="license nofollow" href="https://creativecommons.org/licenses/by-sa/4.0/" target="_blank">知识共享署名-相同方式共享 4.0 国际许可协议</a> 进行许可。' ?></p>
<?php elseif ($this->fields->original == 1 || $this->fields->original == 2): ?><p class="tags iconfont icon-wo">&nbsp;作者: <a title="作者主页" href="<?php $this->author->url(); ?>" target="_blank" rel="nofollow"><?php $this->author(); ?></a>——<span style="font–size:8px;"class="license"><?php $this->author('intro'); ?></span><!--<span style="float:right;padding-right:10px;color:#999"><a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=<?php $this->author->mail(); ?>"  target="_blank" rel="nofollow"><i class="iconfont icon-youxiang" style="padding-left:15px;"></i></a></span>--></p>
<p class="tags iconfont icon-link">&nbsp;链接: <a href="<?php $this->permalink() ?>"><?php $this->permalink() ?></a></p>
<p class="license">&copy;&nbsp;版权申明: <?php echo $this->options->LicenseInfo ? $this->options->LicenseInfo : '本文采用 <a rel="license nofollow" href="https://creativecommons.org/licenses/by-sa/4.0/" target="_blank">知识共享署名-相同方式共享 4.0 国际许可协议</a> 进行许可。' ?>解释权归 <a href="<?php $this->options->siteUrl() ?>"><?php $this->options->title() ?></a> 所有，转载请注明出处。</p>
<?php else: ?>
<p class="tags iconfont icon-link">&nbsp;链接: <a href="<?php $this->permalink() ?>"><?php $this->permalink() ?></a></p>
<p class="license"><?php echo $this->options->LicenseInfo ? $this->options->LicenseInfo : '本文采用 <a rel="license nofollow" href="https://creativecommons.org/licenses/by-sa/4.0/" target="_blank">知识共享署名-相同方式共享 4.0 国际许可协议</a> 进行许可。' ?></p>
<?php endif; ?>
</div>
</article>
<section class="widget post-near">
        <h4 class="iconfont icon-link">&nbsp;&nbsp;推荐阅读</h4>
        <ul class="widget-list ">
<?php $this->related(5)->to($relatedPosts); ?>
    <?php while ($relatedPosts->next()): ?>
    <li class=" iconfont icon-zhaiyao">&nbsp;&nbsp;<a href="<?php $relatedPosts->permalink(); ?>" title="<?php $relatedPosts->title(); ?>"><?php $relatedPosts->title(); ?></a></li>
    <?php endwhile; ?>
        </ul>
</section>
<!--<ul class="post-near">
<li>上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
<li>下一篇: <?php $this->theNext('%s','没有了'); ?></li>
</ul>-->
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
<!--<div class="post-near mobile">
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
<?php if (FindContents('page-archives.php')): ?>
<li class="right-tags" ><a href="<?php echo FindContents('page-archives.php')[0]['permalink']; ?>" <?php if (!empty($this->options->colortags) && in_array('sidebar', $this->options->colortags)) { echo colortags(); } ?>>more...</a></li>
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
<!--复制内容加版权-->
<script>
document.body.addEventListener('copy', function (e) {
    if (window.getSelection().toString() && window.getSelection().toString().length > 42) {
        setClipboardText(e);
        // alert('著作权归作者所有，转载请注明出处，谢谢合作~(｡・`ω´･)');
    }
}); 
function setClipboardText(event) {
    var clipboardData = event.clipboardData || window.clipboardData;
    if (clipboardData) {
        event.preventDefault();
        var htmlData = ''
            + '© 著作权归作者所有，转载请注明出处<br>'
            + '作者：<?php $this->author() ?><br>'
            + '链接：' + window.location.href + '<br>'
            + '来源：<?php $this->options->siteUrl(); ?><br><br>'
            + window.getSelection().toString();
        var textData = ''
            + '© 著作权归作者所有，转载请注明出处\n'
            + '作者：<?php $this->author() ?>\n'
            + '链接：' + window.location.href + '\n'
            + '来源：<?php $this->options->siteUrl(); ?>\n\n'
            + window.getSelection().toString();
 
        clipboardData.setData('text/html', htmlData);
        clipboardData.setData('text/plain',textData);
    }
}
</script>
<!--复制内容加版权结束-->