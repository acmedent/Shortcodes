<?php

/**
 * @package  AcmeShortcodes
 */

namespace Inc\Base;

if (!defined('ABSPATH')) {
    die;
};
class Contact
{

    function __construct()
    {
        add_shortcode('acme-contact', array($this, 'AcmedentContactPage'));
    }


    function AcmedentContactPage()
    {
        $page = "
        <div class='acme-2cl'>
        <div class='acme-container acme-contact'>

        <h2 class='acme-maintitle' style='text-align:left'>
        LEARN MORE
        </h2>

        <h2 class='acme-sec-title' style='font-size:16px; text-align:left'>
        VISIT OUR OFFICE,<br> GIVE US A CALL, OR <br>SEND US A MESSAGE
        </h2>
 
        <p class='acme-text'>
        <b>91 Citation Drive, Unit 5, Concord, ON L4K 2Y8</b>
        </p>

        <p class='acme-text'>
        <b>Opening Hours: Monday-Friday, 9:00am-5:00pm</b>
        </p>

        <p class='acme-text'>
        <b>Toll Free: </b>(888) 688-6555​     
        </p>
        <p class='acme-text'>
        <b>Phone: </b>(905) 761-6850​
        </p>
        <p class='acme-text'>
        <b>​Fax: </b>(905) 695-0284
        </p>

        <h2 class='acme-maintitle' style='text-align:left'>
        Au Québec
        </h2>

        <p class='acme-text'>
        <b>Toll Free: </b>(800) 930-4547
        </p>
        <p class='acme-text'>
        <b>Phone: </b>(514) 744-3822
        </p>
        <br>
        <p class='acme-text'>
        <b>Email: </b>info@acmedent.com
        </p>

        <iframe style='width:100%' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='https://maps.google.com/maps?q=acmedent%2C%2091%20citation%20dr%20%235%2C%20Concord%2C%20ON&amp;t=m&amp;z=15&amp;output=embed&amp;iwloc=near' aria-label='acmedent, 91 citation dr #5, Concord, ON'></iframe>
       
    </div>
    <div class='acme-container acme-contact'>
     " . do_shortcode('[wpforms id="93"]') . "       
        
       
    </div>


    </div>
    ";

        return $page;
    }
}
