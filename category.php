<?php
/**
 * @subpackage Elling_theme
 * @since 2021
 */
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
