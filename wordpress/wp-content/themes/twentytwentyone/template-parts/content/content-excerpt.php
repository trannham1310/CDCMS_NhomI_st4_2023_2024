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
  <div class="row content-2">
    <div class="col-md-3 col-xs-3 topnewstime">
      <span class="topnewsdate"><?php echo get_the_date('d') ?></span><br>
      <span class="topnewsmonth"><?php echo "Tháng " . get_the_date('m') ?></span><br>
    </div>
    <div class="col-md-9 col-xs-9 shortdesc">
      <?php get_template_part('template-parts/header/excerpt-header', get_post_format()); ?>

      <div class="entry-content">
        <?php get_template_part('template-parts/excerpt/excerpt', get_post_format()); ?>
      </div><!-- .entry-content -->

      <footer class="entry-footer default-max-width">
        <?php //twenty_twenty_one_entry_meta_footer(); 
        ?>
      </footer><!-- .entry-footer -->
    </div>
  </div>
</article><!-- #post-${ID} -->

<style>
/* .list_new_view {
    align-items: center;
    background-color: #fdfdfd;
    border: 1px solid black;
    width: 550px;
    height: 300px;
  } */

/* .topnewsdate {
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
  } */
</style>

<style>
.content-2,
.content-2 a {
  font-size: 0.9em;
  background: #fff;
  margin-bottom: 10px;
  padding: 15px 0;
}

.topnewstime>.topnewsdate {
  font-family: 'Prata', serif;
  font-size: 3.1em;
  line-height: 1em;
}

.content-2 .topnewstime {
  margin-top: 10px;
  text-align: center;
  padding-left: 0;
}

.topnewstime>.topnewsmonth {
  text-transform: uppercase;
  font-size: 0.9em;
}

.content-2 .shortdesc h2 {
  text-transform: uppercase;
  font-family: 'Open Sans Condensed', sans-serif;
  font-weight: bold;
  font-size: 18px;
  margin-bottom: 5px;
}

.content-2 .shortdesc .entry-header {
  margin-top: 12px;
}

.content-2 .shortdesc {
  border-left: 1px solid #000;
}

.content-2 .shortdesc h2 a {
  color: #428bca;
  text-decoration: none;
}

.content-2 .shortdesc h2 a:hover {
  color: #2a6496;
  text-decoration: underline;
}

.content-2 .entry-content {
  margin-top: 0px;
}
</style>