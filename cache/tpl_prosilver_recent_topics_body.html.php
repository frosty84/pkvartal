<?php if (!defined('IN_PHPBB')) exit; if ($this->_rootref['RECENT_TOPICS_PAGINATION']) {  ?>
<div class="topic-actions">
	<div class="pagination">
		<?php echo (isset($this->_rootref['RECENT_TOPICS_PAGE_NUMBER'])) ? $this->_rootref['RECENT_TOPICS_PAGE_NUMBER'] : ''; ?> &bull; <span><?php echo (isset($this->_rootref['RECENT_TOPICS_PAGINATION'])) ? $this->_rootref['RECENT_TOPICS_PAGINATION'] : ''; ?></span>
	</div>
</div>
<?php } $_recent_topics_count = (isset($this->_tpldata['recent_topics'])) ? sizeof($this->_tpldata['recent_topics']) : 0;if ($_recent_topics_count) {for ($_recent_topics_i = 0; $_recent_topics_i < $_recent_topics_count; ++$_recent_topics_i){$_recent_topics_val = &$this->_tpldata['recent_topics'][$_recent_topics_i]; if (! $_recent_topics_val['S_TOPIC_TYPE_SWITCH'] && ! $_recent_topics_val['S_FIRST_ROW']) {  ?>
		</ul>
		<span class="corners-bottom"><span></span></span></div>
	</div>
	<?php } if ($_recent_topics_val['S_FIRST_ROW'] || ! $_recent_topics_val['S_TOPIC_TYPE_SWITCH']) {  ?>
		<div class="forumbg">
		<div class="inner"><span class="corners-top"><span></span></span>
		<ul class="topiclist">
			<li class="header">
				<dl class="icon">
				<dt><?php echo ((isset($this->_rootref['L_RECENT_TOPICS'])) ? $this->_rootref['L_RECENT_TOPICS'] : ((isset($user->lang['RECENT_TOPICS'])) ? $user->lang['RECENT_TOPICS'] : '{ RECENT_TOPICS }')); ?></dt>
					<dd class="posts"><?php echo ((isset($this->_rootref['L_REPLIES'])) ? $this->_rootref['L_REPLIES'] : ((isset($user->lang['REPLIES'])) ? $user->lang['REPLIES'] : '{ REPLIES }')); ?></dd>
					<dd class="views"><?php echo ((isset($this->_rootref['L_VIEWS'])) ? $this->_rootref['L_VIEWS'] : ((isset($user->lang['VIEWS'])) ? $user->lang['VIEWS'] : '{ VIEWS }')); ?></dd>
					<dd class="lastpost"><span><?php echo ((isset($this->_rootref['L_LAST_POST'])) ? $this->_rootref['L_LAST_POST'] : ((isset($user->lang['LAST_POST'])) ? $user->lang['LAST_POST'] : '{ LAST_POST }')); ?></span></dd>
				</dl>
			</li>
		</ul>
		<ul class="topiclist topics">
	<?php } ?>

		<li class="row<?php if (!($_recent_topics_val['S_ROW_COUNT'] & 1)  ) {  ?> bg1<?php } else { ?> bg2<?php } ?>">
			<dl class="icon" style="background-image: url(<?php echo $_recent_topics_val['TOPIC_FOLDER_IMG_SRC']; ?>); background-repeat: no-repeat;">
				<dt style="<?php if ($_recent_topics_val['TOPIC_ICON_IMG']) {  ?>background-image: url(<?php echo (isset($this->_rootref['T_ICONS_PATH'])) ? $this->_rootref['T_ICONS_PATH'] : ''; echo $_recent_topics_val['TOPIC_ICON_IMG']; ?>); background-repeat: no-repeat;<?php } ?>" title="<?php echo $_recent_topics_val['TOPIC_FOLDER_IMG_ALT']; ?>"><?php if ($_recent_topics_val['S_UNREAD_TOPIC']) {  ?><a href="<?php echo $_recent_topics_val['U_NEWEST_POST']; ?>"><?php echo (isset($this->_rootref['NEWEST_POST_IMG'])) ? $this->_rootref['NEWEST_POST_IMG'] : ''; ?></a> <?php } ?><a href="<?php echo $_recent_topics_val['U_VIEW_TOPIC']; ?>" class="topictitle"><?php echo $_recent_topics_val['TOPIC_TITLE']; ?></a><?php if ($this->_rootref['U_VIEW_UNREAD_POST'] && ! $this->_rootref['S_IS_BOT']) {  ?> &bull; <a href="<?php echo (isset($this->_rootref['U_VIEW_UNREAD_POST'])) ? $this->_rootref['U_VIEW_UNREAD_POST'] : ''; ?>"><?php echo ((isset($this->_rootref['L_VIEW_UNREAD_POST'])) ? $this->_rootref['L_VIEW_UNREAD_POST'] : ((isset($user->lang['VIEW_UNREAD_POST'])) ? $user->lang['VIEW_UNREAD_POST'] : '{ VIEW_UNREAD_POST }')); ?></a> &bull; <?php } if ($_recent_topics_val['S_TOPIC_UNAPPROVED'] || $_recent_topics_val['S_POSTS_UNAPPROVED']) {  ?><a href="<?php echo $_recent_topics_val['U_MCP_QUEUE']; ?>"><?php echo $_recent_topics_val['UNAPPROVED_IMG']; ?></a> <?php } if ($_recent_topics_val['S_TOPIC_REPORTED']) {  ?><a href="<?php echo $_recent_topics_val['U_MCP_REPORT']; ?>"><?php echo (isset($this->_rootref['REPORTED_IMG'])) ? $this->_rootref['REPORTED_IMG'] : ''; ?></a><?php } ?><br />
					<?php if ($_recent_topics_val['PAGINATION']) {  ?><strong class="pagination"><span><?php echo $_recent_topics_val['PAGINATION']; ?></span></strong><?php } if ($_recent_topics_val['ATTACH_ICON_IMG']) {  echo $_recent_topics_val['ATTACH_ICON_IMG']; ?> <?php } echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo $_recent_topics_val['TOPIC_AUTHOR_FULL']; ?> &raquo; <?php echo $_recent_topics_val['FIRST_POST_TIME']; ?>
					<?php if ($_recent_topics_val['U_VIEW_FORUM'] && $_recent_topics_val['FORUM_NAME']) {  ?><br /><?php echo ((isset($this->_rootref['L_IN'])) ? $this->_rootref['L_IN'] : ((isset($user->lang['IN'])) ? $user->lang['IN'] : '{ IN }')); ?> <a href="<?php echo $_recent_topics_val['U_VIEW_FORUM']; ?>" style="font-weight: bold;"><?php echo $_recent_topics_val['FORUM_NAME']; ?></a><?php } ?>
				</dt>
				<dd class="posts"><?php echo $_recent_topics_val['REPLIES']; ?> <dfn><?php echo ((isset($this->_rootref['L_REPLIES'])) ? $this->_rootref['L_REPLIES'] : ((isset($user->lang['REPLIES'])) ? $user->lang['REPLIES'] : '{ REPLIES }')); ?></dfn></dd>
				<dd class="views"><?php echo $_recent_topics_val['VIEWS']; ?> <dfn><?php echo ((isset($this->_rootref['L_VIEWS'])) ? $this->_rootref['L_VIEWS'] : ((isset($user->lang['VIEWS'])) ? $user->lang['VIEWS'] : '{ VIEWS }')); ?></dfn></dd>
				<dd class="lastpost"><span><dfn><?php echo ((isset($this->_rootref['L_LAST_POST'])) ? $this->_rootref['L_LAST_POST'] : ((isset($user->lang['LAST_POST'])) ? $user->lang['LAST_POST'] : '{ LAST_POST }')); ?> </dfn><?php echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo $_recent_topics_val['LAST_POST_AUTHOR_FULL']; ?>
					<a href="<?php echo $_recent_topics_val['U_LAST_POST']; ?>"><?php echo (isset($this->_rootref['LAST_POST_IMG'])) ? $this->_rootref['LAST_POST_IMG'] : ''; ?></a> <br /><?php echo $_recent_topics_val['LAST_POST_TIME']; ?></span>
				</dd>
			</dl>
		</li>

	<?php if ($_recent_topics_val['S_LAST_ROW']) {  ?>
			</ul>
		<span class="corners-bottom"><span></span></span></div>
	</div>
	<?php } }} else { ?>
	<div class="panel">
		<div class="inner"><span class="corners-top"><span></span></span>
		<strong><?php echo ((isset($this->_rootref['L_NO_TOPICS'])) ? $this->_rootref['L_NO_TOPICS'] : ((isset($user->lang['NO_TOPICS'])) ? $user->lang['NO_TOPICS'] : '{ NO_TOPICS }')); ?></strong>
		<span class="corners-bottom"><span></span></span></div>
	</div>
<?php } ?>