
<?php
if(is_single()) { $currentpost = get_the_ID(); }
?>


<div id="sidenav">




<ul class="menu">
<li class="menu-item">
<ul class="sub-menu" style="display:block;">
		
<li class="menu-item">
<a href="http://www.lundm-bit.de/news/"><- NEWS</a>
</li>

<?php
	$args=array(
		'cat' => 9
	);
	$the_query = new WP_Query($args);
	while ($the_query->have_posts()) : $the_query->the_post();
?>
    <li class="menu-item<?php if($currentpost == $post->ID) { echo ' current'; } ?>"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
<?php
	endwhile;
?>
</ul>
</li>
</ul>


</div>