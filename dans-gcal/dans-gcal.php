<?php

/**
* Plugin Name: Dans Google Calendar
* Plugin URI: https://convexcode.com
* Description: A custom Google Calendar Plugin
* Version: 0.1
* Author: Dan Dulaney
* Author URI: https://convexcode.com
**/

//enqueues all css files needed
function gcal_enqueue_style() {

	wp_enqueue_style( 'cal-style', plugin_dir_url( __FILE__ ) . 'js/fullcalendar/fullcalendar.min.css', false ); 


	wp_enqueue_style( 'qtip-style', plugin_dir_url( __FILE__ ) . 'js/jquery.qtip.min.css', false ); 

	wp_enqueue_style( 'gcal-flow-style', plugin_dir_url( __FILE__ ) . 'js/jquery-gcal-flow/jquery.gcal_flow.css', false ); 

}

//enqueues all js files needed
function gcal_enqueue_script() {

        wp_enqueue_script( 'moment-js', plugin_dir_url( __FILE__ ) . 'js/fullca$


	wp_enqueue_script( 'fullcal-js', plugin_dir_url( __FILE__ ) . 'js/fullcalendar/fullcalendar.min.js', false );

	wp_enqueue_script( 'gcal-js', plugin_dir_url( __FILE__ ) . 'js/fullcalendar/gcal.js', false ); 

	wp_enqueue_script( 'qtip-js', plugin_dir_url( __FILE__ ) . 'js/jquery.qtip.min.js', false ); 

	wp_enqueue_script( 'gcal-flow-js', plugin_dir_url( __FILE__ ) . 'js/jquery-gcal-flow/jquery.gcal_flow.js', false ); 

	wp_enqueue_script( 'gcal-flow-jsapi-js', 'https://www.google.com/jsapi', false ); 


}

add_action( 'wp_enqueue_scripts', 'gcal_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'gcal_enqueue_script' );


//creates an entry on the admin menu for dan-gcal-plugin
add_action('admin_menu', 'dans_gcal_plugin_menu');

//creates a menu page with the following settings
function dans_gcal_plugin_menu() {
	add_menu_page('Dans Google Calendar Settings', 'Dans gCal', 'administrator', 'dans-gcal-settings', 'dans_gcal_display_settings', 'dashicons-admin-generic');
}

//on-load, sets up the following settings for the plugin
add_action( 'admin_init', 'dans_gcal_settings' );

function dans_gcal_settings() {
	register_setting( 'dans-gcal-settings-group', 'gcal_api_key' ); //api key
	register_setting( 'dans-gcal-settings-group', 'gcal_calid1' ); //calendar id 1
	register_setting( 'dans-gcal-settings-group', 'gcal_calid2' ); //calendar id 2
	register_setting( 'dans-gcal-settings-group', 'gcal_calid3' ); //calendar id 3
	register_setting( 'dans-gcal-settings-group', 'gcal_calid4' ); //calendar id 4
	register_setting( 'dans-gcal-settings-group', 'gcal_calid5' ); //calendar id 5
}



//displays the settings page
function dans_gcal_display_settings() {

	//form to save api key and calendar settings
	echo "<form method=\"post\" action=\"options.php\">";

	settings_fields( 'dans-gcal-settings-group' );
	do_settings_sections( 'dans-gcal-settings-group' );

	//paragraph giving plugin explanation, api setup instructions, and shortcode information
    echo "	
	<div><h1>Dan's Google Calendar Settings</h1>

<p>Welcome! This is a basic Google Calendar integration plugin, with the following features. <ul style=\"list-style-type:square\">
<li>Displays public calendars in a mobile friendly format</li>
<li>Offers Options for Full Calendar View, or Upcoming Events List</li>
<li>All options are configured via shortcode</li>
<li>Full Calendar offers mobile friendly tooltips with event title, time, and location</li>
<li>Upcoming Events List can specify how many items to show, or turn on auto-scroll</li> 
</ul>
<br>
<b>Shortcodes:</b>
<ul style=\"list-style-type:square\"><li>Full Display [dancal] (defaults to 1st calendar) , or [dancal cal=1 divid=fullcal] (where 1 is 1-5, number of calendar you want, divid is the id you want to give the container div, to help with theming purposes. Otherwise, it's a random string if you leave it off)</li>
<li>Upcoming Events List: [dancal_list], or [dancal_list cal=1 num=30 scroll=true divid=list1] (1 is 1-5 calendar number, num is a number > 0 for number of upcoming events to display, and scroll is true or false, to enable auto-scroll, divid is the id you want to give the container div, to help with theming purposes. Otherwise, it's a random string if you leave it off)</li>
</ul><br>
To create API key, visit <a href=\"https://console.developers.google.com/\" target=\"_blank\">Google Developers Console</a> Then, follow bellow;

<ul style=\"list-style-type:square\"><li>Create new project (or use project you created before).</li><li>Check \"APIs & auth\" -> \"Credentials\" on side menu.</li><li>Hit \"Create new Key\" button on \"Public API access\" section.</li><li>Choose \"Browser key\" and keep blank on referer limitation.</li></ul>
</p>";

//Settings to be saved
echo "
<table class=\"form-table\">
	<tr><td colspan=\"2\"><h2>API KEY - Google Calendar (All REQUIRED)</h2></td></tr> 
       <tr valign=\"top\">
        <th scope=\"row\">Google Calendar API Key</th>
        <td><input type=\"text\" name=\"gcal_api_key\" size=\"80\" value=\"".esc_attr( get_option('gcal_api_key') )."\" /></td></tr>

	<tr><td colspan=\"2\"><h2>Google Calendar IDs (up to 5)</h2></td></tr> 
       <tr valign=\"top\">
        <th scope=\"row\">Google Calendar ID (1)</th>
        <td><input type=\"text\" name=\"gcal_calid1\" size=\"80\" value=\"".esc_attr( get_option('gcal_calid1') )."\" /></td></tr>
       <tr valign=\"top\">
        <th scope=\"row\">Google Calendar ID (2)</th>
        <td><input type=\"text\" name=\"gcal_calid2\" size=\"80\" value=\"".esc_attr( get_option('gcal_calid2') )."\" /></td></tr>
       <tr valign=\"top\">
        <th scope=\"row\">Google Calendar ID (3)</th>
        <td><input type=\"text\" name=\"gcal_calid3\" size=\"80\" value=\"".esc_attr( get_option('gcal_calid3') )."\" /></td></tr>
       <tr valign=\"top\">
        <th scope=\"row\">Google Calendar ID (4)</th>
        <td><input type=\"text\" name=\"gcal_calid4\" size=\"80\" value=\"".esc_attr( get_option('gcal_calid4') )."\" /></td></tr>
       <tr valign=\"top\">
        <th scope=\"row\">Google Calendar ID (5)</th>
        <td><input type=\"text\" name=\"gcal_calid5\" size=\"80\" value=\"".esc_attr( get_option('gcal_calid5') )."\" /></td></tr>

    </table>";
    
    submit_button();

	echo "</form>";


}


//function displays full calendar on shortcode base: [dancal]
function dancal_display_calendar( $atts ){

	//settings_fields( 'dans-gcal-settings-group' );

	$gcal_api_key = esc_attr( get_option('gcal_api_key') );
	//$gcal_api_key ='';
	if ($gcal_api_key == '') { 
		
		$error = 'You must first enter a valid Google Calendar API key.';
		return $error;
	}

	//generates a random div id to allow multiple on one page, if one isn't specified in shortcode
	$randdiv = 'a'.substr(md5(microtime()),rand(0,26),10);

	//handles attributes. Defaults to 1st calendar if none is specified via attribute
	$atts = shortcode_atts(
        array(
            'cal' => '1',
		  'divid' => $randdiv,
        ), $atts, 'dancal' );

	$cal = $atts['cal'];
	$divid = $atts['divid'];	

	//selects the appropriate calendar. If cal is invalid, returns an error message.
	switch ($cal) {

		case 1:
			$calendar = esc_attr( get_option('gcal_calid1') );
			break;

		case 2:
			$calendar = esc_attr( get_option('gcal_calid2') );
			break;

		case 3:
			$calendar = esc_attr( get_option('gcal_calid3') );
			break;

		case 4:
			$calendar = esc_attr( get_option('gcal_calid4') );
			break;

		case 5:
			$calendar = esc_attr( get_option('gcal_calid5') );
			break;

		default:

			$calendar = 'broken';
	}

	if ($calendar == '' || $calendar == 'broken') { 
		
		$error = 'You must first enter a valid Google Calendar id.';
		return $error;
	}

	$disp = "<script>

	jQuery(document).ready(function() {
		
		jQuery('#$divid').fullCalendar({
			header: {
				left: 'today',
				center: 'title',
				right: 'prev,next'
			},
			editable: false,
			eventLimit: true, // allow link when too many events,
			height: 'auto',
			eventClick: function(event) {
     		   if (event.url) {
          		  return false;
        			}
    			},


			eventRender : function(event, element) {
                    // Add qTip for each event.
				var start = moment(event.start).format(\"hh:mm a\");
				var end = moment(event.end).format(\"hh:mm a\");

                    element.qtip({
                        content: {
                            text    : start +' to '+end+'<br>At: '+event.location,
                            title   : {
                                text    : event.title,
                            }
                        },
                        position: {
                            my : \"top center\",
                            at : \"bottom center\",
                            container : false,
                            viewport : jQuery(window),
                            adjust: {
                            	//method : 'shift shift',
                            }
                        },
                        style: {
                            classes : event.tooltipStyleClass,
                            width   : 150
                        },
                        hide: {
                            fixed: true,
                        }
 
                    }); // end of element.qtip({
 
                    //element.tooltip();
                },

			googleCalendarApiKey: '$gcal_api_key',
     
		   events: {
     	       googleCalendarId: '$calendar'
     	   },

		});

	});

</script>

<div id='$divid'></div>";
	return $disp;


}


add_shortcode('dancal', 'dancal_display_calendar');


//function displays upcoming events on shortcode base: [dancal_list]
function dancal_display_list($atts) {


	//settings_fields( 'dans-gcal-settings-group' );

	$gcal_api_key = esc_attr( get_option('gcal_api_key') );
	//$gcal_api_key ='';
	if ($gcal_api_key == '') { 
		
		$error = 'You must first enter a valid Google Calendar API key.';
		return $error;
	}


	//generates a random div id to allow multiple on one page, if one isn't specified in shortcode
	$randdiv = 'a'.substr(md5(microtime()),rand(0,26),10);

	//Handles attribures. If none are specified, defaults to no scroll, 1st calendar, 50 items	
	$atts = shortcode_atts(
        array(
            'cal' => 1,
		  'num' => 50,
		  'scroll' => 'false',
		  'divid' => $randdiv,
        ), $atts, 'dancal_list' );

	$cal = $atts['cal'];
	$num = $atts['num'];
	$scroll = $atts['scroll'];
	$divid = $atts['divid'];

	//Makes sure that scroll is a valid true / false option
	if ($scroll != 'true') $scroll = 'false';

	//checks to make sure that the number of items to list is actually numeric, > 0
	if (!is_numeric($num)) {

		$error = "You must enter a valid INT for the num attribute.";
		return $error;

	}
	elseif ($num <= 0) {

		$error = 'You must enter a number > 0 for the num attribute.';
		return $error;

	}

	//Gets the google calendar from the stored options. Empty or ones that aren't 1-5 display an error.
	switch ($cal) {

		case 1:
			$calendar = esc_attr( get_option('gcal_calid1') );
			break;

		case 2:
			$calendar = esc_attr( get_option('gcal_calid2') );
			break;

		case 3:
			$calendar = esc_attr( get_option('gcal_calid3') );
			break;

		case 4:
			$calendar = esc_attr( get_option('gcal_calid4') );
			break;

		case 5:
			$calendar = esc_attr( get_option('gcal_calid5') );
			break;

		default:

			$calendar = 'broken';
	}

	if ($calendar == '' || $calendar == 'broken') { 
		
		$error = 'You must first enter a valid Google Calendar id.';
		return $error;
	}


    $disp = "<style>
      #$divid {
        height: 300px;
        width: 300px;
        background: #F0FFEE;
        filter: none;
	   color: black!important;
      }
      #$divid .gcf-header-block { background: green; filter:none; }
    </style>
	<div id=\"$divid\">
    </div>
    <script type=\"text/javascript\">
	jQuery(function() {
      jQuery('#$divid').gCalFlow({
          calid: '$calendar',
		apikey: '$gcal_api_key',
          maxitem: $num,
		auto_scroll: $scroll
        });
	});
    </script>";
	return $disp;

}

add_shortcode('dancal_list', 'dancal_display_list');

