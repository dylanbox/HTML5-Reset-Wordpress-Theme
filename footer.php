<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
?>

        </div>
        <div id="stickyFooter"></div>
    </div>
	<footer id="footer" class="source-org vcard copyright">
	    <div class="row">
			<h4 class="columns"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h4>
            <nav id="footerNav" class="columns right" role="navigation">
    			<?php wp_nav_menu( array('menu' => 'primary') ); ?>
    		</nav>
	    </div>
	</footer>

	<?php wp_footer(); ?>


<!-- here comes the javascript -->

<!-- jQuery is called via the WordPress-friendly way via functions.php -->

<!-- this is where we put our custom functions -->
<script src="<?php bloginfo('template_directory'); ?>/_/js/functions.js"></script>

<!-- Asynchronous google analytics; this is the official snippet.
	 Replace UA-XXXXXX-XX with your site's ID and uncomment to enable.

<script>

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-XXXXXX-XX']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
-->

</body>

</html>
