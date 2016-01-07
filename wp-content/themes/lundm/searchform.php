<?php
/**
 * The template for displaying search forms in Twenty Eleven
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="s" class="assistive-text"><?php #_e( 'Search', 'twentyeleven' ); ?></label>
	<img src="<?php bloginfo('template_directory'); ?>/images/search.jpg" alt="Search" class="sIcon">
	<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>" />
	<button type="submit" class="submit" name="submit" id="searchsubmit"> <?php #esc_attr_e( 'Search', 'twentyeleven' ); ?> </button>
</form>
