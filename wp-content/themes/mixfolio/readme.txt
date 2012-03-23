=== Mixfolio ===

== Installation ==

	1. Download Mixfolio from your Graph Paper Press [member dashboard](https://graphpaperpress.com/members/member.php) to your Desktop.
	2. Log into your WordPress site and go to Appearance -> Install Themes and click on the Upload link and upload the mixfolio.zip file.
	3. Activate Mixfolio through the Appearance -> Themes menu in your WordPress Dashboard.
	4. You will be prompted to install and activate a few plugins. Do it.
	4. Go to Settings -> Media and make sure the following values are set:	
		* Image sizes		
			** Thumbnail size
				*** Width: 300
				*** Height: 205
				*** [checked] Crop thumbnails to exact dimensions (normally thumbnails are proportional)
				
			** Medium size
				*** Max Width: 300
				*** Max Height: 300
				
			** Large size
				*** Max Width: 980
				*** Max Height: 0
				
		
		* Embeds
			** [checked] When possible, embed the media content from a URL directly onto the page. For example: links to Flickr and YouTube.
			** Maximum embed size
				*** Width: 980
				*** Height: 0
				
	5. If you are migrating from an older theme, you might need to regenerate your thumbnails to fit the new site layout.  Regenerate your thumbnails with the [Regenerate Thumbnails](http://wordpress.org/extend/plugins/regenerate-thumbnails/) WordPress plugin.
		
= Theme Options =
This theme comes with Theme Options for controlling many aspects of the design, fonts, widgets, etc. Visit Appearance -> Theme Options to get started.  The welcome area is completely optional and can be hidden on the Theme Options page.

The images appearing on the homepage represent your latest Posts and their respective Featured Image.  Select which Categories you want to show in this area on the Theme Options page -> Homepage Design -> Categories.  The Shuffle Effect will shuffle from one Category to another.

= Post Formats
This theme supports the following Post Formats: Standard, Image, Gallery, Link, Quote, Video.  Each Post format uses a different Post layout.  You can select which Post Format is used on each Post by clicking the appropriate tab when editing each Post.  It will appear right below the title.  You can't miss it.

= Menus =
To add menu to your website, go to Appearance -> Menus and add a new menu. You can then add categories, pages and custom links to this new menu. You can also drag and drop menus around to make sub menus or reorder them. [Watch video tutorial](http://vimeo.com/16432328).

= Drop Down Menu Items =
To create a Drop Down menu item, you need to assign a special CSS class to each menu item you want to create the drop down.  Assign the CSS class "drop down" (minus the quotes obviously).  [Here is a screenshot](http://images.graphpaperpress.com.s3.amazonaws.com/mixfolio-dropdown-tutorial.jpg) of a drop down menu in the WordPress Menu area.  Make sure you drag the menu items you want beneath the drop down menu item as seen in the screenshot linked to above.

= Backgrounds =
Custom background is another great feature of WordPress that is supported in Mixfolio. Add yours by clicking Appearance -> Background.

= Widgets: =
There are two Sidebar widgetized areas in Mixfolio. You can add a variety of Widgets to this theme on the Appearance -> Widgets tab in WordPress.

= Page Templates: =
This theme comes packaged with a wide page template without a sidebar.

= Embed multimedia into Posts or Pages: =
For externally hosted videos (for example a YouTube or Vimeo video), you can directly paste the link of your video page into the content editor. You do not have to paste the embed code. WordPress will automatically embed the video from the link.

= Theme Internationalization: =
Mixfolio is currently only available in English (US) but is ready for translation.  See [WordPress in Your Language](http://codex.wordpress.org/WordPress_in_Your_Language) for more information on using a different language than English with your copy of Mixfolio.

= Hooks =

If you are a web developer, you can use the following theme hooks to modify this theme:

gpp_before_page
gpp_before_header
gpp_after_header
gpp_before_article
gpp_after_article
gpp_before_title
gpp_after_title
gpp_before_content
gpp_after_content
gpp_before_meta
gpp_after_meta
gpp_before_sidebar
gpp_after_sidebar
gpp_before_footer
gpp_credits
gpp_after_footer

= Troubleshooting =
If you've performed a clean install of Mixfolio and are having problems, make sure that the following conditions have been met: 
	* Make sure that you've installed the theme properly. You should use an FTP program like FileZilla, WinSCP, or Fetch to upload your files. Do not use WordPress' Install a theme in .zip format option.
	* Permissions: On most servers, the theme files should be set to 644 and folders should be set to 755
	* Make sure that you've deactivated all of your plugins before installing and/or upgrading if you continue to have theme activation problems.
	* Your Mixfolio folder should be named `mixfolio`. Do not rename this folder.
	* If you are upgrading your version of Mixfolio, make sure to backup first and completely delete your old version of Mixfolio from your server before uploading the new version of Mixfolio to your server. With version 1.1 and above, the upgrading has been made simpler. You can go to Mixfolio -> Updates in your menu, add your API key from your [member dashboard](https://graphpaperpress.com/members/member.php) and click the Update button.
	* Mixfolio uses jQuery for much of its functionality. If parts of your theme appear broken or unresponsive, then you likely have a JavaScript conflict being caused by an active plugin. Deactivate your plugins, one-by-one, to determine which plugin is conflicting with jQuery.

