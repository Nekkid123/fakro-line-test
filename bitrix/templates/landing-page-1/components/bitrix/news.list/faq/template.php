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
?>
<div id="faq" class="faq-section white-section">
	<div class="section-container">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-lg-offset-1 col-md-12 title-block">
					<div class="title-block-container text-center">
						<h2><?=$arResult['NAME']?></h2>
						<p><?=$arResult['DESCRIPTION']?></p>
						<div class="line-separator"></div>
					</div>
				</div>
				<?foreach ($arResult['ITEMS'] as $key => $arItem):?>
				<div class="col-lg-4 col-md-6 faq-block faq-block-style-1">
					<div class="faq-block-container" style="height: 158px;">
						<h4><?=$arItem['NAME']?></h4>
						<p><?=$arItem['DETAIL_TEXT']?></p>
					</div>
				</div>
				<?endforeach;?>
			</div>
		</div>
	</div>
</div>