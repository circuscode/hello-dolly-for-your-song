=== Hello Dolly For Your Song ===
Contributors: unmus
Tags: hello dolly, love, widget, music, song, random, text, shortcode
Requires at least: 3.0
Tested up to: 3.9
Stable tag: 0.6
License: GPLv3 or later

This simple plugin is an extended version of the famous hello dolly plugin by Matt Mullenweg. It shows the songtext of any song in your blog.

== Description ==

This simple plugin is an extended version of the famous hello dolly plugin by Matt Mullenweg (inventor of wordpress). Every human being has a special connection to a particular song. And because of that, Hello Dolly For Your Song brings the lyric of your favourite song in the blog and to the admin screen. But of course it can be used for any text. ;-)

= Features =

* Display a random line of a custom text in your blog as widget
* Display a random line of a custom text in your blog as shortcode
* Display a random line of a custom text in the blog administration
* Options Page to define a custom song text
* Languages: English, German, Spanish

= Related Links =

<a href="http://www.unmus.de/wordpress-plugin-hello-dolly-for-your-song/">Official Plugin Page</a> (German) // <a href="http://www.unmus.de/hello-dolly-for-your-song/">Why I have created this plugin?</a> (German)

= Thank You =

Andrew Kurtis and <a href="http://www.webhostinghub.com/">WebHostingHub</a> for the spanish translation.

== Installation ==

1. Upload plugin folder to the /wp-content/plugins/ directory
2. Activate the plugin through the Plugins menu in WordPress
3. Then go to settings > Hello Dolly Your Song to configure your songtext

But much better is the wordpress plugin directory installation. 

== Frequently Asked Questions ==

= I have not maintained any songtext, nevertheless some text will be displayed in the admin head. =

This is Hello Dolly by Louis Armstrong. If not any text is maintained in the options, the programm uses the songtext of Hello Dolly.

= How can I use the shortcode? =

Type [hdfys] in a blank line (this is important) in your articles and pages.

= How can I bring the widget in the blog with a custom widget title? =

You can define the title in the settings of the widget. If you use older versions of this plugin (<0.5), try this: Go to line 173 of the file hellodollyforyoursong.php. Remove the // and write your widget title between the apostrophes.

= Can I assign custom css? =
Yes, you can. Each output of this plugin has individuell css classes. Please use your debugging tools, to find the classes.

= How can I deinstall Hello Dolly For Your Song? =

You can use the regular way at the plugin page. After deinstallation your wordpress is really clean. Version 0.4 of this plugin and above cleans all database entries too.

= How can I deinstall the previous versions of Hello Dolly For Your Song? =

You can use the regular way at the plugin page too. But the last maintained text remains in your database. To remove it, please delete the dataset "option-name=hdfys_song" in the table wp_options.

== Screenshots ==

1. Display songtext in the admin head
2. Options Page

== Changelog ==

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
* Clean deinstallation (database entries will be removed)
* Bugfix: Processing of apostrophes

= 0.3 =
* 3 may 2013
* Structured and readable code
* Initial published version

= 0.2 =
* 3 may 2013
* Running version without errors

= 0.1 =
* 3 may 2013
* Running version