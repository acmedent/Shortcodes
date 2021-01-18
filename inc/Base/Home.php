<?php

/**
 * @package  AcmeShortcodes
 */

namespace Inc\Base;

if (!defined('ABSPATH')) {
    die;
};

use Inc\Base\Components\HomeCategory;
use Inc\Base\Components\HomeInfo;


class Home
{

    private $even = false;
    private $tagName;


    function __construct()
    {

        $HomeCagory = new HomeCategory();
        $HomeInfo = new HomeInfo();

        add_shortcode('acme-home-promo-next-week', array($this, 'AcmedentHomePromoNextWeek'));
        // add_shortcode('acme-home-categories', array($this, 'AcmedentHomeCategories'));
        // add_shortcode('acme-home-info', array($this, 'AcmedentHomeInfo'));


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
                add_shortcode('acme-home-promo', array($this, 'AcmedentHomePromoNextWeek'));
            } elseif ($this->previous_than($start_date, $date_from_user)) {
                add_shortcode('acme-home-promo', array($this, 'AcmedentHomePromo'));
            } else {
                add_shortcode('acme-home-promo', array($this, 'AcmedentHomePromoNextWeek'));
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

        $promo = get_option('AcmeShortCode_Plugin_CurrentWeek') ?: array(
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
                $this->even = !$this->even;
                if ($this->even)
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
        <h2 class='promo-phone'>905-761-68501</h2>
        </div><br>";

        return $page;
    }

    function AcmedentHomePromoNextWeek()
    {
        $promo = get_option('AcmeShortCode_Plugin_NextWeek') ?: array(
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
                $this->even = !$this->even;
                if ($this->even)
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
                    <h2>Product Page" . $this->ts . "</h2>
                </a>
            </div>";
            }
        }

        $page .= "<h2 class='acme-text promo-msg'>*Net promos only available by phone for while.</h2>
        <h2 class='acme-maintitle promo-steam'>Sales Team</h2>
        <h2 class='acme-sec-title promo-phone'>905-761-6850</h2>

        </div><br>";

        return $page;
    }

    function AcmedentHomeCategories()
    {
        //return HomeCategory::AcmedentHomeCategories();
        // $imgPath = "wp-content/uploads/2019/10/";
        // $pagePath = "dental-products-supplies/";
        // $categories = array(
        //     array(
        //         "link" => $pagePath . "abrasives/",
        //         "name" => "Abrasives",
        //         "img" => $imgPath . "abrasives.jpg"
        //     ),
        //     array(
        //         "link" => $pagePath . "acrylics/",
        //         "name" => "Acrylics",
        //         "img" => $imgPath . "acrylics.jpg"
        //     ),
        //     array(
        //         "link" => $pagePath . "alloys/",
        //         "name" => "Alloys",
        //         "img" => $imgPath . "alloys.jpg"
        //     ),
        //     array(
        //         "link" => $pagePath . "anesthetics/",
        //         "name" => "Anesthetics",
        //         "img" => $imgPath . "anesthetics.jpg"
        //     ),
        //     array(
        //         "link" => $pagePath . "articularing-paper/",
        //         "name" => "Articularing Paper",
        //         "img" => $imgPath . "articularing-paper.jpg"
        //     ),
        //     array(
        //         "link" => $pagePath . "burs/",
        //         "name" => "Burs",
        //         "img" => $imgPath . "burs.jpg"
        //     ),
        //     array(
        //         "link" => $pagePath . "cavity-liners/",
        //         "name" => "Cavity Liners",
        //         "img" => $imgPath . "cavity-liners.jpg"
        //     ),
        //     array(
        //         "link" => $pagePath . "cosmetics/",
        //         "name" => "Cosmetics",
        //         "img" => $imgPath . "cosmetics.jpg"
        //     ),
        //     array(
        //         "link" => $pagePath . "crown-and-bridge/",
        //         "name" => "Crown and Bridge",
        //         "img" => $imgPath . "crown-bridge.jpg"
        //     ),
        //     array(
        //         "link" => $pagePath . "disposables/",
        //         "name" => "Disposables",
        //         "img" => $imgPath . "disposables.jpg"
        //     ),
        //     array(
        //         "link" => $pagePath . "endodontics/",
        //         "name" => "Endodontics",
        //         "img" => $imgPath . "endodontics.jpg"
        //     ),
        //     array(
        //         "link" => $pagePath . "equipments/",
        //         "name" => "Equipments",
        //         "img" => $imgPath . "equipments.jpg"
        //     ),
        //     array(
        //         "link" => $pagePath . "films/",
        //         "name" => "Films",
        //         "img" => $imgPath . "films.jpg"
        //     ),
        //     array(
        //         "link" => $pagePath . "germicides/",
        //         "name" => "Germicides",
        //         "img" => $imgPath . "germicides.jpg"
        //     ),
        //     array(
        //         "link" => $pagePath . "handpieces/",
        //         "name" => "Handpieces",
        //         "img" => $imgPath . "handpieces.jpg"
        //     ),
        //     array(
        //         "link" => $pagePath . "hemostatic-solutions/",
        //         "name" => "Hemostatic Solutions",
        //         "img" => $imgPath . "hemostatic-solutions.jpg"
        //     ),
        //     array(
        //         "link" => $pagePath . "impression-materials/",
        //         "name" => "Impression Materials",
        //         "img" => $imgPath . "impression-materials.jpg"
        //     ),
        //     array(
        //         "link" => $pagePath . "infection-control/",
        //         "name" => "Infection Control",
        //         "img" => $imgPath . "infection-control.jpg"
        //     ),
        //     array(
        //         "link" => $pagePath . "matrix-and-wedges/",
        //         "name" => "Matrix and Wedges",
        //         "img" => $imgPath . "matrix-wedges.jpg"
        //     ),
        //     array(
        //         "link" => $pagePath . "miscellaneous/",
        //         "name" => "Miscellaneous",
        //         "img" => $imgPath . "miscellaneous.jpg"
        //     ),
        //     array(
        //         "link" => $pagePath . "orthodontics/",
        //         "name" => "Orthodontics",
        //         "img" => $imgPath . "orthodontics.jpg"
        //     ),
        //     array(
        //         "link" => $pagePath . "parts-equipment/",
        //         "name" => "Parts Equipment",
        //         "img" => $imgPath . "parts-equipments.jpg"
        //     ),
        //     array(
        //         "link" => $pagePath . "pins-and-posts/",
        //         "name" => "Pins and Posts",
        //         "img" => $imgPath . "pins-posts.jpg"
        //     ),
        //     array(
        //         "link" => $pagePath . "preventives/",
        //         "name" => "Preventives",
        //         "img" => $imgPath . "preventives.jpg"
        //     ),
        //     array(
        //         "link" => $pagePath . "rubber-dams/",
        //         "name" => "Rubber Dams",
        //         "img" => $imgPath . "rubber-dams.jpg"
        //     ),
        //     array(
        //         "link" => $pagePath . "surgical-and-sutures/",
        //         "name" => "Surgical and Sutures",
        //         "img" => $imgPath . "surgical-sutures.jpg"
        //     )
        // );

        // $page = "
        // <br>
        // <div class='categories-box'>
        // <h2>Product Categories</h2><br>
        // <div class='categories-grid'>";


        // foreach ($categories as $cat) {
        //     $page .= "<div class='category' style='background: url(" . $cat["img"] . ");'>
        //         <a href='" . $cat["link"] . "'>
        //             <div><p>" . $cat["name"] . "</p></div>
        //         </a>
        //     </div>";
        // }
        // $page .= "</div></div>";
        // return $page;
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