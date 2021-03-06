<?php

/**
*
* @package - NV recent topics
* @version $Id: acp_recenttopics.php 193 2009-04-22 18:05:52Z nickvergessen $
* @copyright (c) nickvergessen ( http://www.flying-bits.org/ )
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

/**
* @package acp
*/
class acp_recenttopics
{
	var $u_action;

	function main($id, $mode)
	{
		global $db, $user, $auth, $template, $cache;
		global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx;

		$user->add_lang('acp/common');
		$this->tpl_name = 'acp_recenttopics';
		$this->page_title = $user->lang['RECENT_TOPICS_MOD'];
		add_form_key('acp_recenttopics');

		$submit = (isset($_POST['submit'])) ? true : false;
		if ($submit)
		{
			if (!check_form_key('acp_recenttopics'))
			{
				trigger_error('FORM_INVALID');
			}
			// request_var should be '' as it is a string ("1, 2, 3928") here, not a integer.
			// But this would end up in a SQL-Error, that's why I ended up with adding the 0 in it.
			set_config('rt_anti_topics', request_var('rt_anti_topics', '0'));
			set_config('rt_number', request_var('rt_number', 5));
			set_config('rt_page_number', request_var('rt_page_number', 0));
			set_config('rt_index', request_var('rt_index', 0));

			trigger_error($user->lang['RT_SAVED'] . adm_back_link($this->u_action));
		}
		$template->assign_vars(array(
			'RT_VERSION'			=> 'v' . $config['rt_mod_version'],
			'RT_ANTI_TOPICS'		=> $config['rt_anti_topics'],
			'RT_NUMBER'				=> $config['rt_number'],
			'RT_PAGE_NUMBER'		=> $config['rt_page_number'],
			'RT_INDEX'				=> $config['rt_index'],
			'U_ACTION'				=> $this->u_action,
		));
	}
}

?>