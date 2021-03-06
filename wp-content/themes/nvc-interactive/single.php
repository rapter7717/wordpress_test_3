<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package NVC_INTERACTIVE
 */

get_header();
?>

	<div id="primary" class="content-area container single-post-page">
		<main id="main" class="site-main">
			<div class="row">
				<div class="col-sm-8">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
	</div>
	<div class="col-sm-4">
		<div class="jumbotron single-page-sidebar">
		<?php get_sidebar();
		?>
	</div>
	</div>

	</div>
		</main><!-- #main -->

	</div><!-- #primary -->

<?php

get_footer();
