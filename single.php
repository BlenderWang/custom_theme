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
        
        <div class="card-body">
            <?php the_title( '<h5 class="card-title">', '</h5>' ); ?> 

            <?php echo strip_shortcodes(wp_trim_words( get_the_content(), 80 )); ?>

            <div id="carouselControls" class="carousel carousel-dark slide" data-bs-ride="false" data-bs-touch='true'>
                <?php the_post(); ?>
                <?php $attachments = get_posts( array(
                    'post_type' => 'attachment',
                    'posts_per_page' => -1,
                    'post_parent' => $post->ID,
                    'exclude'     => get_post_thumbnail_id()
                ) );
                ?>

                <div class="carousel-inner">
                <?php
                    if ( $attachments ) :
                        $counter = 0;
                        foreach ( $attachments as $attachment ) :
                            $url = wp_get_attachment_url( $attachment->ID );?>
                                <?php if( $counter == 0 ) { ?>
                                    <div class="grid--item carousel-item active">
                                        <img src="<?php echo $url; ?>" alt="image" class="d-block w-100" />
                                    </div>
                                <?php } else { ?>
                                    <div class="grid--item carousel-item">
                                        <img src="<?php echo $url; ?>" alt="image" class="d-block w-100" />
                                    </div>
                                <?php } ?>
                        <?php $counter++; ?>
                        <?php endforeach; ?>
                <?php endif; ?>
                </div>
                                
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

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
