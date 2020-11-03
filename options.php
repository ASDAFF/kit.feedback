<?
/**
 * Copyright (c) 20/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

$module_id = 'kit.feedback';

IncludeModuleLangFile(__FILE__);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/kit.feedback/include.php');
IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/options.php");

function ShowParamsHTMLByArray($module_id, $arParams)
{
	foreach($arParams as $Option)
	{
		__AdmSettingsDrawRow($module_id, $Option);
	}
}

$arAllOptions = array(
	'enabled' => Array(
		Array('ASSEMBLY_COMMON_CRM', GetMessage('ASSEMBLY_COMMON_CRM'), 'Y', array('checkbox'))
	),
	'reCAPTCHA' => Array(
		Array('ASSEMBLY_RECAPTCHA_SITE_KEY', GetMessage('ASSEMBLY_FEEDBACK_SITE_KEY'), '', array('text', 50)),
		Array('ASSEMBLY_RECAPTCHA_SECRET_KEY', GetMessage('ASSEMBLY_FEEDBACK_SECRET_KEY'), '', array('text', 50)),
	),
);
$aTabs = array(
	array('DIV' => 'edit1', 'TAB' => GetMessage('MAIN_TAB_SET'), 'TITLE' => GetMessage('MAIN_TAB_TITLE_SET')),
);

$dbSites = CSite::GetList($by="sort", $order="desc", Array());

while($arSite = $dbSites->GetNext())
{
	$arAllOptions[$arSite['LID']]['reCAPTCHA'] = Array(
		Array('ASSEMBLY_RECAPTCHA_SITE_KEY'.'_'.$arSite['LID'], GetMessage('ASSEMBLY_FEEDBACK_SITE_KEY'), '', array('text', 50)),
		Array('ASSEMBLY_RECAPTCHA_SECRET_KEY'.'_'.$arSite['LID'], GetMessage('ASSEMBLY_FEEDBACK_SECRET_KEY'), '', array('text', 50)),
	);
}

//Restore defaults
if ($_SERVER['REQUEST_METHOD']=='GET' && strlen($RestoreDefaults)>0 && check_bitrix_sessid())
{
	COption::RemoveOption($module_id);
}

$tabControl = new CAdminTabControl('tabControl', $aTabs);

$siteK = COption::GetOptionString('kit.feedback', 'ASSEMBLY_RECAPTCHA_SITE_KEY', '');
$secretK = COption::GetOptionString('kit.feedback', 'ASSEMBLY_RECAPTCHA_SECRET_KEY', '');

//Save options
if($_POST["Update"] && strlen($Update)>0 && check_bitrix_sessid())
{
	foreach($arAllOptions as $aOptGroup)
	{
		foreach($aOptGroup as $key => $option)
		{
			if($key !== "reCAPTCHA")
			{
				__AdmSettingsSaveOption($module_id, $option);
			}
			else
			{
				foreach($option as $aSiteOption)
				{
					__AdmSettingsSaveOption($module_id, $aSiteOption);
				}
			}
		}
	}

	if($_POST['ASSEMBLY_COMMON_CRM']!='Y')
	{
		COption::SetOptionString("kit.feedback", "ASSEMBLY_COMMON_CRM",'N');
	}
}
?>
<?
CJSCore::Init(array("jquery"));
?>
<form method='POST' action='<?echo $APPLICATION->GetCurPage()?>?mid=<?=htmlspecialchars($mid)?>&lang=<?=LANGUAGE_ID?>'>
<?=bitrix_sessid_post();?>
<?$tabControl->Begin();?>

<?$tabControl->BeginNextTab();?>
	<?
	$all = COption::GetOptionString('kit.feedback', 'ASSEMBLY_COMMON_CRM', 'Y');
	if(isset($_REQUEST["msite"]))
	{
		$all = $_REQUEST["msite"];
	}

	?>
	<tr>
		<td valign='top' width='50%' class='field-name'><label for='ASSEMBLY_COMMON_CRM'><?=GetMessage('ASSEMBLY_COMMON_CRM')?><?=$all == 'Y' ? GetMessage('ASSEMBLY_COMMON_CRM_AFTER_UNCHECK') : GetMessage('ASSEMBLY_COMMON_CRM_AFTER_CHECK')?></label></td>
		<td valign='middle' width='50%'>
			<input type='checkbox' id='ASSEMBLY_COMMON_CRM' name='ASSEMBLY_COMMON_CRM' value='<?=$all?>' <?=$all == 'Y' ? ' checked' : ''?> onChange = 'kit_func()'>
		</td>
	</tr>
	<?if ($all != 'N'):?>
		<tr class='heading'>
			<td colspan='2' style="font-size:unset; height:10px; background-color:#dbebe7"><?=GetMessage('ASSEMBLY_RECAPTCHA_SUB')?></td>
		</tr>
		<?ShowParamsHTMLByArray($module_id, $arAllOptions['reCAPTCHA']);?>
	<?else:?>
		<?$dbSites = CSite::GetList($by="sort", $order="desc", Array());?>
		<?while($arSite = $dbSites->GetNext()):?>
			<tr class='heading'>
				<td colspan='2' style="font-size:larger;"><?=GetMessage('ASSEMBLY_FEEDBACK_FOR_SITE').$arSite['LID']?></td>
			</tr>
			<tr class='heading'>
				<td colspan='2' style="font-size:unset; height:10px; background-color:#dbebe7"><?=GetMessage('ASSEMBLY_RECAPTCHA_SUB')?></td>
			</tr>
			<?ShowParamsHTMLByArray($module_id, $arAllOptions[$arSite['LID']]['reCAPTCHA']);?>
		<?endwhile?>
	<?endif;?>

<style>
#kit_description_full{
	display:none;
	transition:height 250ms;
}
#kit_description_close_btn{
	display:none;
}
.kit_description_open_text{
	border-bottom:1px solid;
	color:#2276cc !important;
	cursor:pointer;
	transition:color 0.3s linear 0s;
}
.kit_events th{
	background:#dddddd none repeat scroll 0 0;
	font-style:normal;
	margin:2px;
	padding:3px 0.5em;
	text-align:left;
	vertical-align:middle;
}
</style>
<script language="JavaScript">
$(function(){
	var assembly_obtn = $('#kit_description_open_btn'),
	assembly_cbtn = $('#kit_description_close_btn'),
	full = $('#kit_description_full');

	assembly_obtn.click(function(){
		full.show(175);
		$(this).hide();
		assembly_cbtn.show();
	});

	assembly_cbtn.click(function(){
		full.hide(175);
		$(this).hide();
		assembly_obtn.show();
	});
});
</script>
<?$tabControl->Buttons();?>
<script language='JavaScript'>
function RestoreDefaults()
{
	if(confirm('<?echo AddSlashes(GetMessage('MAIN_HINT_RESTORE_DEFAULTS_WARNING'))?>'))
		window.location = '<?echo $APPLICATION->GetCurPage()?>?RestoreDefaults=Y&lang=<?echo LANG?>&mid=<?echo urlencode($mid)?>&<?=bitrix_sessid_get()?>';
}
</script>
	<input type='submit' <?if(!$USER->IsAdmin())echo ' disabled';?> name='Update' value='<?echo GetMessage('BUTTON_SAVE')?>' class="adm-btn-save">
	<input type='reset' <?if(!$USER->IsAdmin())echo ' disabled';?> name='reset' value='<?echo GetMessage('BUTTON_RESET')?>' onClick = 'window.location.reload()'>
	<input type='button' <?if(!$USER->IsAdmin())echo ' disabled';?> title='<?echo GetMessage('BUTTON_DEF')?>' OnClick='RestoreDefaults();' value='<?echo GetMessage('BUTTON_DEF')?>'>
<?$tabControl->End();?>
</form>
<script type="text/javascript" >
function kit_func()
{
	var mst = document.getElementById('ASSEMBLY_COMMON_CRM').checked ? 'Y' : 'N';

	if(confirm('<?=AddSlashes(GetMessage('ON_CHANGE_COMMON_SETTS_WARNING'))?>')){
		document.getElementById('ASSEMBLY_COMMON_CRM').value = mst;
		window.location = '<?=$APPLICATION->GetCurPage()?>?msite='+mst+'&lang=<?=LANG?>&mid=<?=urlencode($mid)?>&<?=bitrix_sessid_get()?>';
	} else
		document.getElementById('ASSEMBLY_COMMON_CRM').checked = !document.getElementById('ASSEMBLY_COMMON_CRM').checked;
}
</script>