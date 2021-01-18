<?php

/**
 * @package  AcmeShortcodes
 */

namespace Inc\Base\Components;

if (!defined('ABSPATH')) {
    die;
};

class HomeCategory
{

    function __construct()
    {
        add_shortcode('acme-home-categories', array($this, 'AcmedentHomeCategories'));
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
}
