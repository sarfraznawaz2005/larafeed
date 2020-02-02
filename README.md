[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](license.md)
[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]

# LaraFeed

A package to present feedback dialog on pages so users can send feedback. LaraFeed also captures page's screenshot and saves that too which can be useful especially when debugging what was user experiencing when they sent a feedback. 

## Requirements ##

 - PHP >= 7
 - Laravel 5.7+ | 6

## Installation ##

Install via composer

```
composer require sarfraznawaz2005/larafeed
```

Publish package's config file by running below command:

```bash
php artisan vendor:publish --provider="Sarfraznawaz2005\LaraFeed\ServiceProvider"
```
It should publish `config/larafeed.php` config file and migration file.

Now run `php artisan migrate` to create `larafeeds` database table.

That's it, Feedback button should now be visible on pages of your application.

Checkout config file for different options.

---

## Screenshot ##

![Main Window](https://github.com/sarfraznawaz2005/larafeed/blob/master/screenshot.png?raw=true)

## Security

If you discover any security related issues, please email sarfraznawaz2005@gmail.com instead of using the issue tracker.

## Credits

- [Sarfraz Ahmed][link-author]
- [All Contributors][link-contributors]

## License

Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/sarfraznawaz2005/larafeed.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/sarfraznawaz2005/larafeed.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/sarfraznawaz2005/larafeed
[link-downloads]: https://packagist.org/packages/sarfraznawaz2005/larafeed
[link-author]: https://github.com/sarfraznawaz2005
[link-contributors]: https://github.com/sarfraznawaz2005/larafeed/graphs/contributors
