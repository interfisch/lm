<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	</div><!-- #main -->

	<?php  if (strpos($_SERVER['REQUEST_URI'], "unternehmenszentrale-flintbek") !== false){  include('gebaeude.php');  }?>
	<div id="footer" role="contentinfo" class="cntFade">
		<span class="background"></span>
		<div class="topLeft">
			<div class="formfield">
				<?php echo do_shortcode( '[contact-form-7 id="34" title="Footer_Kontakt"]' ); ?>
			</div>
			<div class="infotext">
				<h3>Service</h3>
				E-Mail: <a href="mailto:service@lundm.de">service@lundm.de</a>
				Tel: <a href="tel:+4943477100250">04347 / 7100 - 250</a>
				<br><br>
				<h3>Das ist L und M</h3>
				L und M ist Ihr Partner für exzellente IT Lösungen, gerne beraten wir Sie professionell in allen Fragen rund um die IT Infrastruktur.
			</div>
		</div>

		<div class="textwidget botLeft">
			<br> &copy; <? echo date("Y"); ?> - L und M  Büroinformationssysteme GmbH</div>
		<div class="textwidget botRight">
			<ul>	
				<?php wp_nav_menu( array(
					'menu' 			=> footer,
					'container'     => false,
					'items_wrap'    => '%3$s' )); 
				?>
			</ul>
		</div>		
	</div><!-- #footer -->
	<div id="AfterFooter" style="height: 0px;">
	</div>
</div><!-- #page -->









<?php wp_footer(); ?>


<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/main_bottom.js"></script>

<!-- Google Analytics -->
<script type="text/javascript"> var _gaq = _gaq || []; _gaq.push(['_setAccount', 'UA-28099384-1']); _gaq.push(['_trackPageview']); (function() { var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s); })();</script>




</body>
</html>