<?php
/**
 * @package  AcmeShortcodes
 */
namespace Inc;
class Activate
{
	public static function activate() {
		flush_rewrite_rules();

		$array = array();

		add_option('AcmeShortCode_Plugin_CurrentWeek', $array, '', 'yes');
		add_option('AcmeShortCode_Plugin_NextWeek', $array, '', 'yes');
    }
}