<?php

/**
 * @package  AcmeShortcodes
 */

namespace Inc\Base;

if (!defined('ABSPATH')) {
    die;
};

include __DIR__ . "./components/categories.php";
include __DIR__ . "./components/homeInfo.php";
include __DIR__ . "./components/acmeHomePromo.php";

class Home
{

    // private $AcmedentHomeCategories = AcmedentHomeCategories();
    private $even = false;
    private $tagName;


    function __construct()
    {
        add_shortcode('acme-home-promo-next-week', array($this, 'AcmedentHomePromoNextWeek'));
        add_shortcode('acme-home-categories', array($this, 'AcmedentHomeCategories'));
        add_shortcode('acme-home-info', array($this, 'AcmedentHomeInfo'));


        $nextweek_promo = get_option('AcmeShortCode_Plugin_NextWeek') ?: array(
            "title" => "",
            "message" => "",
            "days" => 0,
            "products" => array(
                1 => array("id" => "", "promo" => "", "promo-price" => "", "net-price" => ""),
                2 => array("id" => "", "promo" => "", "promo-price" => "", "net-price" => ""),
                3 => array("id" => "", "promo" => "", "promo-price" => "", "net-price" => ""),
                4 => array("id" => "", "promo" => "", "promo-price" => "", "net-price" => ""),
                5 => array("id" => "", "promo" => "", "promo-price" => "", "net-price" => ""),
                6 => array("id" => "", "promo" => "", "promo-price" => "", "net-price" => "")
            )
        );


        //Date that start next weeks promo
        $start_date = $nextweek_promo['start-date'];
        $date_from_user = date('Y-m-d');
        $daysAhead = $nextweek_promo['days'];

        //add if statement to check if it will show the promos according to the value of data base variable $show_promo
        $show_promo = get_option('AcmeShortCode_Plugin_ShowPromo') ?: false;

        if ($show_promo) {
            if ($this->check_in_range($start_date, $date_from_user, $daysAhead)) {
                $this->tagName = "AcmeShortCode_Plugin_NextWeek";
                // add_shortcode('acme-home-promo', array($this, 'AcmedentHomePromoNextWeek'));
                add_shortcode('acme-home-promo', array($this, 'AcmedentHomePromo'));
            } elseif ($this->previous_than($start_date, $date_from_user)) {
                $this->tagName = "AcmeShortCode_Plugin_CurrentWeek";
                add_shortcode('acme-home-promo', array($this, 'AcmedentHomePromo'));
            } else {
                $this->tagName = "AcmeShortCode_Plugin_NextWeek";
                add_shortcode('acme-home-promo', array($this, 'AcmedentHomePromo'));
                // add_shortcode('acme-home-promo', array($this, 'AcmedentHomePromoNextWeek'));
            }
        } else {
            add_shortcode('acme-home-promo', array($this, 'empty'));
        }
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

    function AcmedentHomePromo()
    {
        return AcmedentHomePromo($this->tagName, $this->even);
    }

    function AcmedentHomeCategories()
    {
        return AcmedentHomeCategories();
    }

    function AcmedentHomeInfo()
    {
        return AcmedentHomeInfo();
    }
}