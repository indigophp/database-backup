<?php

/*
 * This file is part of the Indigo Backup package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [
	'development' => [
		'database'    => 'development',
		'storage'     => 'local',
		'destination' => 'development_'.date('Ymd_His').'.sql',
		'compression' => 'null',
	],
];
