
		(function(){

		  var empty_video = jQuery('#tab-video').html();
		  var empty_video = jQuery.trim(empty_video);
		  
		  if( empty_video === ''){
		    jQuery('.video_tab').addClass('hide');
		  }

		  var empty_review = jQuery('#tab-reviews').html();
		  var empty_review = jQuery.trim(empty_review);

		  if( empty_review === ''){
		    jQuery('.reviews_tab').addClass('hide');
		  }

		})(jQuery);
