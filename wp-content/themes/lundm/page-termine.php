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
 * Template Name: Termine
 */

include('globalConf.php');
get_header(); ?>

<div id="primary">

	<div id="sidenav">
		<?php 
		    $ancestors = $post->ancestors; 
			/*
				Aus dem "SubNavi" Array in der globalConf.php die Seite prüfen und die Navigation auslesen.
			*/
			foreach($PageID as $k => $v){
				foreach($v as $vk => $vv){
					if (is_tree($vv['id']) OR in_array($vv['id'], $ancestors)) {
						wp_nav_menu( array('menu' => $vv['menu'] ));
					}	
				}
			}
		?>
	</div>

	<div id="content" class="fullpage">
		<a href="javascript:window.print()" id="druckicon"><img src="<?php bloginfo('template_directory'); ?>/images/drucken-icon.gif" alt="Drucken"></a>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'page' ); ?>
			<?php //comments_template( '', true ); ?>
		<?php endwhile; // end of the loop. ?>
	</div><!-- #content -->

	<div class="clear"></div>
</div><!-- #primary -->

<div class="clear"></div>
	
<?php get_footer(); ?>




