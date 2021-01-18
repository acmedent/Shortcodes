<?php

/**
 * @package  AcmeShortcodes
 */

namespace Inc\Base;

if (!defined('ABSPATH')) {
    die;
};

use Inc\Base\ClassesComponents\HomeCategoryClass;
use Inc\Base\ClassesComponents\HomeInfoClass;
use Inc\Base\ClassesComponents\HomePromoClass;

class Home
{

    // private $even = false;
    // private $tagName;


    function __construct()
    {

        $HomeCagory = new HomeCategoryClass();
        $HomeInfo = new HomeInfoClass();
        $HomePromo = new HomePromoClass();
    }
}
