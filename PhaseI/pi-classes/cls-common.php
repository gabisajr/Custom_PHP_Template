<?php
/* * ***********************************************************************************
 *                                                                                                                        
 *  File:            cls-common.php                                                                  
 *                                                                                                                        
 *  Author:          Arvind Kumar
 *                                                                                                                       
 *  Purpose:         A controller having business logic for Common things            
 *
 *  Organization:    Panacea Infotech Pvt. Ltd.
 *
 * *********************************************************************************** */
/*
 *  
 *  Include db connection abstract class once
 *
 */
include_once(dirname(__FILE__) . "/cls-abstract-db.php");
class Common extends abstractDb {
    /*
     *  Constructor to perform connection on database using extended contructor
     */
    public function __construct() {
        parent::__construct();
        return true;
    }
    /*
     *   End of constructor
     */


    /*
     * Common email function for send the mail to user
     * 
     * Input:
     *    1. $to - 
     *        Type:              String (Required)
     *        Description:    Send the email to specific user's email address
     *
     *     2. $var_array -
     *         Type:              Array(Required)
     *         Description:    Array type variables to replace the dynamic varialbles of email template content
     *
     *      3. $template_title - 
     *          Type:             String (Required)
     *          Description:   Fetch email template content from mst_email_templates table 
     *
     *      4. $lang_id -
     *          Type:             Number (Required)
     *          Description:    To get specific email template with language
     *
     *      5. $debug -
     *          Type:               Integer (Optional)
     *          Description:     If passed as "1", the will print the query string
     *
     *  Output: associative array of records 
     * 
     */

    public function commonEmail($to, $var_array, $template_title, $lang_id, $debug = 0) {
	
		#it may be changes according to language configuration
		$lang_id=17;
        $global = $this->getGlobalSettingsArray("mst_global.*,trans_global.*", "trans_global.lang_id='".$lang_id."'");
        $fields_to_pass = array('email_template_id`,`email_template_title`,`email_template_subject`,`email_template_content');
        $condition_to_pass = " `email_template_title`='" . $template_title . "' and lang_id='" . $lang_id . "'";
        $arr_email_template_cnt = $this->getEmailTemplate($fields_to_pass, $condition_to_pass, $order_by_to_pass = '', $limit_to_pass = '', $debug = 0);
		
	    foreach ($var_array as $k => $v) {
            $arr_email_template_cnt[0]['email_template_content'] = str_replace($k, $v, $arr_email_template_cnt[0]['email_template_content']);
        }
		$message = $arr_email_template_cnt[0]['email_template_content'];
        $subject = $arr_email_template_cnt[0]['email_template_subject'];
		$headers = 'MIME-Version: 1.0' . "\r\n";
        $headers = 'From: ' . $global['site_title'] . "(".$global['site_title'].")\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$mail = mail($to, $subject, $message, $headers);
        return $mail;
    }

    /*
     *   End of commonEmail function
     */


    /*
     *  Function will return records from email template table
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

    public function getEmailTemplate($fields_to_pass = '', $condition_to_pass = '', $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0) {
        $this->getRecords(
                "mst_email_templates", $fields_to_pass, $condition_to_pass, $order_by_to_pass, $limit_to_pass, $debug_to_pass
        );

        $arr_to_return = array();

        while ($arrRow = $this->getRow()) {
            $arr_to_return[] = $arrRow;
        }

        return $arr_to_return;
    }

    /*
     *   End of getEmailTemplate function
     */


    /*
     * Get global things 
     * 
     * 
     */
    public function getGlobalSettingsArray($fields_to_pass = '', $condition_to_pass = '', $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0) {
        $this->getRecords(
                "mst_global_settings as mst_global left join ".parent::SUFFIX."trans_global_settings as trans_global on mst_global.global_name_id=trans_global.global_name_id",$fields_to_pass, $condition_to_pass,$order_by_to_pass, $limit_to_pass, $debug_to_pass);
		
        $arr_to_return = array();
        while ($arrRow = $this->getRow()) {
            $arr_to_return[] = $arrRow;
        }
        foreach ($arr_to_return as $row) {
            $global[$row['name']] = $row['value'];
        }
        return $global;
    }

}

?>