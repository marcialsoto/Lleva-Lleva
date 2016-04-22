<div class="commenting">
	<?php
		global $post; 
		$num_comments = get_comments_number(); // get_comments_number returns only a numeric value
		if ( comments_open() ) {
			if ( $num_comments == 0 ) {
				$comments = __('');
			} else {
				$comments = ' ('.$num_comments.')';
			}
			$write_comments = '<a href="' . get_comments_link() .'"><i class="fa fa-comment" aria-hidden="true"></i> <span class="hidden-xs">Comenta</span>'. $comments.'</a>';
		} else {
			$write_comments =  __('Comments are off for this post.');
		}
		print_r($write_comments);
	?>
</div>