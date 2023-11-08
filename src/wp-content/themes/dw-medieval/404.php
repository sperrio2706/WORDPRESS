<?php 
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 */
get_header();
?>
<h1 id="index-type"><?php esc_html_e( 'Not Found', 'dw-medieval' ); ?></h1>
<div class="hentry">
	<?php esc_html_e( 'The requested page was not found.', 'dw-medieval' ); ?>
	<?php get_search_form(); ?>
</div>
<?php get_footer(); ?>
