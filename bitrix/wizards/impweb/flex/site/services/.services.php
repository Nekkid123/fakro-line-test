<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arServices = Array(
	
	'main' => Array(
		'NAME' => GetMessage("SERVICE_MAIN_SETTINGS"),
		'STAGES' => Array(			
			"files.php",
			"template.php",            
		),
	),
	"iblock"	=> array(
		"NAME"		=> GetMessage("SERVICE_IBLOCK"),
		"STAGES"	=> array(
			"types.php",
			"banner.php",
			"messages.php",
			"faq.php",
			"features.php",
			"feedback.php",
			"gallery.php",
			"price.php",
			"services.php",
		),
	),
);
?>
