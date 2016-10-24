<?php

// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
 
$option_name = 'gcal_api_key';
$option_name2 = 'gcal_calids';

delete_option($option_name);
delete_option($option_name2);

// for site options in Multisite
delete_site_option($option_name);
delete_site_option($option_name2);
