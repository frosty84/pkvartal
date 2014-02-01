<?php
/**
*
* @package phpBB3
* @version $Id: functions_sitemap_fx.php,v 1.0.8 9467 2010-04-25 20:15:39Z FladeX Exp $
* @copyright (c) 2009 FladeX
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
* Generate sitemap
*/
function sitemap_fx_forum($forum_id)
{
	global $db, $phpEx, $config;
	global $phpbb_seo;
	global $phpbb_root_path;
	$url = generate_board_url();

	$sitemap_file = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n";
	$sitemap_file .= "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";

	$sql = 'SELECT topic_id, forum_id, topic_last_post_time, topic_time, topic_type, topic_replies, topic_url, topic_title
		FROM ' . TOPICS_TABLE . '
			WHERE forum_id = ' . $forum_id;
	$result = $db->sql_query($sql);
		
	while ($row = $db->sql_fetchrow($result))
	{
		$topic_id = $row['topic_id'];
		
		// www.phpBB-SEO.com SEO TOOLKIT BEGIN
		if (!empty($row['topic_url'])) {
			$phpbb_seo->prepare_iurl($row, 'topic', '');
		} else {
			if ($phpbb_seo->modrtype > 2) {
				$row['topic_title'] = censor_text($row['topic_title']);
			}
			$parent_forum = $row['topic_type'] == POST_GLOBAL ? $phpbb_seo->seo_static['global_announce'] : (!empty($phpbb_seo->seo_url['forum'][$forum_id]) ? $phpbb_seo->seo_url['forum'][$forum_id] : false);
			if ($parent_forum) {
				$phpbb_seo->prepare_iurl($row, 'topic', $parent_forum);
			}
		}
		// www.phpBB-SEO.com SEO TOOLKIT END
		
		if ($row['topic_last_post_time'] > 0)
		{
			$last_mod = date('Y-m-d\TH:i:s+00:00', $row['topic_last_post_time']);
		}
		else
		{
			$last_mod = date('Y-m-d\TH:i:s+00:00', $row['topic_time']);
		}
		$pages = $row['topic_replies'] / $config['posts_per_page'];
		$pages = (int) $pages;
		
		
		for ($i=0; $i<=$pages; $i++)
		{
			$sitemap_file .= "<url>\n";
			if ($i == 0)
			{
		                $view_topic_url = append_sid("{$phpbb_root_path}viewtopic.$phpEx", 'f=' . $forum_id . '&amp;t=' . $row['topic_id']);
				$sitemap_file .= "<loc>".$view_topic_url."</loc>\n";
			}
			else
			{
				$view_topic_url = append_sid("{$phpbb_root_path}viewtopic.$phpEx", 'f=' . $forum_id . '&amp;t=' . $row['topic_id']."&amp;start=" . $i * $config['posts_per_page']);
				$sitemap_file .= "<loc>".$view_topic_url."</loc>\n";
			}
			$sitemap_file .= "<lastmod>" . $last_mod . "</lastmod>\n";
			switch ($row['topic_type'])
			{
				case POST_NORMAL:
					$sitemap_file .= "<changefreq>" . $config['sitemap_freq_0'] . "</changefreq>\n";
					$sitemap_file .= "<priority>" . $config['sitemap_priority_0'] . "</priority>\n";
					break;
				case POST_STICKY:
					$sitemap_file .= "<changefreq>" . $config['sitemap_freq_1'] . "</changefreq>\n";
					$sitemap_file .= "<priority>" . $config['sitemap_priority_1'] . "</priority>\n";
					break;
				case POST_ANNOUNCE:
					$sitemap_file .= "<changefreq>" . $config['sitemap_freq_2'] . "</changefreq>\n";
					$sitemap_file .= "<priority>" . $config['sitemap_priority_2'] . "</priority>\n";
					break;
				default:
					$sitemap_file .= "<changefreq>" . $config['sitemap_freq_0'] . "</changefreq>\n";
					$sitemap_file .= "<priority>" . $config['sitemap_priority_0'] . "</priority>\n";
			}
			$sitemap_file .= "</url>\n";
		}
	}
	$db->sql_freeresult($result);


	$sitemap_file .= "</urlset>\n";

	$w=fopen('sitemap/'.$forum_id.'.xml','w');
	fwrite($w,$sitemap_file);
	fclose($w);
}

function sitemap_fx_global($forum_id)
{
	global $db, $phpEx, $config;
	global $phpbb_root_path;
	$url = generate_board_url();

	$sitemap_file = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n";
	$sitemap_file .= "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";

	$sql = 'SELECT topic_id, forum_id, topic_title, topic_last_post_time, topic_time, topic_type, topic_replies, topic_url, topic_title
			FROM ' . TOPICS_TABLE . '
			WHERE topic_type = ' . POST_GLOBAL;
	$result = $db->sql_query($sql);

	if ($db->sql_fetchrow($result))
	{

		while ($row = $db->sql_fetchrow($result))
		{
			$topic_id = $row['topic_id'];
			
			// www.phpBB-SEO.com SEO TOOLKIT BEGIN
			if (!empty($row['topic_url'])) {
				$phpbb_seo->prepare_iurl($row, 'topic', '');
			} else {
				if ($phpbb_seo->modrtype > 2) {
					$row['topic_title'] = censor_text($row['topic_title']);
				}
				$parent_forum = $row['topic_type'] == POST_GLOBAL ? $phpbb_seo->seo_static['global_announce'] : (!empty($phpbb_seo->seo_url['forum'][$forum_id]) ? $phpbb_seo->seo_url['forum'][$forum_id] : false);
				if ($parent_forum) {
					$phpbb_seo->prepare_iurl($row, 'topic', $parent_forum);
				}
			}
			// www.phpBB-SEO.com SEO TOOLKIT END
			
			if ($row['topic_last_post_time'] > 0)
			{
				$last_mod = date('Y-m-d\TH:i:s+00:00', $row['topic_last_post_time']);
			}
			else
			{
				$last_mod = date('Y-m-d\TH:i:s+00:00', $row['topic_time']);
			}
			$pages = $row['topic_replies'] / $config['posts_per_page'];
			$pages = (int) $pages;
			for ($i=0; $i<=$pages; $i++)
			{
				$sitemap_file .= "<url>\n";
				if ($i == 0)
				{
					$view_topic_url = append_sid("{$phpbb_root_path}viewtopic.$phpEx", 'f=' . $forum_id . '&amp;t=' . $row['topic_id']);
					$sitemap_file .= "<loc>".$view_topic_url."</loc>\n";
				}
				else
				{
					$view_topic_url = append_sid("{$phpbb_root_path}/viewtopic.$phpEx", 'f=' . $forum_id . '&amp;t=' . $row['topic_id']."&amp;start=" . $i * $config['posts_per_page']);
					$sitemap_file .= "<loc>".$view_topic_url."</loc>\n";
				}
				$sitemap_file .= "<lastmod>" . $last_mod . "</lastmod>\n";
				$sitemap_file .= "<changefreq>" . $config['sitemap_freq_3'] . "</changefreq>\n";
				$sitemap_file .= "<priority>" . $config['sitemap_priority_3'] . "</priority>\n";
				$sitemap_file .= "</url>\n";
			}
		}
	}
	$db->sql_freeresult($result);

	$sql = 'SELECT forum_id, forum_type
			FROM ' . FORUMS_TABLE;
	$result = $db->sql_query($sql);
	if ($db->sql_fetchrow($result))
	{
		while ($row = $db->sql_fetchrow($result))
		{
			if ($row['forum_type'] == 1)
			{
				$view_forum_url = append_sid("{$phpbb_root_path}viewforum.$phpEx", 'f=' . $row['forum_id']);
				
				$sitemap_file .= "<url>\n";
				$sitemap_file .= "<loc>".$view_forum_url."</loc>\n";
				$sitemap_file .= "<lastmod>" . date('Y-m-d\TH:i:s+00:00', time()) . "</lastmod>\n";
				$sitemap_file .= "<changefreq>daily</changefreq>\n";
				$sitemap_file .= "<priority>1</priority>\n";
				$sitemap_file .= "</url>\n";
			}
		}
	}
	$db->sql_freeresult($result);
	$sitemap_file .= "</urlset>\n";

	$w=fopen('sitemap/0.xml', 'w');
	fwrite($w, $sitemap_file);
	fclose($w);
}

?>
