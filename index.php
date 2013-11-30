<?php
/**
*
* @package phpBB3
* @version $Id$
* @copyright (c) 2005 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
*/

/**
* @ignore
*/
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup('viewforum');

display_forums('', $config['load_moderators']);

// Set some stats, get posts count from forums data if we... hum... retrieve all forums data
$total_posts	= $config['num_posts'];
$total_topics	= $config['num_topics'];
$total_users	= $config['num_users'];

$l_total_user_s = ($total_users == 0) ? 'TOTAL_USERS_ZERO' : 'TOTAL_USERS_OTHER';
$l_total_post_s = ($total_posts == 0) ? 'TOTAL_POSTS_ZERO' : 'TOTAL_POSTS_OTHER';
$l_total_topic_s = ($total_topics == 0) ? 'TOTAL_TOPICS_ZERO' : 'TOTAL_TOPICS_OTHER';

// Grab group details for legend display
if ($auth->acl_gets('a_group', 'a_groupadd', 'a_groupdel'))
{
	$sql = 'SELECT group_id, group_name, group_colour, group_type
		FROM ' . GROUPS_TABLE . '
		WHERE group_legend = 1
		ORDER BY group_name ASC';
}
else
{
	$sql = 'SELECT g.group_id, g.group_name, g.group_colour, g.group_type
		FROM ' . GROUPS_TABLE . ' g
		LEFT JOIN ' . USER_GROUP_TABLE . ' ug
			ON (
				g.group_id = ug.group_id
				AND ug.user_id = ' . $user->data['user_id'] . '
				AND ug.user_pending = 0
			)
		WHERE g.group_legend = 1
			AND (g.group_type <> ' . GROUP_HIDDEN . ' OR ug.user_id = ' . $user->data['user_id'] . ')
		ORDER BY g.group_name ASC';
}
$result = $db->sql_query($sql);

$legend = array();
while ($row = $db->sql_fetchrow($result))
{
	$colour_text = ($row['group_colour']) ? ' style="color:#' . $row['group_colour'] . '"' : '';
	$group_name = ($row['group_type'] == GROUP_SPECIAL) ? $user->lang['G_' . $row['group_name']] : $row['group_name'];

	if ($row['group_name'] == 'BOTS' || ($user->data['user_id'] != ANONYMOUS && !$auth->acl_get('u_viewprofile')))
	{
		$legend[] = '<span' . $colour_text . '>' . $group_name . '</span>';
	}
	else
	{
		// www.phpBB-SEO.com SEO TOOLKIT BEGIN
		$phpbb_seo->prepare_url('group', $row['group_name'], $row['group_id']);
		// www.phpBB-SEO.com SEO TOOLKIT END
		$legend[] = '<a' . $colour_text . ' href="' . append_sid("{$phpbb_root_path}memberlist.$phpEx", 'mode=group&amp;g=' . $row['group_id']) . '">' . $group_name . '</a>';
	}
}
$db->sql_freeresult($result);

$legend = implode(', ', $legend);

// Generate birthday list if required ...
$birthday_list = '';
if ($config['load_birthdays'] && $config['allow_birthdays'])
{
	$now = getdate(time() + $user->timezone + $user->dst - date('Z'));
	$sql = 'SELECT u.user_id, u.username, u.user_colour, u.user_birthday
		FROM ' . USERS_TABLE . ' u
		LEFT JOIN ' . BANLIST_TABLE . " b ON (u.user_id = b.ban_userid)
		WHERE (b.ban_id IS NULL
			OR b.ban_exclude = 1)
			AND u.user_birthday LIKE '" . $db->sql_escape(sprintf('%2d-%2d-', $now['mday'], $now['mon'])) . "%'
			AND u.user_type IN (" . USER_NORMAL . ', ' . USER_FOUNDER . ')';
	$result = $db->sql_query($sql);

	while ($row = $db->sql_fetchrow($result))
	{
		$birthday_list .= (($birthday_list != '') ? ', ' : '') . get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']);

		if ($age = (int) substr($row['user_birthday'], -4))
		{
			$birthday_list .= ' (' . ($now['year'] - $age) . ')';
		}
	}
	$db->sql_freeresult($result);
}

// Generate thankslist if required ...
if (!function_exists('get_thanks'))
{
    include($phpbb_root_path . 'includes/functions_thanks.' . $phpEx);    
}
$thanks_list = '';
$ex_fid_ary = array_keys($auth->acl_getf('!f_read', true));
$ex_fid_ary = (sizeof($ex_fid_ary)) ? $ex_fid_ary : 0;
if (isset($config['thanks_top_number']) ? $config['thanks_top_number'] : false)
{
    $thanks_list = get_toplist_index($ex_fid_ary);
}
// Assign index specific vars
$template->assign_vars(array(
	'TOTAL_POSTS'	=> sprintf($user->lang[$l_total_post_s], $total_posts),
	'TOTAL_TOPICS'	=> sprintf($user->lang[$l_total_topic_s], $total_topics),
	'TOTAL_USERS'	=> sprintf($user->lang[$l_total_user_s], $total_users),
	'NEWEST_USER'	=> sprintf($user->lang['NEWEST_USER'], get_username_string('full', $config['newest_user_id'], $config['newest_username'], $config['newest_user_colour'])),

	'LEGEND'		=> $legend,
	'BIRTHDAY_LIST'	=> $birthday_list,
    'THANKS_LIST'    => $thanks_list,
    'S_THANKS_LIST'    => isset($config['thanks_top_number']) ? $config['thanks_top_number'] : false,
    'L_TOP_THANKS_LIST'    => isset($config['thanks_top_number']) ? sprintf($user->lang['REPUT_TOPLIST'], $config['thanks_top_number']) : false,

	'FORUM_IMG'				=> $user->img('forum_read', 'NO_UNREAD_POSTS'),
	'FORUM_UNREAD_IMG'			=> $user->img('forum_unread', 'UNREAD_POSTS'),
	'FORUM_LOCKED_IMG'		=> $user->img('forum_read_locked', 'NO_UNREAD_POSTS_LOCKED'),
	'FORUM_UNREAD_LOCKED_IMG'	=> $user->img('forum_unread_locked', 'UNREAD_POSTS_LOCKED'),

	'S_LOGIN_ACTION'			=> append_sid("{$phpbb_root_path}ucp.$phpEx", 'mode=login'),
	'S_DISPLAY_BIRTHDAY_LIST'	=> ($config['load_birthdays']) ? true : false,

	'U_MARK_FORUMS'		=> ($user->data['is_registered'] || $config['load_anon_lastread']) ? append_sid("{$phpbb_root_path}index.$phpEx", 'hash=' . generate_link_hash('global') . '&amp;mark=forums') : '',
	'U_MCP'				=> ($auth->acl_get('m_') || $auth->acl_getf_global('m_')) ? append_sid("{$phpbb_root_path}mcp.$phpEx", 'i=main&amp;mode=front', true, $user->session_id) : '')
);

if ($config['rt_index'])
{
	if (!function_exists('display_recent_topics'))
	{
		include($phpbb_root_path . 'includes/functions_recenttopics.' . $phpEx);
	}
	display_recent_topics($config['rt_number'], $config['rt_page_number'], $config['rt_anti_topics'], 'recent_topics', request_var('f', 0), true);
}

// BEGIN mChat Mod
$mchat_installed = (!empty($config['mchat_version']) && !empty($config['mchat_enable'])) ? true : false;
if ($mchat_installed && $auth->acl_get('u_mchat_view'))
{
    if(!defined('MCHAT_INCLUDE') && $config['mchat_on_index'] && !empty($user->data['user_mchat_index']))
    {
        define('MCHAT_INCLUDE', true);
        $mchat_include_index = true;
        include($phpbb_root_path . 'mchat.' . $phpEx);
    }    

    if ((!empty($config['mchat_stats_index']) && !empty($user->data['user_mchat_stats_index'])) || !empty($config['mchat_on_index_widget']))
    {
        if (!function_exists('mchat_users'))
        {
            include($phpbb_root_path . 'includes/functions_mchat.' . $phpEx);
        }
        // Add lang file
        $user->add_lang('mods/mchat_lang');
        // stats display
        $mchat_session_time = !empty($config_mchat['timeout']) ? $config_mchat['timeout'] : 3600;// you can change this number to a greater number for longer chat sessions
        $mchat_stats = mchat_users($mchat_session_time);
        $template->assign_vars(array(
            'MCHAT_INDEX_STATS'    => true,
            'MCHAT_INDEX_USERS_COUNT'    => $mchat_stats['mchat_users_count'],
            'MCHAT_INDEX_USERS_LIST'    => $mchat_stats['online_userlist'],
            'L_MCHAT_ONLINE_EXPLAIN'    => $mchat_stats['refresh_message'],    
        ));
    }
}

if (!empty($config['mchat_on_index_widget'])){
    if (!function_exists('display_recent_mchat'))
    {
	include($phpbb_root_path . 'includes/functions_mchat.' . $phpEx);
    }
    display_recent_mchat();
}
// END mChat Mod

// Output page
page_header($user->lang['INDEX']);

$template->set_filenames(array(
	'body' => 'index_body.html')
);

page_footer();

?>