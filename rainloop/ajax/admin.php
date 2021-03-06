<?php

/**
 * Nextcloud - RainLoop mail plugin
 *
 * @author RainLoop Team, Nextgen-Networks (@nextgen-networks), Tab Fitts (@tabp0le), Pierre-Alain Bandinelli (@pierre-alain-b)
 *
 * Based initially on https://github.com/RainLoop/rainloop-webmail/tree/master/build/owncloud
 */

\OC_JSON::checkAdminUser();
\OC_JSON::checkAppEnabled('rainloop');
\OC_JSON::callCheck();

$sUrl = '';
$sPath = '';
$bAutologin = false;

if (isset($_POST['appname']) &&	'rainloop' === $_POST['appname'])
{
	\OC::$server->getConfig()->setAppValue('rainloop', 'rainloop-autologin', isset($_POST['rainloop-autologin']) ?
		'1' === $_POST['rainloop-autologin'] : false);

	\OC::$server->getConfig()->setAppValue('rainloop', 'rainloop-useemail', isset($_POST['rainloop-useemail']) ?
		'1' === $_POST['rainloop-useemail'] : false);

	$bAutologin = \OC::$server->getConfig()->getAppValue('rainloop', 'rainloop-autologin', false);
}
else
{
	sleep(1);
	OC_JSON::error(array('Message' => 'Invalid Argument(s)'));
	return false;
}

sleep(1);
\OC_JSON::success(array('Message' => 'Saved successfully'));
return true;
