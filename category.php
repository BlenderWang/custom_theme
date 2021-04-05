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
        <?php while ( have_posts() ) : the_post(); 
            $images = [];
            $attachments = get_posts( array(
                'post_type' => 'attachment',
                'posts_per_page' => -1,
                'post_parent' => $post->ID,
                'exclude'     => get_post_thumbnail_id()
            ) );
            foreach ( $attachments as $attachment ) {
                $img_url = wp_get_attachment_url( $attachment->ID );
                array_push($images, $img_url);
            }
        ?>
            
            <?php

                if (has_block('core/gallery')) {
                    $post_blocks = parse_blocks($post->post_content);
                    foreach( $post_blocks as $block ) {
                        if( 'core/gallery' === $block['blockName'] ){
                            $src = [];
                            preg_match_all( '/data-full-url="([^"]*)"/i', $block['innerHTML'], $src ) ;
                            $images = array_merge($images, $src[1]);
                            $images = array_unique($images);
                            //print_r($images);
                        }   
                    }
                } 
            ?>
            <?php
            if ( $images ) :
                foreach ( $images as $image ) :
            ?>
                    
                    <a href="<?php echo $image; ?>" data-lightbox="category-images">
                        <div class="grid--item">
                            <img alt="image-" class="lazy" data-src="<?php echo $image ?>" width="600" height="600"/>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>

        <?php endwhile;?>

        </section>
    </div>
</main>

<?php get_footer(); ?>
