<?php
/**
 * @subpackage Elling_theme
 * @since 2021
 */


function na_get_gallery_image_urls( $post_id ) {

    $post = get_post($post_id);

    // Make sure the post has a gallery in it
    if( ! has_shortcode( $post->post_content, 'gallery' ) )
        return;

    // Retrieve all galleries of this post
    $galleries = get_post_galleries_images( $post );

    // Loop through all galleries found
    foreach( $galleries as $gallery ) {

        // Loop through each image in each gallery
        foreach( $gallery as $image ) {

            echo '<img src="'.$image.'">';

        }

    }

 }

 function get_post_block_galleries_images( $post_id ) {
    $content = get_post_field( 'post_content', $post_id );
    $srcs = [];

    $i = -1;
    foreach ( parse_blocks( $content ) as $block ) {
        if ( 'core/gallery' === $block['blockName'] ) {
            $i++;
            $srcs[ $i ] = [];

            preg_match_all( '#src=([\'"])(.+?)\1#is', $block['innerHTML'], $src, PREG_SET_ORDER );
            if ( ! empty( $src ) ) {
                foreach ( $src as $s ) {
                    $srcs[ $i ][] = $s[2];
                }
            }
        }
    }

    return $srcs;
}

get_header();
get_sidebar();
?>

<div class="col col-8 main-col-wrapper">
        <section id='gallery' class="gallery grid lazyContainer">
        <?php while ( have_posts() ) : the_post(); ?>

            <?php
                $gal = get_post_gallery( $post, false );
                print_r($gal);
                echo "</br>";
            ?>

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
                    $img_url = wp_get_attachment_url( $attachment->ID );?>
                    
                    <a href="<?php echo $img_url; ?>" data-lightbox="category-images">
                        <div class="grid--item">
                            <img alt="image-<?php echo $attachment->ID; ?>" class="lazy" data-src="<?php echo $img_url ?>" width="600" height="600"/>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
            <h2>test area post</h2>
            <?php get_post_block_galleries_images($post->ID) ?> 
        <?php endwhile;?>
        </section>
    </div>
</main>

<?php get_footer(); ?>
