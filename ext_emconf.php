<?php

$EM_CONF['jar_pugtemplate'] = array(
	'title' => 'PUG Template',
	'description' => 'Tools for rendering PUG templates in TYPO3',
	'category' => 'plugin',
	'author' => 'invokable GmbH',
	'author_email' => 'info@invokable.gmbh',
	'version' => '1.0.10',
	'state' => 'stable',
	'internal' => '',
	'uploadfolder' => '0',
	'createDirs' => '',
	'clearCacheOnLoad' => 0,
	'constraints' => array(
		'depends' => array(
			'typo3' => '10.4.1-11.5.99',
			'jar_utilities' => '1.0.0-1.0.99'
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
);
