<?php

/**
 * @package  AcmeShortcodes
 */

namespace Inc\Base\ClassesComponents;

if (!defined('ABSPATH')) {
    die;
};

class HomePromoClass
{

    private $tagName;

    function __construct()
    {
        add_shortcode('acme-home-promo-next-week', array($this, 'AcmedentHomePromoNextWeek'));

        $nextweek_promo = get_option('AcmeShortCode_Plugin_NextWeek') ?: array(
            "title" => "",
            "message" => "",
            "days" => 0,
            "products" => array(
                1 => array("id" => "", "promo" => "", "promo-price" => "", "net-price" => ""),
                2 => array("id" => "", "promo" => "", "promo-price" => "", "net-price" => ""),
                3 => array("id" => "", "promo" => "", "promo-price" => "", "net-price" => ""),
                4 => array("id" => "", "promo" => "", "promo-price" => "", "net-price" => ""),
                5 => array("id" => "", "promo" => "", "promo-price" => "", "net-price" => ""),
                6 => array("id" => "", "promo" => "", "promo-price" => "", "net-price" => "")
            )
        );

        //Date that start next weeks promo
        $start_date = $nextweek_promo['start-date'];
        $date_from_user = date('Y-m-d');
        $daysAhead = $nextweek_promo['days'];

        //add if statement to check if it will show the promos according to the value of data base variable $show_promo
        $show_promo = get_option('AcmeShortCode_Plugin_ShowPromo') ?: false;

        if ($show_promo) {
            if ($this->check_in_range($start_date, $date_from_user, $daysAhead)) {
                $this->tagName = "AcmeShortCode_Plugin_NextWeek";
                // add_shortcode('acme-home-promo', array($this, 'AcmedentHomePromoNextWeek'));
                add_shortcode('acme-home-promo', array($this, 'AcmedentHomePromo'));
            } elseif ($this->previous_than($start_date, $date_from_user)) {
                $this->tagName = "AcmeShortCode_Plugin_CurrentWeek";
                add_shortcode('acme-home-promo', array($this, 'AcmedentHomePromo'));
            } else {
                $this->tagName = "AcmeShortCode_Plugin_NextWeek";
                add_shortcode('acme-home-promo', array($this, 'AcmedentHomePromo'));
                // add_shortcode('acme-home-promo', array($this, 'AcmedentHomePromoNextWeek'));
            }
        } else {
            add_shortcode('acme-home-promo', array($this, 'empty'));
        }
    }

    function empty()
    {
        return "";
    }

    function check_in_range($start_date, $date_from_user, $days)
    {
        // Convert to timestamp
        $start_ts = strtotime($start_date);
        $end_ts = $start_ts + $days * 86400;
        $user_ts = strtotime($date_from_user);

        // Check that user date is between start & end
        return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
    }

    function previous_than($start_date, $date_from_user)
    {
        // Convert to timestamp
        $start_ts = strtotime($start_date);
        $user_ts = strtotime($date_from_user);

        // Check that user date is between start & end
        return (($user_ts < $start_ts));
    }

    function AcmedentHomePromo()
    {

        // $promo = get_option('AcmeShortCode_Plugin_CurrentWeek') ?: array(
        $promo = get_option($this->tagName) ?: array(
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

        //PROMO COMPONENT START
        $page = "<div class='promo-container'>";


        //Get ids from plugin database
        $ids = array();
        foreach ($promo["products"] as $key => $item) {
            if ($item["id"] && $item["promo-price"])
                $ids[$item["id"]] = array("promo" => $item["promo"], "promo-price" => $item["promo-price"], "net-price" => $item["net-price"]);
        }

        //PROMO LIST START
        $page .= "<div class='promo-list'>";



        //PROMO ITEMS LOOP START
        $count = 0;
        $infoAdded = false;
        foreach ($ids as $id => $value) {
            $count++;
            $product = wc_get_product($id);

            if (!$infoAdded) {
                //PROMO INFO ADDED MOBILE VERSION
                $page .= "<div class='promo-info mobile-ver'><h2>";
                $page .= $promo["title"];
                $page .= "</h2>     
                <h3 class='promo-date'>";
                $page .= $promo["message"];
                $page .= "</h3></div>";
                //PROMO INFO END
            }

            if (isset($product) && $product != null) {
                $image = str_replace("-150x150", '', wp_get_attachment_image_src($product->get_image_id())[0]);

                $prod_info = array(
                    "name" => $product->get_name(),
                    "img" => $image,
                    "price" => $product->get_price(),
                );


                $page .= "
            <div class='promo-item' style='grid-area: item" . $count . "'>
                <h2 class='promo-name'>" . $value["promo"] . "</h2>
                <div class='img-box'><a href='" . get_permalink($product->get_id()) . "'> <img src='" . $prod_info["img"] . "' alt='" . $prod_info["name"] . "' class='promo-img'></a></div>
                <div class='title-box'><h2 class='prod-title'>" . $prod_info["name"] . "</h2></div>
                <h2 class='prod-price'>$" . $value["promo-price"];
                if ($value["net-price"] == "")
                    $page .=  "</h2>";
                else
                    $page .=  "<br>Net: $" . $value["net-price"] . "</h2>";

                $page .= " <a class='promo-btn' href='" . get_permalink($product->get_id()) . "'>
                <h2>Product Page</h2>
                </a>
                </div>";

                //GENERATE A RANDOM PRODUCT TO FILL THE GRID
            } else {
                $args = array(
                    'posts_per_page'   => 1,
                    'orderby'          => 'rand',
                    'post_type'        => 'product'
                );

                $random_products = get_posts($args);
                $randomPost = $random_products[0];
                $randomProduct = wc_get_product($randomPost->ID);
                $image = str_replace("-150x150", '', wp_get_attachment_image_src($randomProduct->get_image_id())[0]);
                // $image = "";

                $prod_info = array(
                    "name" => $randomProduct->get_name(),
                    "img" => $image,
                    "price" => $randomProduct->get_price(),
                );

                if ($prod_info['img'] === "")
                    $prod_info['img'] = "https://www.acmedent.com/wp-content/uploads/woocommerce-placeholder-300x300.png";

                $page .= "
            <div class='promo-item' style='grid-area: item" . $count . "'>
                <h2 class='promo-name'></h2>
                <div class='img-box'><a href='" . get_permalink($randomProduct->get_id()) . "'> <img src='" . $prod_info["img"] . "' alt='" . $prod_info["name"] . "' class='promo-img'></a></div>
                <div class='title-box'><h2 class='prod-title'>" . $prod_info["name"] . "</h2></div>
                <h2 class='prod-price'>$" . number_format($randomProduct->get_price(), 2, '.', '') . "</h2>";

                $page .= " <a class='promo-btn' href='" . get_permalink($randomProduct->get_id()) . "'>
                <h2>Product Page</h2>
                </a>
                </div>";
            }

            if (!$infoAdded) {
                $infoAdded = true;
                //PROMO INFO ADDED
                $page .= "<div class='promo-info web-ver'><h2>";
                $page .= $promo["title"];
                $page .= "</h2>     
                <h3 class='promo-date'>";
                $page .= $promo["message"];
                $page .= "</h3></div>";
                //PROMO INFO END
            }
        }

        //PROMO LIST END
        $page .= "</div>";

        $page .= "<div class='sales-info'>
        <h2>Contact Our Sales Team</h2>
        <h3><a href='tel:+19057616850'>905-761-6850</a></h3>
        </div>   ";
        return $page;
    }
}
