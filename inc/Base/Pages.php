<?php

/**
 * @package  AcmeShortcodes
 */

namespace Inc\Base;

if (!defined('ABSPATH')) {
    die;
};

class Pages
{
    public $About;
    function register()
    {
        $About = new About();
        $Terms = new Terms();
        $Shipping = new Shipping();
        $Contact = new Contact();
        $Quaterly = new Quaterly();
        $Svg = new Svg();
        $Home = new Home();
        $HomePage = new HomePage();

        if ($_POST['submit_campaign']) {

            echo "
            
            <script>
            this.setTimeout(()=>{
                
                jQuery('#ex1').modal({
            fadeDuration: 100
            });
                
            },1000);
            </script>";

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://us4.api.mailchimp.com/3.0/lists/2555c280d2",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{\n\t\"members\":[\n\t\t{\n\t\t\"email_address\":\"" . $_POST['email_campaign'] . "\",\n\t\t\"status\":\"subscribed\",\n\t\t\"tags\":[\n\t\t\t\"General\"\n\t\t\t]\n\t\t}\n\t]\n}",
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "Authorization: auth c7d3c2ed44491f1836fdda9859be9f0a-us4",
                    "Content-Type: text/plain",
                    "Cookie: ak_bmsc=F8C513D2CD4F61EB63EB9A7C701B74F248F62B7D1B6E00009AB5D75ED335CB15~plZGHaG429QIeg/QUnYNDTU+b3Nvf5l2W+OzWpjEABzddU3LwZ1PuZd8kVZKUkGK3C/td0cL1QEe9ss8vc+DHDQWODj3NFC/z0z1svecHdoLALUHcqEIaNUuIwf4ZoZwiUxGX63nCVNSwmkoRxyUGu81LrSLCvV2qteTLD4c5cTxhEnVE9FstGsMDPCHPM7CqY0Hdi38BVLFCT70nPNapojLaR92Zd7mLOjVSirrkztcI="
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $to = "rgarbulha@acmedent.com";
            $subject = "Subscribed email.";
            $txt = $_POST['email_campaign'];
            $headers = "From: info@acmedent.com";

            // mail($to, $subject, $txt, $headers);
        }
    }
}
