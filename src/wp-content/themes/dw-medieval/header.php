<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div onclick="dw_medieval_topFunction()" id="TopBtn"></div>

<nav role="navigation" id="skip" aria-label="<?php echo esc_attr_x( 'Skip links', 'ARIA label', 'dw-medieval' ); ?>">

	<?php if ( is_active_sidebar( 'left-sidebar' ) ) : ?>

	<a class="tab-shortcut" id="shortcut-left-sidebar" href="#left"><?php is_active_sidebar( 'right-sidebar' ) ? esc_html_e( 'Skip to first sidebar', 'dw-medieval' ) : esc_html_e( 'Skip to sidebar', 'dw-medieval' ); ?></a>

	<?php endif; ?>

	<a class="tab-shortcut" id="shortcut-content" href="#content"><?php esc_html_e( 'Skip to content', 'dw-medieval' ); ?></a>

	<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>

	<a class="tab-shortcut" id="shortcut-right-sidebar" href="#right"><?php is_active_sidebar( 'left-sidebar' ) ? esc_html_e( 'Skip to second sidebar', 'dw-medieval' ) : esc_html_e( 'Skip to sidebar', 'dw-medieval' ); ?></a>

	<?php endif; ?>

</nav> <!-- /skip -->

<div id="site-wrapper" class="site-wrapper">

		<!-- ? HEADER SECTION STARTS -->
		<header>
			<div class="hd-body">
				<div class="hd-row1">
					<div class="hd-row1-inner"></div>
				</div>
				<div class="hd-row2">
					<div class="hd-row2-inner-1">
					<div id="headerlogo">
						<a href="<?php echo esc_url( home_url() ); ?>">
						<?php
						$dw_medieval_custom_logo_id = get_theme_mod( 'custom_logo' );
						$dw_medieval_logo           = wp_get_attachment_image_src( $dw_medieval_custom_logo_id, 'full' );
					
						if ( has_custom_logo() ) {
							echo '<img src="' . esc_url( $dw_medieval_logo[0] ) . '" alt="' . esc_html( get_bloginfo( 'name' ) ) . '">';
						} else {
							echo '<div id="blog-name">' . esc_html( get_bloginfo( 'name' ) ) . '</div>';
							echo '<div id="blog-tagline">' . esc_html( get_bloginfo( 'description' ) ) . '</div>';
						}
						?>
						</a>
						</div>
					</div>
					<div class="hd-row2-inner-2"></div>
					<div class="hd-row2-inner-3"></div>
				</div>
				<div class="hd-row3">
					<div class="hd-row3-inner-1"></div>
				</div>
				<div class="hd-row4">
					<div class="hd-row4-inner-1">
					<a class="hd-row4-nav-link-1" href="<?php echo esc_url( get_theme_mod( 'dw-medieval-hnav-link1' ) ); ?>"><div class="hdmainnav"><?php echo esc_textarea( get_theme_mod( 'dw-medieval-hnav-linkname1' ) ); ?></div></a>
					<a class="hd-row4-nav-link-2" href="<?php echo esc_url( get_theme_mod( 'dw-medieval-hnav-link2' ) ); ?>"><div class="hdmainnav"><?php echo esc_textarea( get_theme_mod( 'dw-medieval-hnav-linkname2' ) ); ?></div></a>
					<a class="hd-row4-nav-link-3" href="<?php echo esc_url( get_theme_mod( 'dw-medieval-hnav-link3' ) ); ?>"><div class="hdmainnav"><?php echo esc_textarea( get_theme_mod( 'dw-medieval-hnav-linkname3' ) ); ?></div></a>
					<a class="hd-row4-nav-link-4" href="<?php echo esc_url( get_theme_mod( 'dw-medieval-hnav-link4' ) ); ?>"><div class="hdmainnav"><?php echo esc_textarea( get_theme_mod( 'dw-medieval-hnav-linkname4' ) ); ?></div></a>
					<a class="hd-row4-nav-link-5" href="<?php echo esc_url( get_theme_mod( 'dw-medieval-hnav-link5' ) ); ?>"><div class="hdmainnav"><?php echo esc_textarea( get_theme_mod( 'dw-medieval-hnav-linkname5' ) ); ?></div></a>
					</div>
					<div class="hd-row4-inner-2"></div>
					<div class="hd-row4-inner-3">
					<div class="datetime">
						<div id="dw-medieval-digital-clock">
							<span class="date-string"><?php esc_html_e( 'Date:', 'dw-medieval' ); ?></span>
							<span class="date-date"></span>
							<span class="time-string"><?php esc_html_e( 'Time:', 'dw-medieval' ); ?></span>
							<span class="time-time"></span>
						</div>
					</div>
					</div>
					<div class="hd-row4-inner-4"></div>
				</div>
				<div class="hd-row5">
					<div class="hd-row5-inner"></div>
				</div>
			</div>
		</header>
		<!-- ! HEADER SECTION ENDS -->

<div id="sb-wrap">
		<div class="sb-bg">

<div id="headerlogo2">
	<a href="<?php echo esc_url( home_url() ); ?>">
	<?php
	$dw_medieval_custom_logo_id = get_theme_mod( 'custom_logo' );
	$dw_medieval_logo           = wp_get_attachment_image_src( $dw_medieval_custom_logo_id, 'full' );
					
	if ( has_custom_logo() ) {
		echo '<img src="' . esc_url( $dw_medieval_logo[0] ) . '" alt="' . esc_html( get_bloginfo( 'name' ) ) . '">';
	} else {
		echo '<div id="blog-name">' . esc_html( get_bloginfo( 'name' ) ) . '</div>';
		echo '<div id="blog-tagline">' . esc_html( get_bloginfo( 'description' ) ) . '</div>';
	}
	?>
	</a>
</div> <!-- /header -->

<div class="hmenu">

<nav id="site-navigation" class="main-navigation" role="navigation">
	<button class="menu-toggle"><?php esc_html_e( 'Menu', 'dw-medieval' ); ?></button>
		<?php
			wp_nav_menu(
				array(
					'theme_location'       => 'top_header_menu',
					'menu_class'           => 'nav-menu',
					'container_aria_label' => _x( 'Header Menu', 'ARIA label', 'dw-medieval' ),
				)
			);
			?>
</nav><!-- #site-navigation -->

</div>

<!-- ? MAIN STARTS -->
<main id="main-container" class="main-container">

<?php
if ( is_active_sidebar( 'left-sidebar' ) ) : 

	?>

<div id="widget-left" class="widget-column">

<!-- ? LEFT WIDGET AREA STARTS -->

	<?php if ( is_active_sidebar( 'left-sidebar' ) ) : ?>	
		<!-- SB 1 -->		
		<div class="widget-container">
			<div class="blk-body">
				<div class="blk-row1">
					<div class="blk-row1-inner"></div>
				</div>
				<div class="blk-content">
					<div class="blk-content-inner">
						<aside role="complementary" id="left" class="sidebar" aria-label="<?php echo is_active_sidebar( 'right-sidebar' ) ? esc_attr_x( 'Left Sidebar 1', 'ARIA label', 'dw-medieval' ) : esc_attr_x( 'Sidebar', 'ARIA label', 'dw-medieval' ); ?>">
							<ul>
							<?php dynamic_sidebar( 'left-sidebar' ); ?>
							</ul>
						</aside>
					</div>
				</div>
				<div class="blk-row3">
					<div class="blk-row3-inner"></div>
				</div>
			</div>
		</div>
		<!-- END SB 1 -->
	<?php endif; ?>

	</div> <!--- END WIDGET COLUMN --->

<?php endif; ?>

<!-- END SB 5 -->

<div id="content">
