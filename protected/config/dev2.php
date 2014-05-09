<?php
return CMap::mergeArray(
    // наследуемся от main.php
    require(dirname(__FILE__).'/main.php'),
    array(
		'modules'=>array(
			// uncomment the following to enable the Gii tool
			'gii'=>array(
				'class'=>'system.gii.GiiModule',
				'password'=>'12345',
				// If removed, Gii defaults to localhost only. Edit carefully to taste.
				'ipFilters'=>array('*'),
			),
		),	
        'components'=>array(
			'db'=>array(
				'connectionString' => 'mysql:host=localhost;dbname=acmMd',
				'emulatePrepare' => true,
				'username' => 'root',
				'password' => '12345',
				'charset' => 'utf8',
				'tablePrefix' => 'a_'
			),
			'db2'=>array(
				'class'=>'system.db.CDbConnection',
				'connectionString' => 'mysql:host=localhost;dbname=acmMdC',
				'emulatePrepare' => true,
				'username' => 'root',
				'password' => '12345',
				'charset' => 'utf8',
				'tablePrefix' => 'c_'
			),
        ),
    )
);