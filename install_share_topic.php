<?php
/**
*
* @author Senky (Jakub Senko) jakubsenko@gmail.com
* @package umil
* @version $Id install_share_topic.php 2.0.0 2010-03-20 11:45:45GMT Senky $
* @copyright (c) 2010 Senky
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
define('UMIL_AUTO', true);
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
$user->session_begin();
$auth->acl($user->data);
$user->setup();


if (!file_exists($phpbb_root_path . 'umil/umil_auto.' . $phpEx))
{
	trigger_error('Please download the latest UMIL (Unified MOD Install Library) from: <a href="http://www.phpbb.com/mods/umil/">phpBB.com/mods/umil</a>', E_USER_ERROR);
}

$language_file = 'mods/info_acp_share_topic';

$mod_name = 'SHARE_TOPIC_TITLE';

$version_config_name = 'st_version';

$versions = array(
	// Version 1.2.10
	'2.0.0'	=> array(

		// Lets add a config setting and set it to true
		'config_add' => array(
			array('st_enable', true),
			array('share_topic_enable', '1'),
		),

		'table_add' => array(
			array('phpbb_share', array(
				'COLUMNS' => array(
					'share_id' => array('TINT:8', NULL, 'auto_increment'),
					'share_name' => array('VCHAR', ''),
					'share_url' => array('VCHAR', ''),
					'share_icon' => array('VCHAR', ''),
				),
				'PRIMARY_KEY'	=> 'share_id',
				),
			)
		),

		'table_insert'	=> array(
			array('phpbb_share', array(
				array(
					'share_name' 	=> 'Facebook',
					'share_url'	=> 'http://www.facebook.com/share.php?u={TOPIC_URL}',
					'share_icon'	=> generate_board_url() . '/images/share/facebook.gif',
				),
				array(
					'share_name' 	=> 'Twitter',
					'share_url'	=> 'http://twitter.com/home?status={TOPIC_TITLE}: {TOPIC_URL}',
					'share_icon'	=> generate_board_url() . '/images/share/twitter.gif',
				),
				array(
					'share_name' 	=> 'MySpace',
					'share_url'	=> 'http://www.myspace.com/Modules/PostTo/Pages/?u={TOPIC_URL}&amp;t={TOPIC_TITLE}',
					'share_icon'	=> generate_board_url() . '/images/share/myspace.gif',
				),
				array(
					'share_name' 	=> 'Del.icio.us',
					'share_url'	=> 'http://del.icio.us/post?url={TOPIC_URL}&amp;title={TOPIC_TITLE}',
					'share_icon'	=> generate_board_url() . '/images/share/delicious.gif',
				),
			),
		),
		),

		'module_add' => array(
			array('acp', 'ACP_CAT_DOT_MODS', 'ACP_CAT_SHARE_TOPIC'),

			array('acp', 'ACP_CAT_SHARE_TOPIC', array(
					'module_basename'	=> 'share_topic',
					'module_auth'		=> 'acl_a_board',
				),
			),
		),
	),
);

include($phpbb_root_path . 'umil/umil_auto.' . $phpEx);

?>