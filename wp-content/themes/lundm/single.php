<?php 
/*
* 
*/


?>

<?php
	include ('single-top.php');
?>

<?php	
	if (in_category('5')) {
	include ('incl_cat_2008.php');
	}elseif (in_category('6')){
	include ('incl_cat_2009.php');
	}elseif (in_category('7')){
	include ('incl_cat_2010.php');
	}elseif (in_category('8')){
	include ('incl_cat_2011.php');
	}elseif (in_category('9')){
	include ('incl_cat_2012.php');
	}
?>
	

<?php
	if (in_category('10')){
	include ('incl_cat_veranstaltungen-2010.php');
	}elseif (in_category('11')){
	include ('incl_cat_veranstaltungen-2011.php');
	}elseif (in_category('12')){
	include ('incl_cat_veranstaltungen-2012.php');
	}
?> 
	 
<?php //if(is_page('events')) { echo"wp_nav_menu( array('menu' => 'sub_09' ));";}?>
	 
	
	<?php// wp_nav_menu( array('menu' => 'sub_09' ));?>
	
	
	<!--
	<div id="sidenav">
	<?php
	if (in_category('10')){
	wp_nav_menu( array('menu' => 'sub_08' ));
	}elseif (in_category('11')){
	wp_nav_menu( array('menu' => 'sub_08' ));
	}elseif (in_category('12')){
	wp_nav_menu( array('menu' => 'sub_08' ));
	}
	?>
	
	</div>
	
	-->
	
	

<?php
	include ('single-bottom.php');	
?>



