<?php
/**
 * Template part for displaying posts
 *
 * @subpackage Cyber Security Services
 * @since 1.0
 */
?>

<div id="Category-section" class="entry-content">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="postbox smallpostimage p-2">
			<h3 class="text-center"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
			<?php
      		if ( ! is_single() ) {
        		// If not a single post, highlight the gallery.
        		if ( get_post_gallery() ) {
          			echo '<div class="entry-gallery">';
            		echo ( get_post_gallery() );
          			echo '</div>';
        		};
      		};
    		?>
        	<div class="overlay pt-2 text-center">
        		<div class="date-box mb-2">
        			<?php if( get_option('cyber_security_services_date',false) != 'off'){ ?>
        				<span class="mr-2"><i class="far fa-calendar-alt mr-2"></i><?php the_time( get_option( 'date_format' ) ); ?></span>
        			<?php } ?>
        			<?php if( get_option('cyber_security_services_admin',false) != 'off'){ ?>
        				<span class="entry-author mr-2"><i class="far fa-user mr-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
        			<?php }?>
        			<?php if( get_option('cyber_security_services_comment',false) != 'off'){ ?>
      					<span class="entry-comments"><i class="fas fa-comments mr-2"></i> <?php comments_number( __('0 Comments','cyber-security-services'), __('0 Comments','cyber-security-services'), __('% Comments','cyber-security-services')); ?></span>
      				<?php }?>
    			</div>
        		
        	</div>
	      	<div class="clearfix"></div>
	  	</div>
	</div>
</div>