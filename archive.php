<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>
        <div class="row" id="archive">
            <div class="large-9 columns">
        		<?php if (have_posts()) : ?>

         			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

        			<?php /* If this is a category archive */ if (is_category()) { ?>
        				<h2><?php _e('Archive for the','html5reset'); ?> &#8216;<?php single_cat_title(); ?>&#8217; <?php _e('Category','html5reset'); ?></h2>

        			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
        				<h2><?php _e('Posts Tagged','html5reset'); ?> &#8216;<?php single_tag_title(); ?>&#8217;</h2>

        			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
        				<h2><?php _e('Archive for','html5reset'); ?> <?php the_time('F jS, Y'); ?></h2>

        			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
        				<h2><?php _e('Archive for','html5reset'); ?> <?php the_time('F, Y'); ?></h2>

        			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
        				<h2 class="pagetitle"><?php _e('Archive for','html5reset'); ?> <?php the_time('Y'); ?></h2>

        			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
        				<h2 class="pagetitle"><?php _e('Author Archive','html5reset'); ?></h2>

        			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
        				<h2 class="pagetitle"><?php _e('Blog Archives','html5reset'); ?></h2>

        			<?php } ?>

        			<?php post_navigation(); ?>

        			<?php while (have_posts()) : the_post(); ?>

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

        			<?php post_navigation(); ?>

            	<?php else : ?>

            		<h2><?php _e('Nothing Found','html5reset'); ?></h2>

            	<?php endif; ?>
            </div>
            <div class="large-3 columns" id="sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>

<?php get_footer(); ?>
