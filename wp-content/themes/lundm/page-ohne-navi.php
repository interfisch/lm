<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 *
 * Template Name: Ohne Menu
 */

get_header(); ?>

		<div id="primary" class="ohne_menu">
			<div id="content" role="main">
<a href="javascript:window.print()" id="druckicon"><img src="<?php bloginfo('template_directory'); ?>/images/drucken-icon.gif" alt="Drucken"></a>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="cntFade fullWidth">
						<?php get_template_part( 'content', 'page' ); ?>
					</div>
		




		
					<?php //comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->

<?php include ('newsbereich.php');?>


<div class="clear"></div>
		</div><!-- #primary -->
		
		
		<div class="clear"></div>
		
		

<?php get_footer(); ?>




