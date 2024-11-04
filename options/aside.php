<?php

if (!defined('__TYPECHO_ROOT_DIR__')) {http_response_code(404);exit;}

$JAside_Notice = new Typecho_Widget_Helper_Form_Element_Textarea(
	'JAside_Notice',
	NULL,
	NULL,
	'站点公告模块（非必填）',
	'介绍：请务必填写正确的格式 <br />
		 格式：通知文字<br />
		 例如：' . htmlentities('欢迎加入易航Joe再续前缘交流群：<a href="https://qm.qq.com/q/ewMaEV6yHe" target="_blank" rel="nofollow">782778569</a>')
);
$JAside_Notice->setAttribute('class', 'joe_content joe_aside');
$form->addInput($JAside_Notice);

$JAside_Author_Nick = new Typecho_Widget_Helper_Form_Element_Text(
	'JAside_Author_Nick',
	NULL,
	"易航",
	'博主栏博主昵称 - PC/WAP',
	'介绍：用于修改博主栏的博主昵称 <br />
		 注意：如果不填写时则显示 *个人设置* 里的昵称'
);
$JAside_Author_Nick->setAttribute('class', 'joe_content joe_aside');
$form->addInput($JAside_Author_Nick);

$JAside_Author_Avatar = new Typecho_Widget_Helper_Form_Element_Textarea(
	'JAside_Author_Avatar',
	NULL,
	NULL,
	'博主栏博主头像URL - PC/WAP',
	'介绍：用于修改博主栏的博主头像 <br />
		 注意：如果不填写时则显示 *个人设置* 里的头像'
);
$JAside_Author_Avatar->setAttribute('class', 'joe_content joe_aside');
$form->addInput($JAside_Author_Avatar);

$JAside_Author_Image = new Typecho_Widget_Helper_Form_Element_Textarea(
	'JAside_Author_Image',
	NULL,
	NULL,
	'博主栏背景壁纸 - PC',
	'介绍：用于修改PC端博主栏的背景壁纸 <br/>
		 格式：图片地址 或 Base64地址'
);
$JAside_Author_Image->setAttribute('class', 'joe_content joe_aside');
$form->addInput($JAside_Author_Image);

$JAside_Wap_Image = new Typecho_Widget_Helper_Form_Element_Textarea(
	'JAside_Wap_Image',
	NULL,
	'//api.bri6.cn/api/wallpaper/phone.php',
	'博主栏背景壁纸 - WAP',
	'介绍：用于修改移动端博主栏的背景壁纸 <br/>
		 格式：图片地址 或 Base64地址'
);
$JAside_Wap_Image->setAttribute('class', 'joe_content joe_aside');
$form->addInput($JAside_Wap_Image);

$JAside_Wap_Image_Height = new Typecho_Widget_Helper_Form_Element_Text(
	'JAside_Wap_Image_Height',
	NULL,
	'100%',
	'博主栏背景壁纸高度 - WAP',
	'介绍：用于修改移动端博主栏的背景壁纸高度 <br>
	例如：100%（全屏）丨auto（自动按照图片高度）丨150px（指定高度）'
);
$JAside_Wap_Image_Height->setAttribute('class', 'joe_content joe_aside');
$form->addInput($JAside_Wap_Image_Height);

$JAside_Author_Link = new Typecho_Widget_Helper_Form_Element_Text(
	'JAside_Author_Link',
	NULL,
	"http://blog.bri6.cn",
	'博主栏昵称跳转地址 - PC/WAP',
	'介绍：用于修改博主栏点击博主昵称后的跳转地址'
);
$JAside_Author_Link->setAttribute('class', 'joe_content joe_aside');
$form->addInput($JAside_Author_Link);

$JAside_Author_Motto = new Typecho_Widget_Helper_Form_Element_Textarea(
	'JAside_Author_Motto',
	NULL,
	NULL,
	'博主栏座右铭（一言）- PC/WAP',
	'介绍：用于修改博主栏的座右铭（一言） <br />
		 格式：可以填写多行也可以填写一行，填写多行时，每次随机显示其中的某一条，也可以填写API地址 <br />
		 其他：API和自定义的座右铭完全可以一起写（换行填写），不会影响 <br />
		 注意：API需要开启跨域权限才能调取，否则会调取失败！<br />
		 推荐API：//api.bri6.cn/api/random-talk/'
);
$JAside_Author_Motto->setAttribute('class', 'joe_content joe_aside');
$form->addInput($JAside_Author_Motto);

$JAside_Author_Nav = new Typecho_Widget_Helper_Form_Element_Select(
	'JAside_Author_Nav',
	array(
		'off' => '关闭（默认）',
		'3' => '开启，并显示3条最新文章',
		'4' => '开启，并显示4条最新文章',
		'5' => '开启，并显示5条最新文章',
		'6' => '开启，并显示6条最新文章',
		'7' => '开启，并显示7条最新文章',
		'8' => '开启，并显示8条最新文章',
		'9' => '开启，并显示9条最新文章',
		'10' => '开启，并显示10条最新文章'
	),
	'off',
	'博主栏下方随机文章条目 - PC',
	NULL
);
$JAside_Author_Nav->setAttribute('class', 'joe_content joe_aside');
$form->addInput($JAside_Author_Nav->multiMode());

$JAside_Timelife_Status = new Typecho_Widget_Helper_Form_Element_Select(
	'JAside_Timelife_Status',
	array(
		'off' => '关闭（默认）',
		'on' => '开启'
	),
	'off',
	'是否开启人生倒计时模块 - PC',
	NULL
);
$JAside_Timelife_Status->setAttribute('class', 'joe_content joe_aside');
$form->addInput($JAside_Timelife_Status->multiMode());

$JAside_Hot_Num = new Typecho_Widget_Helper_Form_Element_Select(
	'JAside_Hot_Num',
	array(
		'off' => '关闭（默认）',
		'3' => '显示3条',
		'4' => '显示4条',
		'5' => '显示5条',
		'6' => '显示6条',
		'7' => '显示7条',
		'8' => '显示8条',
		'9' => '显示9条',
		'10' => '显示10条',
	),
	'off',
	'是否开启热门文章栏 - PC',
	'介绍：用于控制是否开启热门文章栏'
);
$JAside_Hot_Num->setAttribute('class', 'joe_content joe_aside');
$form->addInput($JAside_Hot_Num->multiMode());

$JAside_Newreply_Status = new Typecho_Widget_Helper_Form_Element_Select(
	'JAside_Newreply_Status',
	array(
		'off' => '关闭（默认）',
		'on' => '开启'
	),
	'off',
	'是否开启最新回复栏 - PC',
	'介绍：用于控制是否开启最新回复栏 <br>
		 注意：如果您关闭了全站评论，将不会显示最新回复！'
);
$JAside_Newreply_Status->setAttribute('class', 'joe_content joe_aside');
$form->addInput($JAside_Newreply_Status->multiMode());

$JAside_Weather_Key = new Typecho_Widget_Helper_Form_Element_Text(
	'JAside_Weather_Key',
	NULL,
	NULL,
	'天气栏KEY值 - PC',
	'介绍：用于初始化天气栏 <br/>
		 注意：填写时务必填写正确！不填写则不会显示<br />
		 其他：免费申请地址：<a href="//widget.qweather.com/create-standard">widget.qweather.com/create-standard</a><br />
		 简要：在网页生成时，配置项随便选择，只需要生成代码后的Token即可'
);
$JAside_Weather_Key->setAttribute('class', 'joe_content joe_aside');
$form->addInput($JAside_Weather_Key);

$JAside_Weather_Style = new Typecho_Widget_Helper_Form_Element_Select(
	'JAside_Weather_Style',
	array(
		'1' => '自动（默认）',
		'2' => '浅色',
		'3' => '深色'
	),
	'1',
	'选择天气栏的风格 - PC',
	'介绍：选择一款您所喜爱的天气风格 <br />
		 注意：需要先填写天气的KEY值才会生效'
);
$JAside_Weather_Style->setAttribute('class', 'joe_content joe_aside');
$form->addInput($JAside_Weather_Style->multiMode());

$JADContent = new Typecho_Widget_Helper_Form_Element_Textarea(
	'JADContent',
	NULL,
	NULL,
	'侧边栏广告 - PC',
	'介绍：用于设置侧边栏广告 <br />
		 格式：广告图片 || 跳转链接 （中间使用两个竖杠分隔）<br />
		 注意：如果您只想显示图片不想跳转，可填写：广告图片 || javascript:void(0)'
);
$JADContent->setAttribute('class', 'joe_content joe_aside');
$form->addInput($JADContent);


$JAside_3DTag = new Typecho_Widget_Helper_Form_Element_Select(
	'JAside_3DTag',
	array(
		'off' => '关闭（默认）',
		'on' => '开启'
	),
	'off',
	'是否开启3D云标签 - PC',
	NULL
);
$JAside_3DTag->setAttribute('class', 'joe_content joe_aside');
$form->addInput($JAside_3DTag->multiMode());

$JAside_Flatterer = new Typecho_Widget_Helper_Form_Element_Select(
	'JAside_Flatterer',
	array(
		'off' => '关闭（默认）',
		'on' => '开启'
	),
	'off',
	'是否开启舔狗日记 - PC',
	NULL
);
$JAside_Flatterer->setAttribute('class', 'joe_content joe_aside');
$form->addInput($JAside_Flatterer->multiMode());

$JAside_History_Today = new Typecho_Widget_Helper_Form_Element_Select(
	'JAside_History_Today',
	array(
		'off' => '关闭（默认）',
		'on' => '开启'
	),
	'off',
	'是否开启那年今日 - PC',
	'介绍：用于设置侧边栏是否显示往年今日的文章 <br />
		 其他：如果往年今日有文章则显示，没有则不显示！'
);
$JAside_History_Today->setAttribute('class', 'joe_content joe_aside');
$form->addInput($JAside_History_Today->multiMode());
