<?php
/**
 * @subpackage Elling_theme
 * @since 2021
 */ 
function my_page_scripts(){
    wp_enqueue_script('my_script', get_template_directory_uri() . '/js/lazy.js', [], '1.0', true);
}
add_action( 'wp_enqueue_scripts', 'my_page_scripts' );
wp_enqueue_script('colf', get_template_directory_uri() . '/js/lazy.js', array('jquery'));
get_header();
get_sidebar();
?>

<div class="col col-8 main-col-wrapper">
        <section id='gallery' class="gallery grid lazyContainer">
		<p>category</p>
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="grid--item">
                <?php if ( has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
                        <?php the_post_thumbnail(); ?>
                    </a>
                <?php endif; ?>
            </div>
            <?php endwhile; ?>

        </section>
    </div>
</main>

<?php get_footer(); ?>
