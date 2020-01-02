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

        /*$arr = array(
            array(
                "src" => "/wp-content/uploads/2019/06/coltene-1.png",
                "link"=> $pdfPath."Coltene-Q4-2019.pdf",
                "alt" => "Coltene"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/dentsply-1.png",
                "link"=>$pdfPath."Dentsply-Q4-2019.pdf",
                "alt" => "Dentsply"
            )
        );*/

        $arr = array(
            
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
