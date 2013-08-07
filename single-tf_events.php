<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php $custom=get_post_custom();
        $start_date=date('F j, Y',$custom["tf_events_startdate"][0]);
        $start_time=date('g:i a', $custom["tf_events_startdate"][0]);
        $end_date=date('F j, Y',$custom["tf_events_enddate"][0]);
        $end_time=date('g:i a', $custom["tf_events_enddate"][0]);
    ?>
    <?php if (has_post_thumbnail()) : ?>
        <?php echo '<div class="splash-section full-background" style="background-image:url('. wp_get_attachment_url(get_post_thumbnail_id()) .');">'?></div>
        <div id="mainContent" class="row">
    <?php else : ?>
        <div id="mainContent" class="row no-thumbnail">
    <?php endif; ?>
            <div class="page large-8 small-12 columns">
                <div class="content">
                    <h1><?php the_title(); ?></h1>
                    <div class="date">
                        <h4 class="meta"><?php echo 'From '. $start_time.' on '.$start_date.'<br /> To '.$end_time.' on '.$end_date ?></h5>


                    </div>
                    <div class="text">
                        <p><?php the_content(); ?></p>
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