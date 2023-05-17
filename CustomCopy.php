<?php
/**
 * @license http://www.mozilla.org/MPL/ MPL 2.0
 */

if (!defined('SMF'))
	die('No direct access...');

loadLanguage('CustomCopy');

/* Don't bother on create a whole new page for this, lets use integrate_general_mod_settings ^.^ */
function CFL_Admin(&$config_vars)
{
	global $txt;

	$config_vars[] = '';
	$config_vars[] = array('large_text', 'CFL_foot_links', 'subtext' => $txt['CFL_foot_links_sub']);
}

/* Buffer time */
function CFL_Buffer($buffer)
{
	global $modSettings;

	if(empty($modSettings['CFL_foot_links'])) {
		return $buffer;
	}

	$customCopy = $modSettings['CFL_foot_links'];
	return preg_replace_callback(

		'/(<li class="copyright">.+?)+(<\/li>)/i',

		function($match) use ($customCopy) {
			return ($match[1] .  ' ' . $customCopy);
			},
		$buffer
	);
}