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

        $pdfPath = home_url() . "/wp-content/uploads/2021/01/";
        $imgPath = home_url() . "/wp-content/uploads/";

        $arr = array(
            array(
                "src" => $imgPath . "2019/06/coltene-1.png",
                "link" => $pdfPath . "Coltene_q1_2021.pdf",
                "alt" => "Coltene"
            ),
            array(
                "src" => $imgPath . "2019/06/dentsply-1.png",
                "link" => $pdfPath . "Dentsply-Q1_2021.pdf",
                "alt" => "Dentsply"
            ),
            array(
                "src" => $imgPath . "2019/06/diadent.png",
                "link" => $pdfPath . "DiaDent-Q1-2021.pdf",
                "alt" => "Diadent"
            ),
            array(
                "src" => $imgPath . "2019/06/dmg-1.png",
                "link" => $pdfPath . "DMG_Q1_2021.pdf",
                "alt" => "DMG"
            ),
            array(
                "src" => $imgPath . "2019/06/gc-america.png",
                "link" => $pdfPath . "GC-America-Q1-2021.pdf",
                "alt" => "GC"
            ),
            // array(
            //     "src" => $imgPath . "2020/03/flight.png",
            //     "link" => $pdfPath . "Flight-Autoclave-Flyer-Single-Page-Promo-min.pdf",
            //     "alt" => "Flight"
            // ),
            array(
                "src" => $imgPath . "2021/01/Hu-Friedy-Group-Logo-scaled.jpg",
                "link" => $pdfPath . "Crosstex-and-Hu-friedy-Q1-2021.pdf",
                "alt" => "Hu-Friedy Group"
            ),
            array(
                "src" => $imgPath . "2019/06/kulzer.jpg",
                "link" => $pdfPath . "Kulzer_Q1_2021.pdf",
                "alt" => "Kulzer"
            ),
            array(
                "src" => $imgPath . "2019/06/kuraray.png",
                "link" => $pdfPath . "Kuraray-Q1-2021.xlsx",
                "alt" => "Kuraray"
            ),
            array(
                "src" => $imgPath . "2019/06/medicom.png",
                "link" => $pdfPath . "Medicom-Q1-2021.pdf",
                "alt" => "Medicom"
            ),
            array(
                "src" => $imgPath . "2019/06/morita.png",
                "link" => $pdfPath . "J.Morita_Q1_2021.pdf",
                "alt" => "JMorita"
            ),
            array(
                "src" => $imgPath . "2019/06/pulpdent.png",
                "link" => $pdfPath . "Pulpdent_Q1_2021.pdf",
                "alt" => "Pulpdent"
            ),
            array(
                "src" => $imgPath . "2019/06/sable-1-e1577983965932.png",
                "link" => $pdfPath . "Sable-2021-Q1.pdf",
                "alt" => "Sable"
            ),
            array(
                "src" => $imgPath . "2019/06/shofu.png",
                "link" => $pdfPath . "Shofu-Q1-2021.pdf",
                "alt" => "Shofu"
            ),
            array(
                "src" => $imgPath . "2021/01/tokuyama_logo.png",
                "link" =>  "/wp-content/uploads/2021/01/Tokuyama-Q1-21-1.pdf",
                "alt" => "Tokuyama"
            ),
            array(
                "src" => $imgPath . "2020/01/Waterpik-Logo.png",
                "link" => $pdfPath . "Waterpik-Q1-Q4-2021.pdf",
                "alt" => "Waterpik"
            ),
            array(
                "src" => $imgPath . "2019/06/young.png",
                "link" => "/wp-content/uploads/2021/01/Young-Q1-and-Q2.pdf",
                "alt" => "Young"
            ),
            array(
                "src" => $imgPath . "2019/06/zest-dental.jpg",
                "link" => "/wp-content/uploads/2021/01/Danville-Zest-2021-Q1-1.pdf",
                "alt" => "Zest"
            ),
        );




        if (count($arr) > 0) {
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
