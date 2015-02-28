<?php
/*************************************************************************************
*                                                                                                                        
*  File:              cls-global-settings.php                                                                  
*                                                                                                                        
*  Author:            Pradip D Urunkar
*                                                                                                                       
*  Purpose:           A controller having business logic for all global funcation required in site for admin area
*
*  Organization:    Panacea Infotech Pvt. Ltd.
*
*************************************************************************************/
/*
*  
*  Include db connection abstract class once
*
*/
include_once(dirname(__FILE__)."/cls-abstract-db.php");
class GlobalSettings extends AbstractDb
{
	/*
	*  Constructor to perform connection on database using extended contructor
	*/
	public function __construct()
	{
		parent::__construct();
		return true;
	}
	
	/*
	*   End of constructor
	*/
	
	/*
	*  Function will return records from mst_global_settings table and  trans_global_settings table
	*  Input:
	*    1. $fields - 
	*        Type:              String / Array (Optional)
	*        Description:    Fields to fetch from table. If not passed, wildcard will be use
	*
	*     2. $condition -
	*         Type:              String  (Optional)
	*         Description:    If passed condition will append to sql query
	*
	*      3. $order_by - 
	*          Type:             String (Optional)
	*          Description:   If passed, order by clause will append to query
	*
	*      4. $limit -
	*          Type:             String (Optional)
	*          Description:    If passed, limit will apend to query
	*
	*      5. $debug -
	*          Type:               Integer (Optional)
	*          Description:     If passed as "1", the will print the query string
	*
	*  Output: associative array of records
	*
	*/
	
	public function getGlobalSettings($fields_to_pass='',$condition_to_pass='',$order_by_to_pass='',$limit_to_pass='',$debug_to_pass = 0)
	{
		$this->getRecords(
		"mst_global_settings as mst_global left join ".parent::SUFFIX."trans_global_settings as trans_global on mst_global.global_name_id=trans_global.global_name_id",
		$fields_to_pass,
		$condition_to_pass,
		$order_by_to_pass,
		$limit_to_pass,
		$debug_to_pass
		);
		$arr_to_return=array();
		while($arr_row=$this->getRow())
		{
			$arr_to_return[]=$arr_row;
		}
		return $arr_to_return;
	}
	/*
	*   End of getGlobalSettings function
	*/
	/*
	* Update GlobalSettings into transaction table of global settings
	*
	*/
	
	public function updateGlobalSettings($arr_fields, $conditional_string,$debug=0)
	{
		return $this->updateRecord("trans_global_settings",$arr_fields,$conditional_string,$debug);
	}
	
	/*
	* END Update GlobalSettings
	*
	*/
	
	
	/*
	* function to get all the active languages from the database.
	*
	*/
	public function getActiveLanguages($fields_to_pass='',$condition_to_pass='',$order_by_to_pass='',$limit_to_pass='',$debug_to_pass = 0)
	{
		$this->getRecords(
		"mst_languages",
		$fields_to_pass,
		$condition_to_pass,
		$order_by_to_pass,
		$limit_to_pass,
		$debug_to_pass
		);
		$arr_to_return=array();
		while($arr_row=$this->getRow())
		{
			$arr_to_return[]=$arr_row;
		}
		return $arr_to_return;
	}
	
	/*
	* getActiveLanguages end here
	*
	*/
}
?>