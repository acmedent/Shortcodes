<?php

/**
 * @package AcmeShortcodes
 */

/*
 Plugin Name: AcmeShortcode
 Plugin URI: http://acmedent.com
 Description: Quaterly Promos Messages Plugin
 Version: 1.0.0
 Author: Rodrigo
 Author URI: https://rgarbulha.github.io
 License: GPLv2 or later
 Text Domain: acmepromo
 */

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright (C) 2019 Garbulha
*/

if (!defined('ABSPATH')) {
    die;
};

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

use Inc\Activate;
use Inc\Deactivate;
use Inc\Base\Pages;

if (!class_exists('AcmeShortcodes')) {
    class AcmeShortcodes
    {

        public $plugin;
        public $Pages;

        function __construct()
        {
            $this->plugin = plugin_basename(__FILE__);
        }

        function register()
        {
            add_action('wp_enqueue_scripts', array($this, 'enqueue'));
            //add_action('admin_enqueue_scripts', array($this, 'enqueue'));
            $Pages = new Pages();
            $Pages->register();
        }

        function enqueue()
        {
            // enqueue all our scripts
            wp_enqueue_script('shortcodesscript', plugins_url('/assets/myscript.js', __FILE__));
            wp_enqueue_style('shortcodesstyle', plugins_url('/assets/mystyle.css', __FILE__));
        }
        function activate()
        {
            Activate::activate();
        }
    }

    $AcmeShortcodes = new AcmeShortcodes();
    $AcmeShortcodes->register();

    function action_woocommerce_product_thumbnails()
    {

        echo "<p class='acme-text' style='font-size:10px;text-align:center'>The images have the illustration purpose, the product may not be the same. Check the description or contact our sales team.</p>";
    }

    add_action('woocommerce_product_thumbnails', 'action_woocommerce_product_thumbnails', 100, 0);

    // activation
    register_activation_hook(__FILE__, array($AcmeShortcodes, 'activate'));
    // deactivation
    register_deactivation_hook(__FILE__, array('Deactivate', 'deactivate'));
}
