<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

	<div id="primary">
		<div id="content" role="main">

			<article id="post-0" class="post error404 not-found">


				<div class="entry-content">
					<p><b>Entschuldigen Sie bitte, die aufgerufene Seite gibt es nicht.</b><br><a href="<?php bloginfo('url'); ?>">Hier gelangen Sie zu unserer Startseite.</a></p>
					
					<h2>Suchen Sie etwas bestimmtes?</h2>
					<p>Sie können gerne unsere Seite nach den gewünschten Informationen durchsuchen:</p>
					<?php get_search_form(); ?>
<br />

				
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>