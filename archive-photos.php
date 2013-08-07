<?php get_header(); ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/masonry.pkgd.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('img').load(function(){
            $("#photos").masonry({
                itemSelector: '.photo'
            });
        });
        $("#photos").masonry({
            itemSelector: '.photo'
        });
    });
</script>
<div id="photoArchive">
    <div class="row">
        <div class="large-12 columns banner top-banner">Photos</div>
    </div>
    <div id="photos" class="row">
        <?php $args = array( 'post_type' => 'photos', 'posts_per_page' => 10 );
        $loop = new WP_Query( $args ); ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        	<?php if (has_post_thumbnail()) { ?>
            	<div class="large-3 small-6 columns photo">
                    <div class="image-box">
                        <?php the_post_thumbnail('medium'); ?>
                        <div class="title-box">
                            <div class="title">
                                <?php the_title(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php endwhile; ?>
    </div>
</div>

<?php get_footer(); ?>