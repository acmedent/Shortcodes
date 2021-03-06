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



    $template = str_replace('{{{emailcampaign}}}', $emailSlide, $template);


    return $template;
  }
}