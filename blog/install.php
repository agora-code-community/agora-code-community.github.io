-- phpMyAdmin SQL Dump
-- version 2.6.2-pl1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Nov 17, 2006 at 12:56 AM
-- Server version: 4.1.20
-- PHP Version: 4.4.4


-- --------------------------------------------------------

-- 
-- Table structure for table `b_banemails`
-- 

CREATE TABLE b_banemails (
  emailid bigint(20) NOT NULL auto_increment,
  email varchar(255) NOT NULL default '',
  PRIMARY KEY  (emailid)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `b_banemails`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `b_banip`
-- 

CREATE TABLE b_banip (
  ipid bigint(20) NOT NULL auto_increment,
  ip varchar(255) NOT NULL default '',
  PRIMARY KEY  (ipid)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `b_banip`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `b_categories`
-- 

CREATE TABLE b_categories (
  categoryid bigint(20) NOT NULL auto_increment,
  categoryname varchar(255) NOT NULL default '',
  catsort bigint(20) NOT NULL default '0',
  PRIMARY KEY  (categoryid)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `b_categories`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `b_forums`
-- 

CREATE TABLE b_forums (
  ID bigint(20) NOT NULL auto_increment,
  parentID bigint(20) NOT NULL default '0',
  name varchar(255) NOT NULL default '',
  description tinytext NOT NULL,
  numtopics bigint(20) NOT NULL default '0',
  numposts bigint(20) NOT NULL default '0',
  lastpost varchar(255) NOT NULL default '',
  sort bigint(20) NOT NULL default '0',
  lastpostuser varchar(255) NOT NULL default '',
  permission_min int(11) NOT NULL default '0',
  permission_post int(11) NOT NULL default '0',
  permission_reply int(11) NOT NULL default '0',
  lastposttime bigint(20) NOT NULL default '0',
  PRIMARY KEY  (ID)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `b_forums`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `b_pms`
-- 

CREATE TABLE b_pms (
  pmID bigint(20) NOT NULL auto_increment,
  sender bigint(20) NOT NULL default '0',
  receiver bigint(20) NOT NULL default '0',
  therealtime bigint(20) NOT NULL default '0',
  `subject` varchar(255) NOT NULL default '',
  message mediumtext NOT NULL,
  hasread int(11) NOT NULL default '0',
  vartime varchar(255) NOT NULL default '',
  PRIMARY KEY  (pmID)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `b_pms`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `b_posts`
-- 

CREATE TABLE b_posts (
  ID bigint(21) NOT NULL auto_increment,
  title varchar(60) NOT NULL default '',
  author bigint(20) NOT NULL default '0',
  telapsed bigint(21) NOT NULL default '0',
  timepost varchar(100) NOT NULL default '',
  numreplies int(10) NOT NULL default '0',
  post longtext NOT NULL,
  threadparent bigint(21) NOT NULL default '0',
  lastpost varchar(255) NOT NULL default '',
  postforum bigint(20) NOT NULL default '0',
  views bigint(20) NOT NULL default '0',
  nosmilies int(11) NOT NULL default '0',
  `value` int(11) NOT NULL default '0',
  ipaddress varchar(255) NOT NULL default '',
  locked int(11) NOT NULL default '0',
  PRIMARY KEY  (ID)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `b_posts`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `b_ranks`
-- 

CREATE TABLE b_ranks (
  rankID bigint(20) NOT NULL auto_increment,
  rankname varchar(255) NOT NULL default '',
  postsneeded bigint(20) NOT NULL default '0',
  PRIMARY KEY  (rankID)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `b_ranks`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `b_templates`
-- 

CREATE TABLE b_templates (
  templateid bigint(20) NOT NULL auto_increment,
  templatepath varchar(255) NOT NULL default '',
  PRIMARY KEY  (templateid)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `b_templates`
-- 

INSERT INTO b_templates VALUES (1, 'default');

-- --------------------------------------------------------

-- 
-- Table structure for table `b_users`
-- 

CREATE TABLE b_users (
  userID bigint(21) NOT NULL auto_increment,
  username varchar(60) NOT NULL default '',
  `password` varchar(255) NOT NULL default '',
  `status` int(20) NOT NULL default '0',
  posts bigint(20) NOT NULL default '0',
  email varchar(255) NOT NULL default '',
  validated int(11) NOT NULL default '0',
  keynode bigint(21) NOT NULL default '0',
  sig tinytext NOT NULL,
  banned varchar(255) NOT NULL default 'no',
  rank varchar(255) NOT NULL default '0',
  usepm int(11) NOT NULL default '1',
  AIM varchar(50) NOT NULL default '',
  ICQ varchar(50) NOT NULL default '',
  location varchar(255) NOT NULL default '',
  showprofile smallint(6) NOT NULL default '1',
  lastposttime bigint(20) NOT NULL default '0',
  tsgone bigint(20) NOT NULL default '0',
  oldtime bigint(20) NOT NULL default '0',
  avatar varchar(255) NOT NULL default '',
  photo varchar(255) NOT NULL default '',
  rating bigint(255) NOT NULL default '0',
  totalvotes bigint(20) NOT NULL default '0',
  votedfor longtext NOT NULL,
  rps int(11) NOT NULL default '1',
  rpsscore bigint(20) NOT NULL default '0',
  lasttime bigint(20) NOT NULL default '0',
  templateclass bigint(20) NOT NULL default '1',
  PRIMARY KEY  (userID)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `b_users`
-- 
INSERT INTO b_users (username,status) VALUES ('Guest', '0');

-- --------------------------------------------------------

-- 
-- Table structure for table `guestsonline`
-- 

CREATE TABLE guestsonline (
  guestid bigint(20) NOT NULL auto_increment,
  guestip varchar(255) NOT NULL default '',
  `time` bigint(20) NOT NULL default '0',
  PRIMARY KEY  (guestid)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `guestsonline`
-- 
