<?php
/**
 * @license http://www.mozilla.org/MPL/ MPL 2.0
 */

if (!defined('SMF'))
	die('Hacking attempt...');

loadLanguage('CustomCopy');

/* Don't bother on create a whole new page for this, lets use integrate_general_mod_settings ^.^ */
function CFL_Admin(&$config_vars)
{
	global $txt;

	$config_vars[] = '';
	$config_vars[] = array('check', 'CFL_enable', 'subtext' => $txt['CFL_enable_sub']);
	$config_vars[] = array('large_text', 'CFL_foot_links', 'subtext' => $txt['CFL_foot_links_sub']);
}

/* Buffer time */
function CFL_Buffer($buffer)
{
	global $modSettings, $scripturl, $txt;

	if(!empty($modSettings['CFL_enable']) && !empty($modSettings['CFL_foot_links']))
	{
		$string ='/(<li class="last">.+?)+(<\/li>)/i';
		$replace = '<li class="last"><a id="button_wap2" href="'.$scripturl.'?wap2" class="new_win"><span>'.$txt['wap2'].'</span></a></li><li class="copyright">'.$modSettings['CFL_foot_links'].'</li>';

		$buffer = preg_replace($string, $replace, $buffer);

		return $buffer;
	}
	else
		return $buffer;
}