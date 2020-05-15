<?php

/**
 * @package  AcmeShortcodes
 */

namespace Inc\Base;

if (!defined('ABSPATH')) {
  die;
};
class Terms
{

  function __construct()
  {
    add_shortcode('acme-terms', array($this, 'AcmedentTermsPage'));
    add_shortcode('acme-carousel', array($this, 'AcmedentCarousel'));
    add_shortcode('ac-test', array($this, 'ShopTest'));
  }


  function AcmedentTermsPage()
  {
    $path = home_url() . "/wp-content/plugins/Shortcodes/inc/Base/templates/";
    $template = file_get_contents($path . 'terms.tpl.html', FILE_USE_INCLUDE_PATH);



    return $template;
  }

  function ShopTest()
  {

?>

    <style>
      .filter_btn {
        margin: auto;
        margin-bottom: 10px;
        width: 80px;
        border: 1px #ccc solid;
        text-align: center;
        border-radius: 5px;
        cursor: pointer
      }

      .filter_btn>span {
        font-size: 15px;
        font-family: 'Yantramanav'
      }
    </style>


    <script>
      jQuery(document).ready(function($) {


        if ($(document).width() < 900)
          $('#right-sidebar').prepend("<div class='filter_btn'><span style=''>FILTERS >></span></div>");


        //alert(sidebar);


      });
    </script>

<?php

    return null;
  }
}
