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
            <p class="card-text">
                <?php the_content(); ?>
            </p>
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
        <a href="/wordpress" class="btn btn-dark back">Back</a>
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
