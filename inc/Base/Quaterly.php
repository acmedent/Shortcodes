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

        $pdfPath = "/wp-content/uploads/2020/03/";


        $arr = array(
            // array(
            //     "src" => "/wp-content/uploads/2019/06/coltene-1.png",
            //     "link" => $pdfPath . "Crosstex_Q1_2020.pdf",
            //     "alt" => "Crosstex"
            // ),
            array(
                "src" => "/wp-content/uploads/2019/06/dentsply-1.png",
                "link" => $pdfPath . "Dentsply_Q2_2020-min.pdf",
                "alt" => "Dentsply"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/diadent.png",
                "link" => $pdfPath . "Diadent-Q2-2020-min.pdf",
                "alt" => "Diadent"

            ),
            // array(
            //     "src" => "/wp-content/uploads/2019/06/dmg-1.png",
            //     "link" => $pdfPath . "DMG_Q1_2020.pdf",
            //     "alt" => "DMG"

            // ),
            // array(
            //     "src" => "/wp-content/uploads/2019/06/gc-america.png",
            //     "link" => $pdfPath . "GCAmerica_Q1-2020.pdf",
            //     "alt" => "GC"

            // ),

            array(
                "src" => "/wp-content/uploads/2020/03/flight.png",
                "link" => $pdfPath . "Flight-Autoclave-Flyer-Single-Page-Promo-min.pdf",
                "alt" => "Flight"

            ),
            array(
                "src" => "/wp-content/uploads/2019/06/hufriendy.png",
                "link" => $pdfPath . "Hu-Friedy-Q2-2020-Promo-Pad-CA.pdf",
                "alt" => "Hu-Friedy"

            ),
            array(
                "src" => "/wp-content/uploads/2019/06/kulzer.jpg",
                "link" => $pdfPath . "Kulzer-Q2-2020-min.pdf",
                "alt" => "Kulzer"

            ),
            array(
                "src" => "/wp-content/uploads/2019/06/kuraray.png",
                "link" => $pdfPath . "2020-2Q-Specials-CANADA-kuraray-min.pdf",
                "alt" => "Kuraray Panavia"

            ),

            array(
                "src" => "/wp-content/uploads/2019/06/medicom.png",
                "link" => $pdfPath . "Medicom-Q2-min.pdf",
                "alt" => "Medicom"

            ),
            array(
                "src" => "/wp-content/uploads/2019/06/morita.png",
                "link" => $pdfPath . "J.Morita-Q2_2020-min.pdf",
                "alt" => "JMorita"

            ),
            array(
                "src" => "/wp-content/uploads/2020/04/Pulpdent-Q2-Promos_Canada_2020-revised-Aprl-28-2020.pdf",
                "link" => $pdfPath . "Pulpdent-Q2-2020-min.pdf",
                "alt" => "Pulpdent"

            ),
            array(
                "src" => "/wp-content/uploads/2019/06/sable-1-e1577983965932.png",
                "link" => $pdfPath . "Sable-Q2-2020-min.pdf",
                "alt" => "Sable"

            ),
            // array(
            //     "src" => "/wp-content/uploads/2020/01/Waterpik-Logo.png",
            //     "link" => $pdfPath . "Waterpik_2019-2020.pdf",
            //     "alt" => "Waterpik"
            // )
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
