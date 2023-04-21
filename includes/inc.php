<?php
// RETURN IF CALLED DIRECTLY BY PATH
if (!defined('WPINC')) {
    die;
}

//functions
require_once(get_stylesheet_directory().'/includes/functions/slider-cpt.php');
require_once(get_stylesheet_directory().'/includes/functions/timer-cpt.php');
require_once(get_stylesheet_directory().'/includes/functions/announcement-bar-cpt.php');

//shortcodes
require_once(get_stylesheet_directory().'/includes/shortcodes/get_slides.php');
require_once(get_stylesheet_directory().'/includes/shortcodes/countdown.php');
require_once(get_stylesheet_directory().'/includes/shortcodes/get_announcements.php');


