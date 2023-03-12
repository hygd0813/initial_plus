<?php
/**
 * 轻语
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
function threadedComments($comments, $options) {
	$commentClass = '';
	if ($comments->authorId) {
		if ($comments->authorId == $comments->ownerId) {
			$commentClass .= ' comment-by-author';
		} else {
			$commentClass .= ' comment-by-user';
		}
	}
?>
<li id="li-<?php $comments->theId(); ?>" class="<?php
	if ($comments->levels == 0) {
		echo ' whisper-body';
	} elseif ($comments->levels == 1) {
		echo 'comment-body comment-parent';
	} else {
		echo 'comment-body comment-child';
	}
echo $commentClass;
?>">
<div id="<?php $comments->theId(); ?>"<?php
	if ($comments->levels > 0) {
		echo ' class="comment-whisper"';
	}
?>>
<?php if ($comments->levels == 0) { ?>
<div class="comment-author">
<?php $comments->gravatar('32'); ?>
<cite><?php CommentAuthor($comments); ?></cite>
<?php if ($comments->status == 'waiting') { ?>
<em class="comment-awaiting-moderation">内容被拦截，请前往后台-管理评论-通过审核。</em>
<?php } ?>
</div>
<div class="comment-meta">
<time><?php $comments->date("F j, Y, g:i a"); ?></time>
<span style="float:right;color:#999;font-size:12px;"><?php $comments->useragent($agentConfig = null); ?>
</span>
</div>
<div class="comment-content">
<!--主题自带评论形式<?php echo strip_tags(hrefOpen(Markdown::convert($comments->text)), '<p><br><strong><a><img><pre><code>' . Helper::options()->commentsHTMLTagAllowed); ?>-->
<?php echo preg_replace('#\@\((.*?)\)#', '<img src="http://www.yxjnotes.top/usr/themes/initial_plus/img/smiles/$1.png">', $comments->content); ?><br/>
</div>
<div class="comment-meta">
<?php if (Helper::options()->commentsThreaded && !$comments->isTopLevel && $comments->parameter->allowComment) {
		echo '  <a class="whisper-reply" onclick="return TypechoComment.reply(\'' . $comments->theId . '\', ' . $comments->coid . ');">点评</a>';
} ?>
</div>
<?php } else { ?>
<div class="comment-author comment-content">
<?php $comments->gravatar('16'); ?>
<cite><?php CommentAuthor($comments); ?>: </cite>
<span <?php
	if (Helper::options()->commentsThreaded && !$comments->isTopLevel && $comments->parameter->allowComment) {
		echo ' class="whisper-reply" onclick="return TypechoComment.reply(\'' . $comments->theId . '\', ' . $comments->coid . ');"';
	}
?>><?php if ($comments->levels > 1) {CommentAt($comments->coid);}echo strip_tags(str_replace("\r\n", "<br>", $comments->text), "<br>"); ?></span>
<?php if ($comments->status == 'waiting') { ?>
<em>您的评论正等待审核！</em>
<?php } ?>
</div>
<?php } ?>
</div>
<?php if ($comments->children) { ?>
<div class="comment-children">
<?php $comments->threadedComments($options); ?>
</div>
<?php } ?>
</li>
<?php } ?>
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
<div class="thumb post-toutu<?php if (!$this->content): ?>1<?php endif; ?>"><?php echo postThumb($this); ?></div>
<?php endif; ?>
<?php if ($this->content): ?>
<div class="post-wenzhang">
<div class="post-content">
<?php echo parseContent($this); ?>
</div>
</div>
<?php endif; ?>
</article>
<div id="comments" class="whisper<?php if($this->user->pass('editor', true)): ?> permission<?php endif; ?>">
<?php $this->comments()->to($comments); ?>
<?php if ($comments->have()): ?>
<?php $comments->listComments(); ?>
<?php $comments->pageNav('上一页', '下一页', 0, '..'); ?>
<?php endif; ?>
<?php if($this->allow('comment')): ?>
<div id="<?php $this->respondId(); ?>" class="respond">
<div class="cancel-comment-reply">
<?php $comments->cancelReply('取消评论'); ?>
</div>
<h3 id="response">发表<?php echo $this->user->pass('editor', true) ? '轻语' : '评论' ?></h3>
<form method="post"<?php if($this->user->pass('editor', true)): ?> action="<?php $this->commentUrl() ?>"<?php endif; ?> id="comment-form"<?php if(!$this->user->hasLogin()): ?> class="comment-form clearfix"<?php endif; ?>>
<p <?php if(!$this->user->hasLogin()): ?>class="textarea"<?php endif; ?>>
<textarea name="text" id="textarea" placeholder="嘿！今天有什么想记录一下的吗……" required ><?php $this->remember('text'); ?></textarea>
</p>
<p <?php if(!$this->user->hasLogin()): ?>class="textbutton"<?php endif; ?>>
<?php if(!$this->user->hasLogin()): ?>
<input type="text" name="author" id="author" class="text" placeholder="称呼 *" value="<?php $this->remember('author'); ?>" required />
<input type="email" name="mail" id="mail" class="text" placeholder="邮箱<?php if ($this->options->commentsRequireMail): ?> *<?php endif; ?>" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
<input type="url" name="url" id="url" class="text" placeholder="http://<?php if ($this->options->commentsRequireURL): ?> *<?php endif; ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
<?php endif; ?>
<button type="button" onclick="OwO_show()" class="submit<?php if(!$this->user->hasLogin()): ?> tijiao<?php endif; ?>"  style="margin-bottom:10px;"><i class="iconfont icon-biaoqing" style="font-size:20px;"></i></button>
<?php if(!$this->user->hasLogin() && $this->options->commentcaptcha): spam_protection_math(); endif; ?>
<button type="submit" class="submit<?php if(!$this->user->hasLogin()): ?> tijiao<?php endif; ?>">提交</button>
</p>
<?php $this->need('OwO.php'); ?>
</form>
</div>
<script type="text/javascript">
 function OwO_show() {
    if ($("#OwO-container").css("display") == 'none') {
        $("#OwO-container").slideDown();
    } else {
        $("#OwO-container").slideUp();
    }
}
</script>
<script type="text/javascript">
Smilies = {
    dom: function(id) {
        return document.getElementById(id);
    },
    grin: function(tag) {
        tag = ' ' + tag + ' ';
        myField = this.dom("textarea");
        document.selection ? (myField.focus(), sel = document.selection.createRange(), sel.text = tag, myField.focus()) : this.insertTag(tag);
    },
    insertTag: function(tag) {
        myField = Smilies.dom("textarea");
        myField.selectionStart || myField.selectionStart == "0" ? (startPos = myField.selectionStart, endPos = myField.selectionEnd, cursorPos = startPos, myField.value = myField.value.substring(0, startPos) + tag + myField.value.substring(endPos, myField.value.length), cursorPos += tag.length, myField.focus(), myField.selectionStart = cursorPos, myField.selectionEnd = cursorPos) : (myField.value += tag, myField.focus());
    }
}
</script>
<?php $this->options->postmiddleads0 != ''?$this->options->postmiddleads0():Typecho_Widget::widget('Widget_Users_Admin')->screenName();?>
<?php if ($this->options->commentsThreaded): ?>
<script>(function(){window.TypechoComment={dom:function(id){return document.getElementById(id)},create:function(tag,attr){var el=document.createElement(tag);for(var key in attr){el.setAttribute(key,attr[key])}return el},reply:function(cid,coid){var comment=this.dom(cid),parent=comment.parentNode,response=this.dom('<?php $this->respondId(); ?>'),input=this.dom('comment-parent'),form='form'==response.tagName?response:response.getElementsByTagName('form')[0],textarea=response.getElementsByTagName('textarea')[0];if(null==input){input=this.create('input',{'type':'hidden','name':'parent','id':'comment-parent'});form.appendChild(input)}input.setAttribute('value',coid);if(null==this.dom('comment-form-place-holder')){var holder=this.create('div',{'id':'comment-form-place-holder'});response.parentNode.insertBefore(holder,response)}form.setAttribute('action', '<?php $this->commentUrl() ?>');<?php if($this->user->pass('editor', true)): ?>this.dom('response').innerHTML='发表评论';<?php endif; ?>comment.appendChild(response);this.dom('cancel-comment-reply-link').style.display='';if(null!=textarea&&'text'==textarea.name){textarea.focus()}return false},cancelReply:function(){var response=this.dom('<?php $this->respondId(); ?>'),holder=this.dom('comment-form-place-holder'),input=this.dom('comment-parent'),form='form'==response.tagName?response:response.getElementsByTagName('form')[0];if(null!=input){input.parentNode.removeChild(input)}if(null==holder){return true}this.dom('cancel-comment-reply-link').style.display='none';form.removeAttribute('action');<?php if($this->user->pass('editor', true)): ?>this.dom('response').innerHTML='发表轻语';<?php endif; ?>holder.parentNode.insertBefore(response,holder);return false}}})();</script>
<?php endif; ?>
<?php endif; ?>
</div>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
<style>
@font-face {
	font-family:hbk;
	src: url('http://file.yxjnotes.top/fonts/hbks.ttf');
}
}
</style>