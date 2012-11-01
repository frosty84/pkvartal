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

class acp_share_topic
{
	var $u_action;

	function main($id, $mode)
	{
		global $config, $db, $user, $auth, $template, $cache;
		global $phpbb_root_path, $phpbb_admin_path, $phpEx, $table_prefix;

		$user->add_lang('mods/info_acp_share_topic');

		$this->page_title = $user->lang['SHARE_TOPIC_TITLE'];
		$this->tpl_name = 'acp_share_topic';

		add_form_key('acp_share_topic');

		$sql = 'SELECT *
						FROM ' . SHARE_TOPIC_TABLE;
		$result = $db->sql_query($sql);
		while( $row = $db->sql_fetchrow($result) )
		{
			$template->assign_block_vars('servers', array(
				'S_NAME'			=> $row['share_name'],
				'S_URL'			=> $row['share_url'],
				'S_ICON'			=> $row['share_icon'],
				'U_EDIT'			=> $this->u_action . "&amp;id=" . $row['share_id'] . "&amp;action=edit",
				'U_DELETE'			=> $this->u_action . "&amp;id=" . $row['share_id'] . "&amp;action=delete"
			));
		}
		$db->sql_freeresult($result);

		$sql = 'SELECT COUNT(share_id) as shares_count
						FROM ' . SHARE_TOPIC_TABLE;
		$result = $db->sql_query($sql);
		$row = $db->sql_fetchrow($result);
		$template->assign_vars(array(
			'S_ROW_COUNT'			=> $row['shares_count'],
			'S_SHARE_TOPIC_ENABLED' => $config['share_topic_enable']
		));
		$db->sql_freeresult($result);

		$submit = (isset($_POST['submit'])) ? true : false;
		$enable_submit = (isset($_POST['enable_submit'])) ? true : false;
		
		$edit = (isset($_POST['edit'])) ? true : false;
		$edit_id = request_var('edit', 0);
		
		$enabled = request_var('enable_share_topic', 0);
		
		if ($submit && !check_form_key('acp_share_topic') && !$edit)
		{
			trigger_error($user->lang['FORM_INVALID']);
		}
		if ($enable_submit && !check_form_key('acp_share_topic'))
		{
			trigger_error($user->lang['FORM_INVALID']);
		}
		
		if ($submit)
		{
			$name = utf8_normalize_nfc(request_var('name', ''));
			$url = request_var('url', '');
			$icon = request_var('icon', '');

			if($name != '' and $url != '' and $icon != '' and !$edit)
			{
				$sql_array = array(
					'share_name'		=> $name,
					'share_url'		=> $url,
					'share_icon'		=> $icon
				);

				$sql = 'INSERT INTO ' . SHARE_TOPIC_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_array);
				$db->sql_query($sql);
				trigger_error($user->lang['SHARE_TOPIC_SERVER_ADDED'] . adm_back_link($this->u_action));
			}
			else if($name != '' and $url != '' and $icon != '' and isset($edit) and $edit_id != 0 )
			{
				$sql_array = array(
					'share_name'		=> $name,
					'share_url'		=> $url,
					'share_icon'		=> $icon
				);

				$sql = 'UPDATE ' . SHARE_TOPIC_TABLE . ' SET ' . $db->sql_build_array('UPDATE', $sql_array) . ' WHERE share_id = ' . $edit_id;
				$db->sql_query($sql);
				trigger_error($user->lang['SHARE_TOPIC_SERVER_UDPATED'] . adm_back_link($this->u_action));
			}
			else
			{
				trigger_error('error' . adm_back_link($this->u_action));
			}
		}
		
		if ($enable_submit)
		{
		  set_config('share_topic_enable', $enabled);
			trigger_error($user->lang['SHARE_TOPIC_ENABLING_UDPATED'] . adm_back_link($this->u_action));
		}

		$action = (isset($_GET['action']) or isset($_POST['action'])) ? true : false;
		$id_share = request_var('id', 0);
		if($action && $id_share != 0)
		{
			$action = request_var('action', '');
			switch ($action)
			{
				case 'edit':
					$sql = 'SELECT *
									FROM ' . SHARE_TOPIC_TABLE . '
									WHERE share_id = ' . $id_share;
					$result = $db->sql_query($sql);
					$row = $db->sql_fetchrow($result);
					$template->assign_vars(array(
						'T_NAME'			=> $row['share_name'],
						'T_URL'			=> $row['share_url'],
						'T_ICON'			=> $row['share_icon'],
						'T_EDIT'			=> $row['share_id'],
					));
					$db->sql_freeresult($result);
				break;
				case 'delete':
					if (confirm_box(true))
					{
						$sql = 'DELETE FROM
										' . SHARE_TOPIC_TABLE . '
										WHERE share_id = ' . $id_share;
						$db->sql_query($sql);
						redirect($this->u_action);
					}
					else
					{
						confirm_box(false, $user->lang['CONFIRM_OPERATION'], build_hidden_fields(array(
							'action'		=> $action,
							'id'	=> $id_share))
						);
					}
				break;
			}
		}
	}
}

?>