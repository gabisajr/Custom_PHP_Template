<?php
/*************************************************************************************
*                                                                                                                        
*  File:            cls-role.php                                                                  
*                                                                                                                        
*  Author:          Pradip D Urunkar
*                                                                                                                       
*  Purpose:         A controller having business logic for managing user role
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
class Role extends AbstractDb
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
	*  Function will return records from Role table
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
	
	public function getRole($fields_to_pass='',$condition_to_pass='',$order_by_to_pass='',$limit_to_pass='',$debug_to_pass = 0)
	{
		$this->getRecords(
		"mst_role",
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
	*   End of getRole function
	*/
	/*
	* Update Role
	*
	*/
	
	public function updateRole($arr_fields, $conditional_string,$debug=0)
	{
		return $this->updateRecord("mst_role",$arr_fields,$conditional_string,$debug);
	}
	
	/*
	* END Update Role 
	*
	*/
	
	/*
	* Add Role
	*
	*/
	public function insertRole($arr_fields,$debug=0)
	{
		return $this->insertRecord("mst_role",$arr_fields,$debug);
	}
	
	/*
	* END Add Role
	*
	*/
	
	/*
	* Delete Role
	*
	*/
	
	public function deleteRole($arr_fields,$debug=0)
	{
		return $this->deleteRecord("mst_role",$arr_fields,$debug);
	}
	
	/*
	* End Delete Role
	*
	*/
	
	/*
	* Get All Priviliges of site
	*
	*/
	
	public function getAllPrivileges($fields_to_pass='',$condition_to_pass='',$order_by_to_pass='',$limit_to_pass='',$debug_to_pass = 0)
	{
		$this->getRecords(
		"mst_privileges",
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
	* End of getAllPrivileges
	*
	*/
	
	/*
	* Function to get role privileges
	*
	*/
	public function getRolePrivileges($fields_to_pass='',$condition_to_pass='',$order_by_to_pass='',$limit_to_pass='',$debug_to_pass = 0)
	{
		$this->getRecords(
		"trans_role_privileges",
		$fields_to_pass,
		$condition_to_pass,
		$order_by_to_pass,
		$limit_to_pass,
		$debug_to_pass
		);
		$arr_to_return=array();
		while($arrRow=$this->getRow())
		{
			$arr_to_return[]=$arrRow['privilege_id'];
		}
		return $arr_to_return;
	}
	/*
	* end getting role privileges
	*
	*/
	
	/*
	* Add role privileges
	*
	*/
	public function insertRolePrivileges($arr_fields,$debug=0)
	{
		return $this->insertRecord("trans_role_privileges",$arr_fields,$debug);
	}
	
	/*
	* END Add AdminDetails
	*
	*/
	
	/*
	* Delete Admin priviliges
	*
	*/
	
	public function deleteRolePrivileges($arr_fields,$debug=0)
	{
		return $this->deleteRecord("trans_role_privileges",$arr_fields,$debug);
	}
	
	
	/*
	* End Delete Admin priviliges
	*
	*/
	
	
}
?>