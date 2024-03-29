=== Nimble Builder - Section builder companion of the Customizr and Hueman themes ===
Contributors: nikeo, d4z_c0nf
Author URI: https://presscustomizr.com
Plugin URI: https://wordpress.org/plugins/nimble-builder/
Tags: customizer, editor, page builder, drag and drop
Requires at least: 4.7
Requires PHP: 5.4
Tested up to: 5.0.0
Stable tag: 1.2.2
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Drag-and-drop section builder companion of the Customizr and Hueman themes.

== Description ==
The Nimble Builder is a lightweight section builder intended to be the content creation companion of the Customizr and Hueman themes. It allows you to drag and drop pre-designed sections, or create your own sections, in live preview from the WordPress customizer.

== Features ==
* Drag and drop beautiful and ready-to-use sections in any pages.
* Easily create responsive column layouts.
* Create content, style, move / duplicate / remove elements in live preview.
* Leverage the customizer auto-drafting and schedule publishing features, and safely build and save drafts of your content before deploying in production.
* Works in any WordPress contexts : home, pages, posts, custom post types, archives, author pages, search page, ...

== Documentation ==
You'll find an online knowledge base for the Nimble builder here : [Nimble builder documentation](https://docs.presscustomizr.com/collection/334-nimble-builder).

== Screenshots ==
1. Creating a page with 3 sections
2. Dragging and dropping a pre-designed section
3. Editing content in live preview
4. Creating columns layouts
5. Customizing a section with an image background

== Installation ==
1. Install the plugin through the WordPress plugins screen. Or download the plugin, unzip the package and upload it to your /wp-content/plugins/ directory
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Navigate to the WordPress live customizer
4. Look for a drop zone candidate in the previewed page and click on the "+" button to start building your first section of content
5. Drag a module from the left panel and drop it in a drop zone of the previewed page

== Frequently Asked Questions ==
= Can I use the Nimble Builder with any theme ? =

The Nimble builder has been optimized to work with the Customizr and Hueman theme, but it works with any WordPress theme. If you experience any problem with a specific theme, please report it in the [plugin support forum](https://wordpress.org/support/plugin/nimble-builder).

== Upgrade Notice ==
= 1.2.2 =
* fixed : function_exists( '\Nimble\ ... ) breaks in some version of php ( 5.6.38 )
* fixed : always check if 'do_blocks' exists for retrocompatibility with WP < 5.0

== Changelog ==
= 1.2.2 : November 11th, 2018 =
* fixed : php function_exists( '\Nimble\ ... ) breaks in some version of php ( 5.6.38 )
* fixed : always check if 'do_blocks' exists for retrocompatibility with WP < 5.0

= 1.2.1 : November 10th, 2018 =
* fixed : php function function_exists() can return false when the tested namespaced function starts with a backslash.
* fixed : parallax background only applied to section level
* fixed : background smart load only applied to section level
* improved : when dragging content, no need to print dropzones before or after empty sections
* improved : introduce a Nimble content filter for the TinyMce editor module, in order to prevent a content "corruption" by third party plugins

= 1.2.0 : November 8th, 2018 =
* fixed : added compatibility patch for WordPress 5.0. Waiting for core decision on : https://core.trac.wordpress.org/ticket/45292
* fixed : parallax effect not being applied on preset section drop
* improved : image module margins are not inherited from the theme

= 1.1.9 : October 31st, 2018 =
* fixed : broken column width in mobiles for columns with a custom horizontal margin.
* fixed : conflict with Anspress plugin when uploading an image on front.
* fixed : the content picker input ( for link creation ) was broken : "Set custom url" could be printed multiple times, no search results was generating an error, some pages or posts could not be listed.
* fixed : conflict with HappyForms plugin when customizing a form.
* improved : simple form module, added sender's email in the body of the message.
* improved : simple form module, animate with a scroll action to focus on the message after a send action.
* added : an option for a parallax effect on section's background image. Compatible with lazy loading.

= 1.1.8 : October 23rd, 2018 =
* improved : performance improvements with new options to lazy load images
* added : an admin page for Nimble Builder, to display the system informations
* added : a dismissable update notifications in admin

= 1.1.7 : October 11th, 2018 =
* fixed : check on php and wordpress version not preventing some plugin functions to be fired.

= 1.1.6 : October 11th, 2018 =
* fixed : normalized the text style of the user interface when previewing, so it's not impacted by the theme or other's plugins style
* improved : added a way to make <a> links unclickable. partially fixes #193
* added : a "Contact-us" category of sections, including 2 new pre-designed sections

= 1.1.5 : October 10th, 2018 =
* fixed : columns of a pre-designed sections not resizable after a drop
* fixed : don't animate when duplicating a column or a module
* fixed : added the missing button text option for the form module
* improved : better support for https secure protocol when building the stylesheet URL

= 1.1.4 : October 9th, 2018 =
* fixed : code typo generating a php error ( https://wordpress.org/support/topic/unable-to-activate-44/ )
* fixed : use 'https' when building the dynamic stylesheet url when is_ssl()

= 1.1.3 : October 9th, 2018 =
* fixed : user interface not generated on the first click in some cases

= 1.1.2 : October 8th, 2018 =
* improved : the content picker should be available when expanding the main Nimble panel for the first time.
* improved : the collection of pre-designed sections is fetched earlier for better perforamnces.
* improved : a set of params can now be passed to a custom location when registering.

= 1.1.1 : October 7th, 2018 =
* fixed : wrong error message, indicating a missing "ver_ini" property for column and module generated when dropping a module in a section to create
* added : a filter 'nimble_get_locale_template_path', used for example in the Hueman theme to define a custom Nimble template path

= 1.1.0 : October 5th, 2018 =
* This version includes major improvements. Many new modules and pre-designed sections are now available to create your pages.
* New modules : heading, icon, button, Google map, Html content, quote, spacer, divider, contact form.
* The user interface has been enhanced with a non intrusive top bar, including do/undo buttons, and global settings for the Nimble builder.

= 1.0.4 : June 14th, 2018 =
* fixed : when margins and paddings are not defined ( number field emptied ), no related CSS properties should be printed.
* fixed : sek-sektion-inner should not have a padding of 15px on front.
* fixed : a nested sektion should reset its parent column padding.
* fixed : empty sektions wrapper should only be printed when customizing.
* fixed : prevent element in the wp content to be displayed out of the wp-content-wrapper when previewing.
* fixed : dynamic CSS can be printed twice : inline and enqueued as CSS file when user logged in.

= 1.0.3 : June 9th, 2018 =
* fixed : missing dropzones around nested sections
* fixed : reseting the spacing of a level was not changing the main setting.
* fixed : the tinyMceEditor not collapsing on 'sek-notify'
* improved : tinyMce text editor => attach callbacks on 'input' instead of 'change keyup'
* improved : module dynamic ui => print the module name instead of 'module' at the bottom
* improved : when clicking more than one time one the + ui icon, visually remind the user that a module should be dragged, with a light animation on the module picker container
* added : encapsulate the singular post / page content inside a dom element so we can generate a dynamic ui around it when customizing + add an edit link to the post or page
* added : introduced a loader overlay printed when the markup of any level being refreshed.
* added : a "+" icon to add module from the sections dynamic UI

= 1.0.2 : June 7th, 2018 =
* info : Nimble has been approved to be hosted on the wordpress.org plugin repository!
* fixed : the background overlay should not be applied to a level when there's no background image
* added : a border-radius css rule to the pickable modules
* added : the location type printed at the bottom of the dynamic ui when hovering
* improved : the ui icon size gets smaller when number of columns is >= 4
* improved : the "Insert new section" is revealed when mouse is coming 50 pixels around

= 1.0.1 : June 6th, 2018 =
* fixed : submission issue on wordpress.org. Apply various fixes to the code in order to use unique function names, namespaces, defines, and classnames.
* fixed : location levels need the css rule clear:both
* fixed : clicking on the pencil icon of the tiny_mce_module should expand the editor
* fixed : impossible to resize a fresh new column
* fixed : impossible to move a fresh new module
* fixed : alpha color input unwanted expansion when 2 instances displayed at the same time
* fixed : before (after) loop sections might be duplicated in some edge cases
* improved : reconsider behavior on mouse click (release) in the preview

= 1.0.0 : June 1st, 2018 =
* initial submission to the wordpress.org plugins repository
