<?php

/**
 * @package  AcmeShortcodes
 */

namespace Inc\Base;

if (!defined('ABSPATH')) {
    die;
};
class Quaterly
{

    function __construct()
    {
        add_shortcode('acme-quaterly', array($this, 'AcmedentQuaterlyPage'));
    }


    function AcmedentQuaterlyPage()
    {
        $page = "<h2 class='acme-maintitle'>CLICK ON THE MANUFACTURERS LINK TO CHECK FOR PROMOTIONS</h2>

        <div class='acme-quarterly-container'>        
        <div class='acme-container'>
            
            ";

        $pdfPath = home_url() . "/wp-content/uploads/2020/10/";
        $imgPath = home_url() . "/wp-content/uploads/";

        $arr = array(
            array(
                "src" => "/wp-content/uploads/2019/06/coltene-1.png",
                "link" => $pdfPath . "Q4-2020-Coltene.pdf",
                "alt" => "Coltene"
            ),
            array(
                "src" => "/wp-content/uploads/2020/07/crosstex.jpg",
                "link" => $pdfPath . "Q4-2020-Crosstex.pdf",
                "alt" => "Crosstex"
            ),
            array(
                "src" => $imgPath . "2019/06/dentsply-1.png",
                "link" => $pdfPath . "Q4-2020-Dentsply-min.pdf",
                "alt" => "Dentsply"
            ),
            array(
                "src" => $imgPath . "2019/06/diadent.png",
                "link" => $pdfPath . "Q4-2020-Diadent-min.pdf",
                "alt" => "Diadent"
            ),
            array(
                "src" => $imgPath . "2019/06/dmg-1.png",
                "link" => $pdfPath . "Q4-2020-DMG.pdf",
                "alt" => "DMG"
            ),
            array(
                "src" => $imgPath . "2019/06/gc-america.png",
                "link" => $pdfPath . "Q4-2020-GC.pdf",
                "alt" => "GC"
            ),
            // array(
            //     "src" => $imgPath . "2020/03/flight.png",
            //     "link" => $pdfPath . "Flight-Autoclave-Flyer-Single-Page-Promo-min.pdf",
            //     "alt" => "Flight"
            // ),
            array(
                "src" => $imgPath . "2019/06/hufriendy.png",
                "link" => $pdfPath . "Q4-2020-Hu-Friedy.pdf",
                "alt" => "Hu-Friedy"
            ),
            array(
                "src" => $imgPath . "2019/06/kulzer.jpg",
                "link" => $pdfPath . "Q4-2020-Kulzer-min.pdf",
                "alt" => "Kulzer"
            ),
            array(
                "src" => $imgPath . "2019/06/kuraray.png",
                "link" => $pdfPath . "Q4-2020-Kuraray-min.pdf",
                "alt" => "Kuraray Panavia"
            ),
             array(
                 "src" => $imgPath . "2019/06/medicom.png",
                 "link" => $pdfPath . "Q4-2020-Medicom-min.pdf",
                 "alt" => "Medicom"
             ),
            // array(
            //     "src" => $imgPath . "2019/06/morita.png",
            //     "link" => $pdfPath . "J.Morita-Q3_2020_Promos-min.pdf",
            //     "alt" => "JMorita"
            // ),
            array(
                "src" => $imgPath . "2019/06/pulpdent.png",
                "link" => $pdfPath . "Q4-2020-Pulpdent.pdf",
                "alt" => "Pulpdent"
            ),
            array(
                "src" => $imgPath . "2019/06/sable-1-e1577983965932.png",
                "link" => $pdfPath . "Q4-2020-Sable-min.pdf",
                "alt" => "Sable"
            ),
            // array(
            //     "src" => $imgPath . "2019/06/shofu.png",
            //     "link" => $pdfPath . "Shofu-Q3-2020.docx",
            //     "alt" => "Shofu"
            // ),
            // array(
            //     "src" => $imgPath . "2020/01/Waterpik-Logo.png",
            //     "link" => $pdfPath . "Waterpik-2019-2020.pdf",
            //     "alt" => "Waterpik"
            // ),
            array(
                "src" => $imgPath . "2020/10/zirc.png",
                "link" => "/wp-content/uploads/2020/10/Q4-2020-Zirc.pdf",
                "alt" => "Zirc"
            ),
        );




        if (count($arr > 0)) {
            $page .= " <div class='quaterly-grid'>";

            if (sizeof($arr) > 0) {
                foreach ($arr as $img) {
                    $page .= '<div class="partner quaterly"><div class="qtl-img-box"><a href="' . $img['link'] . '"><img src="' . $img['src'] . '" alt="' . $img['alt'] . '"></a></div><div class="qtl-btn-box"><a href="' . $img['link'] . '" class="quaterly-link"><div class="qtl-btn">PROMO</div></a></div></div>';
                }
                $page .= "</div>";
            } else {
                $page .= "</div>";
                $page .= '<h2 class="partner quaterly">No promos at the moment</h2>';
            }
        }

        $page .= "</div></div>";


        return $page;
    }
}
