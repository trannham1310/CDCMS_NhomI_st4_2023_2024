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

  // If comments are open or there is at least one comment, load up the comment template.
  if (comments_open() || get_comments_number()) {
    comments_template();
  }

  // Previous/next post navigation.
  $twentytwentyone_next = is_rtl() ? twenty_twenty_one_get_icon_svg('ui', 'arrow_left') : twenty_twenty_one_get_icon_svg('ui', 'arrow_right');
  $twentytwentyone_prev = is_rtl() ? twenty_twenty_one_get_icon_svg('ui', 'arrow_right') : twenty_twenty_one_get_icon_svg('ui', 'arrow_left');

<<<<<<< HEAD
  $twentytwentyone_next_label     = esc_html__('Next post', 'twentytwentyone');
  $twentytwentyone_previous_label = esc_html__('Previous post', 'twentytwentyone');

  the_post_navigation(
    array(
      'next_text' => '<p class="meta-nav">' . $twentytwentyone_next_label . $twentytwentyone_next . '</p> <div class="list_news">
=======
	$twentytwentyone_next_label     = esc_html__('Next post', 'twentytwentyone');
	$twentytwentyone_previous_label = esc_html__('Previous post', 'twentytwentyone');
	$query        = new WP_Query();
	$recent_posts = $query->query($args);
	$chuoi = esc_html(get_the_date(DATE_W3C));
	$mang = explode("-", $chuoi);

	// Gán giá trị cho các biến
	$ngay = $mang[2];
	$thang = $mang[1];
	$nam = $mang[0];
	$ngay = substr($ngay, 0, 2);
	the_post_navigation(
		array(
			'next_text' => '<p class="meta-nav">' . $twentytwentyone_next_label . $twentytwentyone_next . '</p> <div class="list_news">
>>>>>>> nham-7
      <div class="headlines">
        <ul>
          <li>
            <div class="headlinesdate">
              <div class="headlinesdm">
                <div class="headlinesday">' . $ngay . '</div>
                <div class="headlinesmonth">' . $thang . '</div>
              </div>
              <div class="headlinesyear">' . $nam . '</div>
            </div>
            <div class="headlinestitle">
						</p><p class="post-title">%title</p>
            </div>
          </li>
        </ul>
      </div>
    </div>',
      'prev_text' => '<p class="meta-nav">' . $twentytwentyone_prev . $twentytwentyone_previous_label . '
			 <div class="list_news">
      <div class="headlines">
        <ul>
          <li>
            <div class="headlinesdate">
              <div class="headlinesdm">
							<div class="headlinesday">' . $ngay . '</div>
							<div class="headlinesmonth">' . $thang . '</div>
						</div>
						<div class="headlinesyear">' . $nam . '</div>
            </div>
            <div class="headlinestitle">
						</p><p class="post-title">%title</p>
            </div>
          </li>
        </ul>
      </div>
    </div>',
    )
  );
endwhile; // End of the loop.

get_footer();
?>
<style>
<<<<<<< HEAD
.bodytimeline {
    padding: 0;
    background: none;
}

.timeline .eventtime .eventtimecover {
    position: absolute;
    top: 9px;
    left: 10px;
}

.timeline .eventtime {
    width: 56px;
    height: 56px;
    background: #f5ce31;
    border-radius: 50%;
    position: relative;
    color: #fff;
    float: left;
}

.timeline .eventtime .eventday {
    font-weight: bold;
    font-size: 1.5em;
    border-bottom: 1px #4e4e4e solid;
    line-height: 1em;
}

.timeline .eventtime .eventdm {
    float: left;
    width: 45%;
}

.timeline .eventtime .eventmonth {
    text-align: center;
}

.timeline .eventtime .eventyear {
    float: left;
    margin-top: 14px;
}

.timeline .eventdetails {
    text-align: right;
    float: right;
    width: 59%;
    margin-top: 7px;
}

.timeline .eventdetails .eventlocation {
    font-family: "Open Sans Condensed", sans-serif;
    font-weight: bold;
}

.timeline .eventdetails .eventdesc {
    margin-top: 15px;
}

.timeline {
    list-style: none;
    padding: 20px 0 20px;
    position: relative;
    margin: 0;
}

.timeline:before {
    top: 0;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 2px;
    background-color: #d9d9d9;
    left: 50%;
    margin-left: -1.5px;
}

.timeline>li {
    position: relative;
}

.timeline>li:before,
.timeline>li:after {
    content: " ";
    display: table;
}

.timeline>li:after {
    clear: both;
}

.timeline>li:before,
.timeline>li:after {
    content: " ";
    display: table;
}

.timeline>li:after {
    clear: both;
}

.timeline>li>.timeline-panel {
    width: 46%;
    float: left;
    position: relative;
}

.timeline>li>.timeline-panel:before {
    position: absolute;
    top: 27px;
    right: -15px;
    display: inline-block;
    border-top: 1px solid #d9d9d9;
    content: " ";
    width: 100%;
}

.timeline>li>.timeline-badge {
    width: 18px;
    height: 18px;
    position: absolute;
    top: 19px;
    left: 50%;
    margin-left: -10px;
    background-color: #fff;
    border: 2px solid #d9d9d9;
    border-radius: 50%;
    z-index: 5;
}

.timeline>li.timeline-inverted>.timeline-panel {
    float: right;
}

.timeline>li.timeline-inverted>.timeline-panel:before {
    border-left-width: 0;
    border-right-width: 15px;
    left: -15px;
    right: auto;
}

.timeline>li.timeline-inverted>.timeline-panel:after {
    border-left-width: 0;
    border-right-width: 14px;
    left: -14px;
    right: auto;
}

.timeline>li.timeline-inverted>.timeline-panel>.eventtime {
    float: right;
}

.timeline>li.timeline-inverted>.timeline-panel>.eventdetails {
    text-align: left;
    float: left;
}

.timeline-badge.current {
    border: 3px solid #fff !important;
}

@media (max-width: 767px) {
    .timeline>li {
        margin-bottom: 15px;
    }

    ul.timeline:before {
        left: 20px;
    }

    ul.timeline>li>.timeline-panel {
        width: calc(100% - 90px);
        width: -moz-calc(100% - 90px);
        width: -webkit-calc(100% - 90px);
    }

    ul.timeline>li>.timeline-badge {
        left: 11px;
        margin-left: 0;
        top: 16px;
    }

    .timeline .eventtime {
        float: right;
    }

    .timeline .eventdetails {
        text-align: left;
        float: left;
    }

    ul.timeline>li>.timeline-panel {
        float: right;
        margin-right: 50px;
    }

    ul.timeline>li>.timeline-panel:before {
        border-left-width: 0;
        border-right-width: 15px;
        left: -15px;
        right: auto;
    }

    ul.timeline>li>.timeline-panel:after {
        border-left-width: 0;
        border-right-width: 14px;
        left: -14px;
        right: auto;
    }
}

/*-----------------------------------Tin tá»©c----------------------------------------*/
.news {
    background: none;
    padding: 0;
    color: #fff;
}

.news>.topnews {
    background: #4bb4b6;
    padding: 30px 0;
}

.topnews .topnewstime {
    text-align: center;
}

.topnewstime>.topnewsdate {
    font-family: "Prata", serif;
    font-size: 3.1em;
    line-height: 1em;
    margin-left: 15px;
}

.topnewstime>.topnewsmonth {
    text-transform: uppercase;
    font-size: 0.9em;
    margin-left: 15px;
}

.news>.topnews h4,
.toparticle>h4 {
    font-weight: bold;
    font-size: 1.1em;
    line-height: 1.3em;
}

.news>.topnews h4 a {
    color: #fff;
}

.news>.topnews>.row .row {
    margin: 0 !important;
}

.news a {
    color: #fff;
}

.row>.col-md-6>img {
    max-width: 100%;
}

.headlines {
    background: #56bdbf;
    overflow: hidden;
    padding: 20px 30px;
}

.headlines ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.headlines ul>li {
    overflow: hidden;
    display: table;
    margin-bottom: 5px;
    width: 100%;
}

.headlines ul>li>.headlinestitle {
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

/*-----------------------------------List item panel -----------------------------------*/
.list-group-item {
    border: none;
    border-bottom: 1px #d9d9d9 solid;
    margin-bottom: 0;
    padding-left: 0;
    padding-right: 0;
    margin: 0 15px;
}

.list-group-item:last-child {
    border: none;
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
    padding-right: 0.5em;
    position: relative;
    top: 0.15em;
}

/*---------------------------------------------Articles---------------------------------*/
.toparticle>.thumb img {
    max-width: 100%;
}

.toparticle>h4 a,
#departments .col-md-3 .placeholder-name a {
    color: #333;
}

/*--------------------------------------------------Departments-----------------------------------------*/
#departments {
    background: #f5ce31;
    overflow: hidden;
}

#departments .crossedbg {
    height: 107px;
}

#departments h3 {
    font-weight: bold;
    padding: 15px 0;
}

#departments .col-md-2 {
    padding: 0;
}

#departments .col-md-3 .placeholder-name {
    background: #fff;
    border-radius: 5px;
    padding: 10px;
    margin: 15px 0 10px 0;
    position: relative;
    height: 70px;
}

#departments .col-md-3 .placeholder-name:before {
    content: "";
    position: absolute;
    right: 40%;
    top: -10px;
    width: 0;
    height: 0;
    border-right: 13px solid transparent;
    border-bottom: 20px solid #fff;
    border-left: 13px solid transparent;
}

#departments .col-md-3 .placeholder-name h5 {
    font-weight: bold;
    font-size: 1em;
    line-height: 1.3em;
}

/*--------------------------------------------------Footer-----------------------------------------*/


/*--------------------------------------------------NEWS-----------------------------------------------*/
.top_news_block,
.list_new_view {
    background: #fff;
    -webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
    box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
}

.top_news_block_thumb img {
    max-width: 100%;
    width: 100%;
}

.top_news_block_desc {
    font-size: 0.9em;
    padding: 15px;
}

.top_news_block_desc h4 {
    text-transform: uppercase;
    font-family: "Open Sans Condensed", sans-serif;
    font-weight: bold;
}

.top_news_block_desc .topnewstime {
    margin-top: 12px;
    text-align: center;
    padding-left: 0;
}

.list_new_view .top_news_block_desc .topnewstime {
    padding-left: 15px;
}

.shortdesc {
    border-left: 1px solid #666;
}

.pagination-centered {
    text-align: center;
}

/*--------------------------------------------------Prof-----------------------------------------*/
.profview {
    text-align: center;
    margin-top: 20px;
}

.profview_thumb {
    padding: 8px;
    background: url(../img/bg_cr_grey.png);
    border-radius: 50%;
}

.profview_thumb_wrap {
    overflow: hidden;
    border-radius: 50%;
}

.profview_thumb img {
    border-radius: 50%;
    transition: all 0.1s linear;
}

.profview_thumb:hover img {
    transform: scale(1.1);
}

.prof_name {
    font-family: "Open Sans Condensed", sans-serif;
    font-weight: bold;
    color: #003b7a;
    text-transform: capitalize;
    font-size: 1.1em;
}

.prof_list .profview:nth-child(4n + 1) {
    clear: both;
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
    background: #56bdbf;
    color: #fff;
}

.list_news .headlines a {
    color: #fff;
}

.list_news .headlines .headlinesday,
.detail .headlinesdate .headlinesday {
    border-bottom: 1px solid #fff;
}
=======
	.bodytimeline {
		padding: 0;
		background: none;
	}

	.timeline .eventtime .eventtimecover {
		position: absolute;
		top: 9px;
		left: 10px;
	}

	.timeline .eventtime {
		width: 56px;
		height: 56px;
		background: #f5ce31;
		border-radius: 50%;
		position: relative;
		color: #fff;
		float: left;
	}

	.timeline .eventtime .eventday {
		font-weight: bold;
		font-size: 1.5em;
		border-bottom: 1px #4e4e4e solid;
		line-height: 1em;
	}

	.timeline .eventtime .eventdm {
		float: left;
		width: 45%;
	}

	.timeline .eventtime .eventmonth {
		text-align: center;
	}

	.timeline .eventtime .eventyear {
		float: left;
		margin-top: 14px;
	}

	.timeline .eventdetails {
		text-align: right;
		float: right;
		width: 59%;
		margin-top: 7px;
	}

	.timeline .eventdetails .eventlocation {
		font-family: "Open Sans Condensed", sans-serif;
		font-weight: bold;
	}

	.timeline .eventdetails .eventdesc {
		margin-top: 15px;
	}

	.timeline {
		list-style: none;
		padding: 20px 0 20px;
		position: relative;
		margin: 0;
	}

	.timeline:before {
		top: 0;
		bottom: 0;
		position: absolute;
		content: " ";
		width: 2px;
		background-color: #d9d9d9;
		left: 50%;
		margin-left: -1.5px;
	}

	.timeline>li {
		position: relative;
	}

	.timeline>li:before,
	.timeline>li:after {
		content: " ";
		display: table;
	}

	.timeline>li:after {
		clear: both;
	}

	.timeline>li:before,
	.timeline>li:after {
		content: " ";
		display: table;
	}

	.timeline>li:after {
		clear: both;
	}

	.timeline>li>.timeline-panel {
		width: 46%;
		float: left;
		position: relative;
	}

	.timeline>li>.timeline-panel:before {
		position: absolute;
		top: 27px;
		right: -15px;
		display: inline-block;
		border-top: 1px solid #d9d9d9;
		content: " ";
		width: 100%;
	}

	.timeline>li>.timeline-badge {
		width: 18px;
		height: 18px;
		position: absolute;
		top: 19px;
		left: 50%;
		margin-left: -10px;
		background-color: #fff;
		border: 2px solid #d9d9d9;
		border-radius: 50%;
		z-index: 5;
	}

	.timeline>li.timeline-inverted>.timeline-panel {
		float: right;
	}

	.timeline>li.timeline-inverted>.timeline-panel:before {
		border-left-width: 0;
		border-right-width: 15px;
		left: -15px;
		right: auto;
	}

	.timeline>li.timeline-inverted>.timeline-panel:after {
		border-left-width: 0;
		border-right-width: 14px;
		left: -14px;
		right: auto;
	}

	.timeline>li.timeline-inverted>.timeline-panel>.eventtime {
		float: right;
	}

	.timeline>li.timeline-inverted>.timeline-panel>.eventdetails {
		text-align: left;
		float: left;
	}

	.timeline-badge.current {
		border: 3px solid #fff !important;
	}

	@media (max-width: 767px) {
		.timeline>li {
			margin-bottom: 15px;
		}

		ul.timeline:before {
			left: 20px;
		}

		ul.timeline>li>.timeline-panel {
			width: calc(100% - 90px);
			width: -moz-calc(100% - 90px);
			width: -webkit-calc(100% - 90px);
		}

		ul.timeline>li>.timeline-badge {
			left: 11px;
			margin-left: 0;
			top: 16px;
		}

		.timeline .eventtime {
			float: right;
		}

		.timeline .eventdetails {
			text-align: left;
			float: left;
		}

		ul.timeline>li>.timeline-panel {
			float: right;
			margin-right: 50px;
		}

		ul.timeline>li>.timeline-panel:before {
			border-left-width: 0;
			border-right-width: 15px;
			left: -15px;
			right: auto;
		}

		ul.timeline>li>.timeline-panel:after {
			border-left-width: 0;
			border-right-width: 14px;
			left: -14px;
			right: auto;
		}
	}

	/*-----------------------------------Tin tá»©c----------------------------------------*/
	.news {
		background: none;
		padding: 0;
		color: #fff;
	}

	.news>.topnews {
		background: #4bb4b6;
		padding: 30px 0;
	}

	.topnews .topnewstime {
		text-align: center;
	}

	.topnewstime>.topnewsdate {
		font-family: "Prata", serif;
		font-size: 3.1em;
		line-height: 1em;
		margin-left: 15px;
	}

	.topnewstime>.topnewsmonth {
		text-transform: uppercase;
		font-size: 0.9em;
		margin-left: 15px;
	}

	.news>.topnews h4,
	.toparticle>h4 {
		font-weight: bold;
		font-size: 1.1em;
		line-height: 1.3em;
	}

	.news>.topnews h4 a {
		color: #fff;
	}

	.news>.topnews>.row .row {
		margin: 0 !important;
	}

	.news a {
		color: #fff;
	}

	.row>.col-md-6>img {
		max-width: 100%;
	}

	.headlines {
		background: #56bdbf;
		overflow: hidden;
		padding: 20px 30px;
	}

	.headlines ul {
		list-style: none;
		margin: 0;
		padding: 0;
	}

	.headlines ul>li {
		overflow: hidden;
		display: table;
		margin-bottom: 5px;
		width: 100%;
	}

	.headlines ul>li>.headlinestitle {
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

	/*-----------------------------------List item panel -----------------------------------*/
	.list-group-item {
		border: none;
		border-bottom: 1px #d9d9d9 solid;
		margin-bottom: 0;
		padding-left: 0;
		padding-right: 0;
		margin: 0 15px;
	}

	.list-group-item:last-child {
		border: none;
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
		padding-right: 0.5em;
		position: relative;
		top: 0.15em;
	}

	/*---------------------------------------------Articles---------------------------------*/
	.toparticle>.thumb img {
		max-width: 100%;
	}

	.toparticle>h4 a,
	#departments .col-md-3 .placeholder-name a {
		color: #333;
	}

	/*--------------------------------------------------Departments-----------------------------------------*/
	#departments {
		background: #f5ce31;
		overflow: hidden;
	}

	#departments .crossedbg {
		height: 107px;
	}

	#departments h3 {
		font-weight: bold;
		padding: 15px 0;
	}

	#departments .col-md-2 {
		padding: 0;
	}

	#departments .col-md-3 .placeholder-name {
		background: #fff;
		border-radius: 5px;
		padding: 10px;
		margin: 15px 0 10px 0;
		position: relative;
		height: 70px;
	}

	#departments .col-md-3 .placeholder-name:before {
		content: "";
		position: absolute;
		right: 40%;
		top: -10px;
		width: 0;
		height: 0;
		border-right: 13px solid transparent;
		border-bottom: 20px solid #fff;
		border-left: 13px solid transparent;
	}

	#departments .col-md-3 .placeholder-name h5 {
		font-weight: bold;
		font-size: 1em;
		line-height: 1.3em;
	}

	/*--------------------------------------------------Footer-----------------------------------------*/


	/*--------------------------------------------------NEWS-----------------------------------------------*/
	.top_news_block,
	.list_new_view {
		background: #fff;
		-webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
		-moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
		box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
	}

	.top_news_block_thumb img {
		max-width: 100%;
		width: 100%;
	}

	.top_news_block_desc {
		font-size: 0.9em;
		padding: 15px;
	}

	.top_news_block_desc h4 {
		text-transform: uppercase;
		font-family: "Open Sans Condensed", sans-serif;
		font-weight: bold;
	}

	.top_news_block_desc .topnewstime {
		margin-top: 12px;
		text-align: center;
		padding-left: 0;
	}

	.list_new_view .top_news_block_desc .topnewstime {
		padding-left: 15px;
	}

	.shortdesc {
		border-left: 1px solid #666;
	}

	.pagination-centered {
		text-align: center;
	}

	/*--------------------------------------------------Prof-----------------------------------------*/
	.profview {
		text-align: center;
		margin-top: 20px;
	}

	.profview_thumb {
		padding: 8px;
		background: url(../img/bg_cr_grey.png);
		border-radius: 50%;
	}

	.profview_thumb_wrap {
		overflow: hidden;
		border-radius: 50%;
	}

	.profview_thumb img {
		border-radius: 50%;
		transition: all 0.1s linear;
	}

	.profview_thumb:hover img {
		transform: scale(1.1);
	}

	.prof_name {
		font-family: "Open Sans Condensed", sans-serif;
		font-weight: bold;
		color: #003b7a;
		text-transform: capitalize;
		font-size: 1.1em;
	}

	.prof_list .profview:nth-child(4n + 1) {
		clear: both;
	}

	.list_news {
		margin-top: 45px;
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
	}

	.list_news .headlines a {
		color: #000;
	}

	.list_news .headlines .headlinesday,
	.detail .headlinesdate .headlinesday {
		border-bottom: 1px solid #000;
	}
>>>>>>> nham-7
</style>