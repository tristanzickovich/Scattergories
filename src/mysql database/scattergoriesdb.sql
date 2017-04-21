SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `scattergoriesdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activegames`
--

CREATE TABLE `activegames` (
  `gid` int(11) NOT NULL,
  `roundTime` int(11) NOT NULL,
  `host` varchar(25) NOT NULL,
  `list1` tinyint(4) NOT NULL,
  `list2` tinyint(4) NOT NULL,
  `list3` tinyint(4) NOT NULL,
  `currentRound` tinyint(4) NOT NULL,
  `roundReady` tinyint(4) NOT NULL DEFAULT '0',
  `roundStartTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `letterRolled` varchar(1) DEFAULT '?',
  `reroll` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gameplayers`
--

CREATE TABLE `gameplayers` (
  `id` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `player` varchar(25) NOT NULL,
  `roundReady` tinyint(4) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gamescores`
--

CREATE TABLE `gamescores` (
  `id` int(11) NOT NULL,
  `gid` int(11) DEFAULT NULL,
  `player` varchar(25) DEFAULT NULL,
  `s1` tinyint(4) NOT NULL DEFAULT '0',
  `s2` tinyint(4) NOT NULL DEFAULT '0',
  `s3` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `pid` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


--
-- Indexes for table `activegames`
--
ALTER TABLE `activegames`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `gameplayers`
--
ALTER TABLE `gameplayers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gamescores`
--
ALTER TABLE `gamescores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`pid`);


--
-- AUTO_INCREMENT for table `activegames`
--
ALTER TABLE `activegames`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `gameplayers`
--
ALTER TABLE `gameplayers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `gamescores`
--
ALTER TABLE `gamescores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;