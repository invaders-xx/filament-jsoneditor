
# JSON Editor form's input for the great Filament package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/invaders-xx/filament-jsoneditor.svg?style=flat-square)](https://packagist.org/packages/invaders-xx/filament-jsoneditor)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/invaders-xx/filament-jsoneditor/run-tests?label=tests)](https://github.com/invaders-xx/filament-jsoneditor/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/invaders-xx/filament-jsoneditor/Check%20&%20fix%20styling?label=code%20style)](https://github.com/invaders-xx/filament-jsoneditor/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/invaders-xx/filament-jsoneditor.svg?style=flat-square)](https://packagist.org/packages/invaders-xx/filament-jsoneditor)

If you need to have a JSON Editor field within your form. You have it !

<img width="1863" alt="image" src="https://user-images.githubusercontent.com/604907/160436321-9ff47bb8-28a2-45af-98fe-a57802236178.png">

## Installation

You can install the package via composer:

```bash
composer require invaders-xx/filament-jsoneditor
```

```bash
php artisan vendor:publish --tag="filament-jsoneditor-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
\InvadersXX\FilamentJsoneditor\Forms\JSONEditor::make('editor');
```
## Options

No options yet implemented.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [David Vincent](https://github.com/invaders-xx)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
