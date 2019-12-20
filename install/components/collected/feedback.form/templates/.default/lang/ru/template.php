<?
/**
 * Copyright (c) 21/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

$MESS['ALX_TP_REQUIRED_ERROR'] = "Ошибка!";
$MESS['ALX_TP_SELECT_CATEGORY'] = "Выберите категорию";
$MESS['ALX_TP_MESSAGE_TEXTMESS'] = "Текст сообщения";
$MESS['ALX_TP_MESSAGE_INPUTF'] = "Введите символы, изображённые на картинке:";
$MESS['ALX_TP_MESSAGE_SUBMIT'] = "Отправить";
$MESS['ALX_TP_LOAD_FILE'] = "Загрузить файл";
$MESS['ALX_TP_OVERVIEW'] = "Обзор";
$MESS['ALX_RU_ABC_REGULAR'] = "А-Яа-я";
$MESS['ALX_SAMPLE'] = "Пример";
$MESS['ALX_TP_MESSAGE_RECAPTCHA'] = "Пройдите проверку:";
$MESS['ALX_NOT_SET'] = "(не установлено)";
$MESS['ALX_CATEGORY_NO'] = "Без категории";
$MESS['ALX_FILL_INPUTS_MSG'] = "Заполните все обязательные поля";
$MESS['COLLECT_ERROR_TEXT'] = "Это поле обязательно для заполнения";
$MESS['COLLECT_ERROR_FILE_TYPE'] = "Запрещено загружать файл данного типа";
$MESS['COLLECT_ERROR_TEXT_EMAIL'] = "Введён некорректный e-mail";
$MESS['COLLECT_AGREEMENT'] = "Даю согласие на обработку персональных данных";


$MESS['COLLECT_STYLE_GENERATE'] =
"#alx_feed_back_#ID# .collect_radio_circle
{
	border-color:#NORMAL#;
}
#alx_feed_back_#ID# .collect_checkbox.toggle label input[type=checkbox]:checked + .collect_checkbox_box:after,
#alx_feed_back_#ID# .collect_radio_check
{
	background-color:#NORMAL#;
}
#alx_feed_back_#ID# .collect_feedback_poles .collect_btn
{
	color:#TCOLOR# !important;
	background:#NORMAL# !important;
}
#alx_feed_back_#ID# .collect_feedback_poles .collect_btn:hover
{
	color:#fff !important;
	background:#DARKER# !important;
}
#alx_feed_back_#ID# .collect_checkbox.toggle label input[type=checkbox]:checked + .collect_checkbox_box
{
	background-color:#BRIGHT#;
}
#alx_feed_back_#ID# .collect_checkbox input[type=checkbox]:checked+.collect_checkbox_box .collect_checkbox_check:before,
#alx_feed_back_#ID#.floating_labels .collect_item_pole.is_filled .collect_name,
#alx_feed_back_#ID#.floating_labels .collect_item_pole.is_focused .collect_name
{
	color:#DARKER#;
}
#alx_feed_back_#ID#.form_inputs_line .collect_select,
#alx_feed_back_#ID#.form_inputs_line .collect_textarea,
#alx_feed_back_#ID#.form_inputs_line .collect_inputtext,
#alx_feed_back_#ID#.form_inputs_line .collect_item_pole.is_focused .collect_select,
#alx_feed_back_#ID#.form_inputs_line .collect_item_pole.is_focused .collect_textarea,
#alx_feed_back_#ID#.form_inputs_line .collect_item_pole.is_focused .collect_inputtext{
	background-image:-webkit-gradient(linear, left top, left bottom, from(#NORMAL#), to(#NORMAL#)), -webkit-gradient(linear, left top, left bottom, from(#e0e0e0), to(#e0e0e0));
	background-image:-webkit-linear-gradient(#NORMAL#, #NORMAL#), -webkit-linear-gradient(#e0e0e0, #e0e0e0);
	background-image:-o-linear-gradient(#NORMAL#, #NORMAL#), -o-linear-gradient(#e0e0e0, #e0e0e0);
	background-image:linear-gradient(#NORMAL#, #NORMAL#), linear-gradient(#e0e0e0, #e0e0e0);
}
#alx_feed_back_#ID#.form_inputs_line .collect_item_pole.error_pole .collect_select,
#alx_feed_back_#ID#.form_inputs_line .collect_item_pole.error_pole .collect_textarea,
#alx_feed_back_#ID#.form_inputs_line .collect_item_pole.error_pole .collect_inputtext,
#alx_feed_back_#ID#.form_inputs_line .collect_item_pole.error_pole.is_focused .collect_select,
#alx_feed_back_#ID#.form_inputs_line .collect_item_pole.error_pole.is_focused .collect_textarea,
#alx_feed_back_#ID#.form_inputs_line .collect_item_pole.error_pole.is_focused .collect_inputtext{
	background-image:-webkit-gradient(linear, left top, left bottom, from(#f80000), to(#f80000)), -webkit-gradient(linear, left top, left bottom, from(#e0e0e0), to(#e0e0e0));
	background-image:-webkit-linear-gradient(#f80000, #f80000), -webkit-linear-gradient(#e0e0e0, #e0e0e0);
	background-image:-o-linear-gradient(#f80000, #f80000), -o-linear-gradient(#e0e0e0, #e0e0e0);
	background-image:linear-gradient(#f80000, #f80000), linear-gradient(#e0e0e0, #e0e0e0);
	-moz-background-size:100% 2px, 100% 1px;
	background-size:100% 2px, 100% 1px;
}
#alx_feed_back_#ID# .collect_select, .collect_textarea, .collect_inputtext,
#alx_feed_back_#ID# .collect_checkbox label
{
	color:#212121;
}
#alx_feed_back_#ID# .collect_item_pole.is_focused .collect_select,
#alx_feed_back_#ID# .collect_item_pole.is_focused .collect_textarea,
#alx_feed_back_#ID# .collect_item_pole.is_focused .collect_inputtext{
	border-color:#NORMAL#;
}";

$MESS["MAIN_USER_CONSENT_REQUEST_TITLE"] = "Согласие пользователя";
$MESS["MAIN_USER_CONSENT_REQUEST_BTN_ACCEPT"] = "Принимаю";
$MESS["MAIN_USER_CONSENT_REQUEST_BTN_REJECT"] = "Не принимаю";
$MESS["MAIN_USER_CONSENT_REQUEST_LOADING"] = "Загрузка..";
$MESS["MAIN_USER_CONSENT_REQUEST_ERR_TEXT_LOAD"] = "Не удалось загрузить текст соглашения.";
?>