<?php

if ( (bool) get_the_author_meta( 'description' ) ) : ?>
    <div class="author-item">
        <div class="author_avatar">
			<?php
			$user = wp_get_current_user();

				?>
                <img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>"/>
        </div>
        <div class="author_content">
            <h2 class="author_content_title">
		        <?= get_the_author() . ' / '; ?> <?php _e('[:en]Author[:vi]Tác giả') ?>
            </h2>
	        <?php the_author_meta( 'user_email' ); ?>
            <p class="author_content_description">
		        <?php the_author_meta( 'description' ); ?>
            </p><!-- .author-description -->
        </div>
        <div class="cb"></div>

    </div><!-- .author-bio -->
<?php endif; ?>
