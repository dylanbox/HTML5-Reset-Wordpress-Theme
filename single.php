<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php if (has_post_thumbnail()) : ?>
        <?php echo '<div class="splash-section full-background" style="background-image:url('. wp_get_attachment_url(get_post_thumbnail_id()) .');">'?></div>
    <?php endif; ?>
        <div id="mainContent" class="row">
            <div class="page large-8 small-12 columns">
                <div class="content">
                    <h1 class="title"><?php the_title(); ?></h1>
                    <div>
                        <p class="text"><?php the_content(); ?></p>
                    </div>
                </div>
            	<?php comments_template(); ?>
<?php endwhile; endif; ?>
                <?php post_navigation(); ?>
            </div>
            <div class="large-3 columns" id="sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>

<?php get_footer(); ?>