<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

//加载短代码
require_once __DIR__ . '/lib/shortcode.php';

//注册短代码toggle
function shortcode_toggle( $atts, $content = '' ){
	static $count = 0;
	$count++;
	$args = shortcode_atts( array('title' => '点击展开阅读更多内容','color' => '#666'), $atts );
	return '<div class="panel">
				<a data-toggle="collapse" href="#toggle-'.$count.'">
					<div class="panel-title iconfont icon-jiaodian icon-toggle-close" style="background-color:'.$args['color'].'">'.$args['title'].'</div>
				</a>
				<div id="toggle-'.$count.'" class="collapse">
					<div class="panel-body">'.$content.'</div>
				</div>
			</div>';
}
add_shortcode( 'toggle', 'shortcode_toggle' );

//注册短代码highlight
function shortcode_highlight( $atts, $content = '' ){
	$args = shortcode_atts( array('title' => '重要内容','color' => '#666'), $atts );
	return '<div class="highlight"><div class="highlight-title iconfont icon-highlight" style="background-color:'.$args['color'].'">&nbsp;'.$args['title'].'</div><div class="highlight-content">'.$content.'</div></div>';
}
add_shortcode( 'highlight', 'shortcode_highlight' );

//项目面板 注册短代码tips
function shortcode_panel_tips( $atts, $content = '' ) {
    return '<div class="tips mc-panel p-tips iconfont icon-tips clearfix">' . $content . '</div>';
}
add_shortcode( 'tips' , 'shortcode_panel_tips' );

//禁止面板 注册短代码noway
function shortcode_panel_noway( $atts, $content = '' ) {
    return '<div class="tips mc-panel p-noway iconfont icon-noway clearfix">' . $content . '</div>';
}
add_shortcode( 'noway' , 'shortcode_panel_noway' );

//警告面板 注册短代码warning
function shortcode_panel_warning( $atts, $content = '' ) {
    return '<div class="tips mc-panel p-warning iconfont icon-warning clearfix">' . $content . '</div>';
}
add_shortcode( 'warning' , 'shortcode_panel_warning' );

//购买面板 注册短代码buy
function shortcode_panel_buy( $atts, $content = '' ) {
    return '<div class="tips mc-panel p-buy iconfont icon-buy clearfix">' . $content . '</div>';
}
add_shortcode( 'buy' , 'shortcode_panel_buy' );

//下载面板 注册短代码note
function shortcode_panel_note( $atts, $content = '' ) {
    return '<div class="tips mc-panel p-note iconfont icon-note clearfix">' . $content . '</div>';
}
add_shortcode( 'note' , 'shortcode_panel_note' );

//下载面板 注册短代码ref
function shortcode_panel_ref( $atts, $content = '' ) {
    return '<div class="tips mc-panel p-ref iconfont icon-link clearfix">' . $content . '</div>';
}
add_shortcode( 'ref' , 'shortcode_panel_ref' );

//焦点按钮 注册短码focus
function shortcode_focus_button( $atts, $content= ''){
	static $count = 0;
	$count++;
	$args = shortcode_atts( array('title' => '焦点内容','color' => '#666','name' => '点击查看焦点内容'), $atts );
	return '<button class="focus-bnt iconfont icon-jiaodian" style="background-color:'.$args['color'].'" data-toggle="modal" data-target="#focus-'.$count.'">'.$args['name'].'</button><div class="modal fade focus" id="focus-'.$count.'" tabindex="-1" role="dialog"><div class="modal-dialog"><div class="modal-header" style="background-color:'.$args['color'].'"><button type="button" class="close" data-dismiss="modal">&times;</button><span class="modal-title iconfont icon-jujiao">&nbsp;'.$args['title'].'</span></div><div class="focus-content">'.$content.'</div><div class="modal-footer"><button type="button" class="focus-bnt-close" style="background-color:'.$args['color'].'" data-dismiss="modal">关闭</button></div></div></div>';
}
add_shortcode('focus','shortcode_focus_button');

//下载按钮 注册短码down
function shortcode_down_button( $atts, $content = '' ){
	$args = shortcode_atts( array('url' => Typecho_Widget::widget('Widget_Options')->siteUrl,'color' => '#38a3fd','blank' => 1), $atts );
	if($args['blank']) {
		return '<button class="xiazai-bnt iconfont icon-down" style="background-color:'.$args['color'].'" onclick="window.open(&quot;'.$args['url'].'&quot;,&quot;_blank&quot;)">'.$content.'</button>';
	} else {
		return '<a href="'.$args['url'].'"><button class="xiazai-bnt iconfont icon-down" style="background-color:'.$args['color'].'">'.$content.'</button></a>';
	}
}
add_shortcode( 'down', 'shortcode_down_button' );

//链接按钮 注册短码link
function shortcode_link_button( $atts, $content = '' ){
	$args = shortcode_atts( array('url' => Typecho_Widget::widget('Widget_Options')->siteUrl,'color' => '#9f9f9f','blank' => 1), $atts );
	if($args['blank']) {
		return '<button class="xiazai-bnt iconfont icon-link" style="background-color:'.$args['color'].'" onclick="window.open(&quot;'.$args['url'].'&quot;,&quot;_blank&quot;)">'.$content.'</button>';
	} else {
		return '<a href="'.$args['url'].'"><button class="xiazai-bnt iconfont icon-link" style="background-color:'.$args['color'].'">'.$content.'</button></a>';
	}
}
add_shortcode( 'link', 'shortcode_link_button' );

//购物按钮 注册短码shop
function shortcode_shop_button( $atts, $content = '' ){
	$args = shortcode_atts( array('url' => Typecho_Widget::widget('Widget_Options')->siteUrl,'color' => '#ff4400','blank' => 1), $atts );
	if($args['blank']) {
		return '<button class="xiazai-bnt iconfont icon-shop" style="background-color:'.$args['color'].'" onclick="window.open(&quot;'.$args['url'].'&quot;,&quot;_blank&quot;)">'.$content.'</button>';
	} else {
		return '<a href="'.$args['url'].'"><button class="xiazai-bnt iconfont icon-shop" style="background-color:'.$args['color'].'">'.$content.'</button></a>';
	}
}
add_shortcode( 'shop', 'shortcode_shop_button' );

//隔壁按钮 注册短码github
function shortcode_github_button( $atts, $content = '' ){
	$args = shortcode_atts( array('url' => Typecho_Widget::widget('Widget_Options')->siteUrl,'color' => '#363a3e','blank' => 1), $atts );
	if($args['blank']) {
		return '<button class="xiazai-bnt iconfont icon-github" style="background-color:'.$args['color'].'" onclick="window.open(&quot;'.$args['url'].'&quot;,&quot;_blank&quot;)">'.$content.'</button>';
	} else {
		return '<a href="'.$args['url'].'"><button class="xiazai-bnt iconfont icon-github" style="background-color:'.$args['color'].'">'.$content.'</button></a>';
	}
}
add_shortcode( 'github', 'shortcode_github_button' );

//Steam按钮 注册短码steam
function shortcode_steam_button( $atts, $content = '' ){
	$args = shortcode_atts( array('url' => Typecho_Widget::widget('Widget_Options')->siteUrl,'color' => '#1b2838','blank' => 1), $atts );
	if($args['blank']) {
		return '<button class="xiazai-bnt iconfont icon-steam" style="background-color:'.$args['color'].'" onclick="window.open(&quot;'.$args['url'].'&quot;,&quot;_blank&quot;)">'.$content.'</button>';
	} else {
		return '<a href="'.$args['url'].'"><button class="xiazai-bnt iconfont icon-steam" style="background-color:'.$args['color'].'">'.$content.'</button></a>';
	}
}
add_shortcode( 'steam', 'shortcode_steam_button' );

//weibo按钮 注册短码weibo
function shortcode_weibo_button( $atts, $content = '' ){
	$args = shortcode_atts( array('url' => Typecho_Widget::widget('Widget_Options')->siteUrl,'color' => '#e6162d','blank' => 1), $atts );
	if($args['blank']) {
		return '<button class="xiazai-bnt iconfont icon-weibo" style="background-color:'.$args['color'].'" onclick="window.open(&quot;'.$args['url'].'&quot;,&quot;_blank&quot;)">'.$content.'</button>';
	} else {
		return '<a href="'.$args['url'].'"><button class="xiazai-bnt iconfont icon-weibo" style="background-color:'.$args['color'].'">'.$content.'</button></a>';
	}
}
add_shortcode( 'weibo', 'shortcode_weibo_button' );

//mail按钮 注册短码mail
function shortcode_mail_button( $atts, $content = '' ){
	$args = shortcode_atts( array('url' => 'admin@alttt.com','color' => '#3fc1bf','blank' => 1), $atts );
	if($args['blank']) {
		return '<button class="xiazai-bnt iconfont icon-youjian" style="background-color:'.$args['color'].'" onclick="window.open(&quot;mailto:'.$args['url'].'&quot;,&quot;_blank&quot;)">'.$content.'</button>';
	} else {
		return '<a href="mailto:'.$args['url'].'"><button class="xiazai-bnt iconfont icon-youjian" style="background-color:'.$args['color'].'">'.$content.'</button></a>';
	}
}
add_shortcode( 'mail', 'shortcode_mail_button' );

//gitee按钮 注册短码gitee
function shortcode_gitee_button( $atts, $content = '' ){
	$args = shortcode_atts( array('url' => Typecho_Widget::widget('Widget_Options')->siteUrl,'color' => '#ce3c40','blank' => 1), $atts );
	if($args['blank']) {
		return '<button class="xiazai-bnt iconfont icon-gitee" style="background-color:'.$args['color'].'" onclick="window.open(&quot;'.$args['url'].'&quot;,&quot;_blank&quot;)">'.$content.'</button>';
	} else {
		return '<a href="'.$args['url'].'"><button class="xiazai-bnt iconfont icon-gitee" style="background-color:'.$args['color'].'">'.$content.'</button></a>';
	}
}
add_shortcode( 'gitee', 'shortcode_gitee_button' );

//baidu按钮 注册短码baidu
function shortcode_baidu_button( $atts, $content = '' ){
	$args = shortcode_atts( array('url' => Typecho_Widget::widget('Widget_Options')->siteUrl,'color' => '#09aaff','blank' => 1), $atts );
	if($args['blank']) {
		return '<button class="xiazai-bnt iconfont icon-baiduwangpan" style="background-color:'.$args['color'].'" onclick="window.open(&quot;'.$args['url'].'&quot;,&quot;_blank&quot;)">'.$content.'</button>';
	} else {
		return '<a href="'.$args['url'].'"><button class="xiazai-bnt iconfont icon-baiduwangpan" style="background-color:'.$args['color'].'">'.$content.'</button></a>';
	}
}
add_shortcode( 'baidu', 'shortcode_baidu_button' );

//csdn按钮 注册短码csdn
function shortcode_csdn_button( $atts, $content = '' ){
	$args = shortcode_atts( array('url' => Typecho_Widget::widget('Widget_Options')->siteUrl,'color' => '#ff4d4d','blank' => 1), $atts );
	if($args['blank']) {
		return '<button class="xiazai-bnt iconfont icon-csdn" style="background-color:'.$args['color'].'" onclick="window.open(&quot;'.$args['url'].'&quot;,&quot;_blank&quot;)">'.$content.'</button>';
	} else {
		return '<a href="'.$args['url'].'"><button class="xiazai-bnt iconfont icon-csdn" style="background-color:'.$args['color'].'">'.$content.'</button></a>';
	}
}
add_shortcode( 'csdn', 'shortcode_csdn_button' );

//zhihu按钮 注册短码zhihu
function shortcode_zhihu_button( $atts, $content = '' ){
	$args = shortcode_atts( array('url' => Typecho_Widget::widget('Widget_Options')->siteUrl,'color' => '#0066ff','blank' => 1), $atts );
	if($args['blank']) {
		return '<button class="xiazai-bnt iconfont icon-zhihu" style="background-color:'.$args['color'].'" onclick="window.open(&quot;'.$args['url'].'&quot;,&quot;_blank&quot;)">'.$content.'</button>';
	} else {
		return '<a href="'.$args['url'].'"><button class="xiazai-bnt iconfont icon-zhihu" style="background-color:'.$args['color'].'">'.$content.'</button></a>';
	}
}
add_shortcode( 'zhihu', 'shortcode_zhihu_button' );

//bilibili按钮 注册短码bilibili
function shortcode_bilibili_button( $atts, $content = '' ){
	$args = shortcode_atts( array('url' => Typecho_Widget::widget('Widget_Options')->siteUrl,'color' => '#fb7299','blank' => 1), $atts );
	if($args['blank']) {
		return '<button class="xiazai-bnt iconfont icon-bilibili" style="background-color:'.$args['color'].'" onclick="window.open(&quot;'.$args['url'].'&quot;,&quot;_blank&quot;)">'.$content.'</button>';
	} else {
		return '<a href="'.$args['url'].'"><button class="xiazai-bnt iconfont icon-bilibili" style="background-color:'.$args['color'].'">'.$content.'</button></a>';
	}
}
add_shortcode( 'bilibili', 'shortcode_bilibili_button' );

//weixin按钮 注册短码weixin
function shortcode_weixin_button( $atts, $content= ''){
	static $count = 0;
	$count++;
	$args = shortcode_atts( array('url' => Typecho_Widget::widget('Widget_Options')->themeUrl.'/qrcode.php?size=235&text='.Typecho_Widget::widget('Widget_Options')->siteUrl,'title' => '微信扫一扫','color' => '#1aad19'), $atts );
	return '
	<button class="focus-bnt iconfont icon-weixin" style="background-color:'.$args['color'].'" data-toggle="modal" data-target="#weixin-'.$count.'">'.$content.'</button>
	<div class="modal fade" id="weixin-'.$count.'" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-header">
				<button type="button" class="close font-color" data-dismiss="modal">&times;</button>
				<span class="modal-title iconfont icon-saoyisao font-color">&nbsp;'.$args['title'].'</span>
			</div>
			<div class="tab-content"><img src="'.$args['url'].'" alt="微信二维码"></div>
			<div class="modal-footer">
				<button type="button" class="focus-bnt-close font-color" data-dismiss="modal">关闭</button>
			</div>
		</div>
	</div>';
}
add_shortcode('weixin','shortcode_weixin_button');

//qrcode按钮 注册短码qrcode
function shortcode_qrcode_button( $atts, $content= ''){
	static $count = 0;
	$count++;
	$args = shortcode_atts( array('url' => Typecho_Widget::widget('Widget_Options')->themeUrl.'/qrcode.php?size=235&text='.Typecho_Widget::widget('Widget_Options')->siteUrl,'title' => '手机扫一扫','color' => '#666'), $atts );
	return '
	<button class="focus-bnt iconfont icon-Qr_code" style="background-color:'.$args['color'].'" data-toggle="modal" data-target="#qrcode-'.$count.'">'.$content.'</button>
	<div class="modal fade" id="qrcode-'.$count.'" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-header">
				<button type="button" class="close font-color" data-dismiss="modal">&times;</button>
				<span class="modal-title iconfont icon-saoyisao font-color">&nbsp;'.$args['title'].'</span>
			</div>
			<div class="tab-content"><img src="'.$args['url'].'" alt="二维码"></div>
			<div class="modal-footer">
				<button type="button" class="focus-bnt-close font-color" data-dismiss="modal">关闭</button>
			</div>
		</div>
	</div>';
}
add_shortcode('qrcode','shortcode_qrcode_button');