<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="main">
<div class="error-page">
<h2 class="post-title">404 - 页面或文件没找到!</h2>
<p>抱歉！您想查看的页面（文件）已被转移或删除了!</p>
<div style="text-align:center;margin-top:20px;"><img width="200px;" height="auto" src="https://z3.ax1x.com/2021/05/15/g6A6H0.png"/></div>
<div style="text-align:center;margin-top:20px;"><a href="<?php $this->options->siteUrl(); ?>"><span style="color:red;height:600;font-size:24px;">- 返回首页 -</a></div>
</div>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>