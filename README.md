# Laravel Globelabs SMS API

This package provides integration with the Globe Labs API. It supports sending sms that suits for ZALORA.

The package simply provides a `Globe` facade that acts as a wrapper to the [globelabs/globe-connect-php](https://github.com/globelabs/globe-connect-php) package.

**NB:** Currently only supports passphrase authentication. Globe Labs API originally using an Oauth2.0 authentication process that requires a token.

You can install this package via Composer using:

```bash
composer require jreyt/laravel-globelabs-sms
```

You must also install the service provider.

```php
// config/app.php
'providers' => [
    ...
    Jreyt\Globelabs\GlobeServiceProvider::class,
    ...
];
```

If you want to make use of the facade you must install it as well.

```php
// config/app.php
'aliases' => [
    ..
    'Globe' => Jreyt\Globelabs\Facades\Globe::class,
];
```

This package is available under the [MIT license](http://opensource.org/licenses/MIT).
