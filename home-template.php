<?php
/*
Template Name: Homepage Template
*/
wp_enqueue_style( 'home', get_template_directory_uri() . '/home.css');

get_header(); ?>
    <div id="homepage">
        <?php echo '<div class="splash-section full-background" style="background-image:url('. get_post_meta(get_the_ID(), 'background-image', true) .');">'?>
            <div class="row">
                <div class="home-text large-6 columns right">
                    <div class="content">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <?php the_content(); ?>
                    	<?php endwhile; endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="posts large-7 columns">
                <div class="row">
                    <a href="/posts" class="large-12 columns banner">Recent Posts</a>
                    <?php
                     $post_loop = new WP_Query(array('post_type' => 'post')); ?>
                    <?php while ( $post_loop->have_posts() ) : $post_loop->the_post(); ?>
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
                    <?php endwhile;?>
                </div>
            </div>
            <div class="events large-5 columns">
                <div class="row">
                    <a href="/events" class="large-12 columns banner">Upcoming Events</a>
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
                                <div class="large-5 small-3 columns photo no-padding">
                                     <a href="<?php the_permalink(); ?> ">
                                         <?php if (has_post_thumbnail()) { ?>
                                                    <div class="image-box">
                                                        <?php the_post_thumbnail('thumbnail');
                                                            echo '<div class="date-box"><div class="date">'.$large_start.'</div></div>';?>
                                                    </div>
                                         <?php  }
                                               else {
                                                echo '<div class="date-box"><div class="date">'.$large_start.'</div></div>';
                                                }
                                            ?>
                                     </a>
                                </div>
                                <div class="content large-7 small-9 columns">
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
        </div>
    </div>
</div>
<?php get_footer(); ?>