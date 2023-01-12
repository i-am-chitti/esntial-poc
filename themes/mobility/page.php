<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>

		<button class="gf-live-preview save-changes">Save Changes</button>
		<button class="gf-live-preview preview-changes">Preview changes</button>
		<h1 class="<?php echo esc_attr( caiem_get_css_classes( 'heading' ) ); ?>"  <?php echo caiem_get_attributes( 'heading' ); ?> ><?php echo esc_html( caiem_get_value( 'heading' ) ); ?></h1>
		<div class="<?php echo esc_attr( caiem_get_css_classes( 'description' ) ); ?>"  <?php echo caiem_get_attributes( 'description' ); ?> ><?php echo esc_html( caiem_get_value( 'description' ) ); ?></div>
		<div class="<?php echo esc_attr( caiem_get_css_classes( 'email' ) ); ?>"  <?php echo caiem_get_attributes( 'email' ); ?> ><?php echo esc_html( caiem_get_value( 'email' ) ); ?></div>
		<img id="header-hero-img" class="<?php echo esc_attr( caiem_get_css_classes( 'images' ) ); ?>" <?php echo caiem_get_attributes( 'images' ); ?> src="https://via.placeholder.com/428x274" />

		<?php astra_content_page_loop(); ?>

		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
