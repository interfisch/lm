=== Category Shortcode ===
Contributors: Robert Drake
Donate link: http://robertdrake.net
Tags: category, shortcode
Requires at least: 2.9.0
Tested up to: 3.0.1
Stable tag: 1.3

Plugin adds shortcode capability for adding posts by category to a page.

== Description ==

This plugin creates the [Category]] Shortcode.  The code takes 5 arguments:

number: the number of posts to display.  0 equals the default number.  -1 equals the total available.

Order: Ascending or Descending

Display Method:  Full, Excerpt, Title

Order By: Author, Date, Title, Modified, Parent, ID, Rand, None, or Comment Count.  

Category: this is the category id the category or categories that should be searched.  Multiple categories can be specified in a comma separated list.

Example shortcode: 

[Category number='5' method='title' order='asc' id='11,45' orderby='comment_count']

This will show 5 posts in ascending order of category 11 and 45 as arranged by comment_count and will display just the post titles.

== Installation ==

1. Upload the `category_shortcode` directory to the `/wp-content/plugins` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place a valid [Category] code into a page.

== Frequently Asked Questions ==

=How do I create a valid category tag?

A tool has been provided under the tools menu (Category Shortcode).  Use this generate valid tags.  Note: the tool cannot be used to generate a tag that displays multiple categories, but the shortcode does support this.

=How do I style the output?

I've made div classes around the content data.  These classes are:
csc_post_thumbnail
csc_post_title
csc_post_date
csc_post_author
csc_post_category
csc_post_excerpt
csc_post_content
csc_break (a div between each post)

There is also a style div around the entire post with a class of csc_post and then either csc_excerpt, full or title to help with styling.
csc_post
csc_excerpt
csc_title
csc_full

An example style to modify the size of the title would be

.csc_post_title {
   font-size: 14px;
}

These properties can be set to  display: none; to hide the data.  More advanced styling could be done modifying the php in the section commented OUTPUT STYLING.


== Changelog ==

= 1.0 =
* Plugin introduced into the wild.
= 1.1 = 
* Fixed bug where content was floating to the top of the page
* Changed some formatting
= 1.2 = 
* NOTICE TO THOSE UPDATING -- this release may change how the visual output because html tags will no longer be stripped out of the full post or excerpt output.  Be aware.  
* The Get_Content function strips out tags.  I've tweaked the code so tags are retained in the excerpt and full output styles
* Added post thumbnail to the excerpt and title output with the csc_post_thumbnail css class
* Expanded explanation of CSS Styling
= 1.3 =
* Fixed an issue where the loop was being broken on the host page (where the shortcode lived) and showing the shortcode's last post instead.
* Placed a DIv around the entire posting to make styling easier.

== Acknowledgements ==

A big thank you to g33kg0dd3ss for figuring out the 1.3 fix issue with the loop being broken.  She contributed the patch fix.

==Future Additions?==

1. Let plugin form allow for multiple category selections

2. Let plugin form allow for multiple orderby methods

3. In admin form restrict Number of posts to numbers only.

4. In admin form setup a copy and paste script

5. Accept a category name as a valid input

6. Internationalization of the plugin

7. Improve Formatting of Posts / Make formatting easier to edit./ Give user more control over formatting
 
8. Allow attachments to come through

9. Turn title links on or off.

10. Allow comments in output

11. Give user more control over the postformatting

12. Add ability to modify thumbnail options through shortcode
