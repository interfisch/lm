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
 * Template Name: Page
 */
include('globalConf.php');

/*HEADER AUSLESEN*/
get_header(); ?>	

<div id="primary" class="cntFade">		
	
	<div id="sidenav"><?php 
			/*
				Hier wird das Subnavi Array geprüft und - sofern die Page ID passt - 
				das entsprechend hinterlegte menu ausgelesen und ausgegeben.
				Wenn keine Subnavi gesetzt ist, wird dieser Bereich via CSS ausgeblendet.
			*/
		    $ancestors = $post->ancestors; 
			
			foreach($PageID as $k => $v){
				foreach($v as $vk => $vv){
					if (is_tree($vv['id']) OR in_array($vv['id'], $ancestors)) {
						wp_nav_menu( array('menu' => $vv['menu'] ));
					}	
				}
			}
	?></div>

	<div id="content">		
		<?php if($ssid == false) { ?>
			<?php 
				/*
					Sollte der Bereich durch Zugangsdaten gesichert worden sein und keine SID zu diesem Bereich existieren, 
					wird ein Login Formular ausgegeben. 		
				*/
			?>
			<form method="POST" action="" id="Login">
				<span class="title"><?php echo $MainID[$bereich]['title']; ?></span>
				<span class="Error dfield"><?php echo $returnSSID; ?></span>
				<input type="hidden" name="ssid" value="<?php echo $_SESSION['ssid']; ?>">
				<span class="name field"> Username<input type="text" name="username" placeholder="Username" title="Username" value=""></span>
				<span class="pwd field">  Password<input type="password" name="password" placeholder="Passwort" title="Passwort" value=""></span>
				<button type="submit" class="submit field">Einloggen</button>
			</form>
		<?php } else {?>
			<?php 
				/*
					Dieser Bereich ist der ganz normale Content, welcher angezeigt wird, wenn der MainID-Array-Wert auf false gesetzt wurde oder 
					sich der Benutzer bereits erfolgreich eingeloggt hat und somit eine SID existiert.
				*/
			?>
			<!-- CONTENT -->
			<a href="javascript:window.print()" id="druckicon"><img src="<?php bloginfo('template_directory'); ?>/images/drucken-icon.gif" alt="Drucken"></a>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; // end of the loop. ?>
			
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
		<?php }?>
	</div><!-- #content -->
</div><!-- #primary -->
<div class="clear"></div>
		
		

<?php get_footer(); ?>




