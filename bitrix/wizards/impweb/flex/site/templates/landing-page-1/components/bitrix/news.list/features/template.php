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
?>
<div id="features" class="content-section grey-section">
	<div class="section-container">
		<div class="container">
			<div class="row vertical-center">
				<div class="col-lg-8 col-md-7">
					<div class="row">
						<div class="col-md-12 title-block">
							<div class="title-block-container">
								<h2><?=$arResult['NAME']?></h2>
								<div class="line-separator"></div>
							</div>
						</div>
						<div class="col-md-12 content-block">
							<div class="content-block-container">
								<p>
									<?=$arResult['DESCRIPTION']?>
								</p>
							</div>
						</div>
						<?foreach($arResult['ITEMS'] as $key => $arItems):?>
							<div class="col-md-6 content-block">
								<div class="content-block-container">
									<i class="fa fa-<?=$arItems['PROPERTIES']['FA_ICON']['VALUE']?> circle-icon-block circle-icon-block-lg"></i>
									<h4><!--<a href="#" title="Responsive design">--><?=$arItems['NAME']?><!--</a>--></h4>
									<p>
										<?=$arItems['DETAIL_TEXT']?>
									</p>
								</div>
							</div>
							<?endforeach;?>
					</div>
				</div>
				<div class="col-lg-4 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
					<div class="image-block">
						<div class="image-block-container">
							<?echo CFile::ShowImage($arResult['PICTURE'], 200, 200, "border=0", "", true);?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
