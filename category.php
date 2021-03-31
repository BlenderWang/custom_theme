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
		if ( $attachments ) {
            foreach ( $attachments as $attachment ) {
                $class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
                //$thumbimg = wp_get_attachment_link( $attachment->ID, 'thumbnail-size', true );
                //echo '<li class="' . $class . ' data-design-thumbnail">' . $thumbimg . '</li>';
				$img_url = wp_get_attachment_url( $attachment->ID );
                $post_link = the_permalink();
				echo '<a href="'. $post_link .'"><div class="grid--item"><img alt="image" class="lazy" data-src="' . $img_url . '" width="600" height="600"/></div></a>';
            }
             
        }
		?>

    <?php endwhile;?>

        </section>
    </div>
</main>
<script>
      (function () {
        function logElementEvent(eventName, element) {
          console.log(Date.now(), eventName, element.getAttribute("data-src"));
        }

        var callback_enter = function (element) {
          logElementEvent("🔑 ENTERED", element);
        };
        var callback_exit = function (element) {
          logElementEvent("🚪 EXITED", element);
        };
        var callback_loading = function (element) {
          logElementEvent("⌚ LOADING", element);
        };
        var callback_loaded = function (element) {
          logElementEvent("👍 LOADED", element);
        };
        var callback_error = function (element) {
          logElementEvent("💀 ERROR", element);
          element.src =
            "https://via.placeholder.com/440x560/?text=Error+Placeholder";
        };
        var callback_finish = function () {
          logElementEvent("✔️ FINISHED", document.documentElement);
        };
        var callback_cancel = function (element) {
          logElementEvent("🔥 CANCEL", element);
        };

        ll = new LazyLoad({
          // Assign the callbacks defined above
          callback_enter: callback_enter,
          callback_exit: callback_exit,
          callback_cancel: callback_cancel,
          callback_loading: callback_loading,
          callback_loaded: callback_loaded,
          callback_error: callback_error,
          callback_finish: callback_finish
        });
      })();
    </script>
<?php get_footer(); ?>
