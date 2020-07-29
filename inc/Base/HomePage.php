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
        // add_shortcode('home-showcase', array($this, 'HomeShowCase'));
    }


    function HomeSlider()
    {

        $path = home_url() . "/wp-content/plugins/Shortcodes/inc/Base/templates/";
        $template = file_get_contents($path . 'home.tpl.html', FILE_USE_INCLUDE_PATH);

        $emailSlide = '<h2>Do you want to receive our promos and updates?</h2>
            <h2>Subscribe Here:</h2>
            <form action="/" method="post">
              <div class="form-group">
                <label for="email_campaign">Email: </label
                ><input
                  type="email"
                  name="email_campaign"
                  id="email_campaign"
                  autocomplete="off"
                  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                  required
                />
              </div>
              <br />
              <input type="submit" name="submit_campaign" value="Subscribe" />
            </form>';

        if ($_POST['submit_campaign']) {
            $emailSlide = '<h2>Thank you for Subscribe!!!</h2>';
        }

        $template = str_replace('{{{emailcampaign}}}', $emailSlide, $template);


        return $template;
    }

    // function HomeShowCase()
    // {
    //     $path = home_url() . "/wp-content/plugins/Shortcodes/inc/Base/templates/";
    //     $template = file_get_contents($path . 'showcase.tpl.html', FILE_USE_INCLUDE_PATH);

    //     // $template = str_replace('{{{slides}}}', '<div class="swiper-slide product-slide">Slide 19 - Substituido</div>' . '<div class="swiper-slide product-slide">' . do_shortcode('[product sku="GE0149" class="quick-sale"]') . '</div>', $template);

    //     $skus = ['GE0149', 'GE0134B', 'DI0130', 'DI0436A', 'PR1391', 'GE0120'];

    //     $ids = ['50799', '50619'];

    //     $slides = "";

    //     foreach ($skus as $sku) {
    //         $slides .= '<div class="swiper-slide product-slide">' . do_shortcode('[product sku="' . $sku . '" class="quick-sale"]') . '</div>';
    //     }

    //     foreach ($ids as $id) {
    //         $slides .= '<div class="swiper-slide product-slide">' . do_shortcode('[product id="' . $id . '" class="quick-sale"]') . '</div>';
    //     }

    //     $template = str_replace('{{{slides}}}', $slides, $template);





    //     return $template;
    // }
}
