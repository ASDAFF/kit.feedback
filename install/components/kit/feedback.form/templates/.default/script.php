<script type="text/javascript">
if(typeof ASSEMBLY_ReloadCaptcha!='function'){
	function ASSEMBLY_ReloadCaptcha(csid,ALX){
		document.getElementById("assembly_cm_CAPTCHA_"+ALX).src='/bitrix/tools/captcha.php?captcha_sid='+csid+'&rnd='+Math.random();
	}
	function ASSEMBLY_SetNameQuestion(obj,ALX){
		var qw=obj.selectedIndex;
		document.getElementById("type_question_name_"+ALX).value=obj.options[qw].text;
		<?if($arParams["SECTION_FIELDS_ENABLE"] == "Y"):?>
		$('form[name=f_feedback_'+ALX+']').append('<input type="hidden" value="Y" name="REFRESH">');
		$('input[name=SEND_FORM][id=fb_close_'+ALX+']').click();
		<?endif;?>
	}
}
if(typeof ASSEMBLY_ChangeCaptcha!='function'){
	function ASSEMBLY_ChangeCaptcha(ALX){
		$.getJSON('<?=$this->__folder?>/reload_captcha.php',function(data){
			$('#assembly_cm_CAPTCHA_'+ALX).attr('src','/bitrix/tools/captcha.php?captcha_sid='+data);
			$('#assembly_fb_captchaSid_'+ALX).val(data);
		});
	}
}
</script>