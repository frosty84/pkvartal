<?php
/**
*
* @package acp
* @version $Id: nv_recenttopics_version.php 201 2009-08-03 08:37:12Z nickvergessen $
* @copyright (c) nickvergessen ( http://www.flying-bits.org/ )
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @package nv_altt
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

class nv_recenttopics_version
{
	function version()
	{
		return array(
			'author'	=> 'nickvergessen',
			'title'		=> 'NV Recent Topics',
			'tag'		=> 'nv_recenttopics',
			'version'	=> '1.0.5',
			'file'		=> array('www.flying-bits.org', 'updatecheck', 'nv_recenttopics.xml'),
		);
	}
}

?>