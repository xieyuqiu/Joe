<?php

if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit;
}

if (isset($_GET['joe_code'])) {
	$JCustomAsideHTML = new Typecho_Widget_Helper_Form_Element_Hidden(
		'',
		NULL,
		NULL,
		'
		<!-- 核心CSS -->
		<link href="' . joe\cdn('codemirror/6.65.7/codemirror.min.css') . '" rel="stylesheet">
	
		<!-- dracula主题CSS -->
		<link href="' . joe\cdn('codemirror/6.65.7/theme/dracula.min.css') . '" rel="stylesheet">
	
		<!-- 代码提示CSS -->
		<link href="' . joe\cdn('codemirror/6.65.7/addon/hint/show-hint.min.css') . '" rel="stylesheet">
	
		<!-- 核心JS -->
		<script src="' . joe\cdn('codemirror/6.65.7/codemirror.min.js') . '"></script>
	
		<!-- 代码提示核心JS -->
		<script src="' . joe\cdn('codemirror/6.65.7/addon/hint/show-hint.min.js') . '"></script>
	
		<!-- JavaScript代码高亮 -->
		<script src="' . joe\cdn('codemirror/6.65.7/mode/javascript/javascript.min.js') . '"></script>
	
		<!-- CSS语法高亮 -->
		<script src="' . joe\cdn('codemirror/6.65.7/mode/css/css.min.js') . '"></script>
			
		<!-- HTML语法高亮 -->
		<script src="' . joe\cdn('codemirror/6.65.7/mode/xml/xml.min.js') . '"></script>
		<script src="' . joe\cdn('codemirror/6.65.7/mode/htmlmixed/htmlmixed.min.js') . '"></script>
	
		<!-- PHP代码高亮 -->
		<script src="' . joe\cdn('codemirror/6.65.7/mode/clike/clike.min.js') . '"></script>
		<script src="' . joe\cdn('codemirror/6.65.7/mode/php/php.min.js') . '"></script>
	
		<!-- JavaScript代码提示 -->
		<script src="' . joe\cdn('codemirror/6.65.7/addon/hint/javascript-hint.min.js') . '"></script>
	
		<!-- HTML语法提示 -->
		<script src="' . joe\cdn('codemirror/6.65.7/addon/hint/xml-hint.min.js') . '"></script>
		<script src="' . joe\cdn('codemirror/6.65.7/addon/hint/html-hint.min.js') . '"></script>
	
		<!-- CSS语法提示 -->
		<script src="' . joe\cdn('codemirror/6.65.7/addon/hint/css-hint.min.js') . '"></script>
	
		<!-- PHP代码提示 -->
		<!-- <script src="' . joe\cdn('codemirror/6.65.7/addon/hint/php-hint.min.js') . '"></script> -->
	
		<!-- anyword代码提示 -->
		<script src="' . joe\cdn('codemirror/6.65.7/addon/hint/anyword-hint.min.js') . '"></script>
	
		<!-- 匹配括号 -->
		<script src="' . joe\cdn('codemirror/6.65.7/addon/edit/matchbrackets.min.js') . '"></script>
	
		<!-- 自动闭合括号 -->
		<script src="' . joe\cdn('codemirror/6.65.7/addon/edit/closebrackets.min.js') . '"></script>
	
		<!-- 一键注释 -->
		<script src="' . joe\cdn('codemirror/6.65.7/addon/comment/comment.min.js') . '"></script>
	
		<!-- prettier格式化工具 -->
		<script src="' . joe\cdn('js-beautify/1.15.1/beautify.min.js') . '"></script>
		<script src="' . joe\cdn('js-beautify/1.15.1/beautify-css.min.js') . '"></script>
		<script src="' . joe\cdn('js-beautify/1.15.1/beautify-html.min.js') . '"></script>
	
		<!-- 配置文件 -->
		<script src="' . joe\theme_url('assets/typecho/config/js/joe.code.js') . '"></script>
		
		<style>
			.cm-s-dracula .CodeMirror-gutters, .cm-s-dracula.CodeMirror {
				background-color: #1f1f1f !important;
			}
			.CodeMirror {
				border-radius: 3.5px;
			}
			.CodeMirror-vscrollbar, .CodeMirror-hscrollbar {
				display: none !important; /* 隐藏滚动条 */
			}
		</style>
	
		<b>自定义代码提醒事项：</b><br>
		任何情况下都不建议修改主题源文件，自定义代码可放于此处<br>
		在此处添加的自定义代码会保存到数据库，不会因主题升级而丢失<br>
		使用自义定代码，需要有一定的代码基础<br>
		代码不规范、或代码错误将会引起意料不到的问题<br>
		如果网站遇到未知错误，请首先检查此处的代码是否规范、无误<br>
		一键格式化代码快捷键：Shift+ Alt + F<br>
		快速注释代码快捷键：Ctrl + /<br>
		'
	);
	$JCustomAsideHTML->setAttribute('class', 'joe_content joe_code');
	$form->addInput($JCustomAsideHTML);
}

$JCustomAside = new Typecho_Widget_Helper_Form_Element_Textarea(
	'JCustomAside',
	NULL,
	NULL,
	'自定义侧边栏模块 - PC',
	'介绍：用于自定义侧边栏模块 <br />
		 格式：请填写前端代码，不会写请勿填写 <br />
		 例如：您可以在此处添加搜索框、时间、宠物、恋爱计时等等'
);
$JCustomAside->setAttribute('class', 'joe_content joe_code');
$JCustomAside->setAttribute('data-language', 'htmlmixed');
$form->addInput($JCustomAside);

$JCustomCSS = new Typecho_Widget_Helper_Form_Element_Textarea(
	'JCustomCSS',
	NULL,
	NULL,
	'自定义CSS（非必填）',
	'介绍：请填写自定义CSS内容，填写时无需填写style标签。<br />
		 其他：如果想修改主题色、卡片透明度等，都可以通过这个实现 <br />
		 例如：body { --theme: #ff6800; --background: rgba(255,255,255,0.85) }'
);
$JCustomCSS->setAttribute('class', 'joe_content joe_code');
$JCustomCSS->setAttribute('data-language', 'css');
$form->addInput($JCustomCSS);

$JCustomScript = new Typecho_Widget_Helper_Form_Element_Textarea(
	'JCustomScript',
	NULL,
	NULL,
	'自定义JS（非必填）',
	'介绍：请填写自定义JS内容，例如网站统计等，填写时无需填写script标签。'
);
$JCustomScript->setAttribute('class', 'joe_content joe_code');
$JCustomScript->setAttribute('data-language', 'javascript');
$form->addInput($JCustomScript);

$JCustomHeadEnd = new Typecho_Widget_Helper_Form_Element_Textarea(
	'JCustomHeadEnd',
	NULL,
	NULL,
	'自定义头部HTML代码（非必填）',
	htmlentities('介绍：位于</head>之前，这部分代码是在主要内容显示之前加载，通常是CSS样式、自定义的<meta>标签、全站头部JS等需要提前加载的代码，需填HTML标签')
);
$JCustomHeadEnd->setAttribute('class', 'joe_content joe_code');
$JCustomHeadEnd->setAttribute('data-language', 'htmlmixed');
$form->addInput($JCustomHeadEnd);

$JCustomBodyEnd = new Typecho_Widget_Helper_Form_Element_Textarea(
	'JCustomBodyEnd',
	NULL,
	NULL,
	'自定义底部HTML代码（非必填）',
	htmlentities('介绍：位于</body>之前，这部分代码是在主要内容加载完毕加载，通常是JS代码，需填HTML标签，可以填写引入第三方js脚本等等')
);
$JCustomBodyEnd->setAttribute('class', 'joe_content joe_code');
$JCustomBodyEnd->setAttribute('data-language', 'htmlmixed');
$form->addInput($JCustomBodyEnd);

$JCustomTrackCode = new Typecho_Widget_Helper_Form_Element_Textarea(
	'JCustomTrackCode',
	NULL,
	NULL,
	'网站统计HTML代码（非必填）',
	'位于底部，用于添加第三方流量数据统计代码，如：Google analytics、百度统计、CNZZ、51la，国内站点推荐使用百度统计，国外站点推荐使用Google analytics。需填HTML标签，如果是javascript代码，请保存在自定义javascript代码'
);
$JCustomTrackCode->setAttribute('class', 'joe_content joe_code');
$JCustomTrackCode->setAttribute('data-language', 'htmlmixed');
$form->addInput($JCustomTrackCode);

$JCustomFunctionsCode = new Typecho_Widget_Helper_Form_Element_Textarea(
	'JCustomFunctionsCode',
	NULL,
	NULL,
	'主题functions.php文件添加代码（非必填）',
	'自定义添加主题functions.php文件里面的PHP代码，万不可乱填'
);
$JCustomFunctionsCode->setAttribute('class', 'joe_content joe_code');
$JCustomFunctionsCode->setAttribute('data-language', 'php');
$form->addInput($JCustomFunctionsCode);
