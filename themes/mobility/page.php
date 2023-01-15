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

$heading_value = caiem_get_value( 'heading' );
$description_value = caiem_get_value('description');
$email_value = caiem_get_value( 'email' );
$link_label = caiem_get_value('label');
$link_url = caiem_get_value('url');

if(empty($heading_value)) $heading_value = 'Dummy Heading';
if(empty($description_value)) $description_value = 'Dummy Description';
if(empty($email_value)) $email_value = 'dummy@email.com';
if(empty($link_label)) $link_label = 'Link here';
if(empty($link_url)) $link_url = '#';



get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php astra_primary_class(); ?>
	x-data="{ showModal: false }"
  	@keydown.escape="showModal = false"
	>

		<?php astra_primary_content_top(); ?>

		<!-- <button class="gf-live-preview save-changes">Save Changes</button>
		<button class="gf-live-preview preview-changes">Preview changes</button> -->
		<button x-data @click="$store.isEditable = ! $store.isEditable">Toggle Preview</button>

		<!-- Heading -->
		<h1 x-data :contenteditable="$store.isEditable ? 'true' : 'false'" class="<?php echo esc_attr( caiem_get_css_classes( 'heading' ) ); ?>"  <?php echo caiem_get_attributes( 'heading' ); ?> ><?php echo esc_html( $heading_value ); ?></h1>

		<!-- Description -->
		<div x-data :contenteditable="$store.isEditable ? 'true' : 'false'" class="<?php echo esc_attr( caiem_get_css_classes( 'description' ) ); ?>"  <?php echo caiem_get_attributes( 'description' ); ?> ><?php echo esc_html( $description_value ); ?></div>

		<!-- Email -->
		<div x-data :contenteditable="$store.isEditable ? 'true' : 'false'" class="<?php echo esc_attr( caiem_get_css_classes( 'email' ) ); ?>"  <?php echo caiem_get_attributes( 'email' ); ?> ><?php echo esc_html( $email_value ); ?></div>

		<!-- URL & label -->
		<div x-data="{label: '<?php echo $link_label; ?>', link: '<?php echo $link_url; ?>'}">


			<div>
				<a :href="link" x-text="label"></a>
				<button x-show="$store.isEditable" @click="showModal=true"><i class="fa-solid fa-pen-to-square"></i></button>
			</div>

			<style>

				[x-cloak] {
				display: none !important;
				}
				.overlay {
				width: 100%;
				height: 100%;
				position: fixed;
				top: 0;
				left: 0;
				background: black;
				opacity: 0.75;
				}
				.modal {
				/* display: flex;
				visibility: hidden; */
				align-items: center;
				justify-content: center;
				position: fixed;
				z-index: 10;
				width: 100%;
				height: 100%;
				}
				.model-inner {
				background-color: white;
				border-radius: 0.5em;
				max-width: 600px;
				padding: 2em;
				margin: auto;
				}
				.modal-header {
				display: flex;
				align-items: center;
				justify-content: space-between;
				border-bottom: 2px solid black;
				}

			</style>

			<div
				class="modal"
				role="dialog"
				tabindex="-1"
				x-show="showModal"
				x-cloak
				x-transition
			>
				<div class="model-inner">
					<div class="modal-header">
						<h3>Edit Link</h3>
						<button aria-label="Close" x-on:click="showModal=false">✖</button>
					</div>
					<!-- content -->
					<div>
						<input x-model="label" type="text" placeholder="Enter label" class="link <?php echo esc_attr( caiem_get_css_classes( 'label' ) ); ?>" data-gfield="label" />
						<input x-model="link" type="url" placeholder="Enter URL" class="link <?php echo esc_attr( caiem_get_css_classes( 'url' ) ); ?>" data-gfield="url" />
					</div>
				</div>
			</div>
			<div class="overlay" x-show="showModal" x-cloak></div>

			<!-- Modal -->
			<div
			class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
			x-show="showModal"
			style="display: none !important;"
			>
				<!-- Modal inner -->
				<div
					class="max-w-3xl px-6 py-4 mx-auto text-left bg-white rounded shadow-lg"
					x-transition:enter="motion-safe:ease-out duration-300"
					x-transition:enter-start="opacity-0 scale-90"
					x-transition:enter-end="opacity-100 scale-100"
				>
					<!-- Title / Close-->
					<div class="flex items-center justify-between">
						<h5 class="mr-3 text-black max-w-none">Edit Link</h5>
					</div>

					<!-- content -->
					<div>
						<input x-model="label" type="text" placeholder="Enter label" class="<?php echo esc_attr( caiem_get_css_classes( 'label' ) ); ?>" data-gfield="label" />
						<input x-model="link" type="url" placeholder="Enter URL" class="<?php echo esc_attr( caiem_get_css_classes( 'url' ) ); ?>" data-gfield="url" />
					</div>
				</div>
			</div>
		</div>

		<!-- Single Image -->
		<?php
			$imgVal = caiem_get_value( 'images' );
			if (! $imgVal) {
				$imgVal = 'https://via.placeholder.com/428x274';
			}
		?>
		<img id="header-hero-img" class="<?php echo esc_attr( caiem_get_css_classes( 'images' ) ); ?>" <?php echo caiem_get_attributes( 'images' ); ?> src="<?php echo esc_url($imgVal); ?>" />

		<?php astra_content_page_loop(); ?>

		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
