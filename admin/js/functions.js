$(document).ready(function()
{
    $(".delete").click(function(){
    	var action = "delete.php";
    	var id = $(this).attr('id');
        var type = $(this).data('type');
        $(this).parent().parent().css("display","none");
        
    	var form_data =
    	{
    		is_ajax: 1,
    		id: id,
            type: type
    	};
    	$.ajax(
    	{
    		dataType: 'html',
    		type: "POST",
    		url: action,
    		data: form_data,
    		success: function(response)
    		{
    			$('#message').html(response);
    			$('#message').css("display", "block");
    		}
    	});
    });
    
    $('.text-box').change(function(){
        var url = $(this).val();
        var needle = '://';
        var contains = (url.indexOf(needle) > -1);
        if(contains == true)
        {
            var exploded = url.split('://');
            var url_clean = exploded[1];
            $(this).val(url_clean);  
        }
    });
});