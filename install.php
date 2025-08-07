<?php

if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF'))
	require_once(dirname(__FILE__) . '/SSI.php');

elseif (!defined('SMF'))
	exit('<b>Error:</b> Cannot install - please verify you put this in the same place as SMF\'s index.php.');

$hooks = [
	'integrate_buffer' => 'CFL_Buffer',
	'integrate_pre_include' => '$sourcedir/CustomCopy.php',
	'integrate_general_mod_settings' => 'CFL_Admin',
];


foreach ($hooks as $hook => $function)
	add_integration_function($hook, $function);