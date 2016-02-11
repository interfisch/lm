			<div id="content" role="main">



				<?php while ( have_posts() ) : the_post(); ?>
					<!--<nav id="nav-single">
						<span class="nav-previous post_a"><?php previous_post_link( '%link', __( '<span style="display: none;"><-</span>', 'twentyeleven' ) ); ?></span>
						<span class="nav-next post_a"><?php next_post_link( '%link', __( '<span style="display: none;"><-</span>', 'twentyeleven' ) ); ?></span>
					</nav>-->
<a href="javascript:window.print()" id="druckicon"><img src="<?php bloginfo('template_directory'); ?>/images/drucken-icon.gif" alt="Drucken"></a>

					<?php get_template_part( 'content', 'single' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
			<?php //include ('newsbereich.php');?>
			<div class="clear"></div>
		</div><!-- #primary -->

<?php get_footer(); ?>