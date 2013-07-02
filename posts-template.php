<?php
/*
Template Name: Posts Archive
*/

get_header();
?>
<div id="postsArchive" class="posts">
    <div class="row">
        <div class="large-9 columns">
            <div class="large-12 columns banner">Recent Posts</div>
            <?php $latest = new WP_Query('showposts=5'); ?>
            <?php while( $latest->have_posts() ) : $latest->the_post(); ?>
                <?php echo '<div class="post large-12 columns full-background no-padding" style="background-image:url('.wp_get_attachment_url(get_post_thumbnail_id($post->ID)).');">' ?>
                    <a href="<?php the_permalink(); ?>" class="post-link"></a>
                    <div class="content large-7 small-8 columns right">
                        <a href="<?php the_permalink(); ?>">
                            <h4 class="title"><?php the_title(); ?></h4>
                        </a>
                        <h6 class="meta"><?php the_date( 'M, j, Y', 'on ' ); ?></h6>
                        <div class="excerpt">
                            <p><?php echo excerpt(25); ?></p>
                            <a class="read-more" href="<?php the_permalink(); ?>">Read More &raquo;</a>
                        </div>

                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="large-3 columns" id="sidebar">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>