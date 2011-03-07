<?php
/**
*
* @package phpBB Statistics
* @version $Id: stats_genders.php 154 2010-06-22 01:14:59Z marc1706 $
* @copyright (c) 2009 Marc Alexander(marc1706) www.m-a-styles.de
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*/


/**
* @ignore
*/
if (!defined('IN_PHPBB') || !defined('IN_STATS_MOD'))
{
	exit;
}

/**
* @package phpBB Statistics - Genders Add-On
*/
class stats_genders
{    
	/**
	* module filename
	* file must be in "statistics/addons/"
	*/
	var $module_file = 'stats_genders';
	
	/**
	* module language name
	* please choose a distinct name, i.e. 'STATS_...'
	* $module_name always has to be $module_file in capital letters
	*/
	var $module_name = 'STATS_GENDERS';
	
	/**
	* module-language file
	* file must be in "language/{$user->lang}/mods/stats/addons/"
	*/
	var $template_file = 'stats_genders';
	
	/**
	* set this to false if you do not need any acp settings
	*/
	var $load_acp_settings = false;
	
	/**
	* you can add some vars here
	*/
	var $u_action;
	
	/**
	* add-on functions below
	*/
	function load_stats()
	{
		global $config, $db, $template, $stats_config;
		global $phpbb_root_path, $phpEx;
		
		$gender_counts = array(GENDER_M => 0, GENDER_F => 0);
		$sql = 'SELECT user_gender FROM ' . USERS_TABLE . '
					WHERE user_gender != ' . GENDER_X;
		$result = $db->sql_query($sql);
		while ($row = $db->sql_fetchrow($result))
		{
			if(isset($gender_counts[$row['user_gender']]))
			{
				$gender_counts[$row['user_gender']]++;
			}
			else
			{
				$gender_counts[$row['user_gender']] = 1;
			}
		}
		$db->sql_freeresult($result);

		$total_users_with_gender = array_sum($gender_counts);
		if ($total_users_with_gender)
		{
			$template->assign_vars(array(
				'USERS_WITH_GENDER'        => $total_users_with_gender . ' / ' . $config['num_users'],
				'MALE_COUNT'            => (int) $gender_counts[GENDER_M],
				'FEMALE_COUNT'            => (int) $gender_counts[GENDER_F],
				'MALE_FEMALE_RATIO'        => ($gender_counts[GENDER_F] > 0) ? number_format($gender_counts[GENDER_M] / $gender_counts[GENDER_F], 1) . ' : 1' : $gender_counts[GENDER_M] . ' : 0',
			));
		} 
	}
	
	/**
	* acp frontend for the add-on
	* put the function in a comment or delete it if you don't need an acp frontend
	*/
	function load_acp()
	{
		$display_vars = array(
					'title' => 'STATS_TEST',
					'vars' => array(
						'legend1'                             => 'STATS_TEST',
						'stats_test'                        => array('lang' => 'STATS_TEST_SHOW'  , 'validate' => 'bool'  , 'type' => 'radio:yes_no'  , 'explain' => true),
					)
				);
		
		return $display_vars;
	}
	
	
	/**
	* API functions
	*/
	function install()
	{
		global $db;
		
		$sql = 'SELECT addon_id AS addon_id FROM ' . STATS_ADDONS_TABLE . ' ORDER BY addon_id DESC';
		$result = $db->sql_query_limit($sql, 1);
		$id = (int) $db->sql_fetchfield('addon_id');
		$db->sql_freeresult($result);
	
		set_stats_addon($this->module_file, 1);
		
		$sql = 'UPDATE ' . STATS_ADDONS_TABLE . '
				SET addon_id = ' . ($id + 1) . "
				WHERE addon_classname = '" . $this->module_file . "'";
		$result = $db->sql_query($sql);
		$db->sql_freeresult($result);
	}
	
	function uninstall()
	{
		global $db;
		
		$del_addon = $this->module_file;
		
		$sql = 'DELETE FROM ' . STATS_ADDONS_TABLE . "
			WHERE addon_classname = '" . $del_addon . "'";
		return $db->sql_query($sql);
	}
}
?>