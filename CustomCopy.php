<?php

/**
 * @package Custom Copyright mod
 * @version 3.2
 * @author Jessica González <missallsunday@simplemachines.org>
 * @copyright Copyright (c) 2011, Jessica González
 * @license http://www.mozilla.org/MPL/MPL-1.1.html
 */

/*
 * Version: MPL 1.1
 *
 * The contents of this file are subject to the Mozilla Public License Version
 * 1.1 (the "License"); you may not use this file except in compliance with
 * the License. You may obtain a copy of the License at
 * http://www.mozilla.org/MPL/
 *
 * Software distributed under the License is distributed on an "AS IS" basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License
 * for the specific language governing rights and limitations under the
 * License.
 *
 * The Original Code is http://missallsunday.com code.
 *
 * The Initial Developer of the Original Code is
 * Jessica González.
 * Portions created by the Initial Developer are Copyright (C) 2011
 * the Initial Developer. All Rights Reserved.
 *
 * Contributor(s):
 *
 */


	/* Don't you love when the license takes more lines than the actual code?  :D */

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