<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>
    <div id="mainContent" class="row">
        <div class="large-8 small-12 columns">
        	<h2><?php _e('Error 404 - Page Not Found','html5reset'); ?></h2>
        </div>
        <aside id="sideColumn" class="large-4 columns hide-for-small">
            <?php get_sidebar(); ?>
        </aside>
    </div>
<?php get_footer(); ?>