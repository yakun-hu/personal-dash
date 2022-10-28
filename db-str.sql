---- Table structure for table `dash_blind_posts`
--

DROP TABLE IF EXISTS `dash_blind_posts`;
CREATE TABLE IF NOT EXISTS `dash_blind_posts` (
  `post_ID` bigint(20) NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text4` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url4` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text5` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url5` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text6` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url6` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text7` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url7` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text8` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url8` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text9` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url9` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `back_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attributes` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
