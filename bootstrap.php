<?php

/*
 * This file is part of the Indigo Backup package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use BigName\BackupManager\Config\Config;
use BigName\BackupManager\Filesystems;
use BigName\BackupManager\Databases;
use BigName\BackupManager\Compressors;
use BigName\BackupManager\Manager;

if (!isset($app)) {
	throw new RuntimeException('Bootstrap file must be used with a phake task');
}

// build providers
$filesystems = new Filesystems\FilesystemProvider($app['storage']);
$filesystems->add(new Filesystems\Awss3Filesystem);
$filesystems->add(new Filesystems\DropboxFilesystem);
$filesystems->add(new Filesystems\FtpFilesystem);
$filesystems->add(new Filesystems\LocalFilesystem);
$filesystems->add(new Filesystems\RackspaceFilesystem);
$filesystems->add(new Filesystems\SftpFilesystem);

$databases = new Databases\DatabaseProvider($app['database']);
$databases->add(new Databases\MysqlDatabase);
$databases->add(new Databases\PostgresqlDatabase);

$compressors = new Compressors\CompressorProvider;
$compressors->add(new Compressors\GzipCompressor);
$compressors->add(new Compressors\NullCompressor);

// build manager
return new Manager($filesystems, $databases, $compressors);
