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

 			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php /* If this is a category archive */ if (is_category()) { ?>
				<h2 class="banner"><?php _e('Archive for the','html5reset'); ?> &#8216;<?php single_cat_title(); ?>&#8217; <?php _e('Category','html5reset'); ?></h2>

			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h2 class="banner"><?php _e('Posts Tagged','html5reset'); ?> &#8216;<?php single_tag_title(); ?>&#8217;</h2>

			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h2 class="banner"><?php _e('Archive for','html5reset'); ?> <?php the_time('F jS, Y'); ?></h2>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h2 class="banner"><?php _e('Archive for','html5reset'); ?> <?php the_time('F, Y'); ?></h2>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h2 class="pagetitle banner"><?php _e('Archive for','html5reset'); ?> <?php the_time('Y'); ?></h2>

			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h2 class="pagetitle banner"><?php _e('Author Archive','html5reset'); ?></h2>

			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h2 class="pagetitle banner"><?php _e('Blog Archives','html5reset'); ?></h2>

			<?php } ?>
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
