<?php
/**
 * Index
 */
get_header();
?>

<?php if ( is_home() ) :

    if (is_paged()) {  } else { ?>

    <?php
        $mundana_count_posts = wp_count_posts();
        $mundana_published_posts = $mundana_count_posts->publish;
    ?>

    <!-- first 5 posts on top -->


    <!-- DELETED -->


    <!-- end first 5 posts on top and open a new container -->

    <!-- featured category -->
    <?php
    $featured_category = get_theme_mod( 'featured_category');
    $category_link = get_category_link( $featured_category );
    ?>
    <div class="featured-category spanborder text-right mt-3 pb-3 text-uppercase smaller">
        <a href="<?php echo $category_link;?>">
            <?php _e( 'How to > > >', 'mundana' ); ?> <i class="fa fa-angle-right"></i>

        </a>
        <div class="clearfix"></div>
    </div>
    <!-- end featured category -->

    <!-- begin sticky post -->
    <?php
    $sticky = get_option('sticky_posts');
    if (!empty($sticky)) {
        rsort($sticky);
        $args = array(
            'post__in' => $sticky
        );
        query_posts($args);
        while (have_posts()) {
             the_post();
             echo mundana_sticky();
        }
        wp_reset_query();
    }
    ?>
    <!-- end sticky post -->

<?php } endif; ?> <!-- we now close if it's frontpage, else go on -->




<?php
if ( have_posts() ) :  while (have_posts()) : the_post();
        if ( $first = !isset( $first ) ) { ?>
            <div class="row">
            <div class="col-md-8 col-lg-8 pr-md-5">
            <h2 class="spanborder h4">
            <?php if (is_search()) { ?>
            <?php _e( 'Search results for ', 'mundana' ); ?> <span>"<?php echo get_query_var('s');?>"</span>
            <?php } else { ?>
            <span><?php _e( 'All Stories', 'mundana' ); ?></span>
            <?php } ?>
            </h2>
            <?php echo mundana_postbox();

            } else {
            echo mundana_postbox();
            }

            endwhile;
            wp_reset_query();?>

            <!-- pagination -->
            <div class="bottompagination">
            <?php wp_bootstrap_pagination( array(
            'previous_string' => '<i class="fa fa-angle-double-left"></i>',
            'next_string' => '<i class="fa fa-angle-double-right"></i>',
            'before_output' => '<span class="navigation">',
            'after_output' => '</span>'
            ) ); ?>
            </div>
            <!-- end pagination -->

            <?php else : ?>

                <div class="row"><div class="col-md-8">

            <?php endif; ?>

            <!-- display categories -->
            <?php echo wowthemes_display_all_cats(); ?>
            <!-- end display categories -->

            </div>


      <!-- right sidebar (widgets if any & popular posts) -->
		<div class="col-md-4 col-lg-4 thesidebar">
      <h5>Search more topics:</h5>
      <?php echo do_shortcode ( '[searchandfilter id="2311"]' ); ?> <br>

            <!-- widgets -->
                <?php if ( is_active_sidebar( 'sidebar-home' ) ) : ?>
                    <div id="sidebar-home" class="sidebar-home widget-area" role="complementary">
                        <?php dynamic_sidebar( 'sidebar-home' ); ?>
                    </div>
                <?php endif; ?>
                <?php echo mundana_claps(); ?>
            <!-- end widgets -->
		</div>
        <!-- end right sidebar -->

</div>
<?php get_footer(); ?>
