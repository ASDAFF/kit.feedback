<?
/**
 * Copyright (c) 20/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("ASSEMBLY_DESC_FAQ_ADD_NAME"),
	"DESCRIPTION" => GetMessage("ASSEMBLY_DESC_REVIEW_ADD_DESC"),
	"ICON" => "/images/icon.gif",
	"SORT" => 20,
	"CACHE_PATH" => "Y",
	"PATH" => array(
		"ID" => "ASDAFF",
		"CHILD" => array(
			"ID" => "collected_feedback",
			"NAME" => GetMessage("ASSEMBLY_DESC_FORMS_SECTION_NAME"),
			"SORT" => 10,
			"CHILD" => array(
				"ID" => "review_add",
			),
		),
	),
);

?>