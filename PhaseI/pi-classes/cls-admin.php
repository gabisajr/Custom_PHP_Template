<?php
/*************************************************************************************
*                                                                                                                        
*  File:            cls-admin.php                                                                  
*                                                                                                                        
*  Author:          Pradip D Urunkar
*                                                                                                                       
*  Purpose:         A controller having business logic for Administration Task Like login, forgot password, add admin          
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
class Admin extends AbstractDb
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
	*  Function will return records from admin_details table
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
	
	public function getAdminDetails($fields_to_pass='',$condition_to_pass='',$order_by_to_pass='',$limit_to_pass='',$debug_to_pass = 0)
	{
		$this->getRecords(
		"mst_users u left join ".parent::SUFFIX."mst_role r on u.role_id=r.role_id",
		$fields_to_pass,
		$condition_to_pass,
		$order_by_to_pass,
		$limit_to_pass,
		$debug_to_pass
		);
		$arr_to_return=array();
		while($arrRow=$this->getRow())
		{
			$arr_to_return[]=$arrRow;
		}
		return $arr_to_return;
	}
	/*
	*   End of getAdminDetails function
	*/
	/*
	* Update AdminDetails
	*
	*/
	
	public function updateAdminDetails($arr_fields, $conditional_string,$debug=0)
	{
		return $this->updateRecord("mst_users",$arr_fields,$conditional_string,$debug);
	}
	
	/*
	* END Update AdminDetails
	*
	*/
	
	/*
	* Add AdminDetails
	*
	*/
	public function insertAdminDetails($arr_fields,$debug=0)
	{
		return $this->insertRecord("mst_users",$arr_fields,$debug);
	}
	
	/*
	* END Add AdminDetails
	*/
	
	/*
	*Delete AdminDetails
	*/
	
	public function deleteAdminDetails($arr_fields,$debug=0)
	{
		return $this->deleteRecord("mst_users",$arr_fields,$debug);
	}
	/*
	* End Delete AdminDetails
	*
	*/
}
?>