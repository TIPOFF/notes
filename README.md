# Notes

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tipoff/notes.svg?style=flat-square)](https://packagist.org/packages/tipoff/notes)
![Tests](https://github.com/tipoff/notes/workflows/Tests/badge.svg)
[![Total Downloads](https://img.shields.io/packagist/dt/tipoff/notes.svg?style=flat-square)](https://packagist.org/packages/tipoff/notes)

This is where your description should go.

## Installation

You can install the package via composer:

```bash
composer require tipoff/notes
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Tipoff\Notes\NotesServiceProvider" --tag="migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Tipoff\Notes\NotesServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$Notes = new Tipoff\Notes();
echo $Notes->echoPhrase('Hello, Tipoff!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Tipoff](https://github.com/tipoff)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
