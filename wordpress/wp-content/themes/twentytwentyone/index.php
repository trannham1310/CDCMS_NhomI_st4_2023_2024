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

<?php if (is_home() && !is_front_page() && !empty(single_post_title('', false))) : ?>
	<header class="page-header alignwide">
		<h1 class="page-title"><?php single_post_title(); ?></h1>
	</header><!-- .page-header -->
<?php endif; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="shortcut icon" href="http://el.tdc.edu.vn/theme/image.php/bootstrap/theme/1582081817/favicon" />
<style>
	.number-top-view {
		font-family: "Merriweather", serif;
		font-size: 48px;
		color: #222;
		font-weight: bold;
	}

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
	.item-news {
		padding-bottom: 20px;
		border-bottom: 1px solid #e5e5e5;
	}

	.item-news .title-news {
		font-family: "Merriweather", serif;
		font-size: 14px;
		display: inline;
	}

	.post-11 .title-news a {
		text-decoration: none;
		color: #000;
		padding-left: 10px;
	}
	.post-11 {
		border-top: 1px solid #e5e5e5;
	}

	.post-view-11:before {
		content: "";
		width: 1px;
		height: 200px;
		position: absolute;
		top: 40px;
		left: 50%;
		background: #e5e5e5;
	}
	.post-title-11 {
		display: inline-block;
		position: relative;
	}
	.post-title-11:before {
		content: "";
		width: 100%;
		height: 1px;
		background: #9f224e;
		position: absolute;
		left: 0;
		bottom: -8px;
	}
	</style>
<div class="container">
	<div class="row">
		<div class="col-md-4 position-relative">
			<h4 class="post-title-11">Bài viết yêu thích</h4>
			<article class="item-news">
				<div class="row post-view-11">
					<div class="col-md-6">
						<?php
						// Query để lấy danh sách bài viết
						$query = new WP_Query();
						$query->query('posts_per_page=3');

						// Số thứ tự bài viết
						$count = 1;

						while ($query->have_posts()) : $query->the_post(); ?>
							<div class="post-11">
								<span class="number-top-view"><?php echo $count; ?></span>
								<h3 class="title-news"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							</div>
						<?php
							// Tăng số thứ tự bài viết lên 1
							$count++;
						endwhile;

						// Đặt lại query
						wp_reset_query();
						?>
					</div>

					<div class="col-md-6">
						<?php
						// Query để lấy danh sách bài viết
						$query = new WP_Query();
						$query->query('posts_per_page=3&offset=3');

						// Số thứ tự bài viết
						$count = 4;

						while ($query->have_posts()) : $query->the_post(); ?>
							<div class="post-11">
								<span class="number-top-view"><?php echo $count; ?></span>
								<h3 class="title-news"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							</div>
						<?php
							// Tăng số thứ tự bài viết lên 1
							$count++;
						endwhile;

						// Đặt lại query
						wp_reset_query();
						?>
					</div>
				</div>
			</article>
		</div>	
		<div class="col-md-4">
			<?php
			if (have_posts()) {

				// Load posts loop.
				while (have_posts()) {
					the_post();

					get_template_part('template-parts/content/content', get_theme_mod('display_excerpt_or_full_post', 'excerpt'));
				}

				// Previous/next page navigation.
				twenty_twenty_one_the_posts_navigation();
			} else {

				// If no content, include the "No posts found" template.
				get_template_part('template-parts/content/content-none');
			}
			?>
		</div>
		<div class="col-md-4">
			<?php dynamic_sidebar( 'comment-12' ); ?>
		</div>
	</div>
</div>

<?php
get_footer();
?>