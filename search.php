<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>
<div id="mainContent" class="row">
    <div class="posts large-8 small-12 columns">
	<?php if (have_posts()) : ?>

		<h2 class="banner"><?php _e('Search Results','html5reset'); ?></h2>

		<?php post_navigation(); ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>" class="image-box">
                        <?php echo '<div href="" class="full-background image" style="background-image:url('. wp_get_attachment_url(get_post_thumbnail_id()) .');">'?></div>
                    </a>
                <?php endif; ?>
                <div class="content">
                    <a href="<?php the_permalink(); ?>" class="title">
                        <h2><?php the_title(); ?></h2>
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


		<?php endwhile; ?>

		<?php post_navigation(); ?>

	<?php else : ?>

		<h2><?php _e('Nothing Found','html5reset'); ?></h2>

	<?php endif; ?>
    </div>
	<div id="sideColumn" class="large-4 columns hide-for-small">
	    <?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
