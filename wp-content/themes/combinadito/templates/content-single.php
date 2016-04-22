<?php 
  //ACF 
  $gif__ID = get_field('gif__ID'); 
?>
<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <div class="entry-content">
      <?php if ($gif__ID) {?>
        <figure>

      <img class="lazy img-responsive" data-src="<?php echo 'http://i.giphy.com/'.$gif__ID.'.gif'; ?>" src="<?php echo 'http://i.giphy.com/'.$gif__ID.'.gif'; ?>" style="background-image: url(<?php echo 'https://media.giphy.com/media/'.$gif__ID.'/giphy_s.gif'; ?>); background-size: cover;
          background-repeat: no-repeat; min-width:100%"/>
       </figure>
      <?php }else{ ?>
        <?php the_content(); ?>
      <?php }?>
    </div>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
