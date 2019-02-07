<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(isset($_POST['emailSent'])) {

	if (CModule::IncludeModule('iblock')):

		$message_for_iblock = "Тема: ".htmlspecialchars($_POST['subject'], ENT_NOQUOTES)."\r\n";
		$message_for_iblock .= "Имя: ".htmlspecialchars($_POST['contact_name'], ENT_NOQUOTES)."\r\n";
		$message_for_iblock .= "Телефон: ".htmlspecialchars($_POST['contact_telephone'], ENT_NOQUOTES)."\r\n";

		$subject = htmlspecialchars($_POST['subject'], ENT_NOQUOTES);
		$rsSites = CSite::GetByID(SITE_ID);
		$arSite = $rsSites->Fetch();
		$arFields = array(
		    "PHONE" => htmlspecialchars($_POST['contact_telephone'], ENT_NOQUOTES),
		    "DEFAULT_EMAIL_FROM" => 'noreply@'.$arSite['SERVER_NAME'],
		    "EMAIL_TO" => $arSite['EMAIL'],
		    "SERVER_NAME" => $arSite['SERVER_NAME'],
		    "SITE_NAME" => $arSite['SITE_NAME'],
		    "SUBJECT" => $subject,
		    "NAME" => htmlspecialchars($_POST['contact_name'], ENT_NOQUOTES)
		    );

		if (isset($_POST['contact_email']) && $_POST['contact_email'] !== '') {
			$arFields["EMAIL_CLIENT"] = htmlspecialchars($_POST['contact_email'], ENT_NOQUOTES);
			$message_for_iblock .= "E-mail: ".htmlspecialchars($_POST['contact_email'], ENT_NOQUOTES)."\r\n";
		}

		if (isset($_POST['contact_message']) && $_POST['contact_message'] !== '') {
			$arFields["MESSAGE_CLIENT"] = htmlspecialchars($_POST['contact_message'], ENT_NOQUOTES);
			$message_for_iblock .= "Сообщение: ".htmlspecialchars($_POST['contact_message'], ENT_NOQUOTES)."\r\n";
		}

		CEvent::Send("SEND_FORM", SITE_ID, $arFields);

	    echo "1";

		$el = new CIBlockElement;
		$arLoadProductArray = Array(
		  "IBLOCK_SECTION_ID" => false,          
		  "IBLOCK_ID"      => 2,
		  "NAME"           => $subject,
		  "ACTIVE"         => "Y",
		  "DETAIL_TEXT"    => $message_for_iblock
		  );

		$PRODUCT_ID = $el->Add($arLoadProductArray);

	endif;

}
?>