<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

if (have_posts()) {

?>
	<header class="page-header alignwide">
		<h1 class="page-title ">
			<?php
			printf(
				/* translators: %s: Search term. */
				esc_html__('Search for "%s"', 'twentytwentyone'),
				'<span class="page-description search-term">' . esc_html(get_search_query()) . '</span>'
			);
			?>
		</h1>
	</header><!-- .page-header -->
	<!-- .page-content -->
	<div class="search-result-count default-max-width">
		<?php
		printf(
			esc_html(
				/* translators: %d: The number of search results. */
				_n(
					'We found %d result for your search.',
					'We found %d results for your search.',
					(int) $wp_query->found_posts,
					'twentytwentyone'
				)
			),
			(int) $wp_query->found_posts
		);
		?>
	</div><!-- .search-result-count -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<div class="row">
		<div class="col-md-3">
			<div class="module-pages">
				<h2>Trang mới nhất</h2>
				<?php
				$args = array(
					'post_type' => 'page',
					'posts_per_page' => 3,
					'order' => 'DESC',
					'orderby' => 'date',
				);

				$query = new WP_Query($args);

				if ($query->have_posts()) {
					while ($query->have_posts()) {
						$query->the_post();

						$title = get_the_title();
						$content = wp_trim_words(get_the_content(), 30); // Giới hạn nội dung 30 từ
						$thumbnail = get_the_post_thumbnail(get_the_ID()); // Lấy ảnh đại diện nhỏ
						$page_link = get_permalink(); // Lấy đường dẫn đến trang

						// Hiển thị thông tin trang
						echo '<a href="' . $page_link . '">';
						echo '<h4>' . $title . '</h4>';
						echo '<hr>';
						echo $thumbnail; // Hiển thị ảnh đại diện
						echo '<p>' . $content . '</p>';
						echo '</a>';
					}
					wp_reset_postdata();
				}
				?>
			</div>
		</div>

		<?php
		?>
		<div class="col-md-6"> <?php
														// Start the Loop.
														while (have_posts()) {
															the_post();

															/*
		 * Include the Post-Format-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		 */

															get_template_part('template-parts/content/content-excerpt', get_post_format());
														} // End the loop.

														// Previous/next page navigation.
														twenty_twenty_one_the_posts_navigation();

														// If no content, include the "No posts found" template.
														?> </div>
	</div>

	<div col-md-3>

	</div>


<?php
} else { ?>
	<div class="search-module">
		<?php get_template_part('template-parts/content/content-none'); ?>
	</div>
<?php
} ?>
<div class="panel-body default-max-width">
	<ul class="list-group">
		<?php
		$args = array(
			'post_type' => 'post',
			'orderby' => 'date',
			'order' => 'DESC',
		);
		$posts = get_posts($args);
		$query        = new WP_Query();

		echo
		'<div class="container mt-5 mb-5">		
				<h4>Latest News</h4>
				<ul class="timeline">';
		for ($i = 0; $i < count($posts); $i++) {
			$post = $posts[$i];
			$post_link = esc_url(get_permalink(get_the_ID()));
			$title     = get_the_title($post);
			$ngay_thang_nam = esc_html(get_the_date());
			echo '<li>
			<a  href="' . $post_link . '"> ' . $title . '</a>
       		<a href="' . $post_link . '" class="float-right">' . $ngay_thang_nam . '</a>
      		<p>' . substr(get_the_excerpt($post->ID), 0, 50) . '<a  href="' . $post_link . '"  style="color:black">...</a></p>

        </li>';
		}
		echo '
    </ul>

</div>';
		?>
	</ul>

</div>


</div><!-- .entry-content -->

<?=
get_footer();
?>
<style>
	ul.timeline {
		list-style-type: none;
		position: relative;
	}

	ul.timeline:before {
		content: ' ';
		background: #d4d9df;
		display: inline-block;
		position: absolute;
		left: 29px;
		width: 2px;
		height: 100%;
		z-index: 400;
	}

	ul.timeline>li {
		margin: 20px 0;
		padding-left: 8px;
	}

	ul.timeline>li:before {
		content: ' ';
		background: white;
		display: inline-block;
		position: absolute;
		border-radius: 50%;
		border: 3px solid #22c0e8;
		left: 20px;
		width: 20px;
		height: 20px;
		z-index: 400;
	}
</style>
<style>
	:root {
		--color-button-search: #28a745;
		--color-bg-search: #f5efe0;
	}

	.search-module .no-results.not-found {
		background-color: white;
	}

	.search-module .container-title {
		max-width: 475px;
	}

	.search-module .bg-search {
		display: flex;
		justify-content: center;
		align-items: center;
		width: 100%;
		height: 150px;
		padding-bottom: 10px;
		background-color: var(--color-bg-search);
		margin: 0;
	}

	.search-module label {
		display: none;
	}

	.search-module p.search-title {
		font-size: 30px;
		font-weight: 650;
	}

	.search-module .page-header.alignwide {
		border: none;
		margin-bottom: 0;
		padding: 0;
	}

	.search-module form.search-form {
		position: relative;
	}

	.search-module .search-icon {
		position: absolute;
		top: 50%;
		transform: translateY(-50%);
		left: 20px;
		font-weight: bolder;
	}

	.search-module .search-form .search-field {
		width: 600px;
		height: 70px;
		border: none;
		margin: 0;
		margin: auto;
		padding-left: 50px;
		padding-right: 120px;
		border: 1px solid rgba(0, 0, 0, 0.125);
		border-radius: 4px;
	}

	.search-module input.search-submit {
		background: var(--color-button-search) !important;
		border-radius: 4px;
		position: absolute;
		padding: 0 10px;
		height: 40px;
		right: 15px;
		top: 50%;
		transform: translateY(-50%);
		margin-top: 0;
	}

	.search-module .page-content {
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		margin: 0;
	}
</style>
<!-- style pages -->
<style>
	.module-pages {
		margin: 50px;
	}
</style>