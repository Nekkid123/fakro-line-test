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
<div id="gallery" class="portfolio-section white-section section-no-padding">
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
			</div>
		</div>
		<div class="gfort-swiper-slider no-pagination-swiper-slider" data-swiper-items="3">
			<div class="swiper-wrapper">
			<?foreach($arResult['ITEMS'] as $key => $arItem):?>
			<?$file = CFile::ResizeImageGet($arItem['DETAIL_PICTURE'], array('width'=>540, 'height'=>304), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
				<div class="swiper-slide">
					<div class="swiper-slide-container">
						<div class="col-md-12 portfolio-block portfolio-block-style-1 wide-block">
							<div class="portfolio-block-container">
								<a href="<?=$arItem['DETAIL_PICTURE']['SRC']?>" title="<?=$arItem['NAME']?>" class="fancybox" rel="group"></a>
								<a href="<?=$arItem['DETAIL_PICTURE']['SRC']?>" title="<?=$arItem['NAME']?>" class="main-link" rel="group2">
									<div class="image-block">
										<div class="image-block-container">
											<img src="<?=$file['src']?>" alt="Image Block">
										</div>
									</div>
									<h4><?=$arItem['NAME']?></h4>
								</a>
							</div>
						</div>
					</div>
				</div>
			<?endforeach;?>
			</div>
			<div class="swiper-pagination"></div>
			<div class="swiper-button-prev">
				<i class="fa fa-angle-left"></i>
			</div>
			<div class="swiper-button-next">
				<i class="fa fa-angle-right"></i>
			</div>
		</div>
	</div>
</div>