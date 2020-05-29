<?php get_header();?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<div id="page404" class="error-404 not-found">
                <div class="image404">
                    <img src="<?php echo home_url(); ?>/wp-content/themes/brandast/dist/images/thumbnail/404.png" alt="">
                </div>
				<div class="page-content">
                    <h1 class="page-title">
						<?php _e( 'Trang bạn tìm kiếm không tồn tại', 'brandast' ); ?>
                    </h1>
					<h4>
                        Không thể tìm thấy dữ liệu cần thiết tại đây. Quay về
                        <a href="<?php echo home_url(); ?>">Trang chủ</a>
                    </h4>
				</div><!-- .page-content -->
			</div><!-- .error-404 -->

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
