<?php
/**
*
* @package mChat
* @version $Id: mchat_lang.php
* @copyright (c) RMcGirr83 ( http://www.rmcgirr83.org/ )
* @copyright (c) djs596 ( http://djs596.com/ ), (c) Stokerpiller ( http://www.phpbb3bbcodes.com/ )
* @copyright (c) By Shapoval Andrey Vladimirovich (AllCity) ~ http://allcity.net.ru/
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
**/

/**
* DO NOT CHANGE!
*/
if (!defined('IN_PHPBB'))
{
  exit;
}

if (empty($lang) || !is_array($lang))
{
  $lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste (Unicode characters):
// ’ » “ ” …
//

$lang = array_merge($lang, array(

	// MCHAT
	'MCHAT_ADD'					=> 'Отправить',
	'MCHAT_ANNOUNCEMENT'		=> 'Сообщение',
	'MCHAT_ARCHIVE'				=> 'Архив',	
	'MCHAT_ARCHIVE_PAGE'		=> 'Архив чЯтика:)',	
	'MCHAT_BBCODES'				=> 'BB-Разметка',
	'MCHAT_CLEAN'				=> 'Очистить',
	'MCHAT_CLEANED'				=> 'Все сообщения были успешно удалены',
	'MCHAT_CLEAR_INPUT'			=> 'Очистить',
	'MCHAT_COPYRIGHT'			=> '&copy; <a href="http://www.rmcgirr83.org/">RMcGirr83.org</a>',
	'MCHAT_CUSTOM_BBCODES'		=> 'BB-Разметка',
	'MCHAT_DELALLMESS'			=> 'Удалить все сообщения?',
	'MCHAT_DELCONFIRM'			=> 'Вы подтверждаете удаление?',
	'MCHAT_DELITE'				=> 'Удалить',
	'MCHAT_EDIT'				=> 'Редактировать',
	'MCHAT_EDITINFO'			=> 'Отредактируйте сообщение и нажмите OK',
	'MCHAT_ENABLE'				=> 'Простите, чЯтик:) сейчас недоступен',	
	'MCHAT_ERROR'				=> 'Ошибка',	
	'MCHAT_FLOOD'				=> 'Не флудите! Подождите немного',	
	'MCHAT_HELP'				=> 'Правила чЯтика:)',
// uncomment and translate the following line for languages for the rules in the chat area
// <br /> signifies a new line, see above for Unicode characters to use
	//'MCHAT_RULES'				=> 'No swearing<br />Don’t advertise your site<br />Don’t leave several messages in succession<br />Don’t leave a pointless message<br />Don’t leave a message consisting of only smilies',	
	'MCHAT_HIDE_LIST'			=> 'Спрятать список',	
	'MCHAT_HOUR'				=> 'час ',
	'MCHAT_HOURS'				=> 'часов',
	'MCHAT_IP_WHOIS_FOR'		=> 'IP адрес для',
	
	'MCHAT_MINUTE'				=> 'минута ',
	'MCHAT_MINUTES'				=> 'минут ',
	'MCHAT_MESS_LONG'			=> 'Сообщение слишком большое.\nПожалуйста, уместите его в %s символов',	
	'MCHAT_NO_CUSTOM_PAGE'		=> 'Личная страница чЯтика:) не активирована!',	
	'MCHAT_NOACCESS'			=> 'У вас нет прав писать в чЯтик:)',
	'MCHAT_NOACCESS_ARCHIVE'	=> 'У вас неу прав просматривать архив',	
	'MCHAT_NOJAVASCRIPT'		=> 'Ваш браузер не поддерживает JavaScript либо поддержка JavaScript отключена',		
	'MCHAT_NOMESSAGE'			=> 'Нет сообщений',
	'MCHAT_NOMESSAGEINPUT'		=> 'Вы не ввели сообщение',
	'MCHAT_NOSMILE'				=> 'Смайлики не найдены',
	'MCHAT_NOTINSTALLED_USER'	=> 'чЯтик:) не установлен. Обратитесь к Администратору.',
	'MCHAT_NOT_INSTALLED'		=> 'В базе чЯтика:) пусто.<br />Запустите %sinstaller%s для обновления БД.',
	'MCHAT_OK'					=> 'OK',
	'MCHAT_PAUSE'				=> 'Пауза',
	'MCHAT_LOAD'				=> 'Загрузка',      
	'MCHAT_PERMISSIONS'			=> 'Изменить права пользователя',
	'MCHAT_REFRESHING'			=> 'Обновление...',
	'MCHAT_REFRESH_NO'			=> 'Автообновление выключено',
	'MCHAT_REFRESH_YES'			=> 'Автообновление каждые <strong>%d</strong> секунд',
	'MCHAT_RESPOND'				=> 'Ответить пользователю',
	'MCHAT_RESET_QUESTION'		=> 'Очистить поле ввода?',
	'MCHAT_SESSION_OUT'			=> 'Сессия чата закончилась',	
	'MCHAT_SHOW_LIST'			=> 'Показать список',
	'MCHAT_SECOND'				=> 'секунда ',
	'MCHAT_SECONDS'				=> 'секунд ',
	'MCHAT_SESSION_ENDS'		=> 'Сессия чата закончится в',
	'MCHAT_SMILES'				=> 'Смайлы',

	'MCHAT_TOTALMESSAGES'		=> 'Всего сообщений: <strong>%s</strong>',
	'MCHAT_USESOUND'			=> 'Включить звуки?',
	
// uncomment and translate the following line for languages for the static message in the chat area
//	'STATIC_MESSAGE'			=> 'Put whatever you want here',
	// whois chatting stuff

	'MCHAT_ONLINE_USERS_TOTAL'			=> 'Всего <strong>%d</strong> пользователей в чате ',
	'MCHAT_ONLINE_USER_TOTAL'			=> 'Всего <strong>%d</strong> пользователь в чате ',
	'MCHAT_NO_CHATTERS'					=> 'Никого в чате...',
	'MCHAT_ONLINE_EXPLAIN'				=> '( основано на активности за последние %s)',
	
	'WHO_IS_CHATTING'			=> 'Кто в чате',
	'WHO_IS_REFRESH_EXPLAIN'	=> 'Обновляется каждые <strong>%d</strong> секунд',
	'MCHAT_NEW_TOPIC'			=> '<strong>Новое сообщение</strong>',		
	
	// UCP
	'UCP_PROFILE_MCHAT'	=> 'настройки чЯтика:)',
	
	'DISPLAY_MCHAT' 	=> 'Display mChat on Index',
	'SOUND_MCHAT'		=> 'Enable mChat sound',
	'DISPLAY_STATS_INDEX'	=> 'Display the Who is Chatting stats on index page',
	'DISPLAY_NEW_TOPICS'	=> 'Display new topics in the chat',
	'DISPLAY_AVATARS'	=> 'Display avatars in the chat',
	
	// ACP
	'USER_MCHAT_UPDATED'	=> 'Users mChat preferences were updated',
));
?>