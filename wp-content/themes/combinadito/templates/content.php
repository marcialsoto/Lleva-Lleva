<?php 
	//ACF 
	$gif__ID = get_field('gif__ID'); 
?>
<article <?php post_class(); ?>>
	<header class="entry-meta">
		<?php get_template_part('templates/entry-meta'); ?>
	</header>

	<section class="entry-gif">
		<?php if ($gif__ID) {?>
			<figure>

			<img class="lazy img-responsive" data-src="<?php echo 'http://i.giphy.com/'.$gif__ID.'.gif'; ?>" src="<?php echo 'http://i.giphy.com/'.$gif__ID.'.gif'; ?>" style="background-image: url(<?php echo 'https://media.giphy.com/media/'.$gif__ID.'/giphy_s.gif'; ?>); background-size: cover;
			    background-repeat: no-repeat; min-width:100%"/>
			 </figure>
		<?php } ?>	
	</section>

	<header>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="hidden-xs">
			<?php the_content(); ?>
		</div>
	</header> 		

	<footer>
		<div class="content-footer">
			<div class="spreading">
				<ul class="list-inline">
					<li><?php if(function_exists('wp_ulike')) wp_ulike('get'); ?></li>
					<li><?php get_template_part('templates/commenting'); ?></li>
					<li><?php get_template_part('templates/sharing'); ?></li>
					<li><?php get_template_part('templates/downloading'); ?></li>
				</ul>
			</div>
			<div class="sourcing">
				<a id="source-<?php echo get_the_ID(); ?>" type="button" class="cbSource"><i class="fa fa-sticky-note-o"></i> <span class="hidden-xs">Fuente</span></a>
			</div>
			<section class="hidden source" style="clear:both">
				<div class="source__personas">
					<?php
						$posttags = get_the_tags();
						if ($posttags) {
						echo '<h4>Personajes en este post</h4>';
						echo '<ul class="list-inline">';
						  foreach($posttags as $tag) {
						  	$term = get_term( $tag->term_id, 'post_tag' );
						  	$persona__pic = get_field('persona__pic', $term);
						  	$template_directory = get_template_directory_uri();
						    echo '<li>';
						    		echo '<a data-toggle="tooltip" data-placement="top" title="'.$tag->name.'" href="'.get_tag_link($tag->term_id).'">';
						    		if($persona__pic){
						    			echo '<img class="persona-thumb" src="'.$persona__pic.'" />'; 
						    		}else{
						    			echo '<img class="persona-thumb" src="'.$template_directory.'/dist/images/persona--no-pic.png" />';
						    		}
						    		echo '</a>';
						    echo '</li>';
						  }
						 echo '</ul>';
						}
					?>
				</div>
			</section>
		</div>
	</footer>
</article>
