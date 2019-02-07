<?
global $MESS;
$PathInstall = str_replace("\\", "/", __FILE__);
$PathInstall = substr($PathInstall, 0, strlen($PathInstall)-strlen("/index.php"));

IncludeModuleLangFile($PathInstall."/index.php");

Class impweb_flex extends CModule
{
	var $MODULE_ID = "impweb.flex";
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;
	var $MODULE_GROUP_RIGHTS = "Y";

	function impweb_flex()
	{
		$arModuleVersion = array();

		include(dirname(__FILE__)."/version.php");

		$this->MODULE_VERSION = $arModuleVersion["VERSION"];
		$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];

		$this->MODULE_NAME = GetMessage("R_TOP_INSTALL_NAME");
		$this->MODULE_DESCRIPTION = GetMessage("R_TOP_INSTALL_DESCRIPTION");
		$this->PARTNER_NAME = GetMessage("SPER_PARTNER");
		$this->PARTNER_URI = GetMessage("PARTNER_URI");
	}


	function InstallDB($install_wizard = true)
	{
        RegisterModule("impweb.flex");
		return true;
	}

	function UnInstallDB($arParams = Array())
	{
        UnRegisterModule("impweb.flex");
		return true;
	}

	function InstallEvents()
	{
		return true;
	}

	function UnInstallEvents()
	{
		return true;
	}

	function InstallFiles()
	{
        CopyDirFiles(
            $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/wizard/impweb",
            $_SERVER["DOCUMENT_ROOT"]."/bitrix/wizards/impweb", true, true
        ); 
		return true;
	}

	function InstallPublic()
	{
	}

	function UnInstallFiles()
	{
		DeleteDirFilesEx("/bitrix/wizards/impweb");
		return true;
	}

	function DoInstall()
	{
        $this->InstallDB();
        $this->InstallFiles();
    }

	function DoUninstall()
	{
        $this->UnInstallDB();
        $this->UnInstallFiles();
    }
}
?>