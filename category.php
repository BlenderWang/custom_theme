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
        <?php while ( have_posts() ) : the_post(); ?>

            <?php $attachments = get_posts( array(
                'post_type' => 'attachment',
                'posts_per_page' => -1,
                'post_parent' => $post->ID,
                'exclude'     => get_post_thumbnail_id()
            ) );?>
            <?php
            if ( $attachments ) :
                foreach ( $attachments as $attachment ) :
                    $class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
                    //$thumbimg = wp_get_attachment_link( $attachment->ID, 'thumbnail-size', true );
                    //echo '<li class="' . $class . ' data-design-thumbnail">' . $thumbimg . '</li>';
                    $img_url = wp_get_attachment_url( $attachment->ID );?>
                    
                    <a href="<?php the_permalink(); ?>">
                        <div class="grid--item">
                            <img alt="image" class="lazy" data-src="<?php echo $img_url ?>" width="600" height="600"/>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>

        <?php endwhile;?>

        </section>
    </div>
</main>

<?php get_footer(); ?>
