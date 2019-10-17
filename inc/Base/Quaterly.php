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
                "link"=> $pdfPath."",
                "alt" => "Coltene"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/dentsply-1.png",
                "link"=>$pdfPath."Dentsply-Q4-2019.pdf",
                "alt" => "Dentsply"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/diadent.png",
                "link"=>$pdfPath."DiaDent-Q4-2019.pdf",
                "alt" => "DiaDent"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/dmg-1.png",
                "link"=>$pdfPath."DMG-Q4-2019.pdf",
                "alt" => "DMG"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/gc-america.png",
                "link"=>$pdfPath."GC-America-Q4-2019.pdf",
                "alt" => "GC America"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/hedy.jpg",
                "link"=>$pdfPath."",
                "alt" => "Hedy"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/hufriendy.png",
                "link"=>$pdfPath."Hu-Friedy-Q4-2019.pdf",
                "alt" => "Hu-Friedy"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/kulzer.jpg",
                "link"=>$pdfPath."Kulzer-Q4-2019.pdf",
                "alt" => "Kulzer"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/kuraray-1.png",
                "link"=>$pdfPath."Kuraray-Q4-2019.pdf",
                "alt" => "Kuraray"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/medicom-1.png",
                "link"=>$pdfPath."Medicom-Q4-2019.pdf",
                "alt" => "Medicom"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/morita.png",
                "link"=>$pdfPath."JMorita-Q4-2019.pdf",
                "alt" => "JMorita"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/puldent.png", 
                "link" => $pdfPath."Pulpdent-Q4-2019.pdf",
                "alt" => "Pulpdent"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/sable.png",
                "link" => $pdfPath."Sable-Q4-2019.pdf",
                "alt" => "Sable"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/shofu.png",
                "link" => $pdfPath."Shofu-Q4-2019.pdf",
                "alt" => "Shofu"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/young.png",
                "link" => $pdfPath."Young-Q4-2019.pdf",
                "alt" => "Young"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/zest-dental.jpg",
                "link" => $pdfPath."Danville-Zest-Q4-2019.pdf",
                "alt" => "Zest Dental"
            )
        );

        if (count($arr > 0)) {
            $page .= " <div class='quaterly-grid'>";

            foreach ($arr as $img) {
                $page .= '<div class="partner quaterly"><div class="qtl-img-box"><img src="' . $img['src'] . '" alt="' . $img['alt'] . '"></div><div class="qtl-btn-box"><a href="'.$img['link'].'" class="quaterly-link"><div class="qtl-btn">PROMO</div></a></div></div>';
            }

            $page .= "</div>";
        }

        $page .= "</div></div>";


        return $page;
    }
}
