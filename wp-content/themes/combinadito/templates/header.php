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
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only"><?= __('Toggle navigation', 'sage'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><span><?php bloginfo('name'); ?></span></a>
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav']);
      endif;
      ?>
      <ul class="nav navbar-nav navbar-right">
            <li><a href="/?random=1"><span class="glyphicon glyphicon-random" aria-hidden="true"></span></a></li>
            <li><a class="cbSearchform" href="#"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a></li>
            <li><a href="./">Ingresar</a></li>
            <li><a href="./">Registrarse</a></li>
          </ul>
    </nav>
  </div>
</header>
