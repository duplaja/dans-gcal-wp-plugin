# dans-gcal-wp-plugin

Welcome! This is a basic Google Calendar integration plugin, with the following features.

-Displays public calendars in a mobile friendly format

-Offers Options for Full Calendar View, or Upcoming Events List

-All options are configured via shortcode

-Full Calendar offers mobile friendly tooltips with event title, time, and location

-Upcoming Events List can specify how many items to show, or turn on auto-scroll

Shortcodes:

-Full Display `[dancal]` (defaults to 1st calendar) , or `[dancal cal=1]` (where 1 is 1-5, number of calendar you want.

-Upcoming Events List: `[dancal_list]`, or `[dancal_list cal=1 num=30 scroll=true]` (1 is 1-5 calendar number, num is a number 0 for number of upcoming events to display, and scroll is true or false, to enable auto-scroll)

To create API key, visit Google Developers Console. https://console.developers.google.com/ 
Then, follow bellow;

-Create new project (or use project you created before).
-Check "APIs & auth" -> "Credentials" on side menu.
-Hit "Create new Key" button on "Public API access" section.
-Choose "Browser key" and keep blank on referer limitation.
