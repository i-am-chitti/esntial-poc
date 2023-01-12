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

<div class="grid">
    <div>
		<?php echo do_shortcode( '[gravityform id="3" title="false" description="false"]' ) ?>
	</div>
    <div class="gutter-col gutter-col-1"></div>
    <div>
		<div>
			<h1 id="heading_3_1">Online search Cars</h1>
			<img src="https://d2ko68rmq49j1f.cloudfront.net/esntial_landing_page_0c33d0600e.gif" width="482" height="274" class="jss3078" data-testid="landing-page-hero-image" alt="landing page hero">
			<p id="description_3_3">Personalize your payments up front to see your payments with taxes and fees without impacting your credit.</p>
		</div>
	</div>
</div>

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
