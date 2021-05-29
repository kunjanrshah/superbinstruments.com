=== Casper's Flyin' Call-to-Action ===
Contributors: XAce90
Tags: call to action, cta, easy, simple, popup, popover, sticky, tab, bar, slide out, button, feedback, review, slick, fly, widget
Requires at least: 4.0
Tested up to: 5.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Donate link: https://www.paypal.me/xace90
Stable tag: trunk

A lightweight, highly customizable call-to-action plugin that makes it easy to get your visitors' attention.

== Description ==

Casper's Flyin CTA is the perfect plugin for announcements or calls to action: lightweight, easy to use, and lots of customization options; including two themes (display the CTA at the bottom of the page or have it slide it from the side), several screen positions based on your chosen theme, and full control over the colors and branding.

Don't let your visitors miss out on great deals or important announcements again!

**NOTE:** I know the Options page is becoming really cluttered. I'm working on 2.0 which will reorganize the Admin page into a much more managable set up. Thanks for everyone's feedback!

== Installation ==

= Automatic =

1. Find us through your WordPress admin (Plugins -> Add New -> search for Casper's Flyin CTA); install.
1. Activate plugin.
1. Go to Appearance -> Fly-in CTA
1. Change the content and colors as you see fit.

= Manual =

1. Upload the caspers-flyin-cta folder to the plugins folder of your WordPress install.
1. In your WordPress admin, go to the plugins page.
1. Find Casper's Flyin CTA and activate it.
1. Go to Appearance -> Fly-in CTA
1. Change the content and colors as you see fit.

== Frequently Asked Questions ==

= Why should I use your plugin? =

This plugin was designed with marketing and project management teams in mind. It's easy to implement, easy to update, and easy to customize, and all designed to help you increase conversions. I spent three years working closely with marketing and sales specialists, as well as directly with website owners, and time and time again I got a request to implement this exact functionality. So, I did what any sane developer would do: I turned it into a plugin and shared it with the community. While I am no longer with the marketing agency where this plugin was inspired and developed, the love and support this plugin has found inspires me to continue improving it with new and better features. 

= Are you ready for Gutenberg? =

This plugin has been tested with Gutenberg, the new Wordpress editor, and works seemlessly in WordPress environments that include it. The editor in the plugin's admin page, where you write the body of your message, for now still uses the classic WYSIWYG.

= How should I contact you if I find a bug or have a feature request? =

Check out the plugin's [support forums](https://wordpress.org/support/plugin/caspers-fly-in-cta), or you can find me on Twitter at @SirCaseyJames.

== Screenshots ==

1. This plugin enables you to add a bar to the bottom of the page (left, right, or centered) to act as a call to action.
2. It slides open when you click it, revealing more information. You can even include a form right in the slide out. 
3. Alternatively, you can put the call-to-action on the left or right of the page, not at the bottom. 
4. It also slides open when clicked, revealing an important message or further steps the user may want to take.
5. You can find settings for this call to action, including background and font colors, under Appearance -> Fly-in CTA. 
6. As shown here, there are several powerful settings. Not only can you control where on your page the CTA sits, you can determine which pages to have the item show up on. You also get a full WYSIWYG editor where you can add media and forms. You also have the option to turn it on and off without having to deactive and reactivate the plugin. 

== Changelog ==

= 1.5.2 =
* Fixed issue where certain characters in the side tab would break the JavaScript, preventing the body from sliding out.

= 1.5.1 =
* Fixed issue where the text and the close icon in the topbar of the bottom flyin was too small on some themes
* Returned the 'Close' icon to the side flyin on mobile screens. Otherwise users were trapped, without a way to close.
* Improved the look and feel of the close icon in the side flyin


= 1.5 =
* Tested with Gutenberg, the new wordpress editor, ensuring you can continue to use this plugin in future versions
* Improved the X icon which appeared in the circle at the top right of the expanded view
    * The clunky icon background has been removed
    * The color of the icon will continue to match the top bar's font color
    * The option to choose the icon's background color has also been removed from the admin, since there is no longer a background
    * The icon has been replaced with a more elegent and larger CSS icon
    * For tabs on the side of the screen (as opposed to bottom-positioned tabs), the icon has been removed entirely for two reasons: 1) it would occasionally overlap content, making that content unreadable, and 2) the tab already updates to say 'Close'
* Updated author information and plugin meta data

= 1.4.1 =
* Fixed bug where horizontal flyout from the left was not smoothly transitioning

= 1.4 =
* Added custom post type support. You can now choose to have the CTA appear only on a custom post type.
* No longer forces content to be centered. You can choose to center it in the WYSIWYG editor.
* Added a Settings link to the plugin on the Plugin's page
* Fixed bug where one of the sliders wasn't working when you were logged in
* Fixed related bug where the slider was getting pushed too far down and off the screen when logged in
* Fixed bug where paragraphs were getting stripped.

= 1.3.1 =
* Fixes fatal bug to the side fly-in theme that 1.3 introduced

= 1.3 =
* Added option to hide on mobile (and to set what screen width counts as mobile for your site)
* Added option to set z-index (in order to prevent some sticky menus and other items from covering the flyin)

= 1.2.3 =
* Added supported for Gravity Forms 'Add Form' button
* Fixed issue where slideout wasn't working on themes that were not using jQuery

= 1.2.2 =
* fixed bug where scroll bars were appearing unnecessarily

= 1.2.1 =
* Bug fixes, including fixing an issue when the content was too much for the screen

= 1.2 =
* Added shortcode support
* Added the option to, when cta is located on the side, have the top bar flush with the screen instead of jutting out onto the page
* Bug fixes

= 1.1 =
* Added option to have flyin automatically open up on the homepage
* Added ability to set timer for the automatic flyin
* Added a width setting so users can set the width (percent for bottom bar, pixels for side bar; sidebar width only affects the tab currently)

= 1.0.1 =
* Bug fixes, mobile responsive tweaks, readme typos, admin UX, and improved syntax

= 1.0.0 =
* Release!