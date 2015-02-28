<?php
/*************************************************************************************
*                                                                                                                        
*  File:                 cls-abstract-db.php                                                                  
*                                                                                                                        
*  Author:            Somnath A Gunjal                                                                  
*                                                                                                                       
*  Purpose:           An abstract class holding all necessary db connections            
*                          and db operations for "MySQL" db                                          
*
*  Organization:    Panacea Infotech Pvt. Ltd.
*
*************************************************************************************/

abstract class AbstractDb
{
    // Definitions
    const HOST = 'localhost';
    const USER = 'root';
    const PASS = '';
    const DB = 'p794';
    const SUFFIX = 'p794_';

    protected   $mysql;
	public $row,$result;
	
	/*
	* Constructor to perform connection on database
	*/

    public function __construct()
    {
        try
        {
            $this->mysql = mysql_connect(self::HOST,self::USER,self::PASS);
            mysql_select_db(self::DB);
			$this->result=NULL;
		}
        catch (Exception $e)
        {
            echo "Caught exception: " . $e->getMessage() . "\n";
            exit;
        }
		
		// verify the mysql connection is correct
        if (!$this->mysql)
        {
            // send notification to respective dev
			// dev email
			$dev_email="shruti@panaceatek.com";
			$email_subject="Error in database connection";
			$email_message="Database error in PIPL Code Lib => ".mysql_error();
            mail($dev_email,$email_subject,$email_message);
			
			//stop user to navogate further
			$user_notification="There has been a technical error the webmaster has been informed, please try again shortly.";
			die($user_notification);
		}
		return true;
	}
	
	/*
	* END getRow function
	*/
	
	/*
	*  Function will return field content
	*  Input: Name of table column
	*  Output: Value of respective column
	*/
	
	public function getField($field)
	{
		return $this->row[$field];
	}
	
	/*
	* END getField function
	*/
	
	/*
	*  A global function to perform database query
	*  Input: Standard MySQL query
	*  Output: On success "Resource" for query otherwise "False"
	*/

	protected function query($sql)
	{
		/*
		*  These two lines will allocate multilangual support for query results
		*
		*/
		mysql_query("SET CHARACTER SET utf8");
		mysql_query("SET SESSION collation_connection ='utf8_general_ci'") or die (mysql_error());
		
		/*
		*  Below line will fire a query on database and returns resource on success or "false" on 
		*  Failure
		*/
		$resource_to_return=mysql_query($sql);
		
		return $resource_to_return;	
	}
	
	/*
	* END query function
	*/
	
	/*
	*  A standard function to return last insert id from mysql connection. Will require the
	*  The insert query before calling this function
	*  Input: No Input
	*  Output: Last Insert ID
	*/
	
	public function getLastID()
	{
		return mysql_insert_id($this->mysql);
	}
	
	/*
	* END getLastID function
	*/
	
	/*
	*
	*   A function to fetch result object from current db cursor and set cursor to
	*   next available record
	*   Input: None
	*   Output: On success associative array on failure false
	*   
	*/
	
	public function getRow()
	{ 

	 	while($this->row = mysql_fetch_assoc($this->result))
		{
			 return $this->row;
		}
		 return false;   
	}
	/*
	*   End of getRow function
	*/
	
	/*
	* A standard function to fetch results from database tables
	* Input: 
	*    1. $table -
	*        Type:               String
	*        Description:     This will append table name (s) to query. In case of inner join
	*                               respective tables can be passed appending SUFFIX in the query itself
	*    2. $fields - 
	*        Type:              String / Array (Optional)
	*        Description:    Fields to fetch from table. If not passed, wildcard will be use
	*
	*     3. $condition -
	*         Type:              String  (Optional)
	*         Description:    If passed condition will append to sql query
	*
	*      4. $order_by - 
	*          Type:             String (Optional)
	*          Description:   If passed, order by clause will append to query
	*
	*      5. $limit -
	*          Type:             String (Optional)
	*          Description:    If passed, limit will apend to query
	*
	*      6. $debug -
	*          Type:               Integer (Optional)
	*          Description:     If passed as "1", the will print the query string
	*
	* Output:
	*
	*  Will initialize result property of child class
	*/

    public function getRecords($table,$fields='', $condition='', $order_by='',$limit='',$debug = 0)
    {
        try
		{
              
			  $str_sql = "SELECT ";
			  
			  if(is_array($fields))
			  {
				  $str_sql.="`".implode("`,`",$fields)."`";
			  }
			  elseif($fields!="")
			  {
				  $str_sql .= $fields;
			  }
			  else
			  {
				  $str_sql .= "*";
			  }
			  
			  $str_sql .= " FROM ";
			  
			  $str_sql .= self::SUFFIX.$table;
			  
			  if($condition!="")
			  $str_sql .= " WHERE ".$condition;
			  
			  
			  if($order_by!="")
			  $str_sql .= " ORDER BY ".$order_by;
			  
			  if($limit!="")
			  $str_sql .= " LIMIT ".$limit;
			  
             
            if ($debug) {
                die($str_sql);
            }
            
			$this->result = $this->query($str_sql);
			
			
        } catch (Exception $e)
		{
			echo "Caught exception:" . $e->getMessage() . "\n";
            exit;
        }
    }
	/*
	* END getRecords function
	*/
	
	/*
	* A standard function to update record (s) on database table
	* Input: 
	*    1. $table -
	*        Type:               String
	*        Description:     This will append table name (s) to query. 
	*                               
	*    2. $fields - 
	*        Type:              Array
	*        Description:    Fields to update with values from table. 
	*
	*     3. $condition -
	*         Type:              String
	*         Description:    Condition to match
	*
	*      4. $debug -
	*          Type:               Integer (Optional)
	*          Description:     If passed as "1", the will print the query string
	*
	* Output:
	*
	*  Will return true or false
	*/
	
	public function updateRecord($table,$fields,$condition,$debug=0)
	{
        $str_sql="Update `".self::SUFFIX."".$table."` SET ";
        
		if(is_array($fields))
		{
		
		    $currLoc=0;
			
			foreach($fields as $k=>$v)
			{
		
				if($currLoc>0) $str_sql.=",";
				
				//$str_sql.=" `".$k."`='".mysql_escape_string($v)."'";
				$str_sql.=" `".$k."`='".$v."'";
				
				$currLoc++;
				
			}
		
		}
		else
		{
			$str_sql.=$fields;
		}
		
		$str_sql.=" WHERE ".$condition;
		
		if($debug)
		{
			die($str_sql);
		}
		
		return $this->query($str_sql);
	}
	
	/*
	*
	*  END of updateRecord function
	*
	*/
	
	/*
	* A standard function to insert record on database table
	* Input: 
	*    1. $table -
	*        Type:               String
	*        Description:     This will append table name (s) to query. 
	*                               
	*    2. $fields - 
	*        Type:              Array
	*        Description:    Fields to update with values from table. 
	*
	*      3. $debug -
	*          Type:               Integer (Optional)
	*          Description:     If passed as "1", the will print the query string
	*
	* Output:
	*
	*  Will return true or false
	*/
	
	public function insertRecord($table,$fields,$condition,$debug=0)
	{
        $str_sql="INSERT INTO `".self::SUFFIX."".$table."` ";
        
		if(is_array($fields))
		{
			$str_field_names="`".implode("`,`",array_keys($fields))."`";
			$str_field_values="'".implode("','",array_values($fields))."'";
			$str_sql.="(".$str_field_names.") VALUES(".$str_field_values.")";
		}
		else
		{
			$str_sql.=$fields;
		}
		
		
		if($debug)
		{
			die($str_sql);
		}
		 $this->query($str_sql);
		return mysql_insert_id($this->mysql);
	}
	
	/*
	*
	*  END of insertRecord function
	*
	*/
	
	/*
	* A standard function to delete record (s) from database table
	* Input: 
	*    1. $table -
	*        Type:               String
	*        Description:     This will append table name (s) to query. 
	*                               
	*    2. $condition - 
	*        Type:              Array
	*        Description:    Fields to update with values from table. 
	*
	*     3. $condition -
	*         Type:              String
	*         Description:    Condition to match
	*
	*      4. $debug -
	*          Type:               Integer (Optional)
	*          Description:     If passed as "1", the will print the query string
	*
	* Output:
	*
	*  Will return true or false
	*/
	
	public function deleteRecord($table,$condition,$debug=0)
	{
        $str_sql="DELETE FROM `".self::SUFFIX."".$table."` ";
        
		if(is_array($condition))
		{
			$str_condition="";
			
			foreach($condition as $k=>$v)
			{
				if($str_condition!="") $str_condition.=" and ";
				$str_condition.="`".$k."`='".mysql_real_escape_string($v)."'";
			}
			$str_sql.=" WHERE ".$str_condition;
		}
		else
		{
			$str_sql.=" WHERE ".$condition;
		}
		
		
		if($debug)
		{
			die($str_sql);
		}
		
		return $this->query($str_sql);
	}
	
	/*
	*
	*  END of deleteRecord function
	*
	*/
	
	/*
	*  Function will return total number of records from last fetched select query
	*  Input: None
	*  Output: integer of total count of records
	*/
	
	public function getNumOfRows()
	{
		$num=mysql_num_rows($this->result);
		return $num;
	}
	/*
	*   End of getNumOfRows function
	*/
	
	
}
/*
* End abstractDb class
*/
?>