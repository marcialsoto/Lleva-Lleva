<?php 
	//ACF 
	$gif__ID = get_field('gif__ID'); 
?>
<article <?php post_class(); ?>>
	<header class="entry-meta">
		<div class="pull-right">
				<!-- Single button -->
				<div class="btn-group">
				  <a type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> 
				  </a>
				  <ul class="dropdown-menu">			   
				    <li><p>URL corta: <?php echo wp_get_shortlink(); ?></p></li>
				    <li role="separator" class="divider"></li>
				    <li>
				    	<?php if ($gif__ID) {?>
				    		<a href="<?php echo 'http://i.giphy.com/'.$gif__ID.'.gif'; ?>" download="<?php echo $gif__ID; ?>" target="_blank">Descargar imagen</a>
				    	<?php }else{ ?>
				    		<p class="text-muted">Descargar imagen</p>
				    	<?php }?>
				    </li>
				  </ul>
				</div>
		</div>
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
				</ul>
			</div>
			<div class="sourcing">
				<a id="source-<?php echo get_the_ID(); ?>" type="button" class="cbSource"><i class="fa fa-sticky-note-o"></i> <span class="hidden-xs">Fuente</span></a>
			</div>
			<section class="hidden source">
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
			</section>
		</div>
	</footer>
</article>
