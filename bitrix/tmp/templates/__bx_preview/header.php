<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html>
<head>
	<?$APPLICATION->ShowHead();?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title><?$APPLICATION->ShowTitle()?></title>
	
	<link rel="shortcut icon" type="image/x-icon" href="<?=SITE_TEMPLATE_PATH?>/favicon.ico" />
	
	<link href="<?=SITE_TEMPLATE_PATH?>/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=SITE_TEMPLATE_PATH?>/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?=SITE_TEMPLATE_PATH?>/bower_components/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
	<link href="<?=SITE_TEMPLATE_PATH?>/bower_components/formvalidation/dist/css/formValidation.min.css" rel="stylesheet">
	<link href="<?=SITE_TEMPLATE_PATH?>/js/plugins/swiper/css/swiper.min.css" rel="stylesheet">
	<link href="<?=SITE_TEMPLATE_PATH?>/js/plugins/fancybox/jquery.fancybox.min.css" rel="stylesheet">
	<link href="<?=SITE_TEMPLATE_PATH?>/css/custom.css" rel="stylesheet">

	<script src="<?=SITE_TEMPLATE_PATH?>/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
	
	<script src='<?=SITE_TEMPLATE_PATH?>/bower_components/formvalidation/dist/js/formValidation.min.js'></script>
	<script src='<?=SITE_TEMPLATE_PATH?>/bower_components/formvalidation/dist/js/framerowk/bootstrap.min.js'></script>
	<!--<script src='<?=SITE_TEMPLATE_PATH?>/bower_components/formvalidation/dist/js/addons/reCaptcha2.min.js'></script>-->

	<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
</head>

<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>