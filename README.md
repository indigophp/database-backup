# Indigo Backup

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Packagist Version](https://img.shields.io/packagist/v/indigophp/backup.svg?style=flat-square)](https://packagist.org/packages/indigophp/backup)
[![Total Downloads](https://img.shields.io/packagist/dt/indigophp/backup.svg?style=flat-square)](https://packagist.org/packages/indigophp/backup)

**Simple database backup script from Phake and Backup Manager.**


## Install

Via Composer

``` json
{
    "require": {
        "indigophp/backup": "@stable"
    }
}
```

## Usage

1. Setup your storages, databases and environments in `config/{storage,database,environment}.php`. See examples in the [examples](examples/) folder.
2. Install required filesystem dependencies based on your storage setup.
3. Run `bin/phake db ENVIRONMENT`.

(Currently only the backup feature is implemented, the restore is not. This means that a change in the API is expectable when it gets implemented.)


## Contributing

Please see [CONTRIBUTING](https://github.com/indigophp/backup/blob/develop/CONTRIBUTING.md) for details.


## Credits

- [Márk Sági-Kazár](https://github.com/sagikazarmark)
- [All Contributors](https://github.com/indigophp/backup/contributors)


## License

The MIT License (MIT). Please see [License File](https://github.com/indigophp/backup/blob/develop/LICENSE) for more information.
