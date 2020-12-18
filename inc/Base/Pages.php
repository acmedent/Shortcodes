<?php

/**
 * @package  AcmeShortcodes
 */

namespace Inc\Base;

if (!defined('ABSPATH')) {
    die;
};

class Pages
{
    public $About;
    function register()
    {
        $About = new About();
        $Terms = new Terms();
        $Shipping = new Shipping();
        $Contact = new Contact();
        $Quaterly = new Quaterly();
        $Svg = new Svg();
        $Home = new Home();
        $HomePage = new HomePage();
        $BlackFriday = new BlackFriday();

    }
}
