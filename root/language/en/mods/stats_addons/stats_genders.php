<?php
/**
*
* @package phpBB Statistics
* @version $Id: stats_genders.php 154 2010-06-22 01:14:59Z marc1706 $
* @copyright (c) 2009 - 2010 Marc Alexander(marc1706) www.m-a-styles.de
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @translator (c) ( Marc Alexander - http://www.m-a-styles.de ), TheUniqueTiger - Nayan Ghosh
*/

if (!defined('IN_PHPBB') || !defined('IN_STATS_MOD'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}


/*	Example:
$lang = array_merge($lang, array(	
	'STATS'								=> 'phpBB Statistics',	

));
*/

$lang = array_merge($lang, array(	
	'STATS_GENDERS'				=> 'Genders Statistics',
	'STATS_GALLERY_EXPLAIN'		=> 'This Add-On displays statistics about genders on your board',
	'USER_GENDERS'				=> 'User Genders',
	'USERS_WITH_GENDER'			=> 'Users with Gender',
	'MALE_FEMALE_RATIO'			=> 'Male/Female ratio',
	'MALE_COUNT'				=> 'Men',
	'FEMALE_COUNT'				=> 'Women',
));
?>