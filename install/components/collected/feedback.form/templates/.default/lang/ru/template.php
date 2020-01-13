<?
/**
 * Copyright (c) 21/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

$MESS['ASSEMBLY_TP_REQUIRED_ERROR'] = "Ошибка!";
$MESS['ASSEMBLY_TP_SELECT_CATEGORY'] = "Выберите категорию";
$MESS['ASSEMBLY_TP_MESSAGE_TEXTMESS'] = "Текст сообщения";
$MESS['ASSEMBLY_TP_MESSAGE_INPUTF'] = "Введите символы, изображённые на картинке:";
$MESS['ASSEMBLY_TP_MESSAGE_SUBMIT'] = "Отправить";
$MESS['ASSEMBLY_TP_LOAD_FILE'] = "Загрузить файл";
$MESS['ASSEMBLY_TP_OVERVIEW'] = "Обзор";
$MESS['ASSEMBLY_RU_ABC_REGULAR'] = "А-Яа-я";
$MESS['ASSEMBLY_SAMPLE'] = "Пример";
$MESS['ASSEMBLY_TP_MESSAGE_RECAPTCHA'] = "Пройдите проверку:";
$MESS['ASSEMBLY_NOT_SET'] = "(не установлено)";
$MESS['ASSEMBLY_CATEGORY_NO'] = "Без категории";
$MESS['ASSEMBLY_FILL_INPUTS_MSG'] = "Заполните все обязательные поля";
$MESS['COLLECT_ERROR_TEXT'] = "Это поле обязательно для заполнения";
$MESS['COLLECT_ERROR_FILE_TYPE'] = "Запрещено загружать файл данного типа";
$MESS['COLLECT_ERROR_TEXT_EMAIL'] = "Введён некорректный e-mail";
$MESS['COLLECT_AGREEMENT'] = "Даю согласие на обработку персональных данных";


$MESS['COLLECT_STYLE_GENERATE'] =
"#assembly_feed_back_#ID# .collect_radio_circle
{
	border-color:#NORMAL#;
}
#assembly_feed_back_#ID# .collect_checkbox.toggle label input[type=checkbox]:checked + .collect_checkbox_box:after,
#assembly_feed_back_#ID# .collect_radio_check
{
	background-color:#NORMAL#;
}
#assembly_feed_back_#ID# .collect_feedback_poles .collect_btn
{
	color:#TCOLOR# !important;
	background:#NORMAL# !important;
}
#assembly_feed_back_#ID# .collect_feedback_poles .collect_btn:hover
{
	color:#fff !important;
	background:#DARKER# !important;
}
#assembly_feed_back_#ID# .collect_checkbox.toggle label input[type=checkbox]:checked + .collect_checkbox_box
{
	background-color:#BRIGHT#;
}
#assembly_feed_back_#ID# .collect_checkbox input[type=checkbox]:checked+.collect_checkbox_box .collect_checkbox_check:before,
#assembly_feed_back_#ID#.floating_labels .collect_item_pole.is_filled .collect_name,
#assembly_feed_back_#ID#.floating_labels .collect_item_pole.is_focused .collect_name
{
	color:#DARKER#;
}
#assembly_feed_back_#ID#.form_inputs_line .collect_select,
#assembly_feed_back_#ID#.form_inputs_line .collect_textarea,
#assembly_feed_back_#ID#.form_inputs_line .collect_inputtext,
#assembly_feed_back_#ID#.form_inputs_line .collect_item_pole.is_focused .collect_select,
#assembly_feed_back_#ID#.form_inputs_line .collect_item_pole.is_focused .collect_textarea,
#assembly_feed_back_#ID#.form_inputs_line .collect_item_pole.is_focused .collect_inputtext{
	background-image:-webkit-gradient(linear, left top, left bottom, from(#NORMAL#), to(#NORMAL#)), -webkit-gradient(linear, left top, left bottom, from(#e0e0e0), to(#e0e0e0));
	background-image:-webkit-linear-gradient(#NORMAL#, #NORMAL#), -webkit-linear-gradient(#e0e0e0, #e0e0e0);
	background-image:-o-linear-gradient(#NORMAL#, #NORMAL#), -o-linear-gradient(#e0e0e0, #e0e0e0);
	background-image:linear-gradient(#NORMAL#, #NORMAL#), linear-gradient(#e0e0e0, #e0e0e0);
}
#assembly_feed_back_#ID#.form_inputs_line .collect_item_pole.error_pole .collect_select,
#assembly_feed_back_#ID#.form_inputs_line .collect_item_pole.error_pole .collect_textarea,
#assembly_feed_back_#ID#.form_inputs_line .collect_item_pole.error_pole .collect_inputtext,
#assembly_feed_back_#ID#.form_inputs_line .collect_item_pole.error_pole.is_focused .collect_select,
#assembly_feed_back_#ID#.form_inputs_line .collect_item_pole.error_pole.is_focused .collect_textarea,
#assembly_feed_back_#ID#.form_inputs_line .collect_item_pole.error_pole.is_focused .collect_inputtext{
	background-image:-webkit-gradient(linear, left top, left bottom, from(#f80000), to(#f80000)), -webkit-gradient(linear, left top, left bottom, from(#e0e0e0), to(#e0e0e0));
	background-image:-webkit-linear-gradient(#f80000, #f80000), -webkit-linear-gradient(#e0e0e0, #e0e0e0);
	background-image:-o-linear-gradient(#f80000, #f80000), -o-linear-gradient(#e0e0e0, #e0e0e0);
	background-image:linear-gradient(#f80000, #f80000), linear-gradient(#e0e0e0, #e0e0e0);
	-moz-background-size:100% 2px, 100% 1px;
	background-size:100% 2px, 100% 1px;
}
#assembly_feed_back_#ID# .collect_select, .collect_textarea, .collect_inputtext,
#assembly_feed_back_#ID# .collect_checkbox label
{
	color:#212121;
}
#assembly_feed_back_#ID# .collect_item_pole.is_focused .collect_select,
#assembly_feed_back_#ID# .collect_item_pole.is_focused .collect_textarea,
#assembly_feed_back_#ID# .collect_item_pole.is_focused .collect_inputtext{
	border-color:#NORMAL#;
}";

$MESS["MAIN_USER_CONSENT_REQUEST_TITLE"] = "Согласие пользователя";
$MESS["MAIN_USER_CONSENT_REQUEST_BTN_ACCEPT"] = "Принимаю";
$MESS["MAIN_USER_CONSENT_REQUEST_BTN_REJECT"] = "Не принимаю";
$MESS["MAIN_USER_CONSENT_REQUEST_LOADING"] = "Загрузка..";
$MESS["MAIN_USER_CONSENT_REQUEST_ERR_TEXT_LOAD"] = "Не удалось загрузить текст соглашения.";
?>