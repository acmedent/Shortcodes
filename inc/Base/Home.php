<?php

/**
 * @package  AcmeShortcodes
 */

namespace Inc\Base;

if (!defined('ABSPATH')) {
    die;
};
class Home
{

    private $even = false;

    function __construct()
    {
        add_shortcode('acme-home-promo-next-week', array($this, 'AcmedentHomePromoNextWeek'));
        add_shortcode('acme-home-categories', array($this, 'AcmedentHomeCategories'));
        add_shortcode('acme-home-info', array($this, 'AcmedentHomeInfo'));


        //Date that start next weeks promo
        $start_date = '2020-08-07';
        $date_from_user = date('Y-m-d');
        $daysAhead = 25;

        if ($this->check_in_range($start_date, $date_from_user, $daysAhead))
            add_shortcode('acme-home-promo', array($this, 'AcmedentHomePromoNextWeek'));
        elseif ($this->previous_than($start_date, $date_from_user))
            add_shortcode('acme-home-promo', array($this, 'AcmedentHomePromo'));
        else
            add_shortcode('acme-home-promo', array($this, 'AcmedentHomePromoNextWeek'));
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
        // " . do_shortcode('[nextWeekSvg]') . "
        $page =
            "
        <div style='display:block;margin:auto; text-align:center;'><h2 style='font-size:26px'>ACMEDENT SHOW CASE</h2></div>
        
        <div class='promo-grid' style='background:#ffffff'>
        <img src='' alt='' class='promo-logo'/>
        <h2 class='promo-date'>From August 03rd to 09th, 2020</h2>
        ";

        $ids = array(
            51138 => array("promo" => "$10 Off", "promo-price" => "8.99", "net-price" => ""),
            51228 => array("promo" => "$5 Off", "promo-price" => "65.50", "net-price" => ""),
            26847 => array("promo" => "$5 Off", "promo-price" => "38.90", "net-price" => ""),
            26849 => array("promo" => "10% Off", "promo-price" => "48.60", "net-price" => ""),
            34084 => array("promo" => "5% Off", "promo-price" => "56.86", "net-price" => ""),
            43312 => array("promo" => "10% Off", "promo-price" => "65.61", "net-price" => ""),
        );

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
        <h2 class='acme-sec-title promo-phone'>905-761-6850</h2>
        </div><br>";

        return $page;
    }



    function AcmedentHomePromoNextWeek()
    {
        // <img src='/wp-content/uploads/2020/03/SpringSale.jpg' alt='WEEKLY FLASH SALE!' class='promo-logo'/>

        $page = "        
        <div style='display:block;margin:auto; text-align:center;'><h2 style='font-size:26px'>Protect Yourself Going Back to School</h2></div>
        
        <div class='promo-grid' style='background:#ffffff'>
        <img src='' alt='' class='promo-logo'/>
        <h2 class='promo-date'>Until August 31th, 2020</h2>
        ";

        $ids = array(
            51138 => array("promo" => "", "promo-price" => "8.99", "net-price" => ""), //300ml sanit
            51513 => array("promo" => "", "promo-price" => "21.95", "net-price" => ""), //Kids
            51516 => array("promo" => "", "promo-price" => "39.99", "net-price" => ""), //mask l3
            51196 => array("promo" => "", "promo-price" => "109.95", "net-price" => ""), //thermometer
            51051 => array("promo" => "", "promo-price" => "24.99", "net-price" => ""), //1L sanit
            51533 => array("promo" => "", "promo-price" => "9.99", "net-price" => ""), //Wipes
        );

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
        <h2 class='acme-sec-title promo-phone'>905-761-6850</h2>

        </div><br>";

        return $page;
    }


    function AcmedentHomeCategories()
    {

        $imgPath = "wp-content/uploads/2019/10/";
        $pagePath = "dental-products-supplies/";
        $categories = array(
            array(
                "link" => $pagePath . "abrasives/",
                "name" => "Abrasives",
                "img" => $imgPath . "abrasives.jpg"
            ),
            array(
                "link" => $pagePath . "acrylics/",
                "name" => "Acrylics",
                "img" => $imgPath . "acrylics.jpg"
            ),
            array(
                "link" => $pagePath . "alloys/",
                "name" => "Alloys",
                "img" => $imgPath . "alloys.jpg"
            ),
            array(
                "link" => $pagePath . "anesthetics/",
                "name" => "Anesthetics",
                "img" => $imgPath . "anesthetics.jpg"
            ),
            array(
                "link" => $pagePath . "articularing-paper/",
                "name" => "Articularing Paper",
                "img" => $imgPath . "articularing-paper.jpg"
            ),
            array(
                "link" => $pagePath . "burs/",
                "name" => "Burs",
                "img" => $imgPath . "burs.jpg"
            ),
            array(
                "link" => $pagePath . "cavity-liners/",
                "name" => "Cavity Liners",
                "img" => $imgPath . "cavity-liners.jpg"
            ),
            array(
                "link" => $pagePath . "cosmetics/",
                "name" => "Cosmetics",
                "img" => $imgPath . "cosmetics.jpg"
            ),
            array(
                "link" => $pagePath . "crown-and-bridge/",
                "name" => "Crown and Bridge",
                "img" => $imgPath . "crown-bridge.jpg"
            ),
            array(
                "link" => $pagePath . "disposables/",
                "name" => "Disposables",
                "img" => $imgPath . "disposables.jpg"
            ),
            array(
                "link" => $pagePath . "endodontics/",
                "name" => "Endodontics",
                "img" => $imgPath . "endodontics.jpg"
            ),
            array(
                "link" => $pagePath . "equipments/",
                "name" => "Equipments",
                "img" => $imgPath . "equipments.jpg"
            ),
            array(
                "link" => $pagePath . "films/",
                "name" => "Films",
                "img" => $imgPath . "films.jpg"
            ),
            array(
                "link" => $pagePath . "germicides/",
                "name" => "Germicides",
                "img" => $imgPath . "germicides.jpg"
            ),
            array(
                "link" => $pagePath . "handpieces/",
                "name" => "Handpieces",
                "img" => $imgPath . "handpieces.jpg"
            ),
            array(
                "link" => $pagePath . "hemostatic-solutions/",
                "name" => "Hemostatic Solutions",
                "img" => $imgPath . "hemostatic-solutions.jpg"
            ),
            array(
                "link" => $pagePath . "impression-materials/",
                "name" => "Impression Materials",
                "img" => $imgPath . "impression-materials.jpg"
            ),
            array(
                "link" => $pagePath . "infection-control/",
                "name" => "Infection Control",
                "img" => $imgPath . "infection-control.jpg"
            ),
            array(
                "link" => $pagePath . "matrix-and-wedges/",
                "name" => "Matrix and Wedges",
                "img" => $imgPath . "matrix-wedges.jpg"
            ),
            array(
                "link" => $pagePath . "miscellaneous/",
                "name" => "Miscellaneous",
                "img" => $imgPath . "miscellaneous.jpg"
            ),
            array(
                "link" => $pagePath . "orthodontics/",
                "name" => "Orthodontics",
                "img" => $imgPath . "orthodontics.jpg"
            ),
            array(
                "link" => $pagePath . "parts-equipment/",
                "name" => "Parts Equipment",
                "img" => $imgPath . "parts-equipments.jpg"
            ),
            array(
                "link" => $pagePath . "pins-and-posts/",
                "name" => "Pins and Posts",
                "img" => $imgPath . "pins-posts.jpg"
            ),
            array(
                "link" => $pagePath . "preventives/",
                "name" => "Preventives",
                "img" => $imgPath . "preventives.jpg"
            ),
            array(
                "link" => $pagePath . "rubber-dams/",
                "name" => "Rubber Dams",
                "img" => $imgPath . "rubber-dams.jpg"
            ),
            array(
                "link" => $pagePath . "surgical-and-sutures/",
                "name" => "Surgical and Sutures",
                "img" => $imgPath . "surgical-sutures.jpg"
            )
        );

        $page = "
        <br>
        <div class='categories-box'>
        <h2>Product Categories</h2><br>
        <div class='categories-grid'>";


        foreach ($categories as $cat) {
            $page .= "<div class='category' style='background: url(" . $cat["img"] . ");'>
                <a href='" . $cat["link"] . "'>
                    <div><p>" . $cat["name"] . "</p></div>
                </a>
            </div>";
        }

        $page .= "</div></div>";




        return $page;
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
