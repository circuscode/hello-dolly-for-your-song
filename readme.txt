=== Hello Dolly For Your Song ===
Contributors: unmus
Tags: hello dolly, love, widget, music, random, text, shortcode, lyric, template tag, admin
Requires at least: 4.0
Tested up to: 4.7.3
Stable tag: 0.10
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

This simple plugin is an extended version of the famous hello dolly plugin by Matt Mullenweg. It shows a random line of any text in your blog. 

== Description ==

This simple plugin is an extended version of the famous hello dolly plugin by Matt Mullenweg (inventor of wordpress). Every human being has a special relationship to a particular song. And because of that, Hello Dolly For Your Song brings the lyric of your favourite song in the blog. But of course it can be used for any text. ;-)

= Features =

* Display a random line of a custom text in your blog as widget
* Display a random line of a custom text in your blog as shortcode
* Display a random line of a custom text in your theme as template tag
* Display a random line of a custom text in the blog administration
* Options Page to define a custom song text
* Hidden Options
* Languages: English, German, Spanish, French

= Related Links =

* <a href="http://www.unmus.de/wordpress-plugin-hello-dolly-for-your-song/">Official Plugin Page</a> (German)
* <a href="http://www.unmus.de/hello-dolly-for-your-song/">Why I have created this plugin?</a> (German)
* <a href="https://www.youtube.com/watch?v=ydp6k-RLiyk&t">ScreenCast showing almost all features</a> (German)
* <a href="https://github.com/circuscode/hello-dolly-for-your-song">Source Code @ GitHub</a>

== Installation ==

1. Upload plugin folder to /wp-content/plugins/ or download plugin via directory
2. Activate the plugin through the plugins menu in WordPress
3. Go to Settings > Hello Dolly Your Song to configure your songtext

See Other Notes for more details on configuration.

== Frequently Asked Questions ==

= I have not maintained a songtext, nevertheless some lyrics is displayed in the admin head. =

This is Hello Dolly by Louis Armstrong. If no text is maintained in the options, the programm uses the songtext of Hello Dolly.

= How can I use the shortcode? =

Type [hdfys] in a blank line in the WordPress editor.

= How can I bring the widget in the blog with a custom widget title? =

You can define the title in the settings of the widget.

= How can I integrate the random lyric in the theme? =

Use the template tag hello_dolly_for_your_song() in your theme file.

= I do only want to use the capabilities in the frontend and fade out the text in the admin panel. Is this possible? =

You can use the hidden option for that! Please set the option "hdfys_admin_lyric" to 0 in the table wp_options within your WordPress database. Because of that the lyric in the admin panel will be faded out. Going back to standard settings, just set the value to 1. 

= Can I assign custom css? =

Yes, you can. Each output of this plugin has individuell css classes. Please use your debugging tools, to find the classes.

= How can I deinstall Hello Dolly For Your Song? =

You can use the regular way on the plugin page. After deinstallation your wordpress is really clean.

= I have maintained a continous text and this breaks the admin layout partly? =

Helly Dolly For Your Song works for texts in poem style. This means you need a text with word wraps after each line or sentence. If you want to use a continous text in the plugin, you should add word wraps after each sentence.

== Screenshots ==

1. Display songtext in the admin head
2. Options Page

== Changelog ==

= 0.10 =
* 18 march 2017
* Options Link @ Plugin Page
* Updated ReadMe

= 0.9 =
* 26 december 2016
* French Language
* Hidden Options
* Security Improvements
* Internal Optimization

= 0.8 =
* 1 september 2016
* Template Tag
* New Labels
* Code Improvement

= 0.7 =
* 27 august 2016
* Settings API
* Update Process

= 0.6 =
* 09 august 2014
* Spanish Language

= 0.5 =
* 06 september 2013
* Shortcode
* Custom Widget Title

= 0.4 =
* 26 june 2013
* Widget
* Localization
* German language
* Clean deinstallation
* Bugfix: Processing of apostrophes

= 0.3 =
* 5 may 2013
* Structured and readable code
* First published version

= 0.2 =
* 4 may 2013
* Running version without errors

= 0.1 =
* 3 may 2013
* Running version

== Upgrade Notice ==

= 0.10 =
This version includes only minor changes.

= 0.9 =
This version supports french language, hidden options and brings more security.

= 0.8 =
This version supports template tags for WordPress themes.

= 0.7 =
This version supports the WordPress Settings API.

== Configuration ==

1. Maintain the songtext you love in the Settings.
2. That is all!

= Shortcode =
[hdfys]

= Template Tag =
hello_dolly_for_your_song()