--
-- Database: `sdh_lab4`
--

-- --------------------------------------------------------

--
-- table `login_logs`
--

CREATE TABLE IF NOT EXISTS `login_logs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `md5_pwd` varchar(255) NOT NULL,
  `last_access` varchar(255) NOT NULL,
  `type_log` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;


INSERT INTO `login_logs` (`ID`, `username`, `md5_pwd`, `last_access`, `type_log`) VALUES
(15, 'jacksonMike', '6c730744ec001a48c92a2c68b1b368c0', '2022-03-29 02:14:38', 'POST'),
(13, 'deepJoohn', 'fd63d1ce48f759314679a2e627a9a206', '2022-03-29 00:35:17', 'POST'),
(11, 'johnbonjovi', '6cf7d90e9122bd16298184a0ed3339ce', '2022-03-28 23:34:28', 'GET'),
(18, 'billiejoearmstrong', '80735228c8e9b43410f2b207f0e54fb0', '2022-03-29 13:42:50', 'GET'),
(22, 'gzuccolo', '5183c13bb76e232bbf8e7f6683dbb9cd', '2022-03-29 17:25:11', 'GET'),
(8, 'whiteDuke', 'ce8a2ecba8483a7aaa698d4e26c46866', '2022-03-28 22:58:36', 'POST');
