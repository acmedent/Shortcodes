<?php

/**
 * @package  AcmeShortcodes
 */

namespace Inc\Base;

if (!defined('ABSPATH')) {
    die;
};
class BlackFriday
{


    function __construct()
    {


        //Date that start next weeks promo
        $start_date = date('2020-11-25');
        $date_from_user = date('Y-m-d');
        $daysAhead = 3;

        if ($this->check_in_range($start_date, $date_from_user, $daysAhead))
            add_shortcode('acme-blackfriday', array($this, 'AcmedentBlackFriday'));
        elseif ($this->previous_than($start_date, $date_from_user))
            add_shortcode('acme-blackfriday', array($this, 'AcmedentBlackFriday'));
        else
            add_shortcode('acme-blackfriday', array($this, 'empty'));
    }

    function empty()
    {
        return "";
    }

    function check_in_range($start_date, $date_from_user, $days)
    {
        // Convert to timestamp
        $start_ts = strtotime($start_date);
        $end_ts = $start_ts + $days * 86400;
        $user_ts = strtotime($date_from_user);

        // Check that user date is between start & end
        return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
    }

    function previous_than($start_date, $date_from_user)
    {
        // Convert to timestamp
        $start_ts = strtotime($start_date);
        $user_ts = strtotime($date_from_user);

        // Check that user date is between start & end
        return (($user_ts < $start_ts));
    }

    function AcmedentBlackFriday()
    {
        
        $path = home_url() . "/wp-content/plugins/Shortcodes/inc/Base/templates/";
        $template = file_get_contents($path . 'blackfriday.tpl.html', FILE_USE_INCLUDE_PATH);

        

        $template = str_replace('{{{css_blackfriday_path}}}', "/wp-content/plugins/Shortcodes/inc/Base/templates/blackfriday.css", $template);
        
        return $template;
    }
}
