# Newsletter Module for Adminetic Admin Panel

![Adminetic Newsletter Module](https://github.com/pratiksh404/adminetic-newsletter/blob/main/screenshots/banner.png)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/adminetic/newsletter.svg?style=flat-square)](https://packagist.org/packages/adminetic/newsletter)

[![Stars](https://img.shields.io/github/stars/pratiksh404/adminetic-newsletter)](https://github.com/pratiksh404/adminetic-newsletter/stargazers) [![Downloads](https://img.shields.io/packagist/dt/adminetic/newsletter.svg?style=flat-square)](https://packagist.org/packages/adminetic/newsletter) [![StyleCI](https://github.styleci.io/repos/385822775/shield?branch=main)](https://github.styleci.io/repos/385822775?branch=main) [![License](https://img.shields.io/github/license/pratiksh404/adminetic-newsletter)](//packagist.org/packages/adminetic/newsletter)

Newsletter module for Adminetic Admin Panel

For detailed documentation visit [Adminetic Newsletter Module Documentation](https://app.gitbook.com/@pratikdai404/s/adminetic/addons/newsletter)

## Install

```bash
composer require adminetic/newsletter
```

#### Publish Resources
```bas
php artisan vendor:publish --tag=newsletter-config
php artisan vendor:publish --tag=newsletter-migrations
```


## Uses

#### Display Subscriber Panel
```
@livewire('subscriber-panel')
```
#### Subscribe and unsubscribe an email
```
subscribe('johndoe@test.com'); //subscribe
unsubscribe('johndoe@test.com'); //unsubscribe
```

#### Subscribe Model Methods
```
$subscriber = Adminetic\Newsletter\Models\Admin\Subscriber::first();
$subscriber->subscribe();
$subscriber->unsubscribe();
$subscriber->verify();
$subscriber->unverify();
```

#### Subscribe Verification Email
Note : Only works when config `newsletter.subscription_mail` is set to `true`
```
$subscriber = Adminetic\Newsletter\Models\Admin\Subscriber::first();
$subscriber->send_subscription_notification_email()
```


### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email pratikdai404@gmail.com instead of using the issue tracker.

## Credits

- [Pratik Shrestha](https://github.com/adminetic)
- [Laravel Excel](https://laravel-excel.com/)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Screenshots

![Newsletter Panel](https://github.com/pratiksh404/adminetic-newsletter/blob/main/screenshots/panel.jpg)

![Unsubscribe Panel](https://github.com/pratiksh404/adminetic-newsletter/blob/main/screenshots/unsubscribe.jpg)


