<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
define('INITIAL_VERSION_NUMBER', '3.8.5');
if (Helper::options()->GravatarUrl) define('__TYPECHO_GRAVATAR_PREFIX__', Helper::options()->GravatarUrl);
error_reporting(0);
function themeConfig($form) {
	$siteskin = new Typecho_Widget_Helper_Form_Element_Radio('siteskin', 
	array('white' => _t('白天模式'),
	'dark' => _t('深夜模式'),
	'auto' => _t('自动')),
	'white', _t('主题模式'), _t('默认白天模式，自动则每天22:00-7:00进入深夜模式'));
	$form->addInput($siteskin);
	$skinoptions = new Typecho_Widget_Helper_Form_Element_Checkbox('skinoptions', 
	array('radius' => _t('圆弧视窗'),
	'free' => _t('允许访客切换模式')),
	NULL, _t('主题模式选项'), _t('圆弧视窗为视窗带有半圆形弧度，允许访客切换模式，访客可以随意切换白天或深夜模式'));
	$form->addInput($skinoptions->multiMode());
	$customTitle = new Typecho_Widget_Helper_Form_Element_Text('customTitle', NULL, NULL, _t('自定义站点标题'), _t('仅用于替换页面头部位置的“标题”显示，和Typecho后台设置的站点名称不冲突，留空则显示默认站点名称'));
	$form->addInput($customTitle);
	$subTitle = new Typecho_Widget_Helper_Form_Element_Text('subTitle', NULL, NULL, _t('自定义站点副标题'), _t('浏览器副标题，仅在当前页面为首页时显示，显示格式为：<b>标题 - 副标题</b>，留空则不显示副标题'));
	$form->addInput($subTitle);
	$Gonggao = new Typecho_Widget_Helper_Form_Element_Text('Gonggao', NULL, NULL, _t('自定义站点公告'), _t('站点公告'));
	$form->addInput($Gonggao);
	$logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点标题 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以显示网站标题 LOGO'));
	$form->addInput($logoUrl);
	$titleForm = new Typecho_Widget_Helper_Form_Element_Radio('titleForm', 
	array('title' => _t('仅文字'),
	'logo' => _t('仅LOGO'),
	'all' => _t('LOGO+文字')),
	'title', _t('站点标题显示内容'), _t('默认仅显示文字标题，若要显示LOGO，请在上方添加 LOGO 地址'));
	$form->addInput($titleForm);
	$favicon = new Typecho_Widget_Helper_Form_Element_Text('favicon', NULL, NULL, _t('Favicon 地址'), _t('在这里填入一个图片 URL 地址, 以添加一个Favicon，留空则不单独设置Favicon'));
	$form->addInput($favicon);
              $Cms = new Typecho_Widget_Helper_Form_Element_Select('Cms',array(0=>'不开启',1=>'开启'),0,'首页CMS','首页CMS开关');   
              $form->addInput($Cms);
	$cjcdnAddress = new Typecho_Widget_Helper_Form_Element_Text('cjcdnAddress', NULL, NULL, _t('CSS文件的链接地址替换'), _t('请输入你的CDN云存储地址，例如：http://cdn.example.com/，支持绝大部分有镜像功能的CDN服务<br><b>被替换的原地址为主题文件位置，即：http://www.example.com/usr/themes/initial/</b>'));
	$form->addInput($cjcdnAddress);
	$AttUrlReplace = new Typecho_Widget_Helper_Form_Element_Textarea('AttUrlReplace', NULL, NULL, _t('文章内的链接地址替换（建议用在图片等静态资源的链接上）'), _t('按照格式输入你的CDN链接以替换原链接，格式：<br><b class="notice">原地址=替换地址</b><br>原地址与新地址之间用等号“=”分隔，例如：              <br><b>http://www.example.com/usr/uploads/=http://cdn.example.com/usr/uploads/</b><br>支持绝大部分有镜像功能的CDN服务，可设置多个规则，换行即可，一行一个'));
	$form->addInput($AttUrlReplace);
	$CustomCss = new Typecho_Widget_Helper_Form_Element_Textarea('CustomCss', NULL, NULL, _t('自定义CSS'), _t('位于页头，head之间，适合修改个性式样，如修改局部字体大小，特殊日全站黑白特效等等……'));
	$form->addInput($CustomCss);
	$sitenocolr = new Typecho_Widget_Helper_Form_Element_Radio('sitenocolr', 
	array(1 => _t('启用'),
	0 => _t('关闭')),
	0, _t('全站黑白效果'), _t('默认关闭，启用则所有彩色效果将不被显示'));
	$form->addInput($sitenocolr);
	$scalable = new Typecho_Widget_Helper_Form_Element_Radio('scalable', 
	array(1 => _t('启用'),
	0 => _t('关闭')),
	0, _t('禁止缩放网站'), _t('默认关闭，启用则移动端无法缩放网站'));
	$form->addInput($scalable);
	$duanma = new Typecho_Widget_Helper_Form_Element_Radio('duanma', 
	array(1 => _t('启用'),
	0 => _t('关闭')),
	1, _t('短代码功能'), _t('默认开启，启用则支持[toggle][highlight][tips][noway][warning][buy][note][ref][focus][likeme]等……文章编辑代码，优化文章编辑和排版'));
	$form->addInput($duanma);
	$isauthor = new Typecho_Widget_Helper_Form_Element_Radio('isauthor', 
	array(1 => _t('启用'),
	0 => _t('关闭')),
	0, _t('显示作者'), _t('默认关闭，开启后将在主题和列表中显示文章作者，如博客多人使用不同账号发布文章建议开启，个人使用则关闭'));
	$form->addInput($isauthor);
	$Navset = new Typecho_Widget_Helper_Form_Element_Checkbox('Navset', 
	array('ShowCategory' => _t('显示分类'),
	'AggCategory' => _t('↪合并分类'),
	'ShowPage' => _t('显示页面'),
	'AggPage' => _t('↪合并页面')),
	array('ShowCategory', 'AggCategory', 'ShowPage'), _t('导航栏显示'), _t('默认显示合并的分类，显示页面'));
	$form->addInput($Navset->multiMode());
	$CategoryText = new Typecho_Widget_Helper_Form_Element_Text('CategoryText', NULL, NULL, _t('导航栏-分类 下拉菜单显示名称（使用“导航栏显示-合并分类”时生效）'), _t('在这里输入导航栏<b>分类</b>下拉菜单的显示名称,留空则默认显示为“分类”'));
	$form->addInput($CategoryText);
	$PageText = new Typecho_Widget_Helper_Form_Element_Text('PageText', NULL, NULL, _t('导航栏-页面 下拉菜单显示名称（使用“导航栏显示-合并页面”时生效）'), _t('在这里输入导航栏<b>页面</b>下拉菜单的显示名称,留空则默认显示为“其他”'));
	$form->addInput($PageText);
	$Breadcrumbs = new Typecho_Widget_Helper_Form_Element_Checkbox('Breadcrumbs', 
	array('Postshow' => _t('文章内显示'),
	'Text' => _t('↪文章标题替换为“正文”'),
	'Pageshow' => _t('页面内显示')),
	array('Postshow', 'Text', 'Pageshow'), _t('面包屑导航显示'), _t('默认在文章与页面内显示，并将文章标题替换为“正文”'));
	$form->addInput($Breadcrumbs->multiMode());
	$thumbAPIurl = new Typecho_Widget_Helper_Form_Element_Text('thumbAPIurl', NULL, NULL, _t('随机缩略图API'), _t('在这里填入一个图片生成API地址, 以开启文章缩略图随机生成功能（每刷新一次更换一张随机图片）, 如：http://api.mtyqx.cn/api/random.php'));
	$form->addInput($thumbAPIurl);
	$WeChat = new Typecho_Widget_Helper_Form_Element_Text('WeChat', NULL, NULL, _t('自定义二维码1（建议图片尺寸不低于240*240）'), _t('输入格式：二维码名称=二维码图片URL地址，用等号隔开。示例：微信打赏=微信收款二维码URL地址'));
	$form->addInput($WeChat);
	$Alipay = new Typecho_Widget_Helper_Form_Element_Text('Alipay', NULL, NULL, _t('自定义二维码2（建议图片尺寸不低于240*240）'), _t('输入格式：二维码名称=二维码图片URL地址，示例：支付宝打赏=支付宝收款二维码URL地址'));
	$form->addInput($Alipay);
	$customqr3 = new Typecho_Widget_Helper_Form_Element_Text('customqr3', NULL, NULL, _t('自定义二维码3（建议图片尺寸不低于240*240）'), _t('输入格式：二维码名称=二维码图片URL地址，示例：微信公众号=微信公众号二维码URL地址'));
	$form->addInput($customqr3);
	$postqr = new Typecho_Widget_Helper_Form_Element_Radio('postqr', 
	array(1 => _t('启用'),
	0 => _t('关闭')),
	0, _t('生成文章二维码'), _t('默认关闭，启用则为每篇文章生成二维码,需要开启php的GD库'));
	$form->addInput($postqr);
	$LicenseInfo = new Typecho_Widget_Helper_Form_Element_Text('LicenseInfo', NULL, NULL, _t('文章许可信息'), _t('填入后将在文章底部显示你填入的许可信息（支持HTML标签），留空则默认为 (CC BY-SA 4.0)国际许可协议。'));
	$form->addInput($LicenseInfo);
	$HeadFixed = new Typecho_Widget_Helper_Form_Element_Radio('HeadFixed', 
	array(1 => _t('启用'),
	0 => _t('关闭')),
	0, _t('浮动显示头部'), _t('默认关闭'));
	$form->addInput($HeadFixed);
	$SidebarFixed = new Typecho_Widget_Helper_Form_Element_Radio('SidebarFixed', 
	array(1 => _t('启用'),
	0 => _t('关闭')),
	0, _t('动态显示侧边栏'), _t('默认关闭'));
	$form->addInput($SidebarFixed);
	$cjCDN = new Typecho_Widget_Helper_Form_Element_Radio('cjCDN', 
	array('sf' => _t('七牛云'),
	'zj' => _t('字节跳动'),
	'bt' => _t('BootCDN'),
	'bmt' => _t('爆米图'),
	0 => _t('关闭')),
	0, _t('公共静态资源来源'), _t('默认关闭，请根据需求选择合适来源，推荐“七牛云”。关闭则加载jscss目录中的本地资源'));
	$form->addInput($cjCDN);
	$GravatarUrl = new Typecho_Widget_Helper_Form_Element_Radio('GravatarUrl', 
	array(false => _t('官方源'),
	'https://cn.gravatar.com/avatar/' => _t('国内源'),
	'https://cdn.v2ex.com/gravatar/' => _t('V2EX源'),
	'https://gravatar.ihuan.me/avatar/' => _t('ihuan源')),
	false, _t('Gravatar头像源'), _t('默认官方源'));
	$form->addInput($GravatarUrl);
	$compressHtml = new Typecho_Widget_Helper_Form_Element_Radio('compressHtml', 
	array(1 => _t('启用'),
	0 => _t('关闭')),
	0, _t('HTML压缩'), _t('默认关闭，启用则会对HTML代码进行压缩，可能与部分插件存在兼容问题，请酌情选择开启或者关闭'));
	$form->addInput($compressHtml);
	$webdz = new Typecho_Widget_Helper_Form_Element_Radio('webdz', 
	array(1 => _t('启用'),
	0 => _t('关闭')),
	0, _t('网站弹字'), _t('默认关闭，启用后点击网页任何空白位置自动弹字，也可使用“自定义网站弹字”，对弹字进行自定义'));
	$form->addInput($webdz);
	$webdzCustom = new Typecho_Widget_Helper_Form_Element_Text('webdzCustom', NULL, NULL, _t('自定义网站弹字'), _t('启用网站弹字时生效，在这里填入自定义弹字内容，用“|”隔开。如“富强|民主|文明|和谐|自由”，留空则使用默认文字'));
	$form->addInput($webdzCustom);
	$prism = new Typecho_Widget_Helper_Form_Element_Radio('prism', 
	array('pm' => _t('启用'),
	'ln' => _t('启用并显示行号'),
	0 => _t('关闭')),
	0, _t('代码高亮'), _t('默认关闭，启用后使用“```代码类型（插入代码）```”实现代码高亮，支持html、php、css、markup、js、ini等……高亮显示。也可以自行替换主题文件夹中的“prism(js和css)”更换高亮代码和风格，网址：prismjs.com'));
	$form->addInput($prism);
	$lazyimg = new Typecho_Widget_Helper_Form_Element_Radio('lazyimg', 
	array(1 => _t('启用'),
	0 => _t('关闭')),
	0, _t('图片懒加载'), _t('默认关闭，启用后一定程度上可降低服务器负载。'));
	$form->addInput($lazyimg);
	$fancybox = new Typecho_Widget_Helper_Form_Element_Radio('fancybox', 
	array(1 => _t('启用'),
	0 => _t('关闭')),
	0, _t('FancyBox图片灯箱'), _t('默认关闭，启用后点击图片将会根据浏览器大小弹出图片'));
	$form->addInput($fancybox);
	$commentcaptcha = new Typecho_Widget_Helper_Form_Element_Radio('commentcaptcha', 
	array(1 => _t('启用'),
	0 => _t('关闭')),
	0, _t('评论算术验证码'), _t('默认关闭，启用则会在评论区开启20以内算术题验证码。登录会员无需输入验证码'));
	$form->addInput($commentcaptcha);
	$PjaxOption = new Typecho_Widget_Helper_Form_Element_Radio('PjaxOption', 
	array(1 => _t('启用'),
	0 => _t('关闭')),
	0, _t('全站Pjax'), _t('默认关闭，启用则会强制关闭“反垃圾保护”，强制“将较新的的评论显示在前面”'));
	$form->addInput($PjaxOption);
	$AjaxLoad = new Typecho_Widget_Helper_Form_Element_Radio('AjaxLoad', 
	array('auto' => _t('自动'),
	'click' => _t('点击'),
	0 => _t('关闭')),
	0, _t('Ajax翻页'), _t('默认关闭，启用则会使用Ajax加载文章翻页'));
	$form->addInput($AjaxLoad);
	$scrollTop = new Typecho_Widget_Helper_Form_Element_Radio('scrollTop', 
	array(1 => _t('启用'),
	0 => _t('关闭')),
	0, _t('返回顶部'), _t('默认关闭，启用将在右下角显示“返回顶部”按钮'));
	$form->addInput($scrollTop);
	$MusicSet = new Typecho_Widget_Helper_Form_Element_Radio('MusicSet', 
	array('order' => _t('顺序播放'),
	'shuffle' => _t('随机播放'),
	0 => _t('关闭')),
	0, _t('背景音乐'), _t('默认关闭，启用后请填写音乐地址,否则开启无效'));
	$form->addInput($MusicSet);
	$AutoMusic = new Typecho_Widget_Helper_Form_Element_Radio('AutoMusic', 
	array(true => _t('自动播放'),
	false => _t('关闭')),
	false, _t('自动播放背景音乐'), _t('默认关闭，启用后打开网站自动播放背景音乐'));
	$form->addInput($AutoMusic);
	$MusicUrl = new Typecho_Widget_Helper_Form_Element_Textarea('MusicUrl', NULL, NULL, _t('背景音乐地址（建议使用mp3格式）'), _t('请输入完整的音频文件路径，例如：//music.163.com/song/media/outer/url?id={MusicID}.mp3（好东西^_-）,可设置多个音频，换行即可，一行一个，留空则关闭背景音乐'));
	$form->addInput($MusicUrl);
	$MusicVol = new Typecho_Widget_Helper_Form_Element_Text('MusicVol', NULL, NULL, _t('背景音乐播放音量（输入范围：0~1）'), _t('请输入一个0到1之间的小数（0为静音  0.5为50%音量  1为100%最大音量）输入错误内容或留空则使用默认音量100%'));
	$form->addInput($MusicVol->addRule('isInteger', _t('请填入一个0~1内的数字')));
	$InsideLinksIcon = new Typecho_Widget_Helper_Form_Element_Radio('InsideLinksIcon', 
	array(1 => _t('启用'),
	0 => _t('关闭')),
	0, _t('显示链接图标（内页）'), _t('默认关闭，启用后内页（链接模板）链接将显示链接图标'));
	$form->addInput($InsideLinksIcon);
	$IndexLinksSort = new Typecho_Widget_Helper_Form_Element_Text('IndexLinksSort', NULL, NULL, _t('首页显示的链接分类（支持多分类，请用英文逗号“,”分隔）'), _t('若只需显示某分类下的链接，请输入链接分类名（建议使用字母形式的分类名），留空则默认显示全部链接'));
	$form->addInput($IndexLinksSort);
	$InsideLinksSort = new Typecho_Widget_Helper_Form_Element_Text('InsideLinksSort', NULL, NULL, _t('内页（链接模板）显示的链接分类（支持多分类，请用英文逗号“,”分隔）'), _t('若只需显示某分类下的链接，请输入链接分类名（建议使用字母形式的分类名），留空则默认显示全部链接'));
	$form->addInput($InsideLinksSort);
	$ShowLinks = new Typecho_Widget_Helper_Form_Element_Checkbox('ShowLinks', array('footer' => _t('页脚'), 'sidebar' => _t('侧边栏')), NULL, _t('首页显示链接'));
	$form->addInput($ShowLinks->multiMode());
	$ShowWhisper = new Typecho_Widget_Helper_Form_Element_Checkbox('ShowWhisper', array('sidebar' => _t('侧边栏'), 'indexqy' => _t('↪首页轻语小屏显示')), NULL, _t('显示最新的“轻语”'), _t('启动侧边栏显示轻语后，首页轻语小屏显示才会生效，同时侧边栏显示最后发表轻语作者的头像和昵称'));
	$form->addInput($ShowWhisper->multiMode());
	/*首页设置*/
	$indexBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('indexBlock', 
	array(
	'ShowHotPosts' => _t('显示热门文章（根据阅读数量排序）'),
	'ShowGoodPosts' => _t('显示好评文章（根据评论数量排序）')),
	array('ShowHotPosts', 'ShowGoodPosts'), _t('首页显示'), _t('选择好评文章、热门文章首页显示。'));
	$form->addInput($indexBlock->multiMode());
	/*侧边栏设置*/
	$sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
	array('sitestat' => _t('显示全站文章、分类、评论总数'),
	'ShowHotPosts' => _t('显示热门文章（根据阅读数量排序）'),
	'ShowGoodPosts' => _t('显示好评文章（根据评论数量排序）'),
	'ShowRecentPosts' => _t('显示最新文章'),
	'ShowRecentComments' => _t('显示最近回复'),
	'IgnoreAuthor' => _t('↪不显示作者回复'),
	'ShowCategory' => _t('显示分类'),
	'ShowTag' => _t('显示标签'),
	'ShowArchive' => _t('显示归档'),
	'ShowOther' => _t('显示其它杂项')),
	array('blogonline', 'ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowTag', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'), _t('显示建站至今的时间：依照发布的第一篇文章时间作为建站的时间。'));
	$form->addInput($sidebarBlock->multiMode());
	$colortags = new Typecho_Widget_Helper_Form_Element_Checkbox('colortags', 
	array('page' => _t('归档页标签云'),
	'sidebar' => _t('侧边栏')),
	NULL, _t('彩色标签'), _t('启用则随机显示彩色标签色彩，关闭则主题默认式样'));
	$form->addInput($colortags->multiMode());
	$ICPbeian = new Typecho_Widget_Helper_Form_Element_Text('ICPbeian', NULL, NULL, _t('ICP备案号'), _t('在这里输入ICP备案号,留空则不显示'));
	$form->addInput($ICPbeian);
	$CustomContent = new Typecho_Widget_Helper_Form_Element_Textarea('CustomContent', NULL, NULL, _t('底部自定义内容'), _t('位于底部，footer之后body之前，适合放置一些JS内容，如网站统计代码等（若开启全站Pjax，目前支持Google和百度统计的回调，其余统计代码可能会不准确）'));
	$form->addInput($CustomContent);
	$guanzhu = new Typecho_Widget_Helper_Form_Element_Textarea('guanzhu', NULL, NULL, _t('联系方式'), _t('按照格式输入你的联系方式，如格式：<br><b class="notice">类型=联系信息</b><br>类型与联系信息之间用等号“=”分隔，不同类型换行即可，一行一个。<br><br>类型有：<b>qq、qqzone、weixin、weixingz（微信              公众号）、weixinsp（微信视频号）、weibo、mail、github、gitee、csdn、zhihu、bilibili、steam</b><br>其中qq和qqzone直接填qq号，weixin、weixingz、weixinsp填微信的二维码图片，mail填邮箱地址，其他填个人页面网址。
	<br>例如：<br><b>qq=12345678</b><br><b>weixin=图片地址</b><br><b>mail=12345678@qq.com</b><br><b>github=个人页面网址</b>'));
	$form->addInput($guanzhu);
              //  侧边栏博客信息的运行天数
              $birthday = new Typecho_Widget_Helper_Form_Element_Text('birthday', null, null, _t('站点创建时间'), _t('在这里填写站点创建时间后，在侧边栏的博客信息区域就会显示网站运行天数。如果省略 网站运行天数会显示为 0 天。站点创建时间的格式为：yyyy-mm-dd，例如：2019-11-11。'));
              $form->addInput($birthday);
              //  内容页下方ads
              $postmiddleads1 = new Typecho_Widget_Helper_Form_Element_Text('postmiddleads1', null, null, _t('列表页下方listads1'), _t('内容页下方ads,800*200px，内容随意！'));
              $form->addInput($postmiddleads1);			  
              //  内容页下方ads
              $postmiddleads0 = new Typecho_Widget_Helper_Form_Element_Text('postmiddleads0', null, null, _t('列表页下方listads2'), _t('内容页下方ads,800*200px，内容随意！'));
              $form->addInput($postmiddleads0);
              //  内容页标题下方ads
              $postmiddleads = new Typecho_Widget_Helper_Form_Element_Text('postmiddleads', null, null, _t('文章页内容下方wzads'), _t('内容页标题下方ads,800*200px，内容随意！'));
              $form->addInput($postmiddleads);
             //  内容页右侧边栏ads
              $postrightads = new Typecho_Widget_Helper_Form_Element_Text('postrightads', null, null, _t('右侧边栏sideads'), _t('内容页右侧边栏ads,240*240px，内容随意！'));
              $form->addInput($postrightads);         
}
function themeInit($archive) {
	$options = Helper::options();
	$options->commentsAntiSpam = false;
	if ($options->PjaxOption || FindContents('page-whisper.php', 'commentsNum', 'd')) {
		$options->commentsOrder = 'DESC';
		$options->commentsPageDisplay = 'first';
	}
	if ($archive->is('single')) {
		$archive->content = hrefOpen($archive->content);
		if ($options->AttUrlReplace) {
			$archive->content = UrlReplace($archive->content);
		}
		if ($archive->fields->catalog) {
			$archive->content = createCatalog($archive->content);
		}
	}
	if ($options->duanma) {
		require_once __DIR__ . '/shortcode.php';
	}
	$comment = spam_protection_pre($comment, $post, $result);
	if ($archive->is('category', 'photos')) {
		$archive->parameter->pageSize = 30; // 自定义条数
	}elseif($archive->is('category', 'video')){
		$archive->parameter->pageSize = 30; // 自定义条数
	}
}
//算术验证评论
function spam_protection_math(){
	$num1=rand(0,20);
	$num2=rand(0,10);
	$numchs = array('零','壹','贰','叁','肆','伍','陆','柒','捌','玖','拾');
	$num01 = array($num1,$numchs[$num1]);
	$num02 = array($num2,$numchs[$num2]);
	$num001 = $num01[array_rand($num01)];
	$num002 =  $num02[array_rand($num02)];
	$symbol = '+';
	if ($num1 > 10) { $num001 = $num1;$symbol = '-'; }
	if (is_numeric($num001)) { 	$num002 = $num02[1]; }
	echo '<div id="CAPTCHACode"><input type="text" name="sum" class="text" placeholder="'.$num001.' '.$symbol.' '.$num002.' = ? *" required>';
	echo '<input type="hidden" name="num1" value="'.$num1.'">';
	echo '<input type="hidden" name="num2" value="'.$num2.'"></div>';
}
function spam_protection_pre($comment, $post, $result){
	$sum=$_POST['sum'];
	if ($_POST['num1'] > 10) {
		switch($sum) {
			case $_POST['num1']-$_POST['num2']:break;
			default:throw new Typecho_Widget_Exception(_t('对不起: 验证码错误，请<a href="javascript:history.back(-1)">返回</a>重试。','评论失败'));
		}
	} else {
		switch($sum) {
			case $_POST['num1']+$_POST['num2']:break;
			default:throw new Typecho_Widget_Exception(_t('对不起: 验证码错误，请<a href="javascript:history.back(-1)">返回</a>重试。','评论失败'));
		}
	}
	return $comment;
}
//设置CDN
function cjUrl($path) {
	$options = Helper::options();
	$ver = '?ver='.constant("INITIAL_VERSION_NUMBER");
	if ($options->cjcdnAddress) {
		echo rtrim($options->cjcdnAddress, '/').'/'.$path.$ver;
	} else {
		$options->themeUrl($path.$ver);
	}
}
//设置时区
date_default_timezone_set('PRC');
//主题切换
function skinUrl($path,$ext,$skinid = NULL) {
	$options = Helper::options();
	$ver = '?ver='.constant("INITIAL_VERSION_NUMBER");
	if (!empty($options->skinoptions) && in_array('free', $options->skinoptions) && isset($_COOKIE["stylemode"]) && $_COOKIE["stylemode"] == "dark") {
		if ($skinid=='id') {
			echo 'style-dark';
		} elseif ($options->cjcdnAddress) {
			echo rtrim($options->cjcdnAddress, '/').'/'.$path.'style-dark'.$ext.$ver;
		} else {
			$options->themeUrl($path.'style-dark'.$ext.$ver);
		}
	} elseif (!empty($options->skinoptions) && in_array('free', $options->skinoptions) && isset($_COOKIE["stylemode"]) && $_COOKIE["stylemode"] == "white") {
		if ($skinid=='id') {
			echo 'style-white';
		} elseif ($options->cjcdnAddress) {
			echo rtrim($options->cjcdnAddress, '/').'/'.$path.'style-white'.$ext.$ver;
		} else {
			$options->themeUrl($path.'style-white'.$ext.$ver);
		}
	} elseif ($options->siteskin == 'auto' && (date('G') < 7 || date('G') >= 22)) {
		if ($skinid=='id') {
			echo 'style-dark';
		} elseif ($options->cjcdnAddress) {
			echo rtrim($options->cjcdnAddress, '/').'/'.$path.'style-dark'.$ext.$ver;
		} else {
			$options->themeUrl($path.'style-dark'.$ext.$ver);
		}
	} elseif ($options->siteskin == 'dark') {
		if ($skinid=='id') {
			echo 'style-dark';
		} elseif ($options->cjcdnAddress) {
			echo rtrim($options->cjcdnAddress, '/').'/'.$path.'style-dark'.$ext.$ver;
		} else {
			$options->themeUrl($path.'style-dark'.$ext.$ver);
		}
	} else {
		if ($skinid=='id') {
			echo 'style-white';
		} elseif ($options->cjcdnAddress) {
			echo rtrim($options->cjcdnAddress, '/').'/'.$path.'style-white'.$ext.$ver;
		} else {
			$options->themeUrl($path.'style-white'.$ext.$ver);
		}
	}
}

function hrefOpen($obj) {
	return preg_replace('/<a\b([^>]+?)\bhref="((?!'.addcslashes(Helper::options()->index, '/._-+=#?&').'|\#).*?)"([^>]*?)>/i', '<a\1href="\2"\3 target="_blank">', $obj);
}

function UrlReplace($obj) {
	$list = explode("\r\n", Helper::options()->AttUrlReplace);
	foreach ($list as $tmp) {
		list($old, $new) = explode('=', $tmp);
		$obj = str_replace($old, $new, $obj);
	}
	return $obj;
}
function customqr($order = NULL,$type = NULL) {
	$options = Helper::options();
	if ( $order == 1 ) {
		list($name, $url) = explode('=', $options->WeChat);
	} elseif ( $order == 2 ) {
		list($name, $url) = explode('=', $options->Alipay);
	} elseif ( $order == 3 ) {
		list($name, $url) = explode('=', $options->customqr3);
	}
	$obj = $type ? $url : $name;
	return $obj;
}
function guanzhu($type) {
	$list = explode("\r\n", Helper::options()->guanzhu);
	foreach ($list as $tmp) {
		list($old, $data) = explode('=', $tmp);
		if($old == $type) {
			return $data;
		}
	}
}
function postThumb($obj) {
	$options = Helper::options();
	$thumb = $obj->fields->thumb;
	if ($options->thumbAPIurl) {
		$thumbAPI = $obj->fields->thumbAPI;
	} else {
		$thumbAPI = false;
	}
	if (!$thumb && !$thumbAPI) {
		return false;
	}
	if ($thumb) {
		if (is_numeric($thumb)) {
			preg_match_all('/<img.*?src="(.*?)".*?[\/]?>/i', $obj->content, $matches);
			if (isset($matches[1][$thumb-1])) {
				$thumb = $matches[1][$thumb-1];
			} else {
				return false;
			}
		}
		if ($options->AttUrlReplace) {
			$thumb = UrlReplace($thumb);
		}
		return $img = $options->lazyimg ? '<img src="'.$options->themeUrl.'/img/postThumb-load.gif" data-original="'.$thumb.'" alt="图片懒加载"/>' : '<img src="'.$thumb.'">';
	} else {
		return $img = $options->lazyimg ? '<img src="'.$options->themeUrl.'/img/postThumb-load.gif" data-original="'.$options->thumbAPIurl.'?$'.$obj->cid.'" alt="图片懒加载"/>' : '<img src="'.$options->thumbAPIurl.'?$'.$obj->cid.'">';
	}
}

/*
function postfocusimg($obj) {
	$focusimg = $obj->fields->focusimg;
	if (!$focusimg) {
		return false;
	}
	return '<img src="'. Helper::options()->themeUrl .'/img/'.$focusimg.'" />';
}
*/

function postSummaryContent($obj) {
	$summaryContent = $obj->fields->summaryContent;
	if (!$summaryContent) {
		return false;
	}
	return str_replace("\r\n", "<br>", $summaryContent);
}
function Postviews($archive) {
	$db = Typecho_Db::get();
	$cid = $archive->cid;
	if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
		$db->query('ALTER TABLE `'.$db->getPrefix().'contents` ADD `views` INT(10) DEFAULT 0;');
	}
	$exist = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid))['views'];
	if ($archive->is('single')) {
		$cookie = Typecho_Cookie::get('contents_views');
		$cookie = $cookie ? explode(',', $cookie) : array();
		if (!in_array($cid, $cookie)) {
			$db->query($db->update('table.contents')
				->rows(array('views' => (int)$exist+1))
				->where('cid = ?', $cid));
			$exist = (int)$exist+1;
			array_push($cookie, $cid);
			$cookie = implode(',', $cookie);
			Typecho_Cookie::set('contents_views', $cookie, time()+3600);
		}
	}
	echo $exist == 0 ? '暂无' : $exist;
}
function createCatalog($obj) {
	global $catalog;
	global $catalog_count;
	$catalog = array();
	$catalog_count = 0;
	$obj = preg_replace_callback('/<h([1-6])(.*?)>(.*?)<\/h\1>/i', function($obj) {
		global $catalog;
		global $catalog_count;
		$catalog_count ++;
		$catalog[] = array('text' => trim(strip_tags($obj[3])), 'depth' => $obj[1], 'count' => $catalog_count);
		return '<h'.$obj[1].$obj[2].'><a class="cl-offset" name="cl-'.$catalog_count.'"></a>'.$obj[3].'</h'.$obj[1].'>';
	}, $obj);
	return $obj."\n".getCatalog();
}
function getCatalog() {
	global $catalog;
	$index = '';
	if ($catalog) {
		$index = '<ul>'."\n";
		$prev_depth = '';
		$to_depth = 0;
		foreach($catalog as $catalog_item) {
			$catalog_depth = $catalog_item['depth'];
			if ($prev_depth) {
				if ($catalog_depth == $prev_depth) {
					$index .= '</li>'."\n";
				} elseif ($catalog_depth > $prev_depth) {
					$to_depth++;
					$index .= "\n".'<ul>'."\n";
				} else {
					$to_depth2 = ($to_depth > ($prev_depth - $catalog_depth)) ? ($prev_depth - $catalog_depth) : $to_depth;
					if ($to_depth2) {
						for ($i=0; $i<$to_depth2; $i++) {
							$index .= '</li>'."\n".'</ul>'."\n";
							$to_depth--;
						}
					}
					$index .= '</li>'."\n";
				}
			}
			$index .= '<li><a href="#cl-'.$catalog_item['count'].'" onclick="Catalogswith()">'.$catalog_item['text'].'</a>';
			$prev_depth = $catalog_item['depth'];
		}
		for ($i=0; $i<=$to_depth; $i++) {
			$index .= '</li>'."\n".'</ul>'."\n";
		}
	$index = '<div id="catalog-col">'."\n".'<b>文章目录</b>'."\n".$index.'<script>function Catalogswith(){document.getElementById("catalog-col").classList.toggle("catalog");document.getElementById("catalog").classList.toggle("catalog")}</script>'."\n".'</div>'."\n";
	}
	return $index;
}
function CommentAuthor($obj, $autoLink = NULL, $noFollow = NULL) {
	$options = Helper::options();
	$autoLink = $autoLink ? $autoLink : $options->commentsShowUrl;
	$noFollow = $noFollow ? $noFollow : $options->commentsUrlNofollow;
	if ($obj->url && $autoLink) {
		echo '<a href="'.$obj->url.'"'.($noFollow ? ' rel="external nofollow"' : NULL).(strstr($obj->url, $options->index) == $obj->url ? NULL : ' target="_blank"').'>'.$obj->author.'</a>';
	} else {
		echo $obj->author;
	}
}
function CommentAt($coid){
	$db = Typecho_Db::get();
	$prow = $db->fetchRow($db->select('parent')->from('table.comments')
		->where('coid = ? AND status = ?', $coid, 'approved'));
	$parent = $prow['parent'];
	if ($prow && $parent != '0') {
		$arow = $db->fetchRow($db->select('author')->from('table.comments')
			->where('coid = ? AND status = ?', $parent, 'approved'));
		echo '<b class="comment-at">@'.$arow['author'].'</b>';
	}
}
/* 侧栏最新文章 */
function Contents_Post_Initial($limit = 5, $order = 'created') {
	$db = Typecho_Db::get();
	$options = Helper::options();
	$posts = $db->fetchAll($db->select()->from('table.contents')
		->where('type = ? AND status = ? AND created < ?', 'post', 'publish', $options->time)
		->order($order, Typecho_Db::SORT_DESC)
		->limit($limit), array(Typecho_Widget::widget('Widget_Abstract_Contents'), 'filter'));
	if ($posts) {
		foreach($posts as $post) {
			echo '<li style="list-style:url(usr/themes/initial_plus/img/hot.png) inside;"><a'.($post['hidden'] && $options->PjaxOption ? '' : ' href="'.$post['permalink'].'"').'>'.htmlspecialchars($post['title']).'</a></li>'."\n";
		}
	} else {
		echo '<li>暂无文章</li>'."\n";
	}
}
/* 侧栏最新回复 */
function Contents_Comments_Initial($limit = 5, $ignoreAuthor = 0) {
	$db = Typecho_Db::get();
	$options = Helper::options();
	$select = $db->select()->from('table.comments')
		->where('status = ? AND created < ?','approved', $options->time)
		->order('coid', Typecho_Db::SORT_DESC)
		->limit($limit);
	if ($options->commentsShowCommentOnly) {
		$select->where('type = ?', 'comment');
	}
	if ($ignoreAuthor == 1) {
		$select->where('ownerId <> authorId');
	}
	$page_whisper = FindContents('page-whisper.php', 'commentsNum', 'd');
	if ($page_whisper) {
		$select->where('cid <> ? OR (cid = ? AND parent <> ?)', $page_whisper[0]['cid'], $page_whisper[0]['cid'], '0');
	}
	$comments = $db->fetchAll($select);
	if ($comments) {
		foreach($comments as $comment) {
			$parent = FindContent($comment['cid']);
			echo '<li style="list-style:url(usr/themes/initial_plus/img/icon.png) inside;"><a'.($parent['hidden'] && $options->PjaxOption ? '' : ' href="'.permaLink($comment).'"').' title="来自: '.$parent['title'].'">'.$comment['author'].'</a>: '.($parent['hidden'] && $options->PjaxOption ? '内容被隐藏' : Typecho_Common::subStr(strip_tags($comment['text']), 0, 20, '...')).'</li>'."\n";
		}
	} else {
		echo '<li>暂无回复</li>'."\n";
	}
}
function permaLink($obj) {
	$db = Typecho_Db::get();
	$options = Helper::options();
	$parentContent = FindContent($obj['cid']);
	if ($options->commentsPageBreak && 'approved' == $obj['status']) {
		$coid = $obj['coid'];
		$parent = $obj['parent'];
		while ($parent > 0 && $options->commentsThreaded) {
			$parentRows = $db->fetchRow($db->select('parent')->from('table.comments')
			->where('coid = ? AND status = ?', $parent, 'approved')->limit(1));
			if (!empty($parentRows)) {
				$coid = $parent;
				$parent = $parentRows['parent'];
			} else {
				break;
			}
		}
		$select  = $db->select('coid', 'parent')->from('table.comments')
			->where('cid = ? AND status = ?', $parentContent['cid'], 'approved')
			->where('coid '.('DESC' == $options->commentsOrder ? '>=' : '<=').' ?', $coid)
			->order('coid', Typecho_Db::SORT_ASC);
		if ($options->commentsShowCommentOnly) {
			$select->where('type = ?', 'comment');
		}
		$comments = $db->fetchAll($select);
		$commentsMap = array();
		$total = 0;
		foreach ($comments as $comment) {
			$commentsMap[$comment['coid']] = $comment['parent'];
			if (0 == $comment['parent'] || !isset($commentsMap[$comment['parent']])) {
				$total ++;
			}
		}
		$currentPage = ceil($total / $options->commentsPageSize);
		$pageRow = array('permalink' => $parentContent['pathinfo'], 'commentPage' => $currentPage);
		return Typecho_Router::url('comment_page', $pageRow, $options->index).'#'.$obj['type'].'-'.$obj['coid'];
	}
	return $parentContent['permalink'].'#'.$obj['type'].'-'.$obj['coid'];
}
function FindContent($cid) {
	$db = Typecho_Db::get();
	return $db->fetchRow($db->select()->from('table.contents')
	->where('cid = ?', $cid)
	->limit(1), array(Typecho_Widget::widget('Widget_Abstract_Contents'), 'filter'));
}

function FindContents($val = NULL, $order = 'order', $sort = 'a', $publish = NULL) {
	$db = Typecho_Db::get();
	$sort = ($sort == 'a') ? Typecho_Db::SORT_ASC : Typecho_Db::SORT_DESC;
	$select = $db->select()->from('table.contents')
		->where('created < ?', Helper::options()->time)
		->order($order, $sort);
	if ($val) {
		$select->where('template = ?', $val);
	}
	if ($publish) {
		$select->where('status = ?','publish');
	}
	$content = $db->fetchAll($select, array(Typecho_Widget::widget('Widget_Abstract_Contents'), 'filter'));
	return empty($content) ? false : $content;
}
function Whisper($sidebar = NULL,$uid = NULL,$type = NULL) {
	$db = Typecho_Db::get();
	$options = Helper::options();
	$page = FindContents('page-whisper.php', 'commentsNum', 'd');
	$p = $sidebar ? 'li' : 'p';
	if ($page) {
		$page = $page[0];
		//$title = $sidebar ? '' : '<h2 class="post-title"><a href="'.$page['permalink'].'">'.$page['title'].'<span class="more">···</span></a></h2>'."\n";
		if ($uid) {
			$comment = $db->fetchAll($db->select()->from('table.comments')
				->where('cid = ? AND status = ? AND parent = ? AND authorId = ?', $page['cid'], 'approved', '0', $uid)
				->order('coid', Typecho_Db::SORT_DESC)
				->limit(1));
		} else {
			$comment = $db->fetchAll($db->select()->from('table.comments')
				->where('cid = ? AND status = ? AND parent = ?', $page['cid'], 'approved', '0')
				->order('coid', Typecho_Db::SORT_DESC)
				->limit(1));
		}
		if ($comment) {
			if ($type == 'authorId') {
				return $comment[0]['authorId'];
			} elseif ($type == 'mail') {
				return $comment[0]['mail'];
			} elseif ($type == 'author') {
				return $comment[0]['author'];
			} else {
				$content = hrefOpen(Markdown::convert(($sidebar ? '' : '<b>'.$comment[0]['author'].':</b>&nbsp;').$comment[0]['text'].'<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a title="更多:&nbsp;'.$page['title'].'" href="'.$page['permalink'].'" style="float:right;">More...</a><br />'));
				if ($options->AttUrlReplace) {
					$content = UrlReplace($content);
				}
				echo $title.strip_tags($content, '<p><strong><b><span><a>'.$options->commentsHTMLTagAllowed)."\n".($sidebar ? ''."\n" : '');
				//echo $title.strip_tags($content, '<p><br><strong><a><img><pre><code>'.$options->commentsHTMLTagAllowed)."\n".($sidebar ? '<li class="more"><a href="'.$page['permalink'].'">more...</a></li>'."\n" : '<li class="more"><a href="'.$page['permalink'].'">More...</a></li>');
			}
		} else {
			if ($type) {
				return NULL;
			} else {
				echo $title.'<'.$p.'><a title="进入:&nbsp;'.$page['title'].'" href="'.$page['permalink'].'">暂无发布内容</a></'.$p.'>'."\n";
			}
		}
	} else {
		if ($type) {
			return NULL;
		} else {
			echo ($sidebar ? '' : ''."\n").'<'.$p.'><a title="进入:&nbsp;'.$page['title'].'" href="'.$page['permalink'].'">暂无发布内容</a></'.$p.'>'."\n";
		}
	}
}
function Links($sorts = NULL, $icon = 0) {
	$db = Typecho_Db::get();
	$link = NULL;
	$list = NULL;
	$page_links = FindContents('page-links.php', 'order', 'a');
	if ($page_links) {
		$exist = $db->fetchRow($db->select()->from('table.fields')
			->where('cid = ? AND name = ?', $page_links[0]['cid'], 'links'));
		if (empty($exist)) {
			$db->query($db->insert('table.fields')
				->rows(array(
					'cid'           =>  $page_links[0]['cid'],
					'name'          =>  'links',
					'type'          =>  'str',
					'str_value'     =>  NULL,
					'int_value'     =>  0,
					'float_value'   =>  0
				)));
			return NULL;
		}
		$list = $exist['str_value'];
	}
	if ($list) {
		$list = explode("\r\n", $list);
		foreach ($list as $val) {
			list($name, $url, $description, $logo, $sort, $urlbak) = explode(',', $val);
			if ($sorts) {
				$arr = explode(',', $sorts);
				if ($sort && in_array($sort, $arr)) {
					$link .= '<li class="right-fenlei"><a'.($url ? ' href="'.$url.'"' : ($urlbak ? ' href="'.$urlbak.'"' : '')).($icon==1&&$url ? ' class="l_logo"' : '').' title="'.$description.'" target="_blank">'.($icon==1&&$url ? '<img src="'.($logo ? $logo : rtrim($url, '/').'/favicon.ico').'" onerror="erroricon(this)">' : '').'<span>'.($url ? $name : '<del>'.$name.'</del>').'</span></a></li>'."\n";
				}
			} else {
				$link .= '<li class="right-fenlei"><a'.($url ? ' href="'.$url.'"' : ($urlbak ? ' href="'.$urlbak.'"' : '')).($icon==1&&$url ? ' class="l_logo"' : '').' title="'.$description.'" target="_blank">'.($icon==1&&$url ? '<img src="'.($logo ? $logo : rtrim($url, '/').'/favicon.ico').'" onerror="erroricon(this)">' : '').'<span>'.($url ? $name : '<del>'.$name.'</del>').'</span></a></li>'."\n";
			}
		}
	}
	echo $link ? $link : '<li>暂无链接</li>'."\n";
}
function Playlist() {
	$options = Helper::options();
	$arr = explode("\r\n", $options->MusicUrl);
	if ($options->MusicSet == 'shuffle') {
		shuffle($arr);
	}
	echo '["'.implode('","', $arr).'"]';
}
function compressHtml($html_source) {
	$chunks = preg_split('/(<!--<nocompress>-->.*?<!--<\/nocompress>-->|<nocompress>.*?<\/nocompress>|<pre.*?\/pre>|<textarea.*?\/textarea>|<script.*?\/script>)/msi', $html_source, -1, PREG_SPLIT_DELIM_CAPTURE);
	$compress = '';
	foreach ($chunks as $c) {
		if (strtolower(substr($c, 0, 19)) == '<!--<nocompress>-->') {
			$c = substr($c, 19, strlen($c) - 19 - 20);
			$compress .= $c;
			continue;
		} else if (strtolower(substr($c, 0, 12)) == '<nocompress>') {
			$c = substr($c, 12, strlen($c) - 12 - 13);
			$compress .= $c;
			continue;
		} else if (strtolower(substr($c, 0, 4)) == '<pre' || strtolower(substr($c, 0, 9)) == '<textarea') {
			$compress .= $c;
			continue;
		} else if (strtolower(substr($c, 0, 7)) == '<script' && strpos($c, '//') != false && (strpos($c, "\r") !== false || strpos($c, "\n") !== false)) {
			$tmps = preg_split('/(\r|\n)/ms', $c, -1, PREG_SPLIT_NO_EMPTY);
			$c = '';
			foreach ($tmps as $tmp) {
				if (strpos($tmp, '//') !== false) {
					if (substr(trim($tmp), 0, 2) == '//') {
						continue;
					}
					$chars = preg_split('//', $tmp, -1, PREG_SPLIT_NO_EMPTY);
					$is_quot = $is_apos = false;
					foreach ($chars as $key => $char) {
						if ($char == '"' && $chars[$key - 1] != '\\' && !$is_apos) {
							$is_quot = !$is_quot;
						} else if ($char == '\'' && $chars[$key - 1] != '\\' && !$is_quot) {
							$is_apos = !$is_apos;
						} else if ($char == '/' && $chars[$key + 1] == '/' && !$is_quot && !$is_apos) {
							$tmp = substr($tmp, 0, $key);
							break;
						}
					}
				}
				$c .= $tmp;
			}
		}
		$c = preg_replace('/[\\n\\r\\t]+/', ' ', $c);
		$c = preg_replace('/\\s{2,}/', ' ', $c);
		$c = preg_replace('/>\\s</', '> <', $c);
		$c = preg_replace('/\\/\\*.*?\\*\\//i', '', $c);
		$c = preg_replace('/<!--[^!]*-->/', '', $c);
		$compress .= $c;
	}
	return $compress;
}
//输出作者文章总数、评论总数、上传附件总数可以指定
function userstat($id,$type) {
	$db = Typecho_Db::get();
	if ($type == 'comment') {
		$commentnum=$db->fetchRow($db->select(array('COUNT(authorId)'=>'allcommentnum'))->from ('table.comments')->where ('table.comments.authorId=?',$id)->where('table.comments.type=? AND status=?', 'comment', 'approved'));
		$commentnum = $commentnum['allcommentnum'];
		return $commentnum;
	} elseif ($type == 'attachment') {
		$attachmentnum=$db->fetchRow($db->select(array('COUNT(authorId)'=>'allattachmentnum'))->from ('table.contents')->where ('table.contents.authorId=?',$id)->where('table.contents.type=? AND status=?', 'attachment', 'publish'));
		$attachmentnum = $attachmentnum['allattachmentnum'];
		return $attachmentnum;
	} else {
		$postnum=$db->fetchRow($db->select(array('COUNT(authorId)'=>'allpostnum'))->from ('table.contents')->where ('table.contents.authorId=?',$id)->where('table.contents.type=?', 'post'));
		$postnum = $postnum['allpostnum'];
		return $postnum;
	}
}
//彩色标签云
function colortags() {
	if (empty(Helper::options()->colortags)) {
		return false;
	}
	$colorarr=array("#ffc61b","#4e8ef0","#ff6f6f","#c0c0c0","#add8e6","#00bfff","#d9b999","#ffb380","#da99ff","#eca9a7","#aedcae","#428bca","#f47b20","#5c7e10");
	$n=array_rand($colorarr,1);
	return 'style="border:0px;color:#fff;background-color:'.$colorarr[$n].'"';
}
//重新处理文章
function parseContent($obj) {
	$options = Helper::options();
	if ($options->lazyimg && $options->fancybox) { //lazyimg图片懒加载和fancybox灯箱正则替换<img>
		$obj->content = preg_replace(['/\<img.*?src\=\"(.*?)\"[^>]*>/i'],['<a href="$1" data-fancybox="gallery"><img src="'.$options->themeUrl.'/img/load.gif" data-original="$1" alt="'.$obj->title.'" title="点击放大图片" alt="图片懒加载"/></a>'],$obj->content);
	} elseif ($options->lazyimg) { //lazyimg图片懒加载<img>
		$obj->content = preg_replace(['/\<img.*?src\=\"(.*?)\"[^>]*>/i'],['<img src="'.$options->themeUrl.'/img/load.gif" data-original="$1" alt="'.$obj->title.'" title="'.$obj->title.'" alt="图片懒加载"/>'],$obj->content);
	} elseif ($options->fancybox) { //fancybox灯箱正则替换<img>
		$obj->content = preg_replace(['/\<img.*?src\=\"(.*?)\"[^>]*>/i'],['<a href="$1" data-fancybox="gallery"><img src="$1" alt="'.$obj->title.'" title="点击放大图片"></a>'],$obj->content);
	}
	//加载短代码
	if ($options->duanma) {
		$obj->content = do_shortcode($obj->content);
	}
	//输出内容
	echo trim($obj->content);
}
function themeFields($layout) {
	$options = Helper::options();
	$bztxt = 'bz.txt';
	$dmtxt = 'dm.txt';
	$bzfilename = $options->themeUrl.'/lib/'.$bztxt;
	$dmfilename = $options->themeUrl.'/lib/'.$dmtxt;
	// 按换行符分割成数组
	$bzdata = file($bzfilename);
	$dmdata = file($dmfilename);
	// 去除数组中的空格和空行
	$bzdata = array_filter(preg_grep('/\S+/', $bzdata));
	$dmdata = array_filter(preg_grep('/\S+/', $dmdata));
	// 获取数据总数
	$bzcount = count($bzdata);
	$dmcount = count($dmdata);
	// 随机获取一行索引
	$bzresult = $bzdata[array_rand($bzdata)];
	$dmresult = $dmdata[array_rand($dmdata)];
	// 去除多余的换行符（解决获取空值问题）
	$bzresult = str_replace(array("\r","\n","\r\n"," "), '', $bzresult);
	$dmresult = str_replace(array("\r","\n","\r\n"," "), '', $dmresult);
	// 随机选择服务器
	$server = array("1","x1","2","x2","3","x3","4","x4");
	$server = $server[array_rand($server)];
	$bzurl = $bzresult ? '<font color=#0000ff>//tva'.$server.'.sinaimg.cn/wap800/'.$bzresult.'.jpg</font>' : '<font color=#ff0000><b>主题目录lib下【'.$bztxt.'】数据文件错误！！！</b></font>';
	$dmurl = $dmresult ? '<font color=#ff0000>//tva'.$server.'.sinaimg.cn/wap800/'.$dmresult.'.jpg</font>' : '<font color=#ff0000><b>主题目录lib下【'.$dmtxt.'】数据文件错误！！！</b></font>';
	$pbzurl = $bzresult ? '<a href="###" title="炫酷壁纸预览" alt="炫酷壁纸预览" onclick="window.open(\'//tva'.$server.'.sinaimg.cn/large/'.$bzresult.'.jpg\',\'_blank\')"><img src="//tva'.$server.'.sinaimg.cn/wap180/'.$bzresult.'.jpg" style="margin:10px 10px 0px 0px"></a>' : '';
	$pdmurl = $dmresult ? '<a href="###" title="二次元动漫预览" alt="二次元动漫预览" onclick="window.open(\'//tva'.$server.'.sinaimg.cn/large/'.$dmresult.'.jpg\',\'_blank\')"><img src="//tva'.$server.'.sinaimg.cn/wap180/'.$dmresult.'.jpg" style="margin:10px 10px 0px 0px"></a>' : '';
	$thumb = new Typecho_Widget_Helper_Form_Element_Text('thumb', NULL, NULL, _t('自定义缩略图'), _t('在这里填入一个图片 URL 地址, 以添加本文的缩略图，若填入纯数字，例如 <b>3</b> ，则使用文章第三张图片作为缩略图（对应位置无图则不显示缩略图），留空则默认不显示自定义缩略图<br><br>
	【随机图推荐】刷新本页面图片随机更换。注：兼顾浏览效率下方链接已使用800像素压缩，如需原图请点击图片预览！<br>
	【图床数据库】炫酷壁纸：<font color=#0000ff>'.$bzcount.'</font> 张 | 二次元动漫：<font color=#ff0000>'.$dmcount.'</font> 张<br>
	炫酷壁纸：'.$bzurl.'<br>二次元动漫：'.$dmurl.'<br>
	'.$pbzurl.$pdmurl.''));
	$thumb->input->setAttribute('class', 'w-100');
	$layout->addItem($thumb);
	if ($options->thumbAPIurl) {
		$thumbAPI = new Typecho_Widget_Helper_Form_Element_Radio('thumbAPI', 
		array(true => _t('启用'),
		false => _t('关闭')),
		false, _t('随机缩略图API'), _t('默认关闭，启用则会根据“主题设置”中的图片api地址自动生成图片，每刷新一次页面都会自动更换。注意：【自定义缩略图】有图片url，则优先显示【自定义缩略图】中的图片'));
		$layout->addItem($thumbAPI);
	}
	$original = new Typecho_Widget_Helper_Form_Element_Text('original', NULL, NULL, _t('原创or转载'), _t('如是作者原创则输入 <b><font color=red>1</font></b> ，转载则输入转载URL网址，原创作品将在标题前显示“原创”icon，并且在文章最下方显示版权申明信息。如设置转载则会在文章最后出现“原文链接”按钮。留空则不显示原创和转载。输入 <b><font color=red>2</font></b> 仅在文章最下方显示版权申明信息，文章标题不显示“原创”icon'));
	$original->input->setAttribute('class', 'w-100');
	$layout->addItem($original);

                 //  自定义文章iframeurl
                $iframeurl = new Typecho_Widget_Helper_Form_Element_Textarea('iframeurl', null, null, _t('自定义iframeurl'), _t('您可以在此处为文章定义iframeurl。'));
                $iframeurl->input->setAttribute('class', 'w-100');
                $layout->addItem($iframeurl);

                 //  自定义文章摘要内容
                $summaryContent = new Typecho_Widget_Helper_Form_Element_Textarea('summaryContent', null, null, _t('自定义摘要内容'), _t('您可以在此处为文章定义摘要内容，此处定义的摘要内容不受字数限制。'));
                $summaryContent->input->setAttribute('class', 'w-100');
                $layout->addItem($summaryContent);

                  //  自定义文章关键词
                 $keyword = new Typecho_Widget_Helper_Form_Element_Text('keyword', NULL, NULL, _t('笔记关键词'), _t('多个关键词用英文下逗号隔开，关键词与笔记标签意义不同！！！'));
                 $keyword->input->setAttribute('class', 'text w-100');
                 $layout->addItem($keyword);

	$catalog = new Typecho_Widget_Helper_Form_Element_Radio('catalog', 
	array(true => _t('启用'),
                  false => _t('关闭')),
	true, _t('文章目录'), _t('默认启用，关闭则不会在文章内显示“文章目录”（若文章内无任何标题，则不显示目录）'));
	$layout->addItem($catalog);
	$all = Typecho_Plugin::export();
	if (array_key_exists('PartiallyPassword', $all['activated'])) {
		$pp_passwords = new Typecho_Widget_Helper_Form_Element_Text('pp_passwords' ,NULL, NULL, _t('文章内加密密码'), _t('使用语法1：<font color=red>[password]</font>需要加密的内容<font color=red>[/password]</font><br>使用语法2：<font color=red>[password title="文字提示"]</font>需要加密的内容<font color=red>[/password]</font>，自定义密码框文字提示。<br>多个加密区域设置：填写“<font color=red>|</font>”作为分隔符，在相邻密码间用分隔符分隔。如填写 114514|1919|810 作为密码，则表示依次定义了三个密码：114514 1919 810，同时按顺序对应文章内[password]顺序，如定义的密码大于文章[password]数量，多余的密码将被弃用，不填写分隔符默认只定义一个密码，请避免定义密码小于文章[password]数量。<br><font color=blue><b>留空则关闭此功能，[password]标签失效[/password]</b></font>'));
		$pp_passwords->input->setAttribute('class', 'w-100');
		$layout->addItem($pp_passwords);
	} else {
		$pp_passwords = new Typecho_Widget_Helper_Form_Element_Radio('pp_passwords', 
		array('' => _t('插件未启动')),
		'', _t('文章内加密密码'), _t('<b><font color=red>未检测到“文章内加密”插件或插件未启动！</font></b>'));
		$layout->addItem($pp_passwords);
	}
}
/* function 总访问量 */
function theAllViews()
{
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();
    $row = $db->fetchAll('SELECT SUM(VIEWS) FROM `' . $prefix . 'contents`');
    return number_format($row[0]['SUM(VIEWS)']);
}
/**
* 判断时间区间
* 使用方法  if(timeZone($this->date->timeStamp)) echo 'ok';
*/
function timeZone($from){
$now = new Typecho_Date(Typecho_Date::gmtTime());
return $now->timeStamp - $from < 48*60*60 ? true : false;
}
//加载时间
function timer_start() {
    global $timestart;
    $mtime     = explode( ' ', microtime() );
    $timestart = $mtime[1] + $mtime[0];
    return true;
}
timer_start();
function timer_stop( $display = 0, $precision = 3 ) {
    global $timestart, $timeend;
    $mtime     = explode( ' ', microtime() );
    $timeend   = $mtime[1] + $mtime[0];
    $timetotal = number_format( $timeend - $timestart, $precision );
    $r         = $timetotal < 1 ? $timetotal * 1000 . " ms" : $timetotal . " s";
    if ( $display ) {
        echo $r;
    }
    return $r;
}
/* 获取最后更新时间 */
function get_last_update()
{
    $num = "1";
    $now = time();
    $db     = Typecho_Db::get();
    $prefix = $db->getPrefix();
    $create = $db->fetchRow($db->select('created')->from('table.contents')->limit($num)->order('created', Typecho_Db::SORT_DESC));
    $update = $db->fetchRow($db->select('modified')->from('table.contents')->limit($num)->order('modified', Typecho_Db::SORT_DESC));
    if ($create >= $update) {
        echo Typecho_I18n::dateWord($create['created'], $now);
    } else {
        echo Typecho_I18n::dateWord($update['modified'], $now);
    }
}
//获取Gravatar头像 QQ邮箱取用qq头像
function getGravatar($email, $s = 96, $d = 'mp', $r = 'g', $img = false, $atts = array())
{
    preg_match_all('/((\d)*)@qq.com/', $email, $vai);
    if (empty($vai['1']['0'])) {
        $url = 'https://cravatar.cn/avatar/';
        $url .= md5(strtolower(trim($email)));
        $url .= "?s=$s&d=$d&r=$r";
        if ($img) {
            $url = '<img src="' . $url . '"';
            foreach ($atts as $key => $val)
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
    }else{
        $url = 'https://q2.qlogo.cn/headimg_dl?dst_uin='.$vai['1']['0'].'&spec=100';
    }
    return  $url;
}
//在线人数
function online_users() {
    $filename='online.txt'; //数据文件
    $cookiename='Nanlon_OnLineCount'; //Cookie名称
    $onlinetime=30; //在线有效时间
    $online=file($filename); 
    $nowtime=$_SERVER['REQUEST_TIME']; 
    $nowonline=array(); 
    foreach($online as $line){ 
        $row=explode('|',$line); 
        $sesstime=trim($row[1]); 
        if(($nowtime - $sesstime)<=$onlinetime){
            $nowonline[$row[0]]=$sesstime;
        } 
    } 
    if(isset($_COOKIE[$cookiename])){
        $uid=$_COOKIE[$cookiename]; 
    }else{
        $vid=0;
        do{
            $vid++; 
            $uid='U'.$vid; 
        }while(array_key_exists($uid,$nowonline)); 
        setcookie($cookiename,$uid); 
    } 
    $nowonline[$uid]=$nowtime;
    $total_online=count($nowonline); 
    if($fp=@fopen($filename,'w')){ 
        if(flock($fp,LOCK_EX)){ 
            rewind($fp); 
            foreach($nowonline as $fuid=>$ftime){ 
                $fline=$fuid.'|'.$ftime."\n"; 
                @fputs($fp,$fline); 
            } 
            flock($fp,LOCK_UN); 
            fclose($fp); 
        } 
    } 
    echo "$total_online"; 
} 
/*CMS热评文章*/
function getHotComments($limit = 10){
    $db = Typecho_Db::get();
    $result = $db->fetchAll($db->select()->from('table.contents')
        ->where('status = ?','publish')
        ->where('type = ?', 'post')
        ->where('created <= unix_timestamp(now())', 'post') //添加这一句避免未达到时间的文章提前曝光
        ->limit($limit)
        ->order('commentsNum', Typecho_Db::SORT_DESC)
    );
    if($result){
        foreach($result as $val){            
            $val = Typecho_Widget::widget('Widget_Abstract_Contents')->push($val);
			$post_date = date('m-d',$val['created']);		
            $post_title = htmlspecialchars($val['title']);
            $permalink = $val['permalink'];
            echo '<li><span><small>'.$post_date.'</small></span><a href="'.$permalink.'" title="'.$post_title.'" target="_blank">'.$post_title.'</a></li>';        
        }
    }
}
/*CMS热门文章*/
function getHotViews($limit = 10){
    $db = Typecho_Db::get();
    $result = $db->fetchAll($db->select()->from('table.contents')
        ->where('status = ?','publish')
        ->where('type = ?', 'post')		
        ->where('created <= unix_timestamp(now())', 'post') //添加这一句避免未达到时间的文章提前曝光
        ->limit($limit)
        ->order('views', Typecho_Db::SORT_DESC)
    );
    if($result){
        foreach($result as $val){            
            $val = Typecho_Widget::widget('Widget_Abstract_Contents')->push($val);
			$post_date = date('m-d',$val['created']);
            $post_title = htmlspecialchars($val['title']);
            $permalink = $val['permalink'];
            echo '<li><span><small>'.$post_date.'</small></span><a href="'.$permalink.'" title="'.$post_title.'" target="_blank">'.$post_title.'</a></li>';      
        }
    }
}