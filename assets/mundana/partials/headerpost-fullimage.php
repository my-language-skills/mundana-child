<div class="articleheader col-md-9">
<?php  get_template_part( 'partials/headerpost', 'cats' ); ?>
<h1 class="display-4 article-headline mb-3"><?php the_title(); ?></h1>
<?php  get_template_part( 'partials/headerpost', 'meta' ); ?>
</div>

<?php the_post_thumbnail( 'large', array(
'class' => 'featured-image img-fluid mt-5 alignfull'
) ); ?>