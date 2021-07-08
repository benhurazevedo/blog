<?php
$AppConfig = [
	'settings' => [
		'displayErrorDetails' => true
        ,'BASE_URL' => '/'
        ,'ldapConfig' => [
			'hostLdap'	=>	['corp.caixa.gov.br'], 'baseDN'	=>	'OU=Usuarios,OU=CAIXA,DC=corp,DC=caixa,DC=gov,DC=br'
		]
        ,'doctrine' => [
            'conn' => [
                "driver" => "pdo_sqlite",
                "path" => __DIR__."\db.sqlite"
            ]
            ,'models' => [
                __DIR__."\models"
            ]
            ,'isDevMode' => true 
            ,'proxyDir' => null 
            ,'cache' => null 
            ,'useSimpleAnnotationReader' => false
        ]
        ,'twig' => [
            'templates-folder' => 'views'
            ,'cache' => 'cache/twig'
            ,'debug' => true
        ]
	]
];