<?php

/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_unique_id/
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$twentytwentyone_unique_id = wp_unique_id('search-form-');

$twentytwentyone_aria_label = !empty($args['aria_label']) ? 'aria-label="' . esc_attr($args['aria_label']) . '"' : '';
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<form role="search" <?php echo $twentytwentyone_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. 
                    ?> method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label for="<?php echo esc_attr($twentytwentyone_unique_id); ?>"><?php _e('Search&hellip;', 'twentytwentyone'); // phpcs:ignore: WordPress.Security.EscapeOutput.UnsafePrintingFunction -- core trusts translations 
                                                                        ?></label>
    <i class="fa-solid fa-magnifying-glass h5 search-icon"></i>

    <input type="search" placeholder="Search topics or keywords"
        id="<?php echo esc_attr($twentytwentyone_unique_id); ?>" class="search-field"
        value="<?php echo get_search_query(); ?>" name="s" />
    <input type="submit" class="search-submit"
        value="<?php echo esc_attr_x('Search', 'submit button', 'twentytwentyone'); ?>" />
</form>