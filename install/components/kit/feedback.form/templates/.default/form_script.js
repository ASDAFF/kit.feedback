/*
 * Copyright (c) 21/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

var ASSEMBLYpopup={
        timerId: "",
        timerReId: "",
        minw: 500,
        param: "",
        removeWindow: true,
        fixed: false,
        canClearBlock: false,
        init: function(param)
        {
                var oPopup = this;
                this.param = typeof param !== 'undefined' ? param : "";
                this.param.popupAnimation = typeof param.popupAnimation !== 'undefined' ? param.popupAnimation : ['assembly-popup-show-anime1', 'assembly-popup-hide-anime1', 'assembly-popup-mess-show-anime1'];

                if(typeof param.popupWindow != 'undefined'){
                        this.canClearBlock = typeof param.filledWithErrors !== 'undefined' ? param.filledWithErrors !== 'Y' : false;
                        $('.assembly_feed_back').find("form").unbind('submit').submit(function(){
								agreement = $(this).find('input[name=assembly_fb_agreement]');
								if(!agreement.length || agreement.prop("checked"))
								{
									oPopup.send_dataAjax(this);
									return false;									
								}
								return false;

                        });
                }else{
                        if(typeof param.cssURL !== 'undefined' && typeof param.cssURL !== 'object')
                                $('head').append("<link rel='stylesheet' type='text/css' href='" + param.cssURL + "' />");
                        else if(typeof param.cssURL == 'object')
                                for(i in param.cssURL) $('head').append("<link rel='stylesheet' type='text/css' href='" + param.cssURL[i] + "' />");

                        if(typeof param.objClick !== 'undefined'){
                                $(param.objClick).click(function(){
                                        oPopup.show();
                                });
                        }
                        this.param.data = typeof param.data !== 'undefined' ? param.data : "";
                        this.param.url = typeof param.url !== 'undefined'  && param.url.length > 0 ? param.url : window.location.pathname;
                        this.param.fixed = typeof param.fixed !== 'undefined' ? param.fixed : oPopup.fixed;
                        this.param.width = typeof param.width !== 'undefined' ? param.width : oPopup.minw;
                        this.param.height = typeof param.height !== 'undefined' ? param.height : 200;
                        this.param.removeWindow = typeof param.removeWindow !== 'undefined' ? param.removeWindow : oPopup.removeWindow;
                }
        },
        show: function()
        {
                var oPopup = this;
                document.body.style.overflowX = 'hidden';
                if(this.param.removeWindow)
                        $('.modal_form , .overlay').remove();

                if($('.assembly-feedb-data').length < 1)
                {
                        $('body').append('<div class="modal_form"><span class="modal_close"><span class="modal_close__left"></span><span class="modal_close__right"></span></span><div class="assembly-feedb-error"></div><div class="assembly_cont_popup"></div></div><div class="overlay"></div>');
                        $('.overlay').fadeIn(400);
                        $('body').append('<div class="assembly_fedb_wait"><div class="assembly-feedb-loading"></div><div class="assembly-feedb-loading-text">loading</div></div>');
                        $('.modal_close,.overlay,.modal_close_ok').click(function(){ // close modal event
                                oPopup.close();
                        });
                        oPopup.timerId = setInterval(function(){
                                oPopup.update();
                        }, 200);
                        setTimeout(function(){
                                clearInterval(oPopup.timerId);
                                oPopup.show_error();
                        }, 5000);
                        oPopup.load_contentAjax();
                }
                else
                {
                        $('.overlay').fadeIn(400);
                        if(($(window).height() > ($('.modal_form').outerHeight() + 100)) && this.param.fixed)
                                $('.modal_form').css({'top': (($(window).height() - $('.modal_form').outerHeight()) / 2 - 50) + 'px', 'marginTop': '0', 'position': 'fixed', 'opacity': 1});
                        else
                                $('.modal_form').css({'position': 'absolute', 'marginTop': $(window).scrollTop() + 100 +'px', 'top': '0', 'opacity': 1})

                        $('.modal_form').removeClass(this.param.popupAnimation[0] + ', ' +this.param.popupAnimation[1]);
                        $('.modal_form').addClass(this.param.popupAnimation[0]);
                }
                return true;
        },
        autoResize: function()
        {
                var oPopup = this;
                if($('.assembly-feedb-data').length < 1 || $('.modal_form').css('position') != 'fixed')
                {
                        clearInterval(oPopup.timerReId);
                        return;
                }

                if(($(window).height() > $('.modal_form').outerHeight() + 100) && this.param.fixed)
                        $('.modal_form').css({'top': (($(window).height() - $('.modal_form').outerHeight()) / 2 - 50) + 'px', 'marginTop': '0', 'position': 'fixed'});
                else
                        $('.modal_form').css({'position': 'absolute', 'marginTop': $(window).scrollTop() + 100 +'px', 'top': '0'});
        },
        update: function()
        {
                var oPopup = this;
                if($('.assembly-feedb-data').length < 1)
                        return;

                clearInterval(oPopup.timerId);
                var w='';

                if((this.param.width+"").split('%').length == 1){
                        w = (this.param.width+"").split('px');
                        var mLeft = 0-parseInt(w[0])/2 + 'px';
                }else{
                        w = (this.param.width+"").split('%');
                        var mLeft = 0-parseInt(w[0])/2+'%';
                }

                $('.modal_form').css({'marginLeft': mLeft, 'width': this.param.width});

                if(($(window).height() > $('.modal_form').outerHeight() + 100) && this.param.fixed)
                        $('.modal_form').css({'top': (($(window).height() - $('.modal_form').outerHeight()) / 2 - 50) + 'px', 'marginTop': '0', 'position': 'fixed'});
                else
                        $('.modal_form').css({'position': 'absolute', 'marginTop': $(window).scrollTop() + 100 +'px', 'top': '0'});

                if(typeof this.param.popupAnimation!='undefined')
                        var animClass = this.param.popupAnimation[0];

                $('.modal_form').delay(400).queue(function(){
                        $('.assembly_fedb_wait').fadeOut(400, function(){ $(this).remove() });
                        $('.modal_form').addClass(animClass);
                        $('.assembly-feedb-data').addClass('assembly-feedb-data-view');
                });

                if($('.modal_form').css('z-index')<0)
                        $('.modal_form').css({'z-index':'2001'});
                setTimeout(function(){ // for ie
                        if($('.modal_form').css('opacity')<1)
                                $('.modal_form').css({'opacity':1});
                }, 1000);

                oPopup.timerReId = setInterval(function(){
                        oPopup.autoResize();
                }, 400);
        },

        close: function()
        {
                var oPopup = this;
                var animClass = this.param.popupAnimation[1];
                $('.assembly-feedb-data').css({'maxHeight': ($(window).height()-100)+'px'});
                $('.modal_form').addClass(animClass);
                $('.overlay, .assembly_fedb_wait, .modal_form').fadeOut(400);

                setTimeout(function(){
                        if($('.modal_form').css('z-index')>2000)
                                $('.modal_form').css({'z-index':'-1'});
                        document.body.style.overflowX = '';
                },750);
                setTimeout(function(){ // for ie
                        if($('.modal_form').css('opacity')>0)
                                $('.modal_form').css({'opacity':0, 'marginTop': '-100000px'});
                        if(oPopup.removeWindow || ($('.assembly-feedb-data-errorLoading').length > 1))
                                $('.modal_form, .overlay').remove();
                }, 500);
        },
        show_error: function()
        {
                var oPopup = this;
                if($('.assembly-feedb-data').length < 1){
                        $('.assembly_cont_popup').html('<div class="assembly-feedb-data assembly-feedb-data-errorLoading">Loading error. Try again.<br /><a href="" onClick="ASSEMBLYpopup.close(); return false" class="assembly-feedb-data-close">close window</a></div>');
                        oPopup.update();
                }
        },
        load_contentAjax: function()
        {
                if(typeof this.param.data!='undefined'){
                        var oPopup = this;
                        $.ajax({
                                type:'POST',
                                data: this.param.data,
                                url: this.param.url,
                                async:true,
                                success:function(data){
                                        $('.assembly_cont_popup').html('<div class="assembly-feedb-data">'+data+'</div>');
                                        $('.assembly-feedb-data').find("form").submit(function(){
												agreement = $(this).find('input[name=assembly_fb_agreement]');
												if(!agreement.length || agreement.prop("checked"))
												{
													oPopup.send_dataAjax(this);
													return false;									
												}
												return false;			
                                        });										
                                }
                        });
                }
        },
        reload_contentAjax: function()
        {
                var oPopup = this;
                $('body').append('<div class="assembly_fedb_wait"><div class="assembly-feedb-loading"></div><div class="assembly-feedb-loading-text">loading</div></div>');
                $.ajax({
                        type:'POST',
                        data: this.param.data,
                        url: this.param.url,
                        async:true,
                        success:function(data){
                                $('.assembly-feedb-data').remove();
                                $('.assembly_fedb_wait').remove();
                                $('.assembly_cont_popup').html('<div class="assembly-feedb-data">'+data+'</div>');
                                $('.assembly-feedb-data').addClass('assembly-feedb-data-view');
                                $('.assembly-feedb-data').find("form").submit(function(){
											agreement = $(this).find('input[name=assembly_fb_agreement]');
											if(!agreement.length || agreement.prop("checked"))
											{
												oPopup.send_dataAjax(this);
												return false;									
											}
											return false;	
                                });
                        }
                });
        },
        ok_window: function(param)
        {
                var oPopup = this;
                var w = typeof param.width !== 'undefined' ? param.width : 300;

                if((w+"").split('%').length == 1){
                        w = (w+"").split('px');
                        var mLeft = 0-parseInt(w[0])/2 + 'px';
                }else{
                        w = (w+"").split('%');
                        var mLeft = 0-parseInt(w[0])/2+'%';
                }
                $('.modal_form').css({'marginLeft': mLeft, 'width': w, 'position': 'fixed', 'top': '30%', 'marginTop': '0'});
                if(typeof param.fid!='undefined')
                        $('#assembly_feed_back_'+param.fid+'.assembly-feedb-data, #assembly_feed_back_'+param.fid+'.assembly_feed_back').empty();
                else
                        $('.modal_form .assembly-feedb-data,.assembly_feed_back').empty();
                $('.modal_close_ok').click(function(){oPopup.close();});
        },
        send_dataAjax: function(form)
        {
                var oPopup = this;

                var animClass = this.param.popupAnimation[2];
                var url = $(form).attr('action');
                url = typeof url !== 'undefined' ? url : "";
                var bTypeFD = false;
                if(typeof FormData=='function'){
                        var FORM_DATA = new FormData(form);
                        bTypeFD = true;
                }else
                        var FORM_DATA = $(form).serializeArray();
                $.ajax({
                        url: url,
                        type:'POST',
                        data:FORM_DATA,
                        cache:false,
                        processData:(bTypeFD?false:true),
                        contentType:(bTypeFD?false:'application/x-www-form-urlencoded;charset=UTF-8'),
                        success:function(data){
                                var sID = $(form).attr('name').split('_')[2];
                                var sDelim='<!--REFRESH_SECTION-->';
                                var pos=data.indexOf(sDelim);
                                var errData=data, formData=false;
                                if(pos>-1){
                                        errData=data.substr(0,pos);
                                        formData=data.substr(pos+sDelim.length);
                                }

                                if(formData){
                                        $('#assembly_feed_back_'+sID+'.assembly_feed_back').html(formData);
                                }

                                if(typeof sID!='undefined' && $('#assembly_feed_back_'+sID).siblings(".assembly-feedb-error").length>0){
                                        $('#assembly_feed_back_'+sID).siblings(".assembly-feedb-error").html(errData).addClass(animClass);
                                }
                                else if(typeof sID!='undefined' && $('#assembly_feed_back_'+sID).parent().parent().siblings(".assembly-feedb-error").length>0){
                                        $('#assembly_feed_back_'+sID).parent().parent().siblings(".assembly-feedb-error").html(errData).addClass(animClass);
                                }
                                else{
                                        $('.assembly-feedb-error').html(errData).addClass(animClass);
                                }

                                if(oPopup.canClearBlock) $('#assembly_feed_back_'+sID+'.assembly_feed_back').empty();
                                return true;
                        }
                });
        }
}

function assembly_addFormGroupFocus(element){
        var $element = $(element);
        if(!$element.prop('disabled')){
                $element.parents(".collect_item_pole").addClass("is_focused");
        }
}
function assembly_removeFormGroupFocus(element){
        var $element = $(element);
        $(element).parents(".collect_item_pole").removeClass("is_focused is_filled");
        if($element.val().length !== 0){
                $(element).parents(".collect_item_pole").addClass("is_filled");
        }
}

$(document).ready(function(){

        $('.assembly_feed_back .item_pole__captcha .collect_name').each(function(i,elem){
                $(elem).next().find('input').css({'height':$(elem).height()+'px'});
        });

        $(document).on("focus", ".collect_item_pole .collect_inputtext,.collect_item_pole .collect_textarea,.collect_item_pole .collect_select,.collect_item_pole .collect_textarea,.collect_item_pole .collect_file_input_add", function(){
                assembly_addFormGroupFocus(this);
        })
        .on("blur", ".collect_item_pole .collect_inputtext,.collect_item_pole .collect_textarea,.collect_item_pole .collect_select,.collect_item_pole .collect_textarea,.collect_item_pole .collect_file_input_add", function(){
                assembly_removeFormGroupFocus(this);
        });
});
function poleError(pole){
        if(pole.name.split('[').length > 1){
                if(pole.name.split('[')[1].split('_')[0] == 'EMAIL'){
                        if(!checkEmail(pole.value)) return true;
                }
        }
        if(pole.type=='radio' || pole.type=='checkbox'){
                if(!pole.checked && $('[name="'+pole.name+'"]:checked').length==0) return true;
                else return false;
        }
        if(pole.value.length==0 || !$(pole).val()){
                return true;
        }
        return false;
}
function checkEmail(email){
        var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        return re.test(email);
}
function validateForm(form){
        var required_fields = form.find('.collect_item_pole.required');
        var email_fields = form.find('.collect_item_pole.is_email');
        if(required_fields.length > 0 || email_fields.length > 0){
                email_fields.each(function(){
                        var $this = $(this);
                        $this.find('input[name]').not('[type=hidden]').each(function(){
                                if(this.value!='' && !checkEmail(this.value)) $this.addClass('error_pole');
                                else $this.removeClass('error_pole');
                        });
                });
                required_fields.each(function(){
                        var $this = $(this);
                        $this.find('input[name],textarea[name],select[name]').not('[type=hidden]').each(function(){
                                if(poleError(this)) $this.addClass('error_pole');
                                else $this.removeClass('error_pole');
                        });
                });
                var errorPoles = form.find('.collect_item_pole.required.error_pole');
                if(errorPoles.length > 0){
                        errorPoles.eq(0).find('input,textarea').not('[type=hidden]').focus();
                        return false;
                }
        }
        return true;
}
function ASSEMBLY_captcha_Error(){
        $('.item_pole__captcha').addClass('error_pole');
}
function ASSEMBLY_captcha_Error(){
        $('.item_pole__captcha').addClass('error_pole');
}
function ASSEMBLY_fileError(field){
        field.addClass('error_fpole');
}
