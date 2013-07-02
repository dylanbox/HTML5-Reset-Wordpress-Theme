<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>
    <div id="single" class="row">
        <div class="large-9 columns">
        	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        		<article class="post" id="post-<?php the_ID(); ?>">
                    <?php echo '<div class="post-thumbnail large-12 columns full-background no-padding" style="background-image:url('.wp_get_attachment_url(get_post_thumbnail_id($post->ID)).');">' ?>
                    </div>


        			<h1 class="entry-title"><?php the_title(); ?></h1>

                    <?php posted_on(); ?>

        			<div class="entry-content">

        				<?php the_content(); ?>

        				<?php wp_link_pages(array('before' => __('Pages: '), 'next_or_number' => 'number')); ?>

        				<?php the_tags( __('Tags: '), ', ', ''); ?>



        			</div>

        			<?php edit_post_link(__('Edit this entry'),'','.'); ?>

        		</article>

        	<?php comments_template(); ?>

        	<?php endwhile; endif; ?>

            <?php post_navigation(); ?>
        </div>
        <div class="large-3 columns" id="sidebar">
            <?php get_sidebar(); ?>
        </div>
    </div>

<?php get_footer(); ?>