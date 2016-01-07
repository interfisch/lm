<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>


	<div class="entry-content">
		<h1 id="generatedPageTitle"><?php the_title();?></h1>
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<script type="text/javascript">jQuery(document).ready(function(){
		if(jQuery(".entry-content h1").size() == 1){
			jQuery("#generatedPageTitle").show();
		}
	});</script>

