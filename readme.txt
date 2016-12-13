=== Dan's Embedder for Google Calendar ===
Contributors: duplaja
Donate link: https://www.wptechguides.com/donate/
Tags: embed, Google Calendar, calendar, gcal, dan
Requires at least: 4.0.1
Tested up to: 4.7.0
Stable tag: trunk
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Dan's Embedder for Google Calendar was created out of a need to display Google calendars in both list and full view in a way that was mobile friendly, customizable via shortcode, and easy to style. No need to import events or manage them directly in WordPress. All you need is a public Google Calendar (or multiple!) and a free, easy to get API key.

Features:

* Displays public calendars in a mobile friendly format

* Offers Options for Full Calendar View, or Upcoming Events List

* All options are configured via shortcode

* Full Calendar offers mobile friendly tooltips with event title, time, and location

* Upcoming Events List can specify how many items to show, or turn on auto-scroll

* Custom div id can be set for every calendar, for individual theming of each calendar

* No limit to the number of calendars you can link up

Shortcodes Cheatsheet:

* Full Display `[dancal]` (defaults to 1st calendar) , or `[dancal cal=1 divid=idname]` (where 1 is the number of calendar you want, and divid is the id of the outermost div, for theming purposes. If you don't set divid, a random one is chosen to allow multiple calendars on the same page).

* Upcoming Events List: `[dancal_list]`, or `[dancal_list cal=1 num=30 scroll=true divid=idname]` (1 is the calendar number, num is a number 0 for number of upcoming events to display, scroll is true or false to enable auto-scroll, , and divid is the id of the outermost div, for theming purposes. If you don't set divid, a random one is chosen to allow multiple calendars on the same page))

For help creating an API key to use with this plugin, either check out the settings page in plugin, or the FAQ tab here.

To see other plugins like this, or tips on how these are built, check out [WP Tech Guides](https://www.wptechguides.com/).

Thanks to Mike @ [WP Bullet](https://wp-bullet.com/) for the banner and icon.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/dans-gcal` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Head over to the Dan's GCal settings page, found on the Dashboard sidebar.

== Frequently Asked Questions ==

= How do I create my API key? =

To create API key, visit Google Developers Console. https://console.developers.google.com/ 
Then, follow bellow;

* Create new project (or use project you created before).

* Check "APIs & auth" -> "Credentials" on side menu.

* Hit "Create new Key" button on "Public API access" section.

* Choose "Browser key" and keep blank on referer limitation.

* Set this key on the plugins setting page.

= How do I find the ID for the calendar I want to share? =

Once you have set the calendar as public, you can find the id with the following:

* Visit https://calendar.google.com/, while logged in to your account.

* On the left side, find the calendar you want and click the down arrow to the right of it.

* Click on Calendar settings

* Find the calendar link / id


== Screenshots ==

1. List view calendar created with Dan's Embedder for Google Calendar

2. Full Size Calendar Created

3. Settings Page

== Dependencies and Liscencing ==

MIT: gcal-flow https://sugi.github.io/jquery-gcal-flow/

MIT: fullcalendar.io https://fullcalendar.io

MIT: qTip2 http://qtip2.com/

== Changelog ==
= 1.1 =
* Added jquery as dependency for enqueue (fixes jquery not found)
* Moved settings dash link to tools submenu
* Tested for 4.7

= 1.0 =
* Initial Plugin Release

== Upgrade Notice ==

= 1.0 =
* Initial Plugin Release
