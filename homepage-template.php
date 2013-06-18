<?php
/*
Template Name: Homepage Template
*/

get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post();?>
    <?php echo '<div id="homepage" class="full-background" style="background-image:url('. get_post_meta(get_the_ID(), 'background-image', true) .');">'?>
        <div class="row">
            <div class="post half columns right">
                <div class="entrytext">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>