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
        <div class="<?php if ($mundana_published_posts>=4) { echo 'alignfullincol';}?>">
        <div class="container-fluid homelatest removetoppadding <?php if ($mundana_published_posts<=3) { echo 'pl-0 pr-0';}?>">
        <?php 
        $count = 0;
        $args = array(
        'ignore_sticky_posts' => 1,
        'post__not_in' => get_option( 'sticky_posts' )
        );
        $the_query = new WP_Query( $args );
        if ( $the_query->have_posts() ) : 
        ?>        
        <div class="row <?php if ($mundana_published_posts>=5) { echo 'justify-content-center';}?>">
        <?php while ($the_query->have_posts()) : 
        $the_query->the_post();  
        $count++;
        
        switch($count) {
                case 1: echo '<div class="col-sm-12 col-md-4 col-xl-4">';
                        echo mundana_postbox_style2();
                        echo '</div>';
                        break;
                case 2: echo '<div class="col-sm-12 col-md-4 col-xl-4">';
                        echo mundana_postbox_style3();
                        break;
                case 3: echo mundana_postbox_style3();
                        break;
                case 4: echo mundana_postbox_style3();
                        echo '</div>';
                        break;
                case 5: echo '<div class="col-sm-12 col-md-4 col-xl-3">';
                        echo mundana_postbox_style2_right();
                        echo '</div>';
                        break;
                }
        endwhile;
        wp_reset_query(); ?>        
        </div>        
        <?php endif; ?>
        </div>
        </div>
    <!-- end first 5 posts on top and open a new container -->
    
    <!-- featured category -->
    <?php
    $featured_category = get_theme_mod( 'featured_category');
    $category_link = get_category_link( $featured_category );
    ?>
    <div class="featured-category spanborder text-right mt-3 pb-3 text-uppercase smaller">
        <a href="<?php echo $category_link;?>">
            <?php _e( 'Featured category', 'mundana' ); ?> <i class="fa fa-angle-right"></i>
            
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