function popup(div)
{
	op_div = div;
	$(op_div).fadeIn(300);
    
    var popMargTop = ($(op_div).height() + 24) / 2;
	var popMargLeft = ($(op_div).width() + 24) / 2;

	$(op_div).css(
	{
		'margin-top': -popMargTop,
		'margin-left': -popMargLeft
	});

	$('body').append('<div id="popup_cover"></div>');
	$('#popup_cover').fadeIn(300);

	return false;
}

$(document).ready( function() {   
    $('.tabs .box').click(function(){
        $(this).addClass("selected");
        $(this).siblings().removeClass('selected');
        var tab = $(this).data("tab");
        $("#"+tab).css("visibility","visible");
        $(".map").not("#"+tab).css("visibility","hidden");
    });
    
    $('.tabs_listing .box').click(function(){
        $(this).addClass("selected");
        $(this).siblings().removeClass('selected');
        var tab = $(this).data("tab");
        $("#"+tab).show();
        $(".map").not("#"+tab).hide();
    });
    
    $(".image_holder").hover( function() {
        $(this).children('.image_cover').show(); 
    }, function() {
        $(this).children('.image_cover').hide();
    }
    );
    
    $(".image_cover").click(function(){
        var big_image = $(this).next();
		popup(big_image);   
    });
    
    $(".trailer_link, .slider_play_button, .small_play_button").click(function(){
        var popup_video = $(this).parent().siblings('.big_image_popup');
		popup(popup_video);   
    });
    
   	$(document).on('click', '.popupBoxClose, #popup_cover', function(event){
		$(".big_image_popup").fadeOut(300);
		$('#popup_cover').remove();
        var video = $(this).parent().siblings('.video_player').attr("src");
        $(this).parent().siblings(".video_player").attr("src"," ");
        $(this).parent().siblings(".video_player").attr("src",video);

	});
    
   	$(document).on('mouseenter', '.cmp_image_holder', function(){
		$(this).children('.cmp_image_cover').show();
	});

	$(document).on('mouseleave', '.cmp_image_holder', function(){
		$(this).children('.cmp_image_cover').hide();
	});
      
    $('.tv_box').click(function(){
        var youtube_id_data = $(this).data("youtube");
        var youtube_url = '//www.youtube.com/embed/';
        var youtube_embed_url = youtube_url.concat(youtube_id_data);
        $(this).parent().parent().parent().siblings('.video_holder').children('.iframe').attr("src",youtube_embed_url);
    });

});