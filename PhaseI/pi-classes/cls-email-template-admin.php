<?php
/*************************************************************************************
*                                                                                                                        
*  File:                 cls-email-template-admin.php                                                                  
*                                                                                                                        
*  Author:               Anuj Tyagi                                                               
*                                                                                                                       
*  Purpose:               A controller having business logic for email template functionality for admin side.           
*
*  Organization:          Panacea Infotech Pvt. Ltd.
*
*************************************************************************************/

/*
*  
*  Include db connection abstract class once
*
*/

include_once(dirname(__FILE__)."/cls-abstract-db.php");

class EmailTemplate extends abstractDb
{
	// Constructor to perform connection on database using extended contructor
	
	public function __construct()
	{
			parent::__construct();
			return true;
	}
	
	/*
	*   End of constructor
	*/
	
	/*
	*  Function will return records from Email template table
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
	
        // getting email templates here this is common function to select records from email template
	public function getAllEmailTemplates($fields_to_pass='',$condition_to_pass='',$order_by_to_pass='',$limit_to_pass='',$debug_to_pass = 0)
	{
		$this->getRecords(
		"mst_email_templates as email_template inner join ".parent::SUFFIX."mst_languages as lang on email_template.lang_id=lang.lang_id ",
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
        // getting email template details by id here this is common function to select records from email template by condition on no joins to other table
	public function getEmailTemplateDetails($fields_to_pass='',$condition_to_pass='',$order_by_to_pass='',$limit_to_pass='',$debug_to_pass = 0)
	{
		$this->getRecords(
		"mst_email_templates ",
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
	
	// updating email template details 
	public function updateEmailTemplate($arr_fields, $conditional_string,$debug=0)
	{
            	return $this->updateRecord("mst_email_templates",$arr_fields,$conditional_string,$debug);
	}
	
	// updating email template details end
	
	
	
}
?>