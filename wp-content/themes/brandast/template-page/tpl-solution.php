<?php
/**
 * Template Name: Solution  Page
 */
get_header();?>
<div id="solution-page" class="tpl-page">
	<h1 class="page-title"><?php echo the_title(); ?></h1>
	<!-- Group 1 -->
	<section id="group-1"
			 class="section-layout wow fadeInUp"
			 data-wow-duration="1s"
			 data-wow-delay="0.5s"
	         data-wow-offset="100">
	    <div class="row">
	                <div class="col-lg-12 col-md-12">
	                        <div class="subtitle">
	                            <?php the_field('subtitle_gr_1') ?>
	                        </div>
	                        <div class="title">
	                            <?php the_field('title_gr_1') ?>
	                        </div>
	                        <div class="list-solution">
	                            <div class="row">
		                            <?php 
	                                    if (have_rows('list_solution_gr_1')):
	                                        while (have_rows('list_solution_gr_1')) : the_row(); 
	                                                
	                                            $posts = get_sub_field('content_gr_1');
	                                            ?>
	                                            
	                                            <div class="col-md-4">
	                                                <ul>
	                                                <?php foreach ($posts as $post):?>
	                                                <?php setup_postdata($post); ?>                                                    
	                                                    <li>
	                                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	                                                    </li>
	                                                <?php endforeach; ?>
	                                                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
	                                                </ul>
	                                            </div>
	                                            
	                                        <?php
	                                    endwhile;
	                                else :endif;
	                                ?>
	                            </div>
	                        </div>
	                </div>
	    </div>
	</section>

	<!-- Group 2 -->
	<section id="group-2"
			 class="section-layout wow fadeInUp"
			 data-wow-duration="1s"
			 data-wow-delay="0.5s"
	         data-wow-offset="100">
	    <div class="list-project">
	    							<?php 
	    								$k = 1;
	                                    if (have_rows('list_solution_gr_2')):
	                                        while (have_rows('list_solution_gr_2')) : the_row(); 
	                                                
	                                            $posts = get_sub_field('solution_list_solution_gr_2');
	                                            setup_postdata($post);
	                                            ?>
	                                            
	                                                <?php foreach ($posts as $post):?>
	                                                <?php setup_postdata($post); ?>                                                    
	                                                    <div class="grid-item grid-item-<?= $k; ?>">
												    		<div class="item">
												    			<div class="item-pic">
													    			<a href="<?php the_permalink(); ?>">
													    				<?php
								                                        if (has_post_thumbnail()):
								                                            the_post_thumbnail();
								                                        else:?>
								                                            <img src="<?php echo esc_url(home_url('/')); ?>/wp-content/themes/brandast/dist/images/thumbnail/nothumnail.png"
								                                                 alt="">
								                                        <?php endif; ?>
													    			</a>
												    			</div>
												    			<div class="item-content-overlay">
												    				<div class="detail-content">
													    				<div class="title">
													    					<a href="<?php the_permalink(); ?>"><?php the_sub_field('title_list_solution_gr_2') ?></a>
													    				</div>
													    				<div class="description">
													    					<?php the_sub_field('description_list_solution') ?>
													    				</div>
												    				</div>
												    			</div>
												    		</div>
												    	</div>
	                                                <?php endforeach; ?>
	                                                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
	                                            
	                                        <?php $k++;
	                                    endwhile;
	                                else :endif;
	                                ?>
	    </div>
        <div class="margin-contact-button">
		                        <div class="row-xGrid-yMiddle">
		                            <div class="row-xGrid iso-standard">
		                                <button class="ctrl-standard is-reversed typ-subhed fx-bubbleDown">
		                                    <a href="#" id="button-contact-special">
						                        <i class="fa fa-envelope-o"></i>
						                        <?php _e('[:en]Get advice now [:vi]Nhận tư vấn ngay') ?>
						                    </a>
		                                </button>
		                            </div>
		                        </div>
		                    </div>
	</section>

	<!-- Group 3 -->
	<section id="group-3"
			 class="section-layout wow fadeInUp"
			 data-wow-duration="1s"
			 data-wow-delay="0.5s"
	         data-wow-offset="100">
	    <div class="title-group-3">
	    	<h2><?php the_field('title_gr_3') ?></h2>
	    	<div class="row">
	    		<div class="col-xl-6 col-lg-12 col-md-12">
	    			<div class="group-3-left">
	    				<div class="image">
	    					<img src="<?php the_field('image_gr_3') ?>" alt="">
	    				</div>
	    			</div>
	    		</div>
	    		<div class="col-xl-6 col-lg-12 col-md-12">
	    			<div class="group-3-right">
	    				<!-- <div class="content-detail"> -->
	    					<div class="title">
	    						<h3><?php the_field('subtitle_gr_3') ?></h3>	
	    					</div>
	    					<div class="content">
	    						<?php the_field('content_gr_3') ?>
	    					</div>
		                    <div id="button-no-redirect-contact">
		                        <div class="row-xGrid-yMiddle">
		                            <div class="row-xGrid iso-standard">
		                                <button class="ctrl-standard is-reversed typ-subhed fx-bubbleDown">
		                                    <a href="<?= home_url(); ?>/<?php the_field('button_link_gr_3') ?>" id="button-contact-special">
		                                        <i class="fa fa-envelope-o"></i>
		                                    <?php the_field('button_name_gr_3') ?>
		                                    </a>
		                                </button>
		                            </div>
		                        </div>
		                    </div>
	    				<!-- </div> -->
	    			</div>
	    		</div>
	    	</div>
	    </div>
	</section>
	
	<section id="why-choose-brandast"
                 class="wow fadeInUp"
                 data-wow-duration="1s"
                 data-wow-delay="0.5s"
                 data-wow-offset="100">
            <div class="section__title">
                <h2><?php the_field('title_gr_5', 'option') ?></h2>
            </div>
            <div class="container-item">
                <div class="image">
                    <?php if (qtranxf_getLanguage() == 'en') { ?>
						<img src="<?php the_field('background_gr_en', 'option') ?>" alt="">
					<?php } elseif (qtranxf_getLanguage() == 'vi') { ?>
						<img src="<?php the_field('background_gr_vi', 'option') ?>" alt="">
					<?php } ?>
                </div>
            </div>
    </section>
	<section id="common-contact-div" class="section-layout wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s"
            data-wow-offset="100">
        <div class="row">
            <div class="col-12">
                <div class="title">
                    <h2><?php the_field('title_gr_4') ?></h2>
                </div>
            </div>
            <div class="col-12">
                <div class="subtitle">
                    <p><?php the_field('content_gr_4') ?></p>
                </div>
            </div>
            <div class="col-12">
                <div class="margin-contact-button">
		                        <div class="row-xGrid-yMiddle">
		                            <div class="row-xGrid iso-standard">
		                                <button class="ctrl-standard is-reversed typ-subhed fx-bubbleDown">
		                                    <a href="<?= home_url(); ?>/<?php the_field('button_link_gr_4') ?>" id="button-contact-special">
		                                    	<i class="fa fa-envelope-o"></i>
		                                        <?php the_field('button_name_gr_4') ?>
		                                    </a>
		                                </button>
		                            </div>
		                        </div>
		                    </div>
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>