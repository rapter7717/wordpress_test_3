<?php get_header(); ?>

<div class="container-fluid developer-section d-flex justify-content-center align-items-center">
  <div class="hero-heading">
  <h1> Featured Content </h1>
</div>
</div>

<div class="container featured-blogs">
 <div class="jumbotron">
  <p> FEATURED </p>

<div class="featured-content">

<?php

$args = array(
  'tag' => 'featured-image',
  'orderby' => 'post_date',
  'order' => 'DESC'
);

// The Query
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
	//echo '<ul>';
	while ( $the_query->have_posts() ) {
		$the_query->the_post(); ?>

    <div class="row excerpt align-middle">
      <div class="col-md-2">
         <?php the_post_thumbnail( 'thumbnail' ); ?>
    </div>
        <div class="col-md-10">
          <?php the_title('<h4>','</h4>'); ?>
          <?php the_excerpt(); ?>
        </div>
    </div>

<?php }
	/* Restore original Post Data */
	wp_reset_postdata();
} else {
  echo '<h1>Nothing Here </h1>';
	// no posts found
}
?>


</div>
</div>
</div>

<?php get_footer();
