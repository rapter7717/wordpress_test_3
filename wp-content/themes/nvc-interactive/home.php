<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NVC_INTERACTIVE
 */

get_header();
?>

	<div id="primary" class="content-area" >
    <h1><center> Home Page </center></h1>
		<main id="main" class="site-main">


		<?php
    // the query
     $the_query = new WP_Query( array(
       'category_name' => '',
        'posts_per_page' => 3,
     ));
  ?>

  <?php if ( $the_query->have_posts() ) : ?>
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

      <?php the_title(); ?>
      <?php the_excerpt(); ?>

    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>

  <?php else : ?>
    <p><?php __('Nothing New'); ?></p>
  <?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
