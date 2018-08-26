# A tool to let user's update their profile in Laravel Nova

[![Latest Version on Packagist](https://img.shields.io/packagist/v/runlinenl/nova-profile-tool.svg?style=flat-square)](https://packagist.org/packages/runlinenl/nova-profile-tool)
[![Total Downloads](https://img.shields.io/packagist/dt/runlinenl/nova-profile-tool.svg?style=flat-square)](https://packagist.org/packages/runlinenl/nova-profile-tool)


When this tool is added to Nova, you can let users update their profile data without giving them access to the full
User resource under 'Resources'.

Add a screenshot of the tool here.

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require runlinenl/nova-profile-tool
```

Next up, you must register the tool with Nova. This is typically done in the `tools` method of the `NovaServiceProvider`.

```php
// in app/Providers/NovaServiceProvider.php

// ...

public function tools()
{
    return [
        // ...
        new \Runline\ProfileTool\Tool(),
    ];
}
```

## Usage

Click on the "Profile" menu item in your Nova app to see the tool provided by this package.

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email patrick@runline.nl instead of using the issue tracker.

## Credits

- [Patrick Bergman](https://github.com/patrickbergman)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
