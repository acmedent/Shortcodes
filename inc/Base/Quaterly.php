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

        $arr = array(
            array(
                "src" => "http://localhost/acme/wp-content/uploads/2019/06/coltene-1.png",
                "link"=>"1",
                "alt" => "Coltene"
            ),
            array(
                "src" => "http://localhost/acme/wp-content/uploads/2019/06/dentsply-1.png",
                "link"=>"",
                "alt" => "Dentsply"
            ),
            array(
                "src" => "http://localhost/acme/wp-content/uploads/2019/06/diadent.png",
                "link"=>"",
                "alt" => "DiaDent"
            ),
            array(
                "src" => "http://localhost/acme/wp-content/uploads/2019/06/dmg-1.png",
                "link"=>"",
                "alt" => "DMG"
            ),
            array(
                "src" => "http://localhost/acme/wp-content/uploads/2019/06/gc-america.png",
                "link"=>"",
                "alt" => "GC America"
            ),
            array(
                "src" => "http://localhost/acme/wp-content/uploads/2019/06/hedy.jpg",
                "link"=>"",
                "alt" => "Hedy"
            ),
            array(
                "src" => "http://localhost/acme/wp-content/uploads/2019/06/hufriendy.png",
                "link"=>"",
                "alt" => "Hu-Friendly"
            ),
            array(
                "src" => "http://localhost/acme/wp-content/uploads/2019/06/kulzer.jpg",
                "link"=>"",
                "alt" => "Kulzer"
            ),
            array(
                "src" => "http://localhost/acme/wp-content/uploads/2019/06/kuraray-1.png",
                "link"=>"",
                "alt" => "Kuraray"
            ),
            array(
                "src" => "http://localhost/acme/wp-content/uploads/2019/06/medicom-1.png",
                "link"=>"",
                "alt" => "Medicom"
            ),
            array(
                "src" => "http://localhost/acme/wp-content/uploads/2019/06/morita.png",
                "link"=>"",
                "alt" => "Morita"
            ),
            array(
                "src" => "http://localhost/acme/wp-content/uploads/2019/06/puldent.png", 
                "link" => "",
                "alt" => "Pulpdent"
            ),
            array(
                "src" => "http://localhost/acme/wp-content/uploads/2019/06/sable.png",
                "link" => "",
                "alt" => "Sable"
            ),
            array(
                "src" => "http://localhost/acme/wp-content/uploads/2019/06/shofu.png",
                "link" => "",
                "alt" => "Shofu"
            ),
            array(
                "src" => "http://localhost/acme/wp-content/uploads/2019/06/young.png",
                "link" => "",
                "alt" => "Young"
            ),
            array(
                "src" => "http://localhost/acme/wp-content/uploads/2019/06/zest-dental.jpg",
                "link" => "2",
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
