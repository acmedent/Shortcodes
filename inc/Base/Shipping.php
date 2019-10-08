<?php

/**
 * @package  AcmeShortcodes
 */

namespace Inc\Base;

if (!defined('ABSPATH')) {
    die;
};
class Shipping
{

    function __construct()
    {
        add_shortcode('acme-shipping', array($this, 'AcmedentShippingPage'));
    }


    function AcmedentShippingPage()
    {
        $page = "
        <div class='acme-container'>

        <h2 class='acme-maintitle'>
        Shipping
        </h2>
 
        <p class='acme-text'>
        Merchandise orders are normally processed the day of receipt and shipped by courier the same day. Delivery is generally next day or within two days in Ontario and Quebec. Freight is free on all merchandise orders over $300 (before taxes), otherwise a minimum freight charge of $12 will be added to the original invoice. Freight charges are applicable for warranty repair items.
        </p>

        <h2 class='acme-maintitle'>
        Claims
        </h2>
 
        <p class='acme-text'>
        Please check your order immediately upon receipt. If there is any damage in transit or any shortage to the order, please advise us within two business days of receipt of the goods.
        </p>

        <h2 class='acme-maintitle'>
        Dangerous Goods
        </h2>
 
        <p class='acme-text'>
        Some products are deemed to be dangerous by the Ministry of Transport. Additional chargers may apply on certain products.
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
       
    </div>";

        return $page;
    }
}

