<?php
/**
*
* share_topic [English]
*
* @package language
* @version $Id: info_acp_share_topic.php 2010-13-02 Senky $
* @copyright (c) 2010 Senky
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
  'ACP_CAT_SHARE_TOPIC'					=> 'Share Topic MOD',
	'SHARE_TOPIC_TITLE'							=> 'Share Topic',
	'SHARE_TOPIC_INTRO'							=> 'Here you have all options to manage your share servers displayed than in each topic. You can add new, edit or delete server.',
	'SHARE_TOPIC_EDIT'							=> 'Edit server',
	'SHARE_TOPIC_ADD'							=> 'Add server',
	'SHARE_TOPIC_NAME'							=> 'Name',
	'SHARE_TOPIC_NAME_EXPLAIN'							=> 'Name of new share server.',
	'SHARE_TOPIC_URL'							=> 'URL',
	'SHARE_TOPIC_URL_EXPLAIN'							=> 'URL of script, which can manage sharing. To add a topic link, insert into specified place <strong>{TOPIC_URL}</strong>, to topic title <strong>{TOPIC_TITLE}</strong><br />i.e. http://www.facebook.com/share.php?u={TOPIC_URL}',
	'SHARE_TOPIC_ICON'							=> 'Icon',
	'SHARE_TOPIC_ICON_EXPLAIN'							=> 'URL of image of share server. Be sure that URL is correct. In other way, link will not be displayed. It\'s recomended to add link smaller than 18x18px (it will reduce the size if the image will be larger)',
	'SHARE_TOPIC_NAME_T'							=> 'Name of the share server',
	'SHARE_TOPIC_ICON_T'							=> 'Icon of the share server *',
	'SHARE_TOPIC_URL_T'							=> 'URL of the share server',
	'SHARE_TOPIC_ICON_NOT_DISPLAYED'							=> 'If the icon is not displayed here, it will also be not displayed in the topic!',
	'SHARE_TOPIC_SERVER_ADDED'							=> 'New server has been added!',
	'SHARE_TOPIC_SERVER_UDPATED'							=> 'Server has been updated!',
	'SHARE_TOPIC_ENABLE'							=> 'Enable Share topic',
	'SHARE_TOPIC_ENABLE_EXPLAIN'							=> 'Enable Share topic MOD board-wide.',
	'SHARE_TOPIC_ENABLING_UDPATED'							=> 'Share Topic MOD configuration was succesfully updated.'
));

?>