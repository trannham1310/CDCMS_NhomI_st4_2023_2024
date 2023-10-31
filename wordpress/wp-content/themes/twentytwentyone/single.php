<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

/* Start the Loop */
while (have_posts()) :
  the_post();

  get_template_part('template-parts/content/content-single');

  if (is_attachment()) {
    // Parent post navigation.
    the_post_navigation(
      array(
        /* translators: %s: Parent post link. */
        'prev_text' => sprintf(__('<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentytwentyone'), '%title'),
      )
    );
  }

  $twentytwentyone_next = is_rtl() ? twenty_twenty_one_get_icon_svg('ui', 'arrow_left') : twenty_twenty_one_get_icon_svg('ui', 'arrow_right');
  $twentytwentyone_prev = is_rtl() ? twenty_twenty_one_get_icon_svg('ui', 'arrow_right') : twenty_twenty_one_get_icon_svg('ui', 'arrow_left');

  $twentytwentyone_next_label     = esc_html__('Next post', 'twentytwentyone');
  $twentytwentyone_previous_label = esc_html__('Previous post', 'twentytwentyone');
  $next_date_post = get_next_post()->post_date;

  $prev_date_post = get_previous_post()->post_date;

  if (is_attachment()) {
    // Parent post navigation.
    the_post_navigation(
      array(
        /* translators: %s: Parent post link. */
        'prev_text' => sprintf(__('<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentytwentyone'), '%title'),
      )
    );
  }

  the_post_navigation(
    array(
      'next_text' => '<p class="meta-nav"></p> <div class="list_news">
      <div class="headlines">
        <ul class="ulmain">
          <li>
            <div class="headlinesdate">
              <div class="headlinesdm">
                <div class="headlinesday">' .  date("j", strtotime($next_date_post)) . '</div>
                <div class="headlinesmonth">' . date("m", strtotime($next_date_post))  . '</div>
              </div>
              <div class="headlinesyear">' . date("y", strtotime($next_date_post)) . '</div>
            </div>
            <div class="headlinestitle">
						<p class="post-title">%title</p>
            </div>
          </li>
        </ul>
      </div>
    </div>',
      'prev_text' => '<p class="meta-nav">
			 <div class="list_news">
      <div class="headlines">
        <ul class="ulmain">
        <li>
        <div class="headlinesdate">
          <div class="headlinesdm">
            <div class="headlinesday">' . date("j", strtotime($prev_date_post)) . '</div>
            <div class="headlinesmonth">' . date("m", strtotime($prev_date_post)) . '</div>
          </div>
          <div class="headlinesyear">' . date("y", strtotime($prev_date_post)) . '</div>
        </div>
        <div class="headlinestitle">
        <p class="post-title">%title</p>
        </div>
      </li>
        </ul>
      </div>
    </div>',
    )
  );

  // If comments are open or there is at least one comment, load up the comment template.
  if (comments_open() || get_comments_number()) {
    comments_template();
  }

// Previous/next post navigation.
endwhile; // End of the loop.

get_footer();
?>
<style>
/*Sửa phân trang*/
.post-navigation .nav-links {
  flex-direction: column;
  align-items: center;
}

.nav-next .headlinestitle {
  text-align: left;
}

.post-navigation .nav-links .headlinestitle .post-title {
  font-weight: 300;
}

/**Sửa phân trang**/





@media (max-width: 767px) {
  .timeline>li {
    margin-bottom: 15px;
  }

  .ulmain.timeline:before {
    left: 20px;
  }

  .ulmain.timeline>li>.timeline-panel {
    width: calc(100% - 90px);
    width: -moz-calc(100% - 90px);
    width: -webkit-calc(100% - 90px);
  }

  .ulmain.timeline>li>.timeline-badge {
    left: 11px;
    margin-left: 0;
    top: 16px;
  }




}

/*-----------------------------------Tin tá»©c----------------------------------------*/


.row>.col-md-6>img {
  max-width: 100%;
}

.headlines {
  background: #56bdbf;
  overflow: hidden;
  padding: 20px 30px;
}

.headlines .ulmain {
  list-style: none;
  margin: 0;
  padding: 0;
}

.headlines .ulmain>li {
  overflow: hidden;
  display: table;
  margin-bottom: 5px;
  width: 100%;
}

.headlines .ulmain>li>.headlinestitle {
  display: table-cell;
  vertical-align: middle;
  width: 85%;
}

.headlinesdate .headlinesdm,
.news>.headlines .headlinesdate,
.headlinesdate {
  float: left;
  font-family: "Prata", serif;
}

.headlines .headlinesdate {
  font-size: 0.8em;
  width: 15%;
  min-width: 55px;
  display: table-cell;
  vertical-align: middle;
}

.headlinesdate .headlinesday,
.news>.headlines .headlinesmonth {
  line-height: 1.7em;
}

.headlinesdate .headlinesday {
  border-bottom: 1px solid #fff;
}

.headlinesdate .headlinesyear {
  line-height: 3.5em;
  float: left;
  margin-left: 3px;
}

.news>.newsall {
  display: block;
  padding: 10px;
  text-align: center;
  background: #62c6c8;
  text-transform: uppercase;
  font-weight: bold;
}




.list_news {
  margin-top: 0px;
}

.list_new_view {
  margin-bottom: 15px;
}

.prof_articles .top_news_block {
  margin: 0 0 15px;
}

/*--------------------------------------------------Students-----------------------------------------*/
.list_news .headlines {
  background: #fff;
  color: black;
}

.list_news .headlines a {
  color: #fff;
}

.list_news .headlines .headlinesday,
.detail .headlinesdate .headlinesday {
  border-bottom: 1px solid black;
}
</style>