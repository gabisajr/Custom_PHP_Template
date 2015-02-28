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
            }
        });
        if(a==1)
        {
            jQuery('input[name=checkall]').attr('checked', true);
        }
    });
});

function deleteconfirm()
{
    var del_num=0;
    jQuery('.checked').each(function(){
        del_num=1; 
    });
    if(!del_num){
        alert("Please select at least one record to delete.");
        return false;
    }else{
        var status=confirm("Do you really want to delete these selected record?");
        if(status)
        {
            jQuery('#frm_table_list').submit();            
        }
        else
        {
            return false;
        }
    }
}