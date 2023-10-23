<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header alignwide">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        <?php twenty_twenty_one_post_thumbnail(); ?>
    </header><!-- .entry-header -->

    <style>
        @media (min-width: 992px) {
            .row {
                margin-left: 110px !important;
                margin-right: 110px !important;
            }
        }

        @media (min-width: 480px) {
            .row {
                margin: 0
            }
        }

        .crossedbg {
            background: url(http://fit.tdc.edu.vn/addons/default/themes/bootstrapThree/img/bg_cr_grey.png);
            height: 15px;
        }

        .list-group-item {
            border: none;
            border-bottom: 1px #d9d9d9 solid;
            margin-bottom: 0;
            padding-left: 0;
            padding-right: 0;
        }

        .list-group {
            list-style: disc;
            margin-bottom: 0;
        }

        .list-group-item:before {
            font-family: Arial, Helvetica, sans-serif;
            color: #f5ce31;
            content: "\2022";
            font-size: 2em;
            padding-right: .5em;
            position: relative;
            top: .15em;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <div class="entry-content row">
        <div class="col-md-3">
            <div class="widget topworks_itdc">
                <div class="panel panel-default">
                    <h2>Category</h2>
                    <div class="crossedbg"></div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <?php
                            $categories_list = get_the_category_list(wp_get_list_item_separator());
                            $categorys = explode(", ", $categories_list);
                            foreach ($categorys as $category) {
                                echo '<li class="list-group-item">' . $category . '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <?php
            the_content();

            wp_link_pages(
                array(
                    'before'   => '<nav class="page-links" aria-label="' . esc_attr__('Page', 'twentytwentyone') . '">',
                    'after'    => '</nav>',
                    /* translators: %: Page number. */
                    'pagelink' => esc_html__('Page %', 'twentytwentyone'),
                )
            );
            ?>
        </div>
        <div class="col-md-3">
            <div class="widget topworks_itdc">
                <div class="panel panel-default">
                    <h2>Recent Post</h2>
                    <div class="crossedbg"></div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <?php
                            $query        = new WP_Query();
                            $recent_posts = $query->query($args);

                            foreach ($recent_posts as $post) {
                                $post_link = esc_url(get_permalink(get_the_ID()));
                                $title     = get_the_title($post);
                                $date = get_the_date();
                                $chuoi = esc_html(get_the_date(DATE_W3C));

                                // Chuyển đổi chuỗi thành đối tượng datetime
                                $datetime = date_create($chuoi);

                                // Định dạng thời gian theo định dạng "d/m/Y"
                                $ngay_thang_nam = $datetime->format('d/m/Y');

                                // Tách chuỗi thành mảng
                                $mang = explode("/", $ngay_thang_nam);

                                // Gán giá trị cho các biến
                                $ngay = $mang[0];
                                $thang = $mang[1];
                                $nam = $mang[2];
                                echo ' <div class="list_news">
									<div class="headlines">
										<ul>
											<li>
												<div class="headlinesdate">
													<div class="headlinesdm">
														<div class="headlinesday">' . $ngay . ' </div>
														<div class="headlinesmonth">' . $thang . '</div>
													</div>
													<div class="headlinesyear">' . $nam . '</div>
												</div>
												<div class="headlinestitle">
													</p>
													<a href="' . $post_link . '" style="text-decoration: none;" ><p class="post-title" > ' . $title . ' </p></a>
												</div>
											</li>
										</ul>
									</div>
								</div>';
                                wp_reset_query();
                            }

                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .entry-content -->

    <footer class="entry-footer default-max-width ksjdfjsdnf">
        <?php twenty_twenty_one_entry_meta_footer(); ?>
    </footer><!-- .entry-footer -->

    <?php if (!is_singular('attachment')) : ?>
        <?php get_template_part('template-parts/post/author-bio'); ?>
    <?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->