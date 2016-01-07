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
 * Template Name: Home
 */
include('globalConf.php');
get_header(); ?>
	<div id="newsbereich-home" class="cntFade">
		<div id="newsbereich-inner">
		<div id="newsbereich-inner-trenner">
		<?php echo do_shortcode( "[Category number='4' method='full' order='asc' id='26' orderby='modified' method='excerpt']" ); ?>
		<div class="clear"></div>
		<a id="newsh1" href="<?php bloginfo('url'); ?>/print-solutions/veranstaltungen/" title="News" ><span>News</span></a>
		</div>
		</div>
		<div class="clear"></div>
		</div>

		<div id="primary" class="home">
			<?php /*
			
			<div id="newsbereich-home">
			<a id="newsh1" href="http://www.lundm-bit.de/uber-uns/news/" title="News" ><span>News</span></a>

			<?php //echo do_shortcode( "[anything_slides]" ); ?>
			<?php if (function_exists('rps_show')) echo rps_show(); ?>
			</div>
			
			*/ ?>





	
		<div id="primary" class="home">
			<div id="content" role="main">

				<!-- PAGE CONTENT -->
				<div class="cntFade fullWidth">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'page' ); ?>					
					<?php endwhile;?>
				</div>

				<!-- QUICKLINKS	-->
			<?php 
				/*
					Hier werden die Quicklinks ausgelesen, dessen Kategorie-Name mit dem PageName übereinstimmt.
					Sollte keine Übereinstimmung vorhanden sein, wird dieser Bereich via CSS ausgeblendet.
				*/
			$PageName 	= 	$post->post_name;
			?>
			<div class="fullPageWidth" id="Quicklinks"><?php 
				query_posts(array('category_name'=> $PageName)); 
				while ( have_posts() ) : the_post();  
					get_template_part( 'content', 'quicklink' );  
				endwhile; // end of the loop. 
			?></div>
			</div><!-- #content -->
			<div class="clear"></div>
		</div><!-- #primary -->
		<div class="clear"></div>
<?php get_footer(); ?>




