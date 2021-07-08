<?php 
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
require_once "config.php";

require_once "vendor/autoload.php";

$config = Setup::createAnnotationMetadataConfiguration(
	$AppConfig['settings']['doctrine']['models'],
	$AppConfig['settings']['doctrine']['isDevMode'],
	$AppConfig['settings']['doctrine']['proxyDir'], 
	$AppConfig['settings']['doctrine']['cache'],
	$AppConfig['settings']['doctrine']['useSimpleAnnotationReader']
	);

    $conn = $AppConfig['settings']['doctrine']['conn'];

    $entityManager = EntityManager::create($conn, $config);