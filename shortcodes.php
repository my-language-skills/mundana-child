<?php
 /*
  * ADDED: custom taxonomies shortcode
  *
  * @since 0.1
  * @link  https://books4languages.com/feedback/
  *
  */



function worksheet_custom_taxonomy_shortcode( ) {
  // if (!in_category('revisions')) :
  if (false != get_the_term_list( '', 'grammar', '', '', '')){ // (false != get_the_term_list( $post_id, 'grammar','' )){
    echo '<a class="tag-link bg-light"' . get_the_term_list( '', 'grammar','','',''). '</a> '; //get_the_term_list( $post->ID, 'grammar','','',''). '</a> ';
  } elseif (false != get_the_term_list( '', 'culture', '', '', '')){
    echo '<a class="tag-link bg-light"' . get_the_term_list( '', 'culture','','','' ). '</a> ';
  } elseif (false != get_the_term_list( '', 'orthography', '', '', '')){
    echo '<a class="tag-link bg-light"' . get_the_term_list( '', 'orthography','','','' ). '</a> ';
  } elseif (false != get_the_term_list( '', 'vocabulary', '', '', '')){
    echo '<a class="tag-link bg-light"' . get_the_term_list( '', 'vocabulary','','','' ). '</a> ';
  }
// endif;
}
add_shortcode( 'custom_taxonomy_shortcode', 'worksheet_custom_taxonomy_shortcode' );




/*
 * ADDED: custom taxonomies shortcode
 *
 * @since 0.1
 * @link  https://books4languages.com/feedback/
 *
 */


function worksheet_display_posts_shortcode( ) {
 if (in_category('grammar')){ // (false != get_the_term_list( $post_id, 'grammar','' )){
   $display_posts =  do_shortcode('[display-posts wrapper="ul" orderby="rand" category="grammar"]');
 } elseif (in_category('culture')){
   $display_posts =  do_shortcode('[display-posts wrapper="ul"  orderby="rand" category="culture"]');
 } elseif (in_category('orthography')){
   $display_posts =  do_shortcode('[display-posts wrapper="ul" orderby="rand" category="orthography"]');
 } elseif (in_category('vocabulary')){
   $display_posts = do_shortcode('[display-posts wrapper="ul" orderby="rand" category="vocabulary"]');
 } else {
   $display_posts =  do_shortcode('[display-posts wrapper="ul"  orderby="rand" category="revisions"]');
 }
 return $display_posts;
}
add_shortcode( 'display_posts_shortcode', 'worksheet_display_posts_shortcode' );
