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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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

.post-m-11 .title-news a {
  text-decoration: none;
  color: #000;
  padding-left: 10px;
}

.post-m-11 {
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
<div class="row me-auto">
  <div class="col-md-4 position-relative">
    <div class="bg-white">
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
            <div class="post-m-11">
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
            <div class="post-m-11">
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
    <div class="bg-white">
      <?php dynamic_sidebar( 'comment-12' ); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
<style>
body {

  background: url(data:image/png;base64,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);
}
</style>