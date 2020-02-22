<?php
/**
*
*/
// No direct access
defined('_JEXEC') or die;
// Load the helper file via Joomla's Autoload feature
JLoader::register('ModAdvancedConnexionHelper', __DIR__ . '/helper.php');
// Include the login functions only once
JLoader::register('ModLoginHelper', __DIR__ . '/helper.php');

$params->def('greeting', 1);

$type             = ModLoginHelper::getType();
$return           = ModLoginHelper::getReturnUrl($params, $type);
$twofactormethods = JAuthenticationHelper::getTwoFactorMethods();
$user             = JFactory::getUser();
$layout           = $params->get('layout', 'default');

// Logged users must load the logout sublayout
if (!$user->guest)
{
	$layout .= '_logout';
}

require JModuleHelper::getLayoutPath('mod_login', $layout);
