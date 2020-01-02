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

        $pdfPath = "/wp-content/uploads/pdf/";
        

        $arr = array(
            array(
                "src" => "/wp-content/uploads/2019/06/coltene-1.png",
                "link"=> $pdfPath."Crosstex_Q1_2020.pdf",
                "alt" => "Crosstex"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/dentsply-1.png",
                "link"=>$pdfPath."Dentsply_Q1_2020.pdf",
                "alt" => "Dentsply"
            )
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/diadent.png",
                "link"=>$pdfPath."DiaDent_2020_Q1.pdf",
                "alt" => "Diadent"
            )
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/dmg-1.png",
                "link"=>$pdfPath."DMG_Q1_2020.pdf",
                "alt" => "DMG"
            )
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/gc-america.png",
                "link"=>$pdfPath."GCAmerica_Q1-2020.pdf",
                "alt" => "GC"
            )
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/morita.png",
                "link"=>$pdfPath."J.Morita_Q1_2020.pdf",
                "alt" => "JMorita"
            )
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/kulzer.jpg",
                "link"=>$pdfPath."Kulzer_Q1_2020.pdf",
                "alt" => "Kulzer"
            )
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/kuraray.png",
                "link"=>$pdfPath."Kuraray-2020-Q1-PANAVIA-sm.pdf",
                "alt" => "Kuraray Panavia"
            )
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/kuraray.png",
                "link"=>$pdfPath."Kuraray_2020-Q1-CLEARFIL-sm.pdf",
                "alt" => "Kuraray Clearfil"
            )
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/medicom.png",
                "link"=>$pdfPath."Medicom_Q1_2020.pdf",
                "alt" => "Medicom"
            )
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/puldent.png",
                "link"=>$pdfPath."Pulpdent-1st-Quarter-2020.pdf",
                "alt" => "Pulpdent"
            )
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/sable-1-e1577983965932.png",
                "link"=>$pdfPath."Sable_2020_Q1.pdf",
                "alt" => "Sable"
            )
            ),
            array(
                "src" => "/wp-content/uploads/2020/01/Waterpik-Logo.png",
                "link"=>$pdfPath."Waterpik_2019-2020.pdf",
                "alt" => "Waterpik"
            )
        );

        


        if (count($arr > 0)) {
            $page .= " <div class='quaterly-grid'>";

            if (sizeof($arr) > 0){
                foreach ($arr as $img) {
                    $page .= '<div class="partner quaterly"><div class="qtl-img-box"><img src="' . $img['src'] . '" alt="' . $img['alt'] . '"></div><div class="qtl-btn-box"><a href="' . $img['link'] . '" class="quaterly-link"><div class="qtl-btn">PROMO</div></a></div></div>';
                }
                $page .= "</div>";
            }
            else{
            $page .= "</div>";
                $page.='<h2 class="partner quaterly">No promos at the moment</h2>';
            }
        }

        $page .= "</div></div>";


        return $page;
    }
}
