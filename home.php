<?php
/**
* @package WordPress
* @subpackage HTML5-Reset-WordPress-Theme
* @since HTML5 Reset 2.0
*/
get_header(); ?>
<?php wp_enqueue_script('font_resize_js', get_bloginfo('template_url').'/js/font-resize.js', array('jquery')); ?>
<?php if (have_posts()) : ?>
    <!-- This is home.php -->
    <div id="firstPost">
        <?php $post = $posts[0]; $postCount=0;?>
        <?php while (have_posts()) : the_post(); ?>

                <?php $postCount++;
                if( !$paged && $postCount == 1) :?>
                    <?php if(has_post_thumbnail()): ?>
                        <?php
                            $splash_src = wp_get_attachment_image_src( get_post_thumbnail_id(), $size='preview-thumbnail' );
                        ?>
                        <?php echo '<div class="splash-section" style="background-image:url('. $splash_src[0] .');">'?>
                            <?php echo '<h1 style="background-image:url('. $splash_src[0] .');">'?>
                                <?php bloginfo('description'); ?>
                            </h1>
                            <div id="homepageDescription">
                		        <?php dynamic_sidebar( 'Homepage Description' ); ?>
                		    </div>
                        </div>
                    <?php else: ?>
                        <div class="splash-section no-thumbnail">
                            <h1 style="color:#ffffff;">
                                <?php bloginfo('description'); ?>
                            </h1>
                            <div id="homepageDescription">
                		        <?php dynamic_sidebar( 'Homepage Description' ); ?>
                		    </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div id="mainContent" class="row">
                    <div id="posts" class="large-8 small-12 columns">
                        <div class="first-post post">
                            <div class="content">
                                <a href="<?php the_permalink(); ?>" class="title">
                                    <h1><?php the_title(); ?></h1>
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
            <?php else :?>
                        <div class="post">
                            <a href="<?php the_permalink(); ?>" class="image-box">
                                <?php echo '<div href="" class="full-background image" style="background-image:url('. wp_get_attachment_url(get_post_thumbnail_id()) .');">'?></div>
                            </a>
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

            <?php endif;?>

        <?php endwhile; ?>
        <!-- code here for after loop -->
                        <?php post_navigation(); ?>
    <?php else : ?>
    <!-- code here for no posts found -->
    <h2><?php _e('Nothing Found','html5reset'); ?></h2>
<?php endif; ?>
                    </div>
                    <div id="sideColumn" class="large-4 columns hide-for-small">
                        <div class="side-column-container">
                            <div class="events clearfix">

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
                                            <div class="event-photo">
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
                                            <div class="content">
                                                <a href="<?php the_permalink(); ?> ">
                                                    <h4 class="title"><?php the_title(); ?></h4>
                                                </a>
                                                <h5 class="meta"><?php echo $start_time.' on '.$start_date ?></h5>
                                                <div class="excerpt">
                                                    <p><?php echo excerpt(18); ?></p>
                                                </div>
                                            </div>
                                	    </div>
                                    </div>
                                <?php endwhile; ?>

                            </div>
                            <?php get_sidebar(); ?>
                        </div>
                    </div>
                </div>
<?php get_footer(); ?>
