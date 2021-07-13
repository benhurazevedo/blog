<?php 
use \Slim\Views\Twig;
use \SlimSession\Helper;
use \Adldap\Adldap;
use \Slim\Flash\Messages;

$container = $app->getContainer();

$container['entityManager'] = function($container)
{
	global $entityManager;

	return $entityManager;
};

$container['flashMessages'] = function ($container) {
	return new Messages();
};

$container['twig'] = function($container)
{
    $twigSettings = $container->get('settings')['twig'];
    $view = new Twig($twigSettings['templates-folder'], array('cache' => $twigSettings['cache'], 'debug' => $twigSettings['debug']));
	$view->getEnvironment()->addGlobal('flash', $container['flashMessages']);
	$view->getEnvironment()->addGlobal('BASE_URL', $container->get('settings')['BASE_URL']);
	return $view;
};

$container['ldap'] = function ($container) {
	return new Adldap();
};

$container['session'] = function($container)
{
    return new Helper();
};

$container['ldapService'] = function ($container) {
	return new services\LoginService($container, $container['settings']['ldapConfig']);
};
