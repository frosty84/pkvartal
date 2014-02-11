CREATE TABLE `phpbb_podvozilka_events_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `comment` char(20) DEFAULT NULL,
  `datecreation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `current` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `phpbb_podvozilka_events_log_fk` FOREIGN KEY (`event_id`) REFERENCES `phpbb_podvozilka_events` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

ALTER TABLE phpbb_forums ADD forum_logo VARCHAR(255) NOT NULL;
INSERT INTO phpbb_config (config_name, config_value) VALUES ('logo_path', 'images/logos');