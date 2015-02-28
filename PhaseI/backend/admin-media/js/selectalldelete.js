// JavaScript Document

jQuery(function(){    
    // add multiple select / deselect functionality
    jQuery("#checkall").change(function () {
        if (jQuery('#checkall').attr('checked')) {
            jQuery('.case').each(function(){
                $(this).attr("checked",true);
                $(this).parent('span').addClass('checked');
            });
        }
        else
        {
            jQuery('.case').each(function(){
                $(this).attr("checked",false);
                $(this).parent('span').removeClass('checked');
            });
        }
    });
    jQuery(".case").change(function () {
        var a=1;
        jQuery('.case').each(function(){
            if (!this.checked) {
                a=0;  // if one of the is listed chekcbox is not  cheacked
                jQuery('input[name=checkall]').attr('checked', false);
				jQuery('input[name=checkall]').parent().removeClass('checked');
            }
        });
        if(a==1)
        {
            jQuery('input[name=checkall]').attr('checked', true);
			jQuery('input[name=checkall]').parent().addClass('checked');
        }
    });
});

function deleteconfirm()
{
    var del_num=0;
    jQuery('.case').each(function(){
        del_num=1; 
    });
    if(!del_num){
        alert("Please select atleast one record to delete");
		return false;
    }else{
        var status=confirm("Do you really want to delete?");
        if(status)
        {
            /* jQuery('#frmAdminUsers').submit();            */
			return true;
        }
        else
        {
            return false;
        }
    }
}