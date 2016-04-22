<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/**
 * Show random post
 */
function random_add_rewrite() {
       global $wp;
       $wp->add_query_var('random');
       add_rewrite_rule('random/?$', 'index.php?random=1', 'top');
       flush_rewrite_rules();
}
add_action('init',__NAMESPACE__ . '\\random_add_rewrite');

function random_template() {
       if (get_query_var('random') == 1) {
               $posts = get_posts('post_type=post&orderby=rand&numberposts=1');
               foreach($posts as $post) {
                       $link = get_permalink($post);
               }
               wp_redirect($link,307);
               exit;
       }
}
add_action('template_redirect',__NAMESPACE__ . '\\random_template');

function add_giphy($atts, $content) {
  global $post;
 if (!$atts['width']) { $atts['width'] = 615; }
 if (!$atts['height']) { $atts['height'] = 450; }
 if (!$atts['poster']) { $atts['poster'] = 'https://media.giphy.com/media/hBjOeXioAz2Ew/200_s.gif'; }
 
 $atts['id'] = $post->ID; 

 return '<video id="video-'.$atts['id'].'" poster="'.$atts['poster'].'" width="' . $atts['width'] . '" height="' . $atts['height'] . '" style="margin:0;padding:0">
            <source src="https://media.giphy.com/media/' . $atts['src'] . '/giphy.mp4" type="video/mp4" />
            <p>Your browser does not support the video tag.</p>
         </video>';
}
add_shortcode('giphy', __NAMESPACE__ . '\\add_giphy');

/**
 * Quitando estilos de plugins
 */
function remove_unwanted_css() {
  wp_dequeue_style('wp-ulike');
  wp_deregister_style('wp-ulike');
}
add_action('wp_print_styles', __NAMESPACE__ . '\\remove_unwanted_css', 99999);

function remove_unwanted_js() {
  //wp_dequeue_script('wp_ulike');
  wp_dequeue_script('wp_ulike_plugins');
}
add_action('wp_print_scripts', __NAMESPACE__ . '\\remove_unwanted_js', 100);

/*function wpa54064_inspect_scripts() {
    global $wp_scripts;
    foreach( $wp_scripts->queue as $handle ) :
        echo $handle,' ';
    endforeach;
}
add_action( 'wp_print_scripts', __NAMESPACE__ . '\\wpa54064_inspect_scripts' );*/