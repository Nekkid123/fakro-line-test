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
<div id="feedback" class="testimonials-section white-section">
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
				<?foreach($arResult['ITEMS'] as $key => $arItems):?>
					<div class="col-md-4 testimonials-block testimonials-block-style-3">
						<div class="testimonials-block-container">
							<div class="testimonials-block-desc">
								<p><?=$arItems['DETAIL_TEXT']?></p>
							</div>
							<div class="image-block">
								<div class="image-block-container">
									<img src="<?=$arItems['DETAIL_PICTURE']['SRC']?>" alt="Image Block">
								</div>
							</div>
							<div class="testimonials-block-title">
								<h4>
								<?=$arItems['NAME']?>
								<br>
								<small><?=$arItems['~PREVIEW_TEXT']?></small>
								</h4>
							</div>
						</div>
					</div>
				<?endforeach;?>
			</div>
		</div>
	</div>
</div>