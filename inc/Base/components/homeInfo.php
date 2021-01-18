<?php

/**
 * @package  AcmeShortcodes
 */

if (!defined('ABSPATH')) {
    die;
};

class HomeInfo
{

    function __construct()
    {
        add_shortcode('acme-home-info', array($this, 'AcmedentHomeInfo'));
    }

    function AcmedentHomeInfo()
    {
        $page = "
        <br>
        <div class='acme-container'>
        <hr style='border-top: 1px solid #000;'>
        <h2 class='acme-maintitle' style='font-size:26px'>More than</h2>
        <h2 class='acme-maintitle' style='font-size:72px; color:#6ec1e4'>15000</h2>
        <h2 class='acme-maintitle' style='font-size:26px'>Products</h2>
        <hr style='border-top: 1px solid #000;'>
        
 
        <div class='acme-info-grid'>

        <div><h2 class='acme-maintitle'>Free shipping on all orders over $300.00</h2></div>
        <div><h2 class='acme-maintitle'>If you're not satisfied, we're not satisfied</h2></div>
        <div><h2 class='acme-maintitle'>Increase revenue decrease expenses</h2></div>

        </div>
    </div><br>";



        return $page;
    }
}