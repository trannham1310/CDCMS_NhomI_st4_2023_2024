<?php

/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="list_new_view" style="margin: 0 auto;">
		<div class=" row">
			<div class="col-md-3" style="padding: 35px">
				<span class="topnewsdate">13</span>
				<br />
				<span class="topnewsmonth">Tháng 08</span>
			</div>
			<div class="col-md-7" style="padding: 35px">
				<?php get_template_part('template-parts/header/excerpt-header', get_post_format()); ?>

				<div class="entry-content">
					<?php get_template_part('template-parts/excerpt/excerpt', get_post_format()); ?>
				</div><!-- .entry-content -->
			</div>
		</div>
	</div>
	<footer class="entry-footer default-max-width">
		<?php twenty_twenty_one_entry_meta_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-${ID} -->

<style>
	.list_new_view {
		align-items: center;
		background-color: #fdfdfd;
		border: 1px solid black;
		width: 550px;
		height: 300px;
	}

	.topnewsdate {
		font-size: 65px;
		color: #000000;
	}

	header-detail {
		background-color: white;
		color: blue;
		font-size: 18px;
		font-weight: bold;
	}

	.row {

		display: flex;
	}

	.col-md-3 {
		margin-top: 10px;
		margin-bottom: 10px;
		border-right: 1px solid black;
	}
</style>