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
	.wpb_wrapper h4 {
		font-weight: 500;
		margin: 0;
	}

	.wpb_wrapper hr {
		margin: 0;
		border-width: 2px;
		width: 45px;
		margin-bottom: 10px;
		margin-top: 10px;
	}

	.wpb_wrapper ul.list_comment {
		list-style: none;
		margin: 0 0 20px 0;
		padding: 0;
		font-weight: 700;
		font-size: 13px;
		margin-bottom: 0;
		color: #2d4050;
		-webkit-font-smoothing: subpixel-antialiased;
	}

	.wpb_wrapper ul.list_comment li a {
		text-decoration: none;
		padding: 4px 10px;
		display: block;
		margin-bottom: 0;
		border-bottom: 1px solid #efefef;
		color: #488dc6;
		-webkit-transition: all 0.4s ease;
		transition: all 0.4s ease;
		background: transparent;
	}

	.wpb_wrapper ul.list_comment li a:hover {
		background: #efefef;
		color: #326e99;
	}

	.wpb_wrapper ul.list_comment li a p {
		margin: 0;
	}

	.wpb_wrapper ul.list_comment li a p:after {
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
