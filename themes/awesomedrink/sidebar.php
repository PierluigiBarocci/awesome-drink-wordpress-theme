<?php
/**
 * The sidebar containing the main widget area
*/

if ( ! is_active_sidebar( 'awesomedrink-sidebar' ) ) {
    return;
}
?>

<aside id="secondary" class="widget-area pt-lg-0" role="complementary">
    <?php dynamic_sidebar(' awesomedrink-sidebar '); ?>
</aside>