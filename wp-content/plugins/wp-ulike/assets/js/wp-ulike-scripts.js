/**
 * WP ULike Plugin 2.4
 *
 * http://wordpress.org/plugins/wp-ulike/
 * https://github.com/Alimir/wp-ulike
 *
 */
jQuery(document).ready(function($) {
	
	//start WP ULike process
	$(document).on('click', '.wp_ulike_btn',function(e) {
		var type 	= $(this).data('ulike-type');
		var status 	= $(this).data('ulike-status');
		var id 		= $(this).data('ulike-id');
		var uclass 	= $(this).data('ulike-class');
		var p_class = $(e.target).closest( "a" ).parent();
		
		if (id != '') {
			//start AJAX
			jQuery.ajax({
			  type:'POST',
			  url: ulike_obj.ajaxurl,
			  data:{
				action:'wp_ulike_process',
				id: id,
				type: type
			  },
			  beforeSend:function(){
				p_class.html('<a class="loading"></a><span class="count-box">...</span>');
			  },			  
			  success: function(data) {
				if(status == 1){
				  if(ulike_obj.button_type == 'image'){
				    p_class.html("<a data-ulike-id='"+id+"' data-ulike-type='"+type+"' data-ulike-status='2' class='wp_ulike_btn image-unlike'></a><span class='count-box'>"+data+"</span>");
				  } else {
				    p_class.html("<a data-ulike-id='"+id+"' data-ulike-type='"+type+"' data-ulike-status='2' class='wp_ulike_btn text'>" + ulike_obj.button_text_u + "</a><span class='count-box'>"+data+"</span>");
				  }				  
				}
				if(status == 2){
				  if(ulike_obj.button_type == 'image'){
				    p_class.html("<a data-ulike-id='"+id+"' data-ulike-type='"+type+"' data-ulike-status='1' class='wp_ulike_btn image'></a><span class='count-box'>"+data+"</span>");
				  } else {
				    p_class.html("<a data-ulike-id='"+id+"' data-ulike-type='"+type+"' data-ulike-status='1' class='wp_ulike_btn text'>" + ulike_obj.button_text + "</a><span class='count-box'>"+data+"</span>");
				  }
				}
				if(status == 3){
				  if(ulike_obj.button_type == 'image'){
				    p_class.html("<a class='image-unlike user-tooltip' title='Already Voted'></a><span class='count-box'>"+data+"</span>");
				  } else {
				    p_class.html("<a class='text user-tooltip' title='Already Voted'>" + ulike_obj.button_text_u + "</a><span class='count-box'>"+data+"</span>");
				  }
				}
				if(status == 4){
				  if(ulike_obj.button_type == 'image'){
					p_class.html("<a class='image' title='You Liked This'></a><span class='count-box'>"+data+"</span>");	
				  }
				  else{
					p_class.html("<a class='text' title='You Liked This'>" + ulike_obj.button_text + "</a><span class='count-box'>"+data+"</span>");	
				  }
				}
			  }
			});
			//End Ajax
		}
	});
});