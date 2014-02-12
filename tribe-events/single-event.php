<?php
/**
 * Single Event Template (Overridden)
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * @editor Dylan Box of Wedge Detroit
 *
 */

 if ( !defined('ABSPATH') ) { die('-1'); }

$event_id = get_the_ID();

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

            	<div id="post-<?php the_ID(); ?>" <?php post_class('vevent'); ?>>

            	    <?php tribe_events_the_notices() ?>

            	    <h1 class="title"><?php the_title(); ?></h1>

                    <div class="tribe-events-schedule updated published tribe-clearfix">
                		<h3><?php echo tribe_events_event_schedule_details(); ?></h3>
                		<?php echo tribe_events_event_recurring_info_tooltip(); ?>
                		<?php  if ( tribe_get_cost() ) :  ?>
                			<span class="tribe-events-divider">|</span>
                			<span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
                		<?php endif; ?>
                	</div>

        			<!-- Event content -->
        			<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
        			<div class="tribe-events-single-event-description tribe-events-content entry-content description">
        				<?php the_content(); ?>
        			</div><!-- .tribe-events-single-event-description -->
        			<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>

        			<!-- Event meta -->
        			<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
        				<?php echo tribe_events_single_event_meta() ?>
        			<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>

        			<div class="tags">
					   	<p><?php the_tags('Tags:',''); ?></p>
				   	</div>

    			</div><!-- .hentry .vevent -->

        		<?php if( get_post_type() == TribeEvents::POSTTYPE && tribe_get_option( 'showComments','no' ) == 'yes' ) { comments_template(); } ?>

<?php endwhile; endif; ?>
                <?php post_navigation(); ?>
            </div>
            <div class="large-4 columns" id="sidebar">
                <?php dynamic_sidebar( 'Events Sidebar' ); ?>
            </div>

            <!-- Event footer -->
            <div id="tribe-events-footer">
        		<!-- Navigation -->
        		<h3 class="tribe-events-visuallyhidden"><?php _e( 'Event Navigation', 'tribe-events-calendar' ) ?></h3>
        		<ul class="tribe-events-sub-nav">
        			<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '&laquo; %title%' ) ?></li>
        			<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% &raquo;' ) ?></li>
        		</ul><!-- .tribe-events-sub-nav -->
        	</div><!-- #tribe-events-footer -->

        </div>

<?php get_footer(); ?>





	<!-- Event header -->
	<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
		<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php _e( 'Event Navigation', 'tribe-events-calendar' ) ?></h3>
		<ul class="tribe-events-sub-nav">
			<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '&laquo; %title%' ) ?></li>
			<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% &raquo;' ) ?></li>
		</ul><!-- .tribe-events-sub-nav -->
	</div><!-- #tribe-events-header -->

	<?php while ( have_posts() ) :  the_post(); ?>

	<?php endwhile; ?>
