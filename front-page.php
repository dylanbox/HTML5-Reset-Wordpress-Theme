<?php
/*
Template Name: Front Page
*/
get_header(); ?>
<?php wp_enqueue_script('font_resize_js', get_bloginfo('template_url').'/js/font-resize.js', array('jquery')); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php if(has_post_thumbnail()): ?>
        <?php
            $splash_src = wp_get_attachment_image_src( get_post_thumbnail_id(), $size='fullscreen-background' );
        ?>
        <?php echo '<div class="splash-section" style="background-image:url('. $splash_src[0] .');">'?>
            <?php echo '<h1 style="background-image:url('. $splash_src[0] .');">'?>
                <?php bloginfo('description'); ?>
            </h1>
            <div id="homepageDescription">
		        <?php the_content(); ?>
		    </div>
        </div>
    <?php else: ?>
        <div class="splash-section no-thumbnail">
            <h1 style="color:#ffffff;">
                <?php bloginfo('description'); ?>
            </h1>
            <div id="homepageDescription">
		        <?php the_content(); ?>
		    </div>
        </div>
    <?php endif; ?>
<?php endwhile; endif; ?>

<section id="mainContent" class="row">
    <div id="about" class="large-4 small-12 columns">
        <a href="<?php echo get_site_url(); ?>/about" class="banner">About</a>
        <?php dynamic_sidebar( 'Homepage Description' ); ?>
    </div>

    <div id="posts" class="large-4 small-12 columns">
        <a href="<?php echo get_site_url(); ?>/news" class="banner">News</a>
        <? $latest_blog_posts = new WP_Query( array( 'posts_per_page' => 3 ) );
        if ( $latest_blog_posts->have_posts() ) : while ( $latest_blog_posts->have_posts() ) : $latest_blog_posts->the_post(); ?>

            <div class="post">
                <?php if(has_post_thumbnail()): ?>
                    <a href="<?php the_permalink(); ?>" class="image-box">
                        <?php echo '<div href="" class="full-background image" style="background-image:url('. wp_get_attachment_url(get_post_thumbnail_id()) .');">'?></div>
                    </a>
                <?php endif; ?>
                <div class="content">
                    <a href="<?php the_permalink(); ?>" class="title">
                        <h4><?php the_title(); ?></h4>
                    </a>
                    <div class="info">
                        <div class="category">
                            <?php
                            $category = get_the_category();
                            if($category[0]){
                            echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
                            }
                            ?>
                        </div>
                        <div class="meta">
                            <div class="author">By <?php the_author(); ?></div>
                            <div class="meta"><?php the_date( 'M, j, Y', 'on ' ); ?></div>
                        </div>
                    </div>
                    <div class="excerpt">
                        <p class="text"><?php echo excerpt(55); ?></p>
                        <a class="read-more" href="<?php the_permalink(); ?>">Read More &raquo;</a>
                    </div>
                </div>
            </div>

        <?php endwhile; endif; ?>
    </div>


    <div id="events" class="large-4 small-12 columns">
        <?php dynamic_sidebar( 'Events Widget Location' ); ?>
    </div>


</section>
<?php get_footer(); ?>
