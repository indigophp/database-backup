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
use League\CLImate\CLImate;
use phake\Application;

require __DIR__.'/vendor/autoload.php';

/**
 * Initialize application
 *
 * Hide it from the world
 */
hide();
task('init', function(Application $app) {
    // Initialize CLImate
    $app['climate'] = new CLImate;

    // Check config path
    if (empty($app['config_path']) and ($app['config_path'] = getenv('CONFIG_PATH')) === false) {
        $app['config_path'] = __DIR__.'/config';
    }

    $app['config_path'] = rtrim($app['config_path'], '/');

    $app['config'] = Config::fromPhpFile($app['config_path'].'/config.php');
    $app['database'] = Config::fromPhpFile($app['config_path'].'/database.php');
    $app['storage'] = Config::fromPhpFile($app['config_path'].'/storage.php');
});

group('list', function() {
    desc('List defined databases');
    task('database', 'init', function($app) {
        $database = [
            [
                'name',
                'type',
                'database',
            ]
        ];

        foreach ($app['database']->getItems() as $name => $config) {
            $database[] = [
                $name,
                $config['type'],
                $config['database'],
            ];
        }

        $app['climate']->table($database);
    });

    desc('List defined storages');
    task('storage', 'init', function($app) {
        $storage = [
            [
                'name',
                'type',
            ]
        ];

        foreach ($app['storage']->getItems() as $name => $config) {
            $storage[] = [
                $name,
                $config['type'],
            ];
        }

        $app['climate']->table($storage);
    });

    desc('List defined environments');
    task('environment', 'init', function($app) {
        $environment = [
            [
                'name',
                'database',
                'storage',
                'compression',
            ]
        ];

        foreach ($app['config']->getItems() as $name => $config) {
            $environment[] = [
                $name,
                $config['database'],
                $config['storage'],
                $config['compression'],
            ];
        }

        $app['climate']->table($environment);
    });
});

hide();
desc('Loads environment');
task('env', 'init', function($app) {
    // Check env
    if (empty($app['env']) and $app['env'] = getenv('ENV') === false) {
        $input = $app['climate']->input('<blue>Please choose an environment:</blue>');
        $input->accept(array_keys($app['config']->getItems()));
        $app['env'] = $input->prompt();
    }
});

hide();
desc('Loads manager');
task('manager', 'env', function($app) {
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
    $app['manager'] = new Manager($filesystems, $databases, $compressors);
});

desc('Run database backups');
task('backup', 'manager', function($app) {
    $app['manager']->makeBackup()->run(
        $app['config']->get($app['env'], 'database'),
        $app['config']->get($app['env'], 'storage'),
        $app['config']->get($app['env'], 'destination'),
        $app['config']->get($app['env'], 'compression')
    );
});
