<?php
/**
 * Template part for displaying posts
 *
 * @subpackage Cyber Security Services
 * @since 1.0
 */
$cyber_security_services_single_post_option = get_theme_mod( 'cyber_security_services_single_post_option','single_right_sidebar');
if($cyber_security_services_single_post_option == 'single_right_sidebar'){ ?>
<main id="content">
	<?php while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" class="outer-div">
			<?php if(has_post_thumbnail()){ ?>
	             <div class="single-post-image">
					<?php the_post_thumbnail(); ?>
				</div>
            <?php }
            else { ?>
            	<div class="header-image"></div>
            <?php } ?>
			<div class="inner-div">
	    		<?php //breadcrumb
					if ( !is_page_template( 'page-template/custom-home-page.php' ) ) { 
						if( get_option('cyber_security_services_enable_breadcrumb',false) != 'off'){ ?>
							<div class="bread_crumb align-self-center text-center">
								<?php cyber_security_services_breadcrumb();  ?>
							</div>
						<?php }
					}?>
		    		<h2 class="my-4 text-center"><?php the_title();?></h2>
	    		<div class="date-box my-3 text-center align-self-center">
	    			<?php if( get_option('cyber_security_services_single_post_date',false) != 'off'){ ?>
	    				<span class="mr-2"><i class="far fa-calendar-alt mr-2"></i><?php the_time( get_option( 'date_format' ) ); ?></span>
	    			<?php } ?>
	    			<?php if( get_option('cyber_security_services_single_post_admin',false) != 'off'){ ?>
	    				<span class="entry-author mr-2"><i class="far fa-user mr-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
	    			<?php }?>
	    			<?php if( get_option('cyber_security_services_single_post_comment',false) != 'off'){ ?>
	  					<span class="entry-comments"><i class="fas fa-comments mr-2"></i> <?php comments_number( __('0 Comments','cyber-security-services'), __('0 Comments','cyber-security-services'), __('% Comments','cyber-security-services')); ?></span>
	  				<?php }?>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
	<div class="container">
		<div class="content-area my-5">
			<div id="main" class="site-main" role="main">
		       	<div class="row m-0">
		    		<div class="content_area col-lg-8 col-md-8">
				    	<section id="post_section">
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post(); ?>
								<div id="single-post-section" class="single-post-page entry-content">
									<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								        <div class="entry-content">
							            	<?php the_content(); ?>
								        </div>
								      	<div class="clearfix"></div> 
									</div>
								</div>
								<?php // If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

								the_post_navigation( array(
									'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'cyber-security-services' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'cyber-security-services' ) . '</span>',
									'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'cyber-security-services' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'cyber-security-services' ) . '</span> ',
								) );

							endwhile; // End of the loop.
							?>
						</section>
					</div>
					<div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-1'); ?></div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php }
else if($cyber_security_services_single_post_option == 'single_left_sidebar'){ ?>
<main id="content">
	<?php while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" class="outer-div">
			<?php if(has_post_thumbnail()){ ?>
	             <div class="single-post-image">
					<?php the_post_thumbnail(); ?>
				</div>
            <?php }
            else { ?>
            	<div class="header-image"></div>
            <?php } ?>
			<div class="inner-div">
	    		<?php //breadcrumb
					if ( !is_page_template( 'page-template/custom-home-page.php' ) ) { 
						if( get_option('cyber_security_services_enable_breadcrumb',false) != 'off'){ ?>
							<div class="bread_crumb align-self-center text-center">
								<?php cyber_security_services_breadcrumb();  ?>
							</div>
						<?php }
					}?>
		    		<h2 class="my-4 text-center"><?php the_title();?></h2>
	    			<div class="date-box my-3 text-center align-self-center">
		    			<?php if( get_option('cyber_security_services_single_post_date',false) != 'off'){ ?>
		    				<span class="mr-2"><i class="far fa-calendar-alt mr-2"></i><?php the_time( get_option( 'date_format' ) ); ?></span>
		    			<?php } ?>
		    			<?php if( get_option('cyber_security_services_single_post_admin',false) != 'off'){ ?>
		    				<span class="entry-author mr-2"><i class="far fa-user mr-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
		    			<?php }?>
		    			<?php if( get_option('cyber_security_services_single_post_comment',false) != 'off'){ ?>
		  					<span class="entry-comments"><i class="fas fa-comments mr-2"></i> <?php comments_number( __('0 Comments','cyber-security-services'), __('0 Comments','cyber-security-services'), __('% Comments','cyber-security-services')); ?></span>
		  				<?php }?>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
	<div class="container">
		<div class="content-area my-5">
			<div id="main" class="site-main" role="main">
		       	<div class="row m-0">
		       		<div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-1'); ?></div>
		    		<div class="content_area col-lg-8 col-md-8">
				    	<section id="post_section">
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post(); ?>
								<div id="single-post-section" class="single-post-page entry-content">
									<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								        <div class="entry-content">
							            	<?php the_content(); ?>
								        </div>
								      	<div class="clearfix"></div> 
									</div>
								</div>
								<?php // If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

								the_post_navigation( array(
									'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'cyber-security-services' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'cyber-security-services' ) . '</span>',
									'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'cyber-security-services' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'cyber-security-services' ) . '</span> ',
								) );

							endwhile; // End of the loop.
							?>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php }
else if($cyber_security_services_single_post_option == 'single_full_width'){ ?>
<main id="content">
	<?php while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" class="outer-div">
			<?php if(has_post_thumbnail()){ ?>
	             <div class="single-post-image">
					<?php the_post_thumbnail(); ?>
				</div>
            <?php }
            else { ?>
            	<div class="header-image"></div>
            <?php } ?>
			<div class="inner-div">
	    		<?php //breadcrumb
					if ( !is_page_template( 'page-template/custom-home-page.php' ) ) { 
						if( get_option('cyber_security_services_enable_breadcrumb',false) != 'off'){ ?>
							<div class="bread_crumb align-self-center text-center">
								<?php cyber_security_services_breadcrumb();  ?>
							</div>
						<?php }
					}?>
		    		<h2 class="my-4 text-center"><?php the_title();?></h2>
	    			<div class="date-box my-3 text-center align-self-center">
		    			<?php if( get_option('cyber_security_services_single_post_date',false) != 'off'){ ?>
		    				<span class="mr-2"><i class="far fa-calendar-alt mr-2"></i><?php the_time( get_option( 'date_format' ) ); ?></span>
		    			<?php } ?>
		    			<?php if( get_option('cyber_security_services_single_post_admin',false) != 'off'){ ?>
		    				<span class="entry-author mr-2"><i class="far fa-user mr-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
		    			<?php }?>
		    			<?php if( get_option('cyber_security_services_single_post_comment',false) != 'off'){ ?>
		  					<span class="entry-comments"><i class="fas fa-comments mr-2"></i> <?php comments_number( __('0 Comments','cyber-security-services'), __('0 Comments','cyber-security-services'), __('% Comments','cyber-security-services')); ?></span>
		  				<?php }?>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
	<div class="container">
		<div class="content-area my-5">
			<div id="main" class="site-main" role="main">
		       	<div class="row m-0">
		    		<div class="content_area col-lg-12 col-md-12">
				    	<section id="post_section">
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post(); ?>
								<div id="single-post-section" class="single-post-page entry-content">
									<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								        <div class="entry-content">
							            	<?php the_content(); ?>
								        </div>
								      	<div class="clearfix"></div> 
									</div>
								</div>
								<?php // If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

								the_post_navigation( array(
									'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'cyber-security-services' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'cyber-security-services' ) . '</span>',
									'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'cyber-security-services' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'cyber-security-services' ) . '</span> ',
								) );

							endwhile; // End of the loop.
							?>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php }