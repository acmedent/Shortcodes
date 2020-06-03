<?php

/**
 * @package  AcmeShortcodes
 */

namespace Inc\Base;

if (!defined('ABSPATH')) {
    die;
};
class HomePage
{

    function __construct()
    {
        add_shortcode('home-slider', array($this, 'HomeSlider'));
        add_shortcode('home-showcase', array($this, 'HomeShowCase'));
    }


    function HomeSlider()
    {

        $path = home_url() . "/wp-content/plugins/Shortcodes/inc/Base/templates/";
        $template = file_get_contents($path . 'home.tpl.html', FILE_USE_INCLUDE_PATH);

        // $template .= do_shortcode('[products limit="6" columns="6" best_selling="true" ]');
        // $template .= do_shortcode('[product sku="EN4262" ]');

        return $template;
    }

    function HomeShowCase()
    {
        $path = home_url() . "/wp-content/plugins/Shortcodes/inc/Base/templates/";
        $template = file_get_contents($path . 'showcase.tpl.html', FILE_USE_INCLUDE_PATH);


        return $template;
    }
}
