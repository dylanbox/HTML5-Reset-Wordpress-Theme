<?php
/*
Template Name: Front Page
*/
get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php if(has_post_thumbnail()): ?>
        <?php
            $splash_src = wp_get_attachment_image_src( get_post_thumbnail_id(), $size='fullscreen-background' );
        ?>
        <?php echo '<div class="splash-section full-background" style="background-image:url('. $splash_src[0] .');">'?>
            <div class="transparent-cover">
                <div id="homepageDescription">
                    <div class="homepage-content">
                        <?php the_content(); ?>
                    </div>
                </div>
		    </div>
        </div>
    <?php else: ?>
        <div class="splash-section no-thumbnail">
            <div id="homepageDescription">
		        <div class="homepage-content">
                    <?php the_content(); ?>
                </div>
		    </div>
        </div>
    <?php endif; ?>
<?php endwhile; endif; ?>

<section id="mainContent" class="row homepage-widgets">

    <?php dynamic_sidebar( 'Homepage Widgets' ); ?>

</section>
<?php get_footer(); ?>
