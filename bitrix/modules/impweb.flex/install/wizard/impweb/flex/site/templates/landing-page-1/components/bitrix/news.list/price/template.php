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
<div id="price" class="pricing-section white-section">
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
				<div class="pricing-tables-wrapper">
				<?foreach($arResult['ITEMS'] as $key => $arItems):?>
					<div class="col-md-4 col-sm-6 pricing-block"
						data-name="<?=$arItems['NAME']?>"
						data-price="<?=$arItems['PROPERTIES']['PRICE']['VALUE']?>">

						<div class="pricing-block-container" <?/*style="height: 464px;"*/?>>
							<?if ($arItems['PROPERTIES']['BEST']['VALUE'] == 1):?>
							<div class="ribbon-block ribbon-block-style-2"><?=$arItems['PROPERTIES']['BEST_NAME']['VALUE']?></div>
							<?endif;?>
							<div class="pricing-block-title">
								<h1><?=$arItems['NAME']?></h1>
							</div>
							<div class="pricing-block-price">
								<h2>									
									<span class="amount"><?=$arItems['PROPERTIES']['PRICE']['VALUE']?></span>
									<span class="currency"><?=GetMessage("IMPWEB_FLEX_R")?></span>
									<!-- <span class="duration">/MO</span> -->
								</h2>
							</div>
							<div class="pricing-block-desc">
								<p><?=$arItems['DETAIL_TEXT']?></p>
							</div>
							<div class="pricing-block-button">
								<a href="#" title="Purchase Now" class="btn btn-gfort wave-effect"  data-toggle="modal" data-target="#modal_item"><?=$arItems['PROPERTIES']['BUTTON_NAME']['VALUE']?></a>
							</div>
						</div>
					</div>
				<?endforeach;?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"id="item-name"></h4>
				<br><p><?=GetMessage("IMPWEB_FLEX_CENA")?><span id="item-price"></span></p>
			</div>
			<form id="form_item" method="post" action="<?=SITE_TEMPLATE_PATH?>/php/sendmail.php">
				<input type="hidden" name="emailSent" value="1">
				<input type="hidden" name="subject" value="<?=GetMessage("IMPWEB_FLEX_ZAKAZ_ZVONKA_S_FORMY")?>">
				<div class="modal-body">
					<div class="col-md-12">
						<div class="form-group">
							<input type="text" class="form-control contact-name" name="contact_name">
							<label><?=GetMessage("IMPWEB_FLEX_IMA")?></label>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<input type="text" class="form-control contact-name" name="contact_telephone">
							<label><?=GetMessage("IMPWEB_FLEX_TELEFON")?></label>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-gfort wave-effect"><?=GetMessage("IMPWEB_FLEX_OTPRAVITQ")?></button>
				</div>
			</form>
		</div>
	</div>
</div>