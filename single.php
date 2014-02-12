<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php if (has_post_thumbnail()) : ?>
        <?php
            $splash_src = wp_get_attachment_image_src( get_post_thumbnail_id(), $size='fullscreen-background' );
        ?>
        <?php echo '<div class="splash-section full-background" style="background-image:url('. $splash_src[0] .');">'?></div>
    <?php endif; ?>
        <div id="mainContent" class="row">
            <div class="page large-8 small-12 columns">
                <div class="content">
                    <h1 class="title"><?php the_title(); ?></h1>
                    <div>
                        <p class="text"><?php the_content(); ?></p>
                    </div>
                    <div class="tags">
					   	<p><?php the_tags('Tags:',''); ?></p>
				   	</div>
                </div>
            	<?php comments_template(); ?>
<?php endwhile; endif; ?>
                <?php post_navigation(); ?>
            </div>
            <aside class="large-4 columns" id="sideColumn">
                <?php get_sidebar(); ?>
            </aside>
        </div>

<?php get_footer(); ?>