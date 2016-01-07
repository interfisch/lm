<?php
/*
Plugin Name: Category Shortcode
Plugin URI: http://creeksidesystems.com
Description: Plugin adds shortcode capability for adding posts by category to a page.
Version: 1.3 
Author: Robert Drake
Author URI: http://creeksidesystems.com
*/

/*
Category Shortcode (Wordpress Plugin)
Copyright (C) 2010 Robert Drake
Contact me at http://robertdrake.net or http://creeksidesystems.com or http://servusamanu.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

//define plugin defaults
DEFINE('rd_method', 'full');
DEFINE('rd_number_of_posts', '1');
DEFINE('rd_category_id', '1');
DEFINE('rd_orderby', 'post_date');
DEFINE('rd_order', 'DESC');

//add the shortcode category
add_shortcode("Category", "rdCatShortCode_handler");

//print all the final output to the screen
function rdCatShortCode_handler($incomingfrompost) {

	$incomingfrompost=shortcode_atts(array(
		'method' => rd_method,
   	 	'number' => rd_number_of_posts,
		'orderby' => rd_orderby,
		'order' => rd_order,
    		'id' => rd_category_id           
 	), $incomingfrompost);

  	$rdcsch_output = rdrakeCategoryShortcode_function($incomingfrompost);
  	return $rdcsch_output ;
}

//calculate the final output
function rdrakeCategoryShortcode_function($incomingfromhandler) {

//setup the values as input from the shortcode
	 $rd_loop_method  = wp_specialchars_decode($incomingfromhandler["method"]);
	 $rd_loop_postnum = wp_specialchars_decode($incomingfromhandler["number"]);
	 $rd_loop_orderby = wp_specialchars_decode($incomingfromhandler["orderby"]);
	 $rd_loop_order   = wp_specialchars_decode($incomingfromhandler["order"]);
	 $rd_loop_catid   = wp_specialchars_decode($incomingfromhandler["id"]);

//check the values for validity in the get_posts function
if ( strtolower($rd_loop_method) != 'full' && strtolower($rd_loop_method) != 'excerpt' && strtolower($rd_loop_method) != "title" ) {
	$rd_loop_method = 'full';
}

if ( strtolower($rd_loop_order) != 'asc' && strtolower($rd_loop_order) != 'desc' ) {
	$rd_loop_order = 'desc';
}

if ( strtolower($rd_loop_orderby ) != 'author' && strtolower($rd_loop_orderby ) != 'date' && strtolower($rd_loop_orderby ) != 'title' && strtolower($rd_loop_orderby ) != 'modified' && strtolower($rd_loop_orderby ) != 'parent' && strtolower($rd_loop_orderby ) != 'id' && strtolower($rd_loop_orderby ) != 'rand' && strtolower($rd_loop_orderby ) != 'none' && strtolower($rd_loop_orderby ) != 'comment_count' ) {
	$rd_loop_orderby = 'date';
}

	global $post;

//grab the posts based on the criteria above
	$rdcsc_posts = get_posts('numberposts='.$rd_loop_postnum.'&order='.$rd_loop_order.'&orderby='.$rd_loop_orderby.'&category='.$rd_loop_catid);

	$rdscf_output='';



///// -------------------------------------------------------------------------------------------///
///// ------------------------------ OUTPUT STYLING BELOW ---------------------------------------///
///// -------------------------------------------------------------------------------------------///

	switch ($rd_loop_method) {
    		case 'excerpt': 		
 			foreach($rdcsc_posts as $post) :
    				setup_postdata($post);
				
				$rdcsc_excerpt = get_the_excerpt();
					/// strip tag filters added for 1.2 release
				$rdcsc_excerpt = apply_filters( 'the_content', $rdcsc_excerpt );
				$rdcsc_excerpt = str_replace( ']]>', ']]>', $rdcsc_excerpt );

				$rdcsc_author = get_the_author();
				$rdcsc_comments = get_comments();

				// added in 1.3 release
				$rdscf_output.='<div class=csc_post csc_excerpt>';
			
				/// thumbnail added in 1.2 release
				$rdscf_output.='<div class=csc_post_thumbnail>' . get_the_post_thumbnail($rdcsc_posts->ID, 'thumbnail') . '</div>';

				$rdscf_output.='<div class=csc_post_title><a href="' . get_permalink($rdcsc_posts ->ID).'">' . the_title("", "", false) .'</a></div>';
				$rdscf_output.='<div class=csc_post_date>' . the_date('','','',FALSE) .'</div>';
				$rdscf_output.='<div class=csc_post_author>' . $rdcsc_author . '</div>';
				foreach((get_the_category()) as $category) { 
					$rdscf_output.='<div class=csc_post_category>' . $category->cat_name . '</div>'; 
				}
				$rdscf_output.='<div class=csc_post_excerpt>' . $rdcsc_excerpt . '</div>';
				$rdscf_output.='<div class=csc_break></div>';
				$rdscf_output.='</div>';
			endforeach;
        		break;
    		case 'title':
        		foreach($rdcsc_posts as $post) :
       			setup_postdata($post);	
				$rdcsc_excerpt = get_the_excerpt();
				$rdcsc_author = get_the_author();
				$rdcsc_comments = get_comments();

				// added in 1.3 release
				$rdscf_output.='<div class=csc_post csc_title>';

				$rdscf_output.='<div class=csc_post_title><a href="' . get_permalink($rdcsc_posts ->ID).'">' . the_title("", "", false) .'</a></div>';
				$rdscf_output.='<div class=csc_post_date>' . the_date('','','',FALSE) .'</div>';
				$rdscf_output.='<div class=csc_post_author>' . $rdcsc_author . '</div>';
				foreach((get_the_category()) as $category) { 
					$rdscf_output.='<div class=csc_post_category>' . $category->cat_name . '</div>'; 
				}
				$rdscf_output.='<div class=csc_break></div>';
				$rdscf_output.='</div>';
			endforeach;
        		break;
    		case 'full':
			foreach($rdcsc_posts as $post) :
				setup_postdata($post);				
				$rdcsc_content = get_the_content();
				/// strip tag filters added for 1.2 release
				$rdcsc_content = apply_filters( 'the_content', $rdcsc_content );
				$rdcsc_content = str_replace( ']]>', ']]>', $rdcsc_content );

				$rdcsc_author = get_the_author();
				$rdcsc_comments = get_comments();

				// added in 1.3 release
				$rdscf_output.='<div class=csc_post csc_full>';

				/// thumbnail added in 1.2 release				

				$rdscf_output.='<div class=csc_post_thumbnail>' . get_the_post_thumbnail($rdcsc_posts->ID, 'thumbnail') . '</div>';
				
				$rdscf_output.='<div class=csc_post_title><a href="' . get_permalink($rdcsc_posts ->ID).'">' . the_title("", "", false) .'</a></div>';
				$rdscf_output.='<div class=csc_post_date>' . the_date('','','',FALSE) .'</div>';
				$rdscf_output.='<div class=csc_post_author>' . $rdcsc_author . '</div>';
				foreach((get_the_category()) as $category) { 
					$rdscf_output.='<div class=csc_post_category>' . $category->cat_name . '</div>'; 
				}
				$rdscf_output.='<div class=csc_post_content>' . $rdcsc_content . '</div>';
				$rdscf_output.='<div class=csc_break></div>';
				$rdscf_output.='</div>';
			endforeach;       	 	
        		break;
	}

	wp_reset_query();
	$rdscf_output.='';
	return $rdscf_output;
}

//add Category Shortcode to the tools menu
add_action('admin_menu', 'rdcsc_plugin_menu');

function rdcsc_plugin_menu() {

	add_management_page('Category Shortcode', 'Category Shortcode', 'administrator', 'rdcsc', 'rdcsc_admin_print');

 	$rdcsc_stylefile = WP_PLUGIN_URL . '/category-shortcode/style.css';
	wp_register_style('rdcsc_style', $rdcsc_stylefile);
	wp_enqueue_style( 'rdcsc_style');
}

?>
<?php
 
function rdcsc_admin_print() {

?>

<SCRIPT LANGUAGE="JavaScript">
function calcShortcode (form) {
    
	//get values
	var rdjs_Number = form.rdcsc_admin_number.value;
	var rdjs_Order = form.rdcsc_admin_order.value;
	var rdjs_Orderby = form.rdcsc_admin_orderby.value;
	var rdjs_Method = form.rdcsc_admin_method.value;
	var rdjs_Category = form.rdcsc_admin_category.value;

	//if there is no input default the code to show total posts.  If 0 is output set it to use the page default
	if (rdjs_Number == false) {
		if (rdjs_Number != '0') {		
			rdjs_Number = -1;
		}
	}

	var rdjs_Calculated_Code = "[Category number='" + rdjs_Number + "' method='" + rdjs_Method + "' order='" + rdjs_Order + "' id='" + rdjs_Category + "' orderby='" + rdjs_Orderby + "']";

	//print the calculated code
	document.getElementById("calculated_code").innerHTML= (rdjs_Calculated_Code);

};
</SCRIPT>

<div class='wrap'>
	<h2>Category Shortcode Generator</h2>
	<form name='rdcsc_form' method='POST'>
	<div class='rdcsc_notes'>Enter 0 to display the page default number of posts.  Enter nothing to display the total number of matching posts.</div>
	<div class='form-field'>
		<span class='label'><label for='rdcsc_number'><?php _e('Number of Posts (Optional)') ?></label></span>
			<input type='text' class='numberofposts' name='rdcsc_admin_number' style='width: 200px'/>
	</div>
	<div class='form-field'>
			<span class='label'><label for='rdcsc_order'><?php _e('Order') ?></label></span>
			<select class="rdcsc_select" name='rdcsc_admin_order'>
				<option value='asc'>Ascending</option>
				<option value='desc'>Descending</option>
			</select>
	</div>
	<div class='form-field'>
			<span class='label'><label for='rdcsc_method'><?php _e('Display Method') ?></label></span>
			<select class="rdcsc_select" name='rdcsc_admin_method'>
				<option value='full'>Full Post</option>
				<option value='excerpt'>Excerpt</option>
				<option value='title'>Title</option>
			</select>
	</div>
	<div class="form-field">
			<span class='label'><label for='rdcsc_orderby'><?php _e('Order By') ?></label></span>
			<select class="rdcsc_select" name="rdcsc_admin_orderby">
				<option value='author'>Author</option>
				<option value='date'>Date</option>
				<option value='title'>Title</option>
				<option value='modified'>Modified</option>
				<option value='parent'>Parent</option>
				<option value='id'>Id</option>
				<option value='rand'>Rand</option>
				<option value='none'>None</option>
				<option value='comment_count'>Comment Count</option>
			</select>
	</div>
	<div class='form-field'>
			<span class='label'><label for='rdcsc_category'><?php _e('Category') ?></label></span>
		<?php wp_dropdown_categories(array('hide_empty' => 0, 'name' => 'rdcsc_admin_category', 'orderby' => 'name', 'selected' => $category->parent, 'hierarchical' => true)); ?>
	</div>
	<INPUT TYPE='button' class='calculate_button' NAME='button' Value='Calculate Short Code' onClick='calcShortcode(this.form)'>
	</div>
	</form>
	<div id='calculated_code'> 
	</div>

</div>

<?php
}
?>