<?
/**
 * Copyright (c) 20/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

class CollectedFeedbackEvent
{
	function OnAfterIBlockUpdateHandler(&$arFields)
	{
		if($arFields["RESULT"])
		{
			if($arFields["CODE"] == "collected_feedback" || $arFields["IBLOCK_TYPE_ID"] == "collected_feedback")
			{
				BXClearCache(true, "/collected/feedback");
			}
		}
	}
}
?>