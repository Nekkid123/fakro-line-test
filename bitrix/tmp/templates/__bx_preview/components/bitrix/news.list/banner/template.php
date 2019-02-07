<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
// print_r($arResult);
// print_r($arResult);
?>
<div id="banner" class="hero-section white-section section-lg-padding">
	<div class="section-container">
		<div class="background-image-block parallax-effect gfort-image">
			<img src="<?=$arResult['ITEMS'][0]['DETAIL_PICTURE']['SRC']?>" alt="Parallax Image" class="mobile-image">
			<img src="<?=$arResult['ITEMS'][0]['DETAIL_PICTURE']['SRC']?>" alt="Parallax Image">
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 title-block">
					<div class="title-block-container white-content remove-white-content text-center">
						<h1><?=$arResult['ITEMS'][0]['DETAIL_TEXT']?></h1>
						<p><?=$arResult['ITEMS'][0]['PREVIEW_TEXT']?></p>
						<a href="https://goo.gl/forms/ubLZOZd75rhqMZgG3" title="Read More" class="btn btn-gfort wave-effect" >
							<?=$arResult['ITEMS'][0]['PROPERTIES']['BUTTON_NAME']['VALUE']?>
							<?/*$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								".default",
								Array(
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "inc",
									"COMPONENT_TEMPLATE" => ".default",
									"EDIT_TEMPLATE" => "",
									"PATH" => SITE_TEMPLATE_PATH."/page_templates/logo.php"
								)
							);*/?>
						</a>
						<!-- <a href="#" title="Purchase Now" class="btn btn-gfort-white wave-effect">PURCHASE NOW</a> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>