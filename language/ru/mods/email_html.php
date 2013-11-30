<?php
/**
*
* email_html [English]
*
* @package language
* @version $Id: email_html.php ksar $
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

$lang = array_merge($lang, array(
	
	'PAGE_TITLE'			=> 'The Newsletters page',
	'TITLE'					=> 'Newsletters',
	'SUBJECT'				=> 'Subject',
	'AUTHOR'				=> 'Author',
	'DATE'					=> 'Date',
	
	'MAILED_ON_DATE'		=> 'on',
	'MAIL_BY_AUTHOR'		=> 'Mail by',
));

?>