# Indigo Database Backup

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Packagist Version](https://img.shields.io/packagist/v/indigophp/database-backup.svg?style=flat-square)](https://packagist.org/packages/indigophp/database-backup)
[![Total Downloads](https://img.shields.io/packagist/dt/indigophp/database-backup.svg?style=flat-square)](https://packagist.org/packages/indigophp/database-backup)

**Simple database backup script using [Phake](https://github.com/jaz303/phake) and [Backup Manager](https://github.com/heybigname/backup-manager).**


## Install

Via Composer

``` json
{
    "require": {
        "indigophp/database-backup": "@stable"
    }
}
```

## Usage

1. Setup your storages, databases and environments in `config/{storage,database,config}.php`. See examples in the [examples](examples/) folder.
2. Install required filesystem dependencies based on your storage setup.
3. Run `bin/phake backup env=ENVIRONMENT`.

(Currently only the backup feature is implemented, the restore is not. This means that a change in the API is expectable when it gets implemented.)


## Contributing

Please see [CONTRIBUTING](https://github.com/indigophp/database-backup/blob/develop/CONTRIBUTING.md) for details.


## Credits

- [Márk Sági-Kazár](https://github.com/sagikazarmark)
- [All Contributors](https://github.com/indigophp/database-backup/contributors)


## License

The MIT License (MIT). Please see [License File](https://github.com/indigophp/database-backup/blob/develop/LICENSE) for more information.
