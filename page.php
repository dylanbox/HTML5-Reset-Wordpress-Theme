<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>
<div id="page">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php if (has_post_thumbnail()) : ?>
            <?php
                $splash_src = wp_get_attachment_image_src( get_post_thumbnail_id(), $size='thumbnail' );
            ?>
            <?php echo '<div class="splash-section full-background" style="background-image:url('. $splash_src[0] .');">'?></div>
        <?php endif; ?>
            <div id="mainContent" class="row">
                <div class="page large-12 columns">
                    <div class="content">
                        <h1><?php the_title(); ?></h1>
                        <div class="text">
                            <p><?php the_content(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
