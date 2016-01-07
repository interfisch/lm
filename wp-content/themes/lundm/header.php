<?php
	/**
	 * The Header for our theme.
	 *
	 * Displays all of the <head> section and everything up till <div id="main">
	 *
	 * @package WordPress
	 * @subpackage Twenty_Eleven
	 * @since Twenty Eleven 1.0
	 */
include('globalConf.php');
?><!DOCTYPE html>
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

<script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'clean',
    lang : 'de'

 };
 </script>

<?php 
	/*
		Je nach parent page id ein anderes Favicon
	*/	
	$tmpsrc = "";
	foreach($MainID as $k => $v){
		if($pid == $v['id']){
			$tmpsrc = $v['favicon'];
		}
	}
	if(empty($tmpsrc)){
		$tmpsrc = $MainID[STARTSEITE]['favicon'];
	}

	echo '<link rel="shortcut icon" href="';
	bloginfo('template_directory');
	echo '/images/favicon/'.$tmpsrc.'" type="image/x-ico; charset=binary" />';

	$tmpsrc =	"";
?>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title>
	<?php
		echo get_the_title(get_the_ID());	
	?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />

<!--[if IE 7]>
<style type="text/css">

*{outline: none;}

hr {
    height: 1px!important;
    margin-top: 5px;
    margin-bottom:5px;
}
</style>
<![endif]-->


<!--/*FontAwesome*/--><link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/include/font-awesome-4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
if($onsite){
echo "<script type='text/css'>
#main div.menu li.page-item-298 ul.children {
	display: block;
}";}
?>

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/main.js"></script>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed">
	<div id="header" class="cntFade">
		<span class="background"></span>
		<div id="SearchForm">
			<?php get_search_form(); ?>
		</div>
		<ul id="LundM_Links">
			<li class="zindex3"><a href="http://www.lundm-bit.de">Business IT</a></li>
			<?php
				$tmparr = array(
					'title_li'	=> __(''),
					'echo' 		=> 0,
					'depth' 	=> 1,
					'number' 	=> 1,
					'include' 	=> $MainID['printSolution']['id']
				);
				$tmp 	= wp_list_pages($tmparr);
				$tmp 	= str_replace("LundM ", "", $tmp);
				$tmp 	= str_replace("<li class=\"", "<li class=\"zindex3 ", $tmp);
			?>
			<?php echo $tmp; ?>	
			
			<?php
				$tmparr = array(
					'title_li'	=> __(''),
					'echo' 		=> 0,
					'depth' 	=> 1,
					'number' 	=> 1,
					'include' 	=> $MainID['docManagement']['id']
				);
				$tmp 	= wp_list_pages($tmparr);
				$tmp 	= str_replace("LundM ", "", $tmp);
				$tmp 	= str_replace("<li class=\"", "<li class=\"zindex3 ", $tmp);
			?>
			<?php echo $tmp; ?>	
			<li class="zindex1"></li>
			<li class="zindex1"></li>
			<li class="zindex1"></li>
		</ul>

		<a href="<?php bloginfo('url'); ?>">
			<?php 
			/*
				Je nach PID wird ein anderes Logo über die globalConf.php ausgelesen und angezeigt.
				Sollte kein Logo festgelegt worden sein, wird das Logo der Startseite ausgelesen.
			*/	
			$tmpsrc = "";
			$spid 	= ($ssid == true)? $pid : $MainID[STARTSEITE]['id']; 
			foreach($MainID as $k => $v){
				if($spid == $v['id']){
					$tmpsrc = $v['logo'];
				}
			}
			if(empty($tmpsrc)){
				$tmpsrc = $MainID[STARTSEITE]['logo'];
			}

			echo '<img id="logo" src="';
			bloginfo('template_directory');
			echo '/images/logo/'.$tmpsrc.'" alt="L & M Logo" />';
			?>	
		</a>
		
		<nav id="main" role="navigation">	
			<div class="menu">
				<ul>		
					<?php 
					/*
						Je nach PID wird eine andere Navigation generiert.
						Dabei wird differenziert in Startseite und NICHT Startseite.
						Auf der Startseite werden die - der Hauptseite untergeordneten Seiten - 
						sowie alle definierten Bereiche ausgelesen und als Link angezeigt.

						Ebenfalls wird die StartseitenNavigation angezeigt, wenn der im Zugriff stehende Bereich durch ein Passwort 
						gesichert wurde.
					*/
					if($pid != $MainID[STARTSEITE]['id'] && $ssid == true){ /* NICHT Startseite */
							$children 	= wp_list_pages("title_li=&echo=0&depth=1&number=1&include=".$MainID[STARTSEITE]['id']);
							$children 	= str_replace($MainID[STARTSEITE]['title'], "Startseite", $children);
							$children  .= wp_list_pages("title_li=&child_of=".$pid."&echo=0&depth=1");

							$script 	= "";
					} else { /* Startseite */
							$tmpinc 	=	"";
							foreach($MainID as $k => $v){
								$tmpinc .=	$v['id'].",";		
							}
							$children 	= wp_list_pages("title_li=&echo=0&depth=1&include=".$tmpinc);
							$children 	= str_replace($MainID[STARTSEITE]['title'], "Startseite", $children);
							$children 	= str_replace("LundM ", "", $children);
							$children  .= wp_list_pages("title_li=&child_of=".$MainID[STARTSEITE]['id']."&echo=0&depth=1&exclude=".$MainID[STARTSEITE]['top_menu_exclude']."");

							$script 	= "
							<script type=\"text/JavaScript\">
								jQuery(\"nav#main div.menu ul li a\").each(function(){
									console.log(jQuery(this).html());
									if(jQuery(this).html() == \"Startseite\"){
										jQuery(this).attr(\"id\", \"startseite\");
									}
								});

								jQuery(\"nav#main div.menu ul li.current_page_parent a#startseite\").parent().removeClass('current_page_parent').removeClass('current_page_ancestor');
							</script>";
					}		
					/*Logout Button at The End*/	if ($MainID[$bereich]['secured'] == true && $ssid == true){ $children .= "<li class=\"page_item\"><a href=\"?ssid=".$_SESSION['ssid']."&logoff\">Abmelden</a></li>"; }
					/*Write Navi*/ 					if ($children) { echo $children; } 
					/*Write Script to Edit Navi*/	if ($script) { echo $script; } 
					?>

				</ul>
			</div>
		</nav><!-- #access -->
	</div>

	<div id="maincontent">
		<div class="cntFade" id="Slideshow">
			<?php 
				/*
					Hier werden aus der globalConf die Slider Keys gelesen und entsprechend der Slider generiert/ausgelesen.
					Sollte einem Bereich kein Slider zugeordnet worden sein, dann wird hier der Inhalt des Default Sliders ausgelesen.
				*/
				$tmpsc 	= "";
				$spid 	= ($ssid == true)? $pid : $MainID[STARTSEITE]['id']; 
				foreach($MainID as $k => $v){
					if($spid == $v['id'] && empty($tmpsc)){
						$tmpsc = $v['slider'];
					}
				}
				if(empty($tmpsc)){
					$tmpsc = DEFAULTSLIDER;
				} 

				echo do_shortcode($tmpsc);		
			?>
		</div>
