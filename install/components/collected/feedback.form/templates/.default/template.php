<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
/**
 * Copyright (c) 20/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

//p($arParams);
$fVerComposite = (defined("SM_VERSION") && version_compare(SM_VERSION, "14.5.0") >= 0 ? true : false); 
if ($fVerComposite) $this->setFrameMode(true); 
$ASSEMBLY = "FID" . $arParams["FORM_ID"];

 if (!isset($arResult["POST"]))
{
	if ((!isset($arParams['ASSEMBLY_GET_POPUP'.$ASSEMBLY]) || $arParams['ASSEMBLY_GET_POPUP'.$ASSEMBLY]=='Y') && $arParams['ASSEMBLY_LINK_POPUP'] == 'Y')
	{
		?>
		<span class="assembly_feedback_popup" id="form_id_<?=$ASSEMBLY?>"><?=$arParams["ASSEMBLY_NAME_LINK"];?></span>

<?		$this->addExternalJS($this->__folder."/form_script.js");?>

		<script type="text/javascript">
			if(typeof ASSEMBLYpopup_<?=$ASSEMBLY?>=='undefined'&&typeof ASSEMBLYpopup!='undefined'&&typeof BX!='undefined')
				var ASSEMBLYpopup_<?=$ASSEMBLY?>=BX.clone(ASSEMBLYpopup);

			$(document).ready(function(){
				var param = {
					'width': "<?=$arParams['WIDTH_FORM']?>",
					'url': '',
					'data': {"AJAX_CALL": "Y", "OPEN_POPUP": "<?=$ASSEMBLY?>"},
					'cssURL': ["<?=CUtil::GetAdditionalFileURL($this->GetFolder()."/form_style.css");?>",
						<?if ($arParams['INPUT_APPEARENCE'] != 'DEFAULT' && !is_array($arParams['INPUT_APPEARENCE'])):?>
							"<?=$this->__folder?>/themes/theme.add_<?=strtolower($arParams['INPUT_APPEARENCE'])?>.css",
						<?elseif (is_array($arParams['INPUT_APPEARENCE'])):?>
							<?foreach($arParams['INPUT_APPEARENCE'] as $param):?>
								<?if ($param != 'DEFAULT'):?>
									"<?=$this->__folder?>/themes/theme.add_<?=strtolower($param)?>.css",
								<?endif?>
							<?endforeach?>
						<?endif?>
						<?if ($arParams['ASSEMBLY_RESET_THEME'] === 'Y'):?>
							"<?=CUtil::GetAdditionalFileURL($this->__folder."/themes/default.css");?>"
						<?else:?>
							"<?=CUtil::GetAdditionalFileURL($this->__folder."/themes/theme_".md5($arParams['COLOR_THEME'].'_'.$arParams['COLOR_OTHER'].'_'.$arParams['COLOR_SCHEME'].'_'.$ASSEMBLY).".css");?>"
						<?endif?>
					],
					'objClick': '#form_id_<?=$ASSEMBLY?>.assembly_feedback_popup',
					'popupAnimation': [
						"assembly-popup-show-anime<?=$arParams['POPUP_ANIMATION']?>",
						"assembly-popup-hide-anime<?=$arParams['POPUP_ANIMATION']?>",
						"assembly-popup-mess-show-anime<?=$arParams['POPUP_ANIMATION']?>"],
					'openDelay': '<?=intval($arParams["POPUP_DELAY"])?>'
				};
				if(typeof ASSEMBLYpopup_<?=$ASSEMBLY?>!='undefined')
					ASSEMBLYpopup_<?=$ASSEMBLY?>.init(param);
				else
					ASSEMBLYpopup.init(param);
			});

<?			if($arParams['ASSEMBLY_LOAD_PAGE']=='Y' && $APPLICATION->get_cookie("COLLECTED_FDB_SEND_".$ASSEMBLY) != 'Y'):?>
			$(window).load(function(){
				if(typeof ASSEMBLYpopup_<?=$ASSEMBLY?>!='undefined'){
					if(typeof ASSEMBLYpopup_<?=$ASSEMBLY?>.param.openDelay!='undefined')
						setTimeout(function(){
							ASSEMBLYpopup_<?=$ASSEMBLY?>.show();
						},ASSEMBLYpopup_<?=$ASSEMBLY?>.param.openDelay);
					else
						ASSEMBLYpopup_<?=$ASSEMBLY?>.show();
				}else{
					if(typeof ASSEMBLYpopup.param.openDelay!='undefined')
						setTimeout(function(){
							ASSEMBLYpopup.show();
						},ASSEMBLYpopup.param.openDelay);
					else
						ASSEMBLYpopup.show();
				}
			});
<?			endif;?>
		</script>

<?	} else { ?>
<?		if ($arParams['ASSEMBLY_LINK_POPUP'] !== 'Y'):?>

		<script type="text/javascript">
			if(typeof ASSEMBLYpopup_<?=$ASSEMBLY?>=='undefined'&&typeof ASSEMBLYpopup!='undefined'&&typeof BX!='undefined')
				var ASSEMBLYpopup_<?=$ASSEMBLY?>=BX.clone(ASSEMBLYpopup);

			$(document).ready(function(){
				var param = {
					'popupWindow':"N"
				};

				if(typeof ASSEMBLYpopup_<?=$ASSEMBLY?>!='undefined')
					ASSEMBLYpopup_<?=$ASSEMBLY?>.init(param);
				else
					ASSEMBLYpopup.init(param);
			});
		</script>
		<div id="collect_err_<?=$ASSEMBLY?>" class="assembly-feedb-error"></div>
<?		endif?>
<?
		$this->addExternalJs($this->GetFolder() . "/form_script.js");
		$this->addExternalCss(CUtil::GetAdditionalFileURL($this->GetFolder()."/form_style.css"));
		if ($arParams['INPUT_APPEARENCE'] != 'DEFAULT' && !is_array($arParams['INPUT_APPEARENCE'])):
			$this->addExternalCss($this->GetFolder() . "/themes/theme.add_" . strtolower($arParams['INPUT_APPEARENCE']) . ".css");
		elseif (is_array($arParams['INPUT_APPEARENCE'])):
			foreach ($arParams['INPUT_APPEARENCE'] as $param):
				if ($param != 'DEFAULT'):
					$this->addExternalCss($this->GetFolder() . "/themes/theme.add_" . strtolower($param) . ".css");
				endif;
			endforeach;
		endif;
		if ($arParams['ASSEMBLY_RESET_THEME'] === 'Y'):
			$this->addExternalCss(CUtil::GetAdditionalFileURL($this->GetFolder()."/themes/default.css"));
		else:
			$this->addExternalCss(CUtil::GetAdditionalFileURL($this->GetFolder()."/themes/theme_".md5($arParams['COLOR_THEME'].'_'.$arParams['COLOR_OTHER'].'_'.$arParams['COLOR_SCHEME'].'_'.$ASSEMBLY).".css"));
		endif;
?>
<? if($arParams["SECTION_FIELDS_ENABLE"] == "Y" && $_POST["REFRESH"]=="Y" && $_SERVER["REQUEST_METHOD"]=="POST"): ?>
<!--REFRESH_SECTION-->
<? endif; ?>
<?
		if(is_array($arParams["PROPERTY_FIELDS"]) &&
			is_array($arParams["MASKED_INPUT_PHONE"]) &&
			!empty($arParams["MASKED_INPUT_PHONE"])){
?>
		<script type="text/javascript">
			$(function($){
				if(typeof $.mask!='undefined'){
<?			foreach($arParams["MASKED_INPUT_PHONE"] as $propCode):
				if(in_array($propCode, $arParams["PROPERTY_FIELDS"])){?>
				$('input[name="FIELDS[<?=$propCode?>_<?=$ASSEMBLY?>]"]').mask("9 (999) 999-99-99", {placeholder: '_'});
<?
				}
			endforeach;?>
				}else if(typeof console.warn!='undefined'){console.warn('Conflict when accessing the jQuery Mask Input Plugin: %s typeof $.mask',typeof $.mask);}
			});
		</script>
<?		}?>

<?		require_once("script.php"); // include js ?>

<?		if (!is_array($arParams['INPUT_APPEARENCE'])): ?>
			<div class="afbf assembly_feed_back <? $arParams['INPUT_APPEARENCE'] != 'DEFAULT' ? strtolower($arParams['INPUT_APPEARENCE']) : '' ?>" id="assembly_feed_back_<?=$ASSEMBLY ?>">
<?		else: ?>
			<div class="afbf assembly_feed_back <? foreach ($arParams['INPUT_APPEARENCE'] as $param) if ($param != 'DEFAULT') echo strtolower($param) . ' ' ?>" id="assembly_feed_back_<?=$ASSEMBLY ?>">
<?		endif ?>
<?
?>
<?		require("form.php"); // include form ?>
		</div>

		<script type="text/javascript">
			$(document).ready(function(){
				var file_w_<?=$ASSEMBLY?> = parseInt($("#assembly_feed_back_<?=$ASSEMBLY?> .collect_feedback_poles").width() / 5);

				function str_replace_<?=$ASSEMBLY?>(search, replace, subject){
					return subject.split(search).join(replace);
				}
<?				for($i = 1;$i <= $k;$i++):?>
				$("#assembly_feed_back_<?=$ASSEMBLY?> #collect_file_input_add<?=$i?>")
					.attr('size', file_w_<?=$ASSEMBLY?>)
					.change(function(){
						var input_<?=$ASSEMBLY?>_<?=$i?> = $(this)[0];
						if(typeof input_<?=$ASSEMBLY?>_<?=$i?>.files!='undefined' && input_<?=$ASSEMBLY?>_<?=$i?>.files!=null)
							var len = input_<?=$ASSEMBLY?>_<?=$i?>.files.length;
						if (typeof len != 'undefined' && len > 1){
							var myStr_<?=$ASSEMBLY?>_<?=$i?> = '';
							for (var x = 0; x < len; x++) {
								if (typeof input_<?=$ASSEMBLY?>_<?=$i?>.files[x].name != 'undefined') {
									myStr_<?=$ASSEMBLY?>_<?=$i?> += input_<?=$ASSEMBLY?>_<?=$i?>.files[x].name;
									if (x + 1 != len)
										myStr_<?=$ASSEMBLY?>_<?=$i?> += ", ";
								}
							}
						} else {
							var myStr_<?=$ASSEMBLY?>_<?=$i?> = str_replace_<?=$ASSEMBLY?>("C:\\fakepath\\", "", $(this).val());
							textInput = $(this).siblings('.collect_input_group').children('.collect_inputtext');
							textInput.val(myStr_<?=$ASSEMBLY?>_<?=$i?>);
						}
					});
<?				endfor;?>
			});
		</script>
<?	if(!empty($arParams["WIDTH_FORM"]) && $arParams['ASSEMBLY_LINK_POPUP'] != 'Y'): ?>
<style type="text/css">
#assembly_feed_back_<?=$ASSEMBLY?>.assembly_feed_back,
#collect_err_<?=$ASSEMBLY?>.assembly-feedb-error{
	width:<?=$arParams["WIDTH_FORM"];?>;
}
</style>
<?		endif; ?>
<?	} ?>
<?
} else { ?>

	<? if (count($arResult["FORM_ERRORS"]) == 0 && ($arResult["success_" . $ASSEMBLY] == "yes" || $_REQUEST["success_" . $ASSEMBLY] == "yes")): ?>
		<div class="collect_success_block<?if ($arParams['ASSEMBLY_LINK_POPUP'] !== 'Y'):?> _without-popup<?endif;?>">
			<div class="collect_mess_ok">
				<div class="collect_ok_icon"></div>
				<div class="mess"><?=$arParams["MESSAGE_OK"]; ?></div>
			</div>
		</div>
		<?if ($arParams['ASSEMBLY_LINK_POPUP'] == 'Y'):?>
			<div class="collect_close_container">
				<button class="modal_close_ok">OK</button>
			</div>
		<?endif?>
		<?if ($arParams['SHOW_LINK_TO_SEND_MORE']=='Y'):?>
			<div class="collect_send_another_message">
				<a href="<?=$APPLICATION->GetCurUri()?>"><?=$arParams['LINK_SEND_MORE_TEXT']?></a>
			</div>
		<?endif;?>
		<script type="text/javascript">
			var param = {'width':'350','filledWithErrors':'N','fid':'<?=$ASSEMBLY?>'}
			if(typeof ASSEMBLYpopup_<?=$ASSEMBLY?>=='undefined'&&typeof ASSEMBLYpopup!='undefined'&&typeof BX!='undefined')
				var ASSEMBLYpopup_<?=$ASSEMBLY?>=BX.clone(ASSEMBLYpopup);

			if(typeof ASSEMBLYpopup_<?=$ASSEMBLY?>!='undefined')
				ASSEMBLYpopup_<?=$ASSEMBLY?>.ok_window(param);
			else
				ASSEMBLYpopup.ok_window(param);
		</script>
	<? elseif ($arParams["CHECK_ERROR"] == "Y" && count($arResult["FORM_ERRORS"]) > 0): ?>
		<? if($arParams["USE_CAPTCHA"]):?>
			<script type="text/javascript">
				<?if($arParams["CAPTCHA_TYPE"] != 'recaptcha'):?>
					<?if($arParams["CHANGE_CAPTCHA"] == "Y"):?>
					<?/**/?>	ASSEMBLY_ChangeCaptcha('<?=$ASSEMBLY?>');<?/**/?>
					<?else:?>
						ASSEMBLY_ReloadCaptcha('<?=$_SESSION['ASSEMBLY_CAPTHA_CODE']?>','<?=$ASSEMBLY?>');
					<?endif;?>
				<?else:?>
					grecaptcha.reset();
				<?endif;?>
			</script>
		<? endif?>
		<? if ($arParams['ASSEMBLY_LINK_POPUP'] !== 'Y'):?>
			<script type="text/javascript">
				if(typeof ASSEMBLYpopup_<?=$ASSEMBLY?>=='undefined'&&typeof ASSEMBLYpopup!='undefined'&&typeof BX!='undefined')
					var ASSEMBLYpopup_<?=$ASSEMBLY?>=BX.clone(ASSEMBLYpopup);

				$(document).ready(function(){
					var param = {
						'popupWindow':"N",
						'filledWithErrors':'Y'
					};

					if(typeof ASSEMBLYpopup_<?=$ASSEMBLY?>!='undefined')
						ASSEMBLYpopup_<?=$ASSEMBLY?>.init(param);
					else
						ASSEMBLYpopup.init(param);
				});
			</script>
		<? endif;?>
		<div class="collect_error_block">
			<div class="collect_error_icon"></div>
			<div class="collect_error_text"><?=GetMessage('ASSEMBLY_FILL_INPUTS_MSG');?></div>
		</div>
	<? endif;?>
	<?
	//p($arResult["FORM_ERRORS"]);
//die();
	?>
	<script type="text/javascript">
		validateForm($('.assembly-feedb-data, #assembly_feed_back_<?=$ASSEMBLY?>.assembly_feed_back').find('form'));
		<?if (strlen($arResult["FORM_ERRORS"]["CAPTCHA_WORD"]["ASSEMBLY_CP_WRONG_CAPTCHA"])>0):?>
		ASSEMBLY_captcha_Error();
		<?endif?>

		<?if (!empty($arResult["FORM_ERRORS"]["ERROR_FIELD"])):
		
			if(isset($arResult["FORM_ERRORS"]["EMPTY_FIELD"]["assembly_fb_agreement"]))
			{
				?>ASSEMBLY_fileError($('#assembly_feed_back_<?=$ASSEMBLY?> #assembly_fb_agreement'));<?
			}
			foreach($arResult["FIELDS"] as $k=>$v)
			{
				if($v["TYPE"] == "F" && !empty($arResult["FORM_ERRORS"]["EMPTY_FIELD"][$v["CODE"]]))
				{
					?>ASSEMBLY_fileError($('#assembly_feed_back_<?=$ASSEMBLY?> #collect_<?=mb_strtolower($v["CODE"])?>'));<?
				}
			}
		?>
		<?endif?>
<?		if($arParams['LOCAL_REDIRECT_ENABLE'] == 'Y' && strlen($arParams['LOCAL_REDIRECT_URL']) > 0
			&& ($arResult["success_" . $ASSEMBLY] == "yes" || $_REQUEST["success_" . $ASSEMBLY] == "yes")
		):?>
		function CollectedFeedbackRedirect_<?=$ASSEMBLY?>(){
			document.location.href = '<?=(trim(htmlspecialcharsEx($arParams['LOCAL_REDIRECT_URL'])));?>';
		}
		CollectedFeedbackRedirect_<?=$ASSEMBLY?>();
<?		endif?>
	</script>
<?}?>