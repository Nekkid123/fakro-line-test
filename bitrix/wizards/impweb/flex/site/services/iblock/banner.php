<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if(!CModule::IncludeModule("iblock"))
	return;
$iblockXMLFile = WIZARD_SERVICE_RELATIVE_PATH."/xml/".LANGUAGE_ID."/banner.xml"; 
$iblockCode = "BANNER"; 
$iblockType = "CONTENT";
$iblockID = false; 

$rsIBlock = CIBlock::GetList(array(), array("CODE" => $iblockCode, "TYPE" => $iblockType));
if ($arIBlock = $rsIBlock->Fetch())
{
	$iblockID = $arIBlock["ID"]; 
	if (WIZARD_INSTALL_DEMO_DATA)
	{
		CIBlock::Delete($arIBlock["ID"]); 
		$iblockID = false; 
	}
}

if ($iblockID == false)
{
	$iblockID = WizardServices::ImportIBlockFromXML(
		$iblockXMLFile,
		$iblockCode,
		$iblockType,
		WIZARD_SITE_ID,
		$permissions = Array(
			"1" => "X",
			"2" => "R"
		)
	);
	
	if ($iblockID < 1)
		return;

	//IBlock fields
	$iblock = new CIBlock;
	$arFields = Array(
		"ACTIVE" => "Y",
		"FIELDS" => array(
			'IBLOCK_SECTION' => array ( 
				'IS_REQUIRED' => 'N', 
				'DEFAULT_VALUE' => '', 
			), 
			'ACTIVE' => array ( 
				'IS_REQUIRED' => 'Y', 
				'DEFAULT_VALUE' => 'Y', 
			), 
			'ACTIVE_FROM' => array ( 
				'IS_REQUIRED' => 'N', 
				'DEFAULT_VALUE' => '=today', 
			), 
			'ACTIVE_TO' => array ( 
				'IS_REQUIRED' => 'N', 
				'DEFAULT_VALUE' => '', 
			), 
			'SORT' => array ( 
				'IS_REQUIRED' => 'N', 
				'DEFAULT_VALUE' => '', 
			), 
			'NAME' => array ( 
				'IS_REQUIRED' => 'Y', 
				'DEFAULT_VALUE' => '', 
			), 
			'PREVIEW_PICTURE' => array ( 
				'IS_REQUIRED' => 'N', 
				'DEFAULT_VALUE' => array ( 
					'FROM_DETAIL' => 'N', 
					'SCALE' => 'N', 
					'WIDTH' => '', 
					'HEIGHT' => '', 
					'IGNORE_ERRORS' => 'N', 
					'METHOD' => 'resample', 
					'COMPRESSION' => 95, 
					'DELETE_WITH_DETAIL' => 'N', 
					'UPDATE_WITH_DETAIL' => 'N', 
				), 
			), 
			'PREVIEW_TEXT_TYPE' => array ( 
				'IS_REQUIRED' => 'Y', 
				'DEFAULT_VALUE' => 'text', 
			), 
			'PREVIEW_TEXT' => array ( 
				'IS_REQUIRED' => 'N', 
				'DEFAULT_VALUE' => '', 
			), 
			'DETAIL_PICTURE' => array ( 
				'IS_REQUIRED' => 'Y', 
				'DEFAULT_VALUE' => array ( 
					'SCALE' => 'N', 
					'WIDTH' => '', 
					'HEIGHT' => '', 
					'IGNORE_ERRORS' => 'N', 
					'METHOD' => 'resample', 
					'COMPRESSION' => 95, 
				), 
			), 
			'DETAIL_TEXT_TYPE' => array ( 
				'IS_REQUIRED' => 'Y', 
				'DEFAULT_VALUE' => 'text', 
			), 
			'DETAIL_TEXT' => array ( 
				'IS_REQUIRED' => 'N', 
				'DEFAULT_VALUE' => '', 
			), 
			'XML_ID' => array ( 
				'IS_REQUIRED' => 'N', 
				'DEFAULT_VALUE' => '', 
			), 
			'CODE' => array ( 
				'IS_REQUIRED' => 'N', 
				'DEFAULT_VALUE' => array ( 
					'UNIQUE' => 'Y', 
					'TRANSLITERATION' => 'Y', 
					'TRANS_LEN' => 100, 
					'TRANS_CASE' => 'L', 
					'TRANS_SPACE' => '_', 
					'TRANS_OTHER' => '_', 
					'TRANS_EAT' => 'Y', 
					'USE_GOOGLE' => 'Y', 
				), 
			), 
			'TAGS' => array ( 
				'IS_REQUIRED' => 'N', 
				'DEFAULT_VALUE' => '', 
			), 
			'SECTION_NAME' => array ( 
				'IS_REQUIRED' => 'Y', 
				'DEFAULT_VALUE' => '', 
			), 
			'SECTION_PICTURE' => array ( 
				'IS_REQUIRED' => 'N', 
				'DEFAULT_VALUE' => array ( 
					'FROM_DETAIL' => 'N', 
					'SCALE' => 'N', 
					'WIDTH' => '', 
					'HEIGHT' => '', 
					'IGNORE_ERRORS' => 'N', 
					'METHOD' => 'resample', 
					'COMPRESSION' => 95, 
					'DELETE_WITH_DETAIL' => 'N', 
					'UPDATE_WITH_DETAIL' => 'N', 
				), 
			), 
			'SECTION_DESCRIPTION_TYPE' => array ( 
				'IS_REQUIRED' => 'Y', 
				'DEFAULT_VALUE' => 'text', 
			), 
			'SECTION_DESCRIPTION' => array ( 
				'IS_REQUIRED' => 'N', 
				'DEFAULT_VALUE' => '', 
			), 
			'SECTION_DETAIL_PICTURE' => array ( 
				'IS_REQUIRED' => 'N', 
				'DEFAULT_VALUE' => array ( 
					'SCALE' => 'N', 
					'WIDTH' => '', 
					'HEIGHT' => '', 
					'IGNORE_ERRORS' => 'N', 
					'METHOD' => 'resample', 
					'COMPRESSION' => 95, 
				), 
			), 
			'SECTION_XML_ID' => array ( 
				'IS_REQUIRED' => 'N', 
				'DEFAULT_VALUE' => '', 
			), 
			'SECTION_CODE' => array ( 
				'IS_REQUIRED' => 'N', 
				'DEFAULT_VALUE' => array ( 
					'UNIQUE' => 'N', 
					'TRANSLITERATION' => 'N', 
					'TRANS_LEN' => 100, 
					'TRANS_CASE' => 'L', 
					'TRANS_SPACE' => '_', 
					'TRANS_OTHER' => '_', 
					'TRANS_EAT' => 'Y', 
					'USE_GOOGLE' => 'N', 
				), 
			), 
		),
		"CODE" => $iblockCode, 
		"XML_ID" => $iblockCode,
	);
	
	$iblock->Update($iblockID, $arFields);
}
else
{
	$arSites = array(); 
	$db_res = CIBlock::GetSite($iblockID);
	while ($res = $db_res->Fetch())
		$arSites[] = $res["LID"]; 
	if (!in_array(WIZARD_SITE_ID, $arSites))
	{
		$arSites[] = WIZARD_SITE_ID;
		$iblock = new CIBlock;
		$iblock->Update($iblockID, array("LID" => $arSites));
	}

	$arSites = array(); 
	$db_res = CIBlock::GetSite($iblockID);
	while ($res = $db_res->Fetch())
		$arSites[] = $res["LID"]; 
	if (!in_array(WIZARD_SITE_ID, $arSites))
	{
		$arSites[] = WIZARD_SITE_ID;
		$iblock = new CIBlock;
		$iblock->Update($iblockID, array("LID" => $arSites));
	}
}

$res = CIBlockProperty::GetByID("BUTTON_NAME", $iblockID, $iblockCode);
$ar_res = $res->GetNext();

$arFormSettings = array ( 0 => array ( 0 => array ( 0 => 'edit1', 1 => 'Элемент', ), 1 => array ( 0 => 'ACTIVE', 1 => 'Активность', ), 2 => array ( 0 => 'SORT', 1 => 'Сортировка', ), 3 => array ( 0 => 'NAME', 1 => '*Название баннера', ), 4 => array ( 0 => 'DETAIL_TEXT', 1 => 'Заголовок', ), 5 => array ( 0 => 'PREVIEW_TEXT', 1 => 'Подзаголовок', ), 6 => array ( 0 => 'PROPERTY_' . $ar_res['ID'], 1 => '*Название кнопки', ), 7 => array ( 0 => 'DETAIL_PICTURE', 1 => '*Детальная картинка', ), ), 1 => array ( 0 => array ( 0 => '', ), ), );

      $arFormFields = array();
      foreach ($arFormSettings as $key => $arFormFields)
      {
         $arFormItems = array();
         foreach ($arFormFields as $strFormItem)
            $arFormItems[] = implode('--#--', $strFormItem);

         $arStrFields[] = implode('--,--', $arFormItems);
      }
      $arSettings = array("tabs" => implode('--;--', $arStrFields));
      $rez = CUserOptions::SetOption("form", "form_element_".$iblockID, $arSettings, $bCommon=true, $userId=false);

CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH . "_index.php", array('BANNER_IBLOCK_ID' => $iblockID));
?>