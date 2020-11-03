<?
/**
 * Copyright (c) 20/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

class KitFeedbackEvent
{
	function OnAfterIBlockUpdateHandler(&$arFields)
	{
		if($arFields["RESULT"])
		{
			if($arFields["CODE"] == "kit_feedback" || $arFields["IBLOCK_TYPE_ID"] == "kit_feedback")
			{
				BXClearCache(true, "/kit/feedback");
			}
		}
	}
}
?>