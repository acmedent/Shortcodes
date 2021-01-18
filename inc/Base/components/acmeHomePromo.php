<?php

/**
 * @package  AcmeShortcodes
 */

if (!defined('ABSPATH')) {
    die;
};


function AcmedentHomePromo($tagName, $even)
{
    // $promo = get_option('AcmeShortCode_Plugin_CurrentWeek') ?: array(
    $promo = get_option($tagName) ?: array(
        "title" => "",
        "message" => "",
        "products" => array(
            1 => array("id" => "", "promo" => "", "promo-price" => "", "net-price" => ""),
            2 => array("id" => "", "promo" => "", "promo-price" => "", "net-price" => ""),
            3 => array("id" => "", "promo" => "", "promo-price" => "", "net-price" => ""),
            4 => array("id" => "", "promo" => "", "promo-price" => "", "net-price" => ""),
            5 => array("id" => "", "promo" => "", "promo-price" => "", "net-price" => ""),
            6 => array("id" => "", "promo" => "", "promo-price" => "", "net-price" => "")
        )
    );

    $page = "        
        <div style='display:block;margin:auto; text-align:center;'><h2 style='font-size:26px'>";
    $page .= $promo["title"];
    $page .= "</h2></div>        
        <div class='promo-grid' style='background:#ffffff'>
        <img src='' alt='' class='promo-logo'/>
        <h2 class='promo-date'>";
    $page .= $promo["message"];
    $page .= "</h2>";

    $ids = array();

    foreach ($promo["products"] as $key => $item) {
        if ($item["id"] && $item["promo-price"])
            $ids[$item["id"]] = array("promo" => $item["promo"], "promo-price" => $item["promo-price"], "net-price" => $item["net-price"]);
    }

    foreach ($ids as $id => $value) {

        $product = wc_get_product($id);

        if (isset($product) && $product != null) {
            $image = str_replace("-150x150", '', wp_get_attachment_image_src($product->get_image_id())[0]);

            $prod_info = array(
                "name" => $product->get_name(),
                "img" => $image,
                "price" => $product->get_price(),
            );
            //#d3eaf7
            $even = !$even;
            if ($even)
                $color = '#d3eaf7';
            else
                $color = '#fff';

            $page .= "
            <div class='promo-prod' style='background:" . $color . ";padding:20px'>
                <h2 class='promo-name'>" . $value["promo"] . "</h2>
                <div class='img-box'><a href='" . get_permalink($product->get_id()) . "'> <img src='" . $prod_info["img"] . "' alt='" . $prod_info["name"] . "' class='promo-img'></a></div>
                <div class='title-box'><h2 class='prod-title'>" . $prod_info["name"] . "</h2></div>
                <h2 class='prod-price'>Each: $" . $value["promo-price"];
            if ($value["net-price"] == "")
                $page .=  "</h2>";
            else
                $page .=  "<br>Net Price: $" . $value["net-price"] . "</h2>";

            $page .= " <a class='promo-btn' href='" . get_permalink($product->get_id()) . "'>
                <h2>Product Page</h2>
                </a>
                </div>";
        }
    }

    $page .= "<h2 class='acme-text promo-msg'>*Net promos only available by phone for while.</h2>
        <h2 class='acme-maintitle promo-steam'>Sales Team</h2>
        <h2 class='promo-phone'>905-761-6850</h2>
        </div><br>";





    // $page = "<h1>" . $tagName . "</h1>";

    return $page;
}