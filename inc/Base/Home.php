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

    function __construct()
    {
        add_shortcode('acme-home-slide', array($this, 'AcmedentHomeSlidePage'));
        add_shortcode('acme-home-promo-next-week', array($this, 'AcmedentHomePromoNextWeek'));
        add_shortcode('acme-home-categories', array($this, 'AcmedentHomeCategories'));
        add_shortcode('acme-home-info', array($this, 'AcmedentHomeInfo'));
        add_shortcode('acme-home-promo', array($this, 'AcmedentHomePromo'));
    }


    function AcmedentHomeSlidePage()
    {
        //CATALOG
        $slide1 = "<div class='acme-slide slide1'>
        <div class='acme-slide-box'>

        <a class='side1-link'  href='/wp-content/uploads/pdf/catalog.pdf'>
        <h2 class='acme-maintitle'>Download</h2>
        </a>
        
        <br>

        <h2 class='acme-maintitle slide1-h2'>
        Download our latest Catalog
        </h2>

        </div>
        
        </div>";

        //FREE SHIPPING
        $slide2 = "<div class='acme-slide slide2'>
        <div>
        <div class='slide2-img'>

        <h2 class='acme-maintitle slide2-h2'>
        Free Shipping Over $300.00 Orders
        </h2>

        </div>
        </div>
        </div>";

        //ONLINE STORE
        $slide3 = "<div class='acme-slide slide3'>
        
        <a href='#'><h2>Coming Soon</h2></a>
        <br>
        <h2 class='acme-maintitle slide2-h3'>New Online Store</h2>
       
        
        
        </div>";


        $page = "
       <br> <div class='home-login-grid'>
        <div class='acme-wrap'>
        <div class='slide-arrow left-arrow' id='left-arrow'>
        <</div>
                <div class='slide-arrow right-arrow' id='right-arrow'>></div>
                <div class='acme-slider' id='acme-slider'>
                    " . $slide3 . $slide1 . $slide2 . $slide3 . $slide1 . "

                </div>
        </div>
        <div></div>
        <div class='login-box'>
        " . do_shortcode('[wpmem_form login]') . "
        </div>
        </div>
        <br>
        ";



        return $page;
    }

    function AcmedentHomePromo()
    {
        $page = "
        <br>
        <div class='promo-grid'>

        <h2 class='promo-title'>WEEKLY FLASH SALE!</h2>

        <h2 class='promo-date'>October 07 - 13, 2019</h2>";


        $ids = array(
            41148 => array("promo" => "", "promo-price" => "28.50", "net-price" => ""),
            38991 => array("promo" => "", "promo-price" => "6.00", "net-price" => ""),
            37485 => array("promo" => "", "promo-price" => "29.95", "net-price" => ""),
            26854 => array("promo" => "Promo 3+1", "promo-price" => "149.95", "net-price" => "112.46"),
            27952 => array("promo" => "Promo 4+1", "promo-price" => "57.70", "net-price" => "46.16"),
            38719 => array("promo" => "Promo 7+3", "promo-price" => "13.99", "net-price" => "9.79")
        );

        foreach ($ids as $id => $value) {

            $product = wc_get_product($id);

            $image = str_replace("-150x150", '', wp_get_attachment_image_src($product->get_image_id())[0]);


            $prod_info = array(
                "name" => $product->get_name(),
                "img" => $image,
                "price" => $product->get_price(),
            );

            $page .= "
            <div class='promo-prod'>
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

        $page .= "<h2 class='acme-text promo-msg'>*Net promos only available by phone for while.</h2>
        <h2 class='acme-maintitle promo-steam'>Sales Team</h2>
        <h2 class='acme-sec-title promo-phone'>905-761-6850</h2>

        </div><br>";

        return $page;
    }



    function AcmedentHomePromoNextWeek()
    {

        $page = "
        <br>
        <div class='promo-grid'>

        <h2 class='promo-title'>WEEKLY FLASH SALE!</h2>

        <h2 class='promo-date'>October 28 - November 3, 2019</h2>";

        $ids = array(
            26322 => array("promo" => "", "promo-price" => "134.95", "net-price" => ""),
            31347 => array("promo" => "Promo 4+1", "promo-price" => "99.00", "net-price" => "79.20"),
            38872 => array("promo" => "Promo 7+3", "promo-price" => "28.50", "net-price" => "19.95"),
            32032 => array("promo" => "", "promo-price" => "7.99", "net-price" => ""),
            27827 => array("promo" => "", "promo-price" => "7.99", "net-price" => ""),
            37638 => array("promo" => "", "promo-price" => "1.99", "net-price" => "")
        );

        foreach ($ids as $id => $value) {

            $product = wc_get_product($id);

            $image = str_replace("-150x150", '', wp_get_attachment_image_src($product->get_image_id())[0]);


            $prod_info = array(
                "name" => $product->get_name(),
                "img" => $image,
                "price" => $product->get_price(),
            );

            $page .= "
            <div class='promo-prod'>
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

        $page .= "<h2 class='acme-text promo-msg'>*Net promos only available by phone for while.</h2>
        <h2 class='acme-maintitle promo-steam'>Sales Team</h2>
        <h2 class='acme-sec-title promo-phone'>905-761-6850</h2>

        </div><br>";

        return $page;
    }


    function AcmedentHomeCategories()
    {

        $imgPath = "/wp-content/uploads/2019/10/";
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
