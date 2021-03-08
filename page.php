<?php
/*
 * Template Name: New Template
 * Template Post Type: page
 */

get_header();
get_sidebar();
?>

<div class="col col-8 main-col-wrapper about">
	<section class="d-grid">
		<h3 class="text-uppercase fw-bold fs-5 lh-lg page-title">
			<?php the_title_attribute(); ?> 
		</h3>

		<div class="col col-8 w-100 page-content">
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'content', 'page');
			the_content();

			// If comments are open or there is at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		endwhile;
		?>
		</div>
	</section>
</div>
</main>

<?php get_footer(); ?>