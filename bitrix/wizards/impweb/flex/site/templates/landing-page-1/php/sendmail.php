<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';
CModule::IncludeModule('iblock');
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$rsUser = CUser::GetByID(1);
$arUser = $rsUser->Fetch();
$strEmail = $arUser['EMAIL'];
$strName = $arUser['NAME'];

if(isset($_POST['emailSent'])) {

	$headers = 'From: Flex: Лэндинг Пэйдж <' . $strEmail . '>' . "\r\n" .
	    'Reply-To: ' . $strEmail . "\r\n" .
	    'Content-Type: text/html; charset=utf-8' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();	

	$fields_set = array(
		'contact_name' => 'Имя',
		'contact_telephone' => 'Телефон',
		'contact_email' => 'Емэйл',
		'contact_message' => 'Сообщение'
		);

	$fields = array();

	foreach ($fields_set as $key => $value) {
		if ($_POST[$key]) {
			$fields[] = array(
				'text' => $value,
				'val' => $_POST[$key]
			);
		}
	}

	$to  = $strName . ' <' . $strEmail . '> ';
	$subject = htmlspecialchars($_POST['contact_name'], ENT_QUOTES).'. '.htmlspecialchars($_POST['subject'], ENT_NOQUOTES);

	$message = '
	<html>
	    <head>
	        <title>'.$subject.'</title>
	    </head>
	    <body>';
	$message_for_iblock = '';
	foreach($fields as $field) {
		$message .= $field['text'].": " . htmlspecialchars($field['val'], ENT_QUOTES) . "<br>\n";
		$message_for_iblock .= $field['text'].": " . htmlspecialchars($field['val'], ENT_QUOTES) . "\r\n";
	}

	$message .= '
	    </body>
	</html>';

	if (mail($to, $subject, $message, $headers)) { 
	    echo "1";
		$el = new CIBlockElement;
		$arLoadProductArray = Array(
		  "IBLOCK_SECTION_ID" => false,          
		  "IBLOCK_ID"      => #MESSAGES_IBLOCK_ID#,
		  "NAME"           => $subject,
		  "ACTIVE"         => "Y",
		  "DETAIL_TEXT"    => $message_for_iblock
		  );
		$PRODUCT_ID = $el->Add($arLoadProductArray);
	} else {
	    echo "not_send";
	}

}
?>