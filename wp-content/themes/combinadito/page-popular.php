<?php get_template_part('templates/page', 'header'); ?>
<?php

	global $paged;
	global $wp_query;
	$temp = $wp_query; 
	$wp_query = null; 
	$wp_query = new WP_Query(); 
	$wp_query->query('posts_per_page=5&post_type=post&order_by=meta_value_num&meta_key=_liked&paged='.$paged);
	while ($wp_query->have_posts()) : $wp_query->the_post(); 
?>

<?php get_template_part('templates/content', 'front-page'); ?>

<?php endwhile; ?>

    <?php the_posts_navigation(); ?>

<?php 
  $wp_query = null; 
  $wp_query = $temp; 
?>