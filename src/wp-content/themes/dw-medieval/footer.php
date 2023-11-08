</div> <!--- end #content --->

<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>

<!-- ? RIGHT WIDGET AREA STARTS -->

<div id="widget-right" class="widget-column">

<!---BEGIN RIGHT SIDEBARS--->

	<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
<!-- SB 1 -->
	<div class="widget-container">
		<div class="blk-body">
			<div class="blk-row1">
				<div class="blk-row1-inner"></div>
			</div>
			<div class="blk-content">
				<div class="blk-content-inner">
					<aside role="complementary" id="right" class="sidebar2" aria-label="<?php echo is_active_sidebar( 'left-sidebar' ) ? esc_attr_x( 'Right Sidebar 1', 'ARIA label', 'dw-medieval' ) : esc_attr_x( 'Sidebar', 'ARIA label', 'dw-medieval' ); ?>">
						<ul><?php dynamic_sidebar( 'right-sidebar' ); ?></ul>
					</aside>
				</div>
			</div>
			<div class="blk-row3">
				<div class="blk-row3-inner"></div>
			</div>
		</div>
	</div>
<!-- SB 1 END -->
<?php endif; ?>

<!---END RIGHT SIDEBARS--->

</div>

<!-- ! RIGHT WIDGET AREA ENDS -->
<?php endif; ?>

</main>

	</div> <!-- end sb-bg -->

</div> <!--- sb-wrap end --->
<!------------------------------------------footer section starts------------------------------------------>

	<footer>
		<div class="footer-body">
			<div class="ft-row1">
				<div class="ft-row1-inner"></div>
			</div>
			<div class="ft-row2">
				<div class="ft-row2-inner1">
					<div class="fcontent">
						<?php echo wp_kses_post( get_theme_mod( 'dw-medieval-fcontent-text' ) ); ?>
					</div>
				</div>
				<div class="ft-row2-inner2"></div>
				<div class="ft-row2-inner3">
				<p id="footer-content">
				&copy; <?php echo esc_html( date( 'Y' ) ); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a>
				<br>
				<?php 
					/* translators: %1$s = WordPress URL, %2$s = Theme Designer URL */
					echo wp_kses( sprintf( __( 'Powered by <a href="%1$s">WordPress</a> <br> Theme Medieval By <a href="%2$s">DesignWicked</a>', 'dw-medieval' ), esc_url( __( 'https://wordpress.org', 'dw-medieval' ) ), esc_url( __( 'https://www.designwicked.com', 'dw-medieval' ) ) ), 'data' ); 
				?>
				</p>
				</div>
			</div>
			<div class="ft-row3">
				<div class="ft-row3-inner"></div>
			</div>
		</div>
	</footer>

<!------------------------------------------footer section ends------------------------------------------>	

	<?php wp_footer(); ?>
	</div> <!-- /site wrapper -->
	</body>

</html>
