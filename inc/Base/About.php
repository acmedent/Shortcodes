<?php

/**
 * @package  AcmeShortcodes
 */

namespace Inc\Base;
if (!defined('ABSPATH')) {
    die;
};
class About
{

    function __construct()
    {
        add_shortcode('acme-about', array($this, 'AcmedentAboutPage'));
        add_shortcode('acme-partners', array($this, 'AcmedentPartners'));
    }


    function AcmedentAboutPage()
    {
        $page = "
        <div class='acme-container'>
        <h2 class='acme-maintitle'>OUR MISSION IN SIMPLE</h2>
        <h2 class='acme-sec-title'>PROVIDING OUTSTANDING SERVICE SO THAT YOU CAN DELIVER A POSITIVE EXPERIENCE TO YOUR
            PATIENTS</h2>
 
        <p class='acme-text'>Founded in 1996, Acmedent Corporation is a dental equipment and dental products supply
            company located in Concord, Ontario. We strive to help you develop a solid foundation so that you can
            provide the best services to your patients. Our sales representatives are multilingual and have more than 10
            years of experience, allowing us to meet all business needs. Whether you are situated in the east or west
            coast of Canada, you can expect quick delivery and competitive pricing. At Acmedent, we ensure that all our
            customers are satisfied with their experience.</p>
 
 
        <h2 class='acme-sec-title'>QUALITY DENTAL PRODUCTS AT COMPETITIVE PRICES</h2>
        <p class='acme-text'>Acmedent offers a complete range of dental supplies and dental equipment from manufacturers
            like Dentsply, Coltene/Whaledent, GC, Heraeus, Hu-Friedy, Medicom, Premier, Pulpdent, DMG, Tuttnauer,
            Miltex, Morita, Shofu, Sable, Techwest, Velopex, Parkwell, Young, Microcopy, Kuraray, Teledyne Dalsa, and
            Ocean Pacific.</p>
 
        <h2 class='acme-sec-title'>FAST DELIVERY</h2>
        <p class='acme-text'>Merchandise orders are normally processed the day of receipt and shipped by courier
            the same day. Delivery is generally next day or within two days in Ontario and Quebec.</p>
    </div>";



        return $page;
    }

    function AcmedentPartners()
    {
        $page = "<div class='acme-partners-container'>
    <div class='acme-container'>
        <br>
        <h2 class='acme-sec-title'>A FEW OF OUR PARTNERS</h2>
        ";

        $arr = array(
            array(
                "src" => "/wp-content/uploads/2019/06/coltene-1.png",
                "alt" => "Coltene"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/dentsply-1.png",
                "alt" => "Dentsply"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/dmg-1.png",
                "alt" => "DMG"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/gc-america.png",
                "alt" => "GC America"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/heraeus.png",
                "alt" => "Heraeus"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/hufriendy.png",
                "alt" => "Hu-Friendly"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/kuraray-1.png",
                "alt" => "Kuraray"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/medicom-1.png",
                "alt" => "Medicom"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/microcopy.png",
                "alt" => "Microcopy"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/miltex.png",
                "alt" => "Miltex"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/morita.png",
                "alt" => "Morita"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/oceanpacific.png",
                "alt" => "Ocean Pacific"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/parkell.png",
                "alt" => "Parkell"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/premier.png",
                "alt" => "Premier"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/puldent.png",
                "alt" => "Pulpdent"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/sable.png",
                "alt" => "Sable"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/techwest.png",
                "alt" => "Tech West"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/teledyne.png",
                "alt" => "Teledyne"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/tuttnauer.png",
                "alt" => "Tuttnauer"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/velopex.png",
                "alt" => "Velopex"
            ),
            array(
                "src" => "/wp-content/uploads/2019/06/young.png",
                "alt" => "Young"
            )
        );

        if (count($arr > 0)) {
            $page .= " <div class='partners-grid'>";

            foreach ($arr as $img) {
                $page .= '<div class="partner "><img src="' . $img['src'] . '" alt="' . $img['alt'] . '"></div>';
            }

            $page .= "</div>";
        }

        $page .= "</div></div>";


        return $page;
    }
}
