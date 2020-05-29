<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php setPostViews( get_the_ID() ); ?>
    <div class="entry-content">
        <ul class="category-title">
			<?php
			global $post;
			$categories = get_the_category( $post->ID );

			foreach ( $categories as $category ) {
				$link = get_category_link( $category->term_id );
				echo '<li><a href="' . $link . '">' . $category->cat_name . '</a></li>';
			}
			?>
        </ul>
        <h1 class="post_title"><?php the_title() ?></h1>
        <time><?php echo get_the_time('G:i') . ' ' . get_the_date('d/m/Y'); ?>&nbsp;<?php _e('[:en]by [:vi]bởi' ) ?>&nbsp;<?php the_author(); ?></time>

        <section class="post_content">
			<?php the_content(); ?>
        </section>
        <div class="post_sub">
            <div class="box_tag box_item">
                <div class="title">
                    <?php _e('[:en]Post Tag:[:vi]Thẻ:') ?>
                </div>
                <div class="content">
                    <ul>
						<?php
						$post_tags = get_the_tags();
						if ( $post_tags ) {
							foreach ( $post_tags as $tag ) {
								echo '<li>' . $tag->name . '</li>';
							}
						}
						?>
                    </ul>
                </div>
            </div>
            <div class="box_share box_item">
                <div class="title">
	                <?php _e('[:en]Share on:[:vi]Chia sẻ:') ?></div>
                <div class="content">
					<?php $actual_link = ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
                    <ul>
                        <li>
                            <a href="http://www.facebook.com/sharer.php?u=<?= $actual_link ?>" target="_blank">
                                Fb.
                            </a>
                        </li>
                        <li>
                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?= $actual_link ?>"
                               target="_blank">
                                In.
                            </a>
                        </li>

                        <li>
                            <a href="https://twitter.com/share?url=<?= $actual_link ?>&amp;" target="_blank">
                                Tw.
                            </a>
                        </li>
                        <li>
                            <a href="https://plus.google.com/share?url=<?= $actual_link ?>" target="_blank">
                                Gg.
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="post_navigation">
		    <?php
		    if ( qtranxf_getLanguage() == 'en' ) : ?>
                <div class="nav_item nav_prev">
				    <?php previous_post_link( $format = '%link', $link = '<i class="fa fa-angle-double-left" aria-hidden="true"></i>&nbsp;<span class="arrow">Previous article</span>&nbsp;/<span class="link">%title</span>' ) ?>
                </div>
                <div class="nav_item nav_next">
				    <?php next_post_link( $format = '%link', $link = '<span class="link">%title</span>&nbsp; / &nbsp;<span class="arrow"> Next article</span>&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' ) ?>
                </div>

		    <?php else: ?>
                <div class="nav_item nav_prev">
				    <?php previous_post_link( $format = '%link', $link = '<i class="fa fa-angle-double-left" aria-hidden="true"></i>&nbsp;<span class="arrow">Bài trước</span>&nbsp;/<span class="link">%title</span>' ) ?>
                </div>
                <div class="nav_item nav_next">
				    <?php next_post_link( $format = '%link', $link = '<span class="link">%title</span>&nbsp; / &nbsp; <span class="arrow"> Bài tiếp</span>&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' ) ?>
                </div>

		    <?php endif; ?>
        </div>
<!--        <div class="post_author">-->
<!--			--><?php //if ( ! is_singular( 'attachment' ) ) : ?>
<!--				--><?php //get_template_part( 'template-parts/post/author', 'brandast' ); ?>
<!--			--><?php //endif; ?>
<!---->
<!--        </div>-->
        <div class="post_related">
            <h3><?php _e('[:en]Related Articles:[:vi]Bài viết liên quan:') ?></h3>
            <div class="list_item">
                <div class="row">
					<?php
					$categories = get_the_category( $post->ID );
					if ( $categories ) {
						$category_ids = array();
						foreach ( $categories as $individual_category ) {
							$category_ids[] = $individual_category->term_id;
						}
						$args         = array(
							'category__in'     => $category_ids,
							'post__not_in'     => array( $post->ID ),
							'showposts'        => 4, // Số bài viết bạn muốn hiển thị.
							'caller_get_posts' => 1
						);
						$post_related = new wp_query( $args );
						if ( $post_related->have_posts() ) {
							while ( $post_related->have_posts() ) {
								$post_related->the_post();
								?>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="item">
                                        <a href="<?php the_permalink(); ?>" class="item__pic">
                                            <?php
                                            if (has_post_thumbnail()):
                                                the_post_thumbnail('large');
                                            else:?>
                                                <img src="<?php echo esc_url(home_url('/')); ?>/wp-content/themes/brandast/dist/images/thumbnail/nothumnail.png"
                                                     alt="">
                                            <?php endif; ?>

                                        </a>
                                        <div class="item__content">

                                            <a href="<?php the_permalink(); ?>" class="item__content__title"
                                                    title="<?php the_title_attribute(); ?>">
		                                        <?php the_title(); ?>
                                            </a>
                                        </div>

                                        <div class="item__cat">
											<?php
											$categories = get_the_category( $post->ID );
											foreach ( $categories as $category ) {
												$link = get_category_link( $category->term_id );
												echo '<a href="' . $link . '">' . $category->cat_name . '</a>';
											} ?>
                                        </div>
                                    </div>
                                </div>
								<?php
							}

						}
					}
					?>
                </div>
            </div>


        </div>

    </div><!-- .entry-content -->


</article><!-- #post-${ID} -->
