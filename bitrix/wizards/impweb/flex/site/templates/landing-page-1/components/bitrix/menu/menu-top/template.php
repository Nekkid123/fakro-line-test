<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
	<?if (!empty($arResult)):?>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
		$link = preg_replace("/\\//i", "", $arItem["LINK"]);
?>
					<li>
						<a href="<?=$link?>">
							<?=$arItem["TEXT"]?>
						</a>
					</li>
					<?endforeach?>
					<li>
						<a href="#" title="Purchase" class="btn btn-gfort wave-effect" data-toggle="modal" data-target="#modal_telephone">
							<?$APPLICATION->IncludeComponent(
		"bitrix:main.include",
		".default",
		Array(
			"AREA_FILE_SHOW" => "file",
			"AREA_FILE_SUFFIX" => "inc",
			"COMPONENT_TEMPLATE" => ".default",
			"EDIT_TEMPLATE" => "",
			"PATH" => SITE_DIR."/page_inc/button.php"
		)
	);?>
						</a>
					</li>
			</ul>
		</div>
		<?endif?>