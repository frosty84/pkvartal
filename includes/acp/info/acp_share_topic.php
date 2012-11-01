<?php

/**
*
* @package phpBB3
* @version $Id: acp_share_topic.php 2010-13-02 Senky $
* @copyright (c) 2010 Senky
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

class acp_share_topic_info
{
	function module()
	{
		return array(
			'filename'	=> 'acp_share_topic',
			'title'		=> 'SHARE_TOPIC_TITLE',
			'version'	=> '2.0.0',
			'modes'		=> array(
				  'default'	=> array(
					'title'			=> 'SHARE_TOPIC_TITLE',
					'auth'			=> 'acl_a_board',
					'cat'			=> array('ACP_BOARD_CONFIGURATION'),
				),
			),
		);
	}
	
	function install()
	{
	}

	function uninstall()
	{
	}
	
}

?>
