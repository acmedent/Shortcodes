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
  }


  function AcmedentTermsPage()
  {
    $page = "
        <div class='acme-container'>

        <h2 class='acme-maintitle'>
        Opening an Account
        </h2>
 
        <p class='acme-text'>
        Licensed practitioners may be billed on an open account. All accounts are due within 30 days from our invoice date. Equipment orders are due on delivery. An interest charge of 2.0% per month will be levied on past due accounts. Prices are in Canadian dollars and do not include P.S.T., H.S.T. (harmonized sales tax), G.S.T. or freight. Equipment and special order products require a non-refundable deposit of 25%. All equipment and special orders cannot be canceled and are non-returnable. Payment plans are available only if prior payment arrangements have been made. Ask about our convenient leasing plans that can be tailored specifically to your equipment purchases. A $60.00 service charge applies to all non-negotiated (NSF) cheques. All first time orders require a valid credit card on file.
        </p>

        <h2 class='acme-maintitle'>
        Shipping
        </h2>
 
        <p class='acme-text'>
        Merchandise orders are normally processed the day of receipt and shipped by courier the same day. Delivery is generally next day or within 2 days in Ontario and Quebec. Freight is free on all merchandise over $300 before tax, otherwise a minimum freight charge of $12.00 will be added to the original invoice. Freight charges are applicable for warranty repair items.
        </p>

        <h2 class='acme-maintitle'>
        Claims
        </h2>
 
        <p class='acme-text'>
        Please check your order immediately upon receipt. If there is any damage in transit or any shortage to the order, please advise within 2 business days of receipt of the goods.
        </p>

        <h2 class='acme-maintitle'>
        Dangerous Goods
        </h2>
 
        <p class='acme-text'>
        Some products are deemed to be dangerous by the Ministry of Transport. Additional charges may apply on certain products.
        </p>

        <h2 class='acme-maintitle'>
        Returns
        </h2>
 
        <p class='acme-text'>
        Please follow the guidelines in order to return an item for credit:
        </p>
        
        <ul class='acme-list'>
        <li>
        Call our office for return authorization number. We will send courier or designated Acmedent personnel to pick up the item. Returns shipped collect without authorization or returns sent by any other manner will not be accepted.
        </li>

        <li>
        Return the item within 30 days of purchase.
        </li>

        <li>
        Package the item carefully and return it in the original unmarked, unopened package along with a copy of the original invoice and return authorization number written on the outside of the shipping container.
        </li>

        <li>
        If any item is defective, please return the remaining portion of the product and enclose a note explaining why the item is defective.
        </li>

        <li>
        Special order items are not returnable for credit for any reason.
        </li>

        <li>
        Handpieces and equipment returned for credit are subject to a minimum 20% restocking fee (this does not apply to returns for repair under warranty) For your protection opened handpieces and equipment may not be returned for credit, but will be repaired or replaced in accordance with manufacturers warranties.
        </li>

        </ul>
        <br>

        <h2 class='acme-maintitle'>
        Prices
        </h2>
 
        <p class='acme-text'>
        All prices are published in Canadian Dollars. We are not responsible for typographical errors. We do our best to maintain published prices. However, all prices are subject to change at any time without notice. Price increases may be passed on in the event of adverse currency  exchange fluctuations or manufacturer price increases.
        </p>

        <h2 class='acme-maintitle'>
        Taxes
        </h2>
 
        <p class='acme-text'>
        Prices quoted in all Acmedent publication including web site do not include GST (Goods and Services Tax) PST (Provincial Sales Tax) or HST (Harmonized Sales Tax).
        </p>

        <h2 class='acme-maintitle'>
        Payment Methods
        </h2>
 
        <p class='acme-text'>
        Visa, MasterCard, American Express, C.O.D and prepaid are accepted.
        </p>

        <h2 class='acme-maintitle'>
        Equipment Orders
        </h2>
 
        <p class='acme-text'>
        A 30% deposit is required on all equipment orders over $500.00 The balance of payment is due on delivery of said equipment. Acmedent Corporation retains ownership of any equipment that is purchased from Acmedent Corporation and had not been paid for in full. Equipment orders can not be cancelled and are not refundable. Architectural and design services are available for a moderate fee. We honor all manufacturer warranties and provide a 90 day labor warranty.
        </p>
 
 
        
    </div>";



    return $page;
  }

  function AcmedentCarousel()
  {

    function hook_css()
    {
?>
      <link rel="stylesheet" href="../wp-content/plugins/Shortcodes/plugin/slider/swiper-master/package/wp/package/css/swiper.min.css">
<?php
    }

    add_action('wp_head', 'hook_css');

    $page = '
        <link rel="stylesheet" href="../wp-content/plugins/Shortcodes/plugin/slider/swiper-master/package/css/swiper.min.css">
        
        <style>
    
    .swiper-container {
      width: 100%;
      height: 100%;

    }
    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;

      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }

    .swiper-box{
        width:100%;
        height:500px;
    }
  </style>
        <div class="swiper-box">
        <div class="swiper-container">
    <div class="swiper-wrapper">
      <div class="swiper-slide">Slide 1</div>
      <div class="swiper-slide">Slide 2</div>
      <div class="swiper-slide">Slide 3</div>
      <div class="swiper-slide">Slide 4</div>

    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
  </div>

  <!-- Swiper JS -->
  <script src="../wp-content/plugins/Shortcodes/plugin/slider/swiper-master/package/js/swiper.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".swiper-container", {
      spaceBetween: 30,
      centeredSlides: true,
      loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>
        ';

    return $page;
  }
}
