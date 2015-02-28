<?php
/*************************************************************************************
*                                                                                                                        
*  File:                 cls-cms.php                                                                  
*                                                                                                                        
*  Author:            vdl [Vaibhav Lanjewar]                                                               
*                                                                                                                       
*  Purpose:           A controller having business logic for CMS            
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



class Cms extends abstractDb
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
 # Get Language Listing:- 
 */
	
	public function getLanguageList()
	{
			 #:-variable declaration:  			
	   $fields_to_pass = "lang_id,lang_name,status"; 
				$condition_to_pass = " `status` = 'A' ";
				$debug_to_pass = 0;
				
				#:-
			 	$this->getRecords("mst_languages",
																				$fields_to_pass,
																				$condition_to_pass,
																				$order_by_to_pass,
																				$limit_to_pass,
																				$debug_to_pass
																			);
     
     $arrToReturn = array(); 																			
				
				 while($arrRow = $this->getRow())
					{
								$arrToReturn[] = $arrRow;
					}																				 
				 	
				 	return $arrToReturn;																							 
	}
	
	
	
	/*
	# Get CMS List:- 
	*/
	public function getCmsList($debug_to_pass=0)
	{
  
				#:-variable declaration:  			
	    $fields_to_pass    = "A.cms_id,A.lang_id,A.page_alias,A.page_title,A.page_content,A.status,B.lang_name"; 
				$condition_to_pass  = " `B`.`status` = 'A' AND A.status= 'Published' ";
				$order_by_to_pass   = " B.lang_name ASC ";
				
				#:-
			 	$this->getRecords("cms AS A INNER JOIN ".parent::SUFFIX."mst_languages AS B ON A.lang_id = B.lang_id ",
																				$fields_to_pass,
																				$condition_to_pass,
																				$order_by_to_pass,
																				$limit_to_pass,
																				$debug_to_pass
																			);
     
     $arrToReturn = array(); 																			
				
				 while($arrRow = $this->getRow())
					{
								$arrToReturn[] = $arrRow;
					}																				 
				 	
				 	return $arrToReturn;									
	}
	
	
	
	
	
	/*
	# Get CMS Page Edit Content :-
	*/
	
	public function getCmsPageDetails($fields_to_pass,$condition_to_pass,$debug_to_pass=0)
	{
  
				#:-
			 	$this->getRecords("cms AS A INNER JOIN ".parent::SUFFIX."mst_languages AS B ON A.lang_id = B.lang_id ",
																				$fields_to_pass,
																				$condition_to_pass,
																				$order_by_to_pass,
																				$limit_to_pass,
																				$debug_to_pass
																			);
     
     $arrToReturn = array(); 																			
				
				 while($arrRow = $this->getRow())
					{
								$arrToReturn[] = $arrRow;
					}																				 
				 	
				 	return $arrToReturn;									
	}
	
	
	
	/*
	#  Get Any Record From Table :- 
 	*/
		public function getAnyRecord($table_name,$fields_to_pass,$condition_to_pass,$debug_to_pass=0)
	{
  
				#:-
			 	$this->getRecords($table_name,
																				$fields_to_pass,
																				$condition_to_pass,
																				$order_by_to_pass,
																				$limit_to_pass,
																				$debug_to_pass
																			);
     
     $arrToReturn = array(); 																			
				
				 while($arrRow = $this->getRow())
					{
								$arrToReturn[] = $arrRow;
					}																				 
				 	
				 	return $arrToReturn;									
	}
	
	
	
	/*
	* Update Any Details:- 
	*/
	
	public function updateAnyRecord($table_name,$arr_fields,$conditional_string,$debug=0)
	{
		return $this->updateRecord($table_name,$arr_fields,$conditional_string,$debug);
	}
	
	
	
}
?>