<?php
  // This file assumes that you have included the nav walker from https://github.com/twittem/wp-bootstrap-navwalker
  // somewhere in your theme.
?>
<header class="banner navbar navbar-default navbar-static-top navbar-searchform hidden" role="searchform">
  <div class="container">
    <?php get_search_form(); ?>
  </div>
</header>
<header class="banner navbar navbar-default navbar-main navbar-static-top" role="banner">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><span><?php bloginfo('name'); ?></span></a>
    </div>

    <nav class="" role="navigation">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav nav-pills navbar-right']);
      endif;
      ?>
    </nav>
  </div>
</header>