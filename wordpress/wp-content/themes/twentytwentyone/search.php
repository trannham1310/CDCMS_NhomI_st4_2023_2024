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
<?php
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
    background-color: #f5efe0;
    margin: 0;
}

/* không chô hiển thị label */
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
    background: #28a745 !important;
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