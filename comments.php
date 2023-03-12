<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
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
<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php
	if ($comments->levels > 0) {
		echo ' comment-child';
		$comments->levelsAlt(' comment-level-odd', ' comment-level-even');
	} else {
		echo ' comment-parent';
	}
	$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">
<div id="<?php $comments->theId(); ?>">
<div class="comment-author">
<?php $comments->gravatar('32'); ?>
<cite><?php CommentAuthor($comments); ?></cite>
<?php if ($comments->authorId == $comments->ownerId) { ?>
<span class="author-icon">Author</span>
<?php } ?>
<?php if ($comments->status == 'waiting') { ?>
<em class="comment-awaiting-moderation">您的评论正等待审核！</em>
<?php } ?>
</div>
<div class="comment-meta">
<time><?php $comments->date("F j, Y, g:i a"); ?></time><span style="float:right;color:#999;font-size:12px;"><?php $comments->useragent($agentConfig = null); ?>
</span>
</div>
<div class="comment-content">
<?php echo preg_replace('#\@\((.*?)\)#', '<img src="http://www.yxjnotes.top/usr/themes/initial_plus/img/smiles/$1.png">', $comments->content); ?>
</div>
<div class="comment-reply">
<?php $comments->reply(); ?>
</div>
</div>
<?php if ($comments->children) { ?>
<div class="comment-children">
<?php $comments->threadedComments($options); ?>
</div>
<?php } ?>
</li>
<?php } ?>
<div id="comments">
<?php $this->comments()->to($comments); ?>
<?php if ($comments->have()): ?>
<h3><?php $this->commentsNum(_t('暂无评论'), _t('已有 <span class="comment-num">%d</span> 条评论')); ?></h3>
<?php $comments->listComments(); ?>
<?php $comments->pageNav('上一页', '下一页', 0, '..'); ?>
<?php endif; ?>
<?php if($this->allow('comment')): ?>
<div id="<?php $this->respondId(); ?>" class="respond">
<div class="cancel-comment-reply">
<?php $comments->cancelReply(); ?>
</div>
<h3 id="response">发表评论</h3>
<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form"<?php if(!$this->user->hasLogin()): ?> class="comment-form clearfix"<?php endif; ?>>
<?php if($this->user->hasLogin()): ?>
<p>登录身份: <a href="<?php $this->options->profileUrl(); ?>" target="_blank"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"<?php if ($this->options->PjaxOption): ?> no-pjax <?php endif; ?>>退出 &raquo;</a></p>
<?php endif; ?>
<p <?php if(!$this->user->hasLogin()): ?>class="textarea"<?php endif; ?>>
<textarea name="text" id="textarea" placeholder="嘿！是不是说点什么……" required ><?php $this->remember('text'); ?></textarea>
</p>
<p <?php if(!$this->user->hasLogin()): ?>class="textbutton"<?php endif; ?>>
<?php if(!$this->user->hasLogin()): ?>
<input type="text" name="author" id="author" class="text" placeholder="称呼 *" value="<?php $this->remember('author'); ?>" required />
<input type="email" name="mail" id="mail" class="text" placeholder="QQ邮箱<?php if ($this->options->commentsRequireMail): ?> *<?php endif; ?>" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
<input type="url" name="url" id="url" class="text" placeholder="http://<?php if ($this->options->commentsRequireURL): ?> *<?php endif; ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
<?php endif; ?>
<?php if(!$this->user->hasLogin() && $this->options->commentcaptcha): spam_protection_math(); endif; ?>
<button type="button" onclick="OwO_show()" class="submit<?php if(!$this->user->hasLogin()): ?> tijiao<?php endif; ?>" style="margin:10px 0 10px 0;"><i class="iconfont icon-biaoqing" style="font-size:20px;"></i></button>
<button type="submit" class="submit<?php if(!$this->user->hasLogin()): ?> tijiao<?php endif; ?>" style="margin:10px 0 10px 0;">提交</button>
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
<script>(function(){window.TypechoComment={dom:function(id){return document.getElementById(id)},create:function(tag,attr){var el=document.createElement(tag);for(var key in attr){el.setAttribute(key,attr[key])}return el},reply:function(cid,coid){var comment=this.dom(cid),parent=comment.parentNode,response=this.dom('<?php $this->respondId(); ?>'),input=this.dom('comment-parent'),form='form'==response.tagName?response:response.getElementsByTagName('form')[0],textarea=response.getElementsByTagName('textarea')[0];if(null==input){input=this.create('input',{'type':'hidden','name':'parent','id':'comment-parent'});form.appendChild(input)}input.setAttribute('value',coid);if(null==this.dom('comment-form-place-holder')){var holder=this.create('div',{'id':'comment-form-place-holder'});response.parentNode.insertBefore(holder,response)}comment.appendChild(response);this.dom('cancel-comment-reply-link').style.display='';if(null!=textarea&&'text'==textarea.name){textarea.focus()}return false},cancelReply:function(){var response=this.dom('<?php $this->respondId(); ?>'),holder=this.dom('comment-form-place-holder'),input=this.dom('comment-parent');if(null!=input){input.parentNode.removeChild(input)}if(null==holder){return true}this.dom('cancel-comment-reply-link').style.display='none';holder.parentNode.insertBefore(response,holder);return false}}})();</script>
<?php endif; ?>
<?php else: ?>
<h3>评论关闭</h3>
<?php endif; ?>
</div>