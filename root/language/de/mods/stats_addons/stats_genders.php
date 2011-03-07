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
	'STATS_GENDERS'				=> 'Geschlechter Statistiken',
	'STATS_GALLERY_EXPLAIN'		=> 'Diese Add-On informiert dich über die Geschlechter ihrere Forennutzer',
	'USER_GENDERS'				=> 'Benutzer Geschlechter',
	'USERS_WITH_GENDER'			=> 'Benutzer mit Geschlecht',
	'MALE_FEMALE_RATIO'			=> 'Verhältnis männlich/weiblich',
	'MALE_COUNT'				=> 'Männer',
	'FEMALE_COUNT'				=> 'Frauen',
));
?>