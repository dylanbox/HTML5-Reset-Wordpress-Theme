<?php
/*
Template Name: Events Archive
*/

get_header();
?>
<div id="eventsArchive">
    <div class="row">
        <div class="events large-8 columns">
            <div class="row">
                <div class="large-12 columns banner">Upcoming Events</div>
                <?php
                $args = array(
                   'post_type' => 'tf_events',
                   'meta_key' => 'tf_events_startdate',
                   'orderby' => 'meta_value',
                   'order' => 'ASC',
                   'meta_query' => array(
                       array(
                           'key' => 'tf_events_enddate',
                           'value' => date('U'),
                           'compare' => '>=',
                           'type' => 'NUMERIC'
                       )
                   )
                 );
                 $event_loop = new WP_Query($args); ?>
                <?php while ( $event_loop->have_posts() ) : $event_loop->the_post(); ?>

                    <?php $custom=get_post_custom();
                        $start_date=date('F j, Y',$custom["tf_events_startdate"][0]);
                        $start_time=date('g:i a', $custom["tf_events_startdate"][0]);
                        $large_start=date('M j', $custom["tf_events_startdate"][0]);
                    ?>

                	<div class="large-12 columns event">
                	    <div class="row">
                            <div class="event-photo">
                                 <a href="<?php the_permalink(); ?> ">
                                     <?php if (has_post_thumbnail()) { ?>
                                                <div class="image-box">
                                                    <?php the_post_thumbnail(array(150));
                                                        echo '<div class="date-box"><div class="date">'.$large_start.'</div></div>';?>
                                                </div>
                                     <?php  }
                                           else {
                                            echo '<div class="date-box"><div class="date">'.$large_start.'</div></div>';
                                            }
                                        ?>
                                 </a>
                            </div>
                            <div class="content">
                                <a href="<?php the_permalink(); ?> ">
                                    <h4 class="title"><?php the_title(); ?></h4>
                                </a>
                                <h5 class="meta"><?php echo $start_time.' on '.$start_date ?></h5>
                                <div class="excerpt">
                                    <p><?php echo excerpt(18); ?></p>
                                    <a class="read-more" href="<?php the_permalink(); ?>">Read More &raquo;</a>
                                </div>
                            </div>
                	    </div>
                    </div>
                <?php endwhile; ?>
                <div class="large-12 columns banner">Past Events</div>
                <?php
                $args = array(
                   'post_type' => 'tf_events',
                   'meta_key' => 'tf_events_startdate',
                   'orderby' => 'meta_value',
                   'order' => 'ASC',
                   'meta_query' => array(
                       array(
                           'key' => 'tf_events_enddate',
                           'value' => date('U'),
                           'compare' => '<',
                           'type' => 'NUMERIC'
                       )
                   )
                 );
                 $event_loop = new WP_Query($args); ?>
                <?php while ( $event_loop->have_posts() ) : $event_loop->the_post(); ?>

                    <?php $custom=get_post_custom();
                        $start_date=date('F j, Y',$custom["tf_events_startdate"][0]);
                        $start_time=date('g:i a', $custom["tf_events_startdate"][0]);
                        $large_start=date('M j', $custom["tf_events_startdate"][0]);
                    ?>

                	<div class="large-12 columns event">
                	    <div class="row">
                            <div class="event-photo">
                                 <a href="<?php the_permalink(); ?> ">
                                     <?php if (has_post_thumbnail()) { ?>
                                                <div class="image-box">
                                                    <?php the_post_thumbnail(array(150));
                                                        echo '<div class="date-box"><div class="date">'.$large_start.'</div></div>';?>
                                                </div>
                                     <?php  }
                                           else {
                                            echo '<div class="date-box"><div class="date">'.$large_start.'</div></div>';
                                            }
                                        ?>
                                 </a>
                            </div>
                            <div class="content">
                                <a href="<?php the_permalink(); ?> ">
                                    <h4 class="title"><?php the_title(); ?></h4>
                                </a>
                                <h5 class="meta"><?php echo $start_time.' on '.$start_date ?></h5>
                                <div class="excerpt">
                                    <p><?php echo excerpt(18); ?></p>
                                    <a class="read-more" href="<?php the_permalink(); ?>">Read More &raquo;</a>
                                </div>
                            </div>
                	    </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="large-3 columns" id="sidebar">
            <?php dynamic_sidebar('sidebar-events'); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>