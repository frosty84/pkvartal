<?php
/**
*
* acp_email_html [English]
*
* @package language
* @version $Id: email_html.php, ksar $
* @copyright (c) 2008
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// Email settings
$lang = array_merge($lang, array(

	'ACP_MASS_EMAIL_EXPLAIN'		=> 'Here you can e-mail a HTML message to either all of your users or all users of a specific group <strong>having the option to receive mass e-mails enabled</strong>. To achieve this an e-mail will be sent out to the administrative e-mail address supplied, with a blind carbon copy sent to all recipients. The default setting is to only include 50 recipients in such an e-mail, for more recipients more e-mails will be sent. If you are emailing a large group of people please be patient after submitting and do not stop the page halfway through. It is normal for a mass emailing to take a long time, you will be notified when the script has completed.',
	'ACP_MASS_EMAIL_VIEW_EXPLAIN'	=> 'Here you can see all the HTML mass e-mail sent to the users<br>You can delete some or display them<br>you can select the one showen into the newsletter page',
	'ALL_USERS'						=> 'All users',

	'COMPOSE'				=> 'Compose',

	'EMAIL_SEND_ERROR'		=> 'There were one or more errors while sending the e-mail. Please check the %sError log%s for detailed error messages.',
	'EMAIL_SENT'			=> 'This message has been sent.',
	'EMAIL_SENT_QUEUE'		=> 'This message has been queued for sending.',

	'LOG_SESSION'			=> 'Log mail session to critical log',

	'SEND_IMMEDIATELY'		=> 'Send immediately',
	'SEND_TO_GROUP'			=> 'Send to group',
	'SEND_TO_USERS'			=> 'Send to users',
	'SEND_TO_USERS_EXPLAIN'	=> 'Entering names here will override any group selected above. Enter each username on a new line.',
	
	'MAIL_HIGH_PRIORITY'	=> 'High',
	'MAIL_LOW_PRIORITY'		=> 'Low',
	'MAIL_NORMAL_PRIORITY'	=> 'Normal',
	'MAIL_PRIORITY'			=> 'Mail priority',
	'MASS_MESSAGE'			=> 'Your message',
	'MASS_MESSAGE_EXPLAIN'	=> 'Please note that you may enter only HTML text. All bbcodes will be removed before sending.',
	
	'NO_EMAIL_MESSAGE'		=> 'You must enter a message.',
	'NO_EMAIL_SUBJECT'		=> 'You must specify a subject for your message.',
	
	'TINY_MCE_LANGUAGE'		=> 'en',
	
	'DISPLAY_IT'			=> 'Display the mail on the Newsletter page',
	'NEWS_PAGE'				=> 'Newsletter Page',
	'BY'					=> 'By',
	'HIDE'					=> 'Hide',
	'SHOW'					=> 'Show',
	'TIME'					=> 'Date',
	'SEND_BY'				=> 'Send by',
	'BACK'					=> 'Previews page',
	'DELETE'				=> 'Delete this Email',
	
	'DELETE_MAIL_SUCCES'	=> 'The html email has been successfully deleted',
	'DISPLAY_MAIL_SUCCES'	=> 'The html email will be displayed in the newsletter page',
	'HIDE_MAIL_SUCCES'		=> 'The html email will <b>NOT</b> be displayed in the newsletter page',
	'ID_NOT_EXIST'			=> 'This mail ID does not exist any more',
));

?>