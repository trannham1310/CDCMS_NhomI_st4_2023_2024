<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); ?>

<?php if ( is_home() && ! is_front_page() && ! empty( single_post_title( '', false ) ) ) : ?>
	<header class="page-header alignwide">
		<h1 class="page-title"><?php single_post_title(); ?></h1>
	</header><!-- .page-header -->
<?php endif; ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="shortcut icon" href="http://el.tdc.edu.vn/theme/image.php/bootstrap/theme/1582081817/favicon" />
<style>
	.comment-12, .comment-12 p {
		margin: 0 !important;
		border-bottom: 1px solid #eee;
	}
	.comment-12 p {
		font-weight: 700;
		font-size: 13px;
		color: #488dc6;
		padding-left: 15px;
	}

	.comment-12 p:after {
		font-family: FontAwesome;
		content: "\f105";
		float: right;
	}
</style>
<div class="container">
	<div class="row me-auto">
		<div class="col-md-4">
			<!-- module 11 -->
		</div>
		<div class="col-md-4">
		<?php
		if ( have_posts() ) {
			// Load posts loop.
			while ( have_posts() ) {
				the_post();

				get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) );
			}

			// Previous/next page navigation.
			twenty_twenty_one_the_posts_navigation();

		} else {

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content-none' );

		} ?>
		</div>
		<div class="col-md-4">
			<?php dynamic_sidebar( 'comment-12' ); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
