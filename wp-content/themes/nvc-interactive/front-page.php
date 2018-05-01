<?php get_header(); ?>

<div class="container-fluid developer-section d-flex justify-content-center align-items-center">
  <h1> TEST </h1>
</div>

<div class="container featured-blogs">
 <div class="jumbotron">
  <p> FEATURED </p>

<div class="featured-content">

<?php

$args = array(
  'tag' => 'featured-image',
  'orderby' => 'post_date',
  'order' => 'ASC'
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
        Featured Image
        <div class="col-md-10">
          <?php the_excerpt(); ?>
        </div>
      </div>
    </div>

<?php }
	/* Restore original Post Data */
	wp_reset_postdata();
} else {
	// no posts found
}
?>


</div>
</div>
</div>

<?php get_footer();
