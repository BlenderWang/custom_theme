<?php
/*
 * Template Name: New Template
 * Template Post Type: post
 */

get_header();
get_sidebar();
?>

<div class="col col-8 main-col-wrapper showcase">
    <div class="card mb-3">
        
        <div class="card-body lazyContainer">
            <?php the_title( '<h5 class="card-title">', '</h5>' ); ?> 

            <?php echo strip_shortcodes(wp_trim_words( get_the_content(), 80 )); ?>
<?php
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
            <section id='gallery' class="gallery grid lazyContainer">
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
            </section>
            <p class="card-text">
                <small class="text-muted">
                    <?php 
                        $posttags = get_the_tags();
                        if($posttags) {
                            foreach($posttags as $tag) {
                                echo $tag->name . ' ';
                            }
                        }
                    ?>
                </small>
            </p>
        </div>
    </div>

    <div class="navigation-btns">
        <a href="/" class="btn btn-light btn-light-border back">Back</a>
    </div>
    
    <?php
    if ( is_singular( 'attachment' ) ) {
        the_post_navigation(
            array(
                /* translators: %s: Parent post link. */
                'prev_text' => sprintf( __( '<span class="btn btn-dark back">Back</span><span class="post-title">%s</span>', 'twentynineteen' ), '%title' ),
            )
        );
    } elseif ( is_singular( 'post' ) ) {
        // Previous/next post navigation.
        the_post_navigation(
            array(
                'next_text' => '<span class="btn btn-light next" aria-hidden="true">' . __( 'Next', 'next' ) . '</span> ',
                'prev_text' => '<span class="btn btn-light prev" aria-hidden="true">' . __( 'Previous', 'previous' ) . '</span> ',
            )
        );
    }
    ?>
</div>
</main>
<?php get_footer(); ?>