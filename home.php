<?php
/*
Template Name: Homepage Template
*/
wp_enqueue_style( 'home', get_template_directory_uri() . '/home.css');

get_header(); ?>
    <div id="homepage">
        <div class="splash-section full-background" style="background-image:url('http://placehold.it/1500x300');">
            <div class="row">
                <div class="post half columns right">
                    <div class="entrytext">
                        <h1>We're building a community around change.</h1>
                        <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Etiam porta sem malesuada magna mollis euismod. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="posts two-thirds columns">
                <div class="row">
                    <div class="full columns banner">Recent Posts</div>
                    <?php if (have_posts()) : while (have_posts()) : the_post();?>
                        <div class="full columns post">
                            <div class="photo third columns">
                                 <a href="<?php the_permalink(); ?> ">
                                     <?php the_post_thumbnail('thumbnail'); ?>
                                 </a>
                            </div>
                            <div class="content two-thirds columns">
                                <a href="<?php the_permalink(); ?> ">
                                    <h4 class="title"><?php the_title(); ?></h4>
                                </a>
                                <h6 class="meta"><?php the_date( 'M, j, Y', 'on' ); ?></h6>
                                <p class="excerpt"><?php the_excerpt(); ?> </p>
                            </div>
                        </div>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>