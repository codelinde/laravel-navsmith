# Navsmith

[![Latest Version on Packagist](https://img.shields.io/packagist/v/codelinde/laravel-navsmith.svg?style=flat-square)](https://packagist.org/packages/codelinde/laravel-navsmith)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/codelinde/laravel-navsmith/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/codelinde/laravel-navsmith/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/codelinde/laravel-navsmith/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/codelinde/laravel-navsmith/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/codelinde/laravel-navsmith.svg?style=flat-square)](https://packagist.org/packages/codelinde/navsmith)

**Navsmith** is a lightweight, unintrusive Laravel package for easily creating navigation links out of routes you
define. It's particularly useful for SPA-like sites.

[Why did I build this?](https://ryanlinde.dev/posts/introducing-navsmith)

## Usage

Just define your routes using the `navsmith` method and give them route names you'd like to use in your display...

```php
Route::navsmith(function () {
    Route::get('/', Welcome::class)->name('home');
    Route::get('/about', About::class)->name('about');
    Route::get('/contact', Contact::class)->name('contact');
});
```

Include the `x-navsmith` Blade component...

```html

<ul>
    <x-navsmith/>
</ul>
```

And you get display-ready HTML links.

```html

<ul>
    <li><a href="https://mysite.com">Home</a>
    </li>
    <li><a href="https://mysite.com/about">About</a>
    </li>
    <li><a href="https://mysite.com/contact">Contact</a>
    </li>
</ul>
```

Using the `current` attribute on the component, you can give the links different styling according to whether
they are the currently-visited page (either CSS styles or class-based styles) and get a SPA-like experience:

**Class-based styles (e.g. [TailwindCSS](https://tailwindcss.com/))**

```html
<!-- This... -->
<x-navsmith class="text-black" current="font-bold"/>

<!-- Will render the link corresponding to the current page, like this... -->
<a href="https://mysite.com" class="text-black font-bold">Home</a>
```

**CSS styles**

```html
<!-- This... -->
<x-navsmith style="color: rgb(0 0 0);" current="font-weight: 700;"/>

<!-- Will render the link corresponding to the current page, like this... -->
<a href="https://mysite.com" style="color: rgb(0 0 0); font-weight: 700;">Home</a>
```

You can also pass through any attributes to your links. This is particularly useful if you're
using [Livewire](https://livewire.laravel.com) and want to take advantage of its SPA-like navigation features by
using `wire:navigate`.

```html
<!-- This... -->
<x-navsmith wire:navigate/>

<!-- Will render each of your links with the same attribute... -->
<a href="https://mysite.com" wire:navigate>Home</a>
```

Furthermore, a `navsmith_route` helper function is provided so that you can refer to your Navsmith routes elsewhere in
your code without having to remember the specific naming prefix applied.

Given a route definition like this

```php
Route::navsmith(function () {
    Route::get('/a-cumbersome-url', Contact::class)->name('contact');
});
```

And a call to `navsmith_route` like this

```html
<p>Please visit the <a href="{{ navsmith_route('contact') }}">contact page</a> to send us an e-mail.</p>
```

The HTML will render like this

```html
<p>Please visit the <a href="https://mysite.com/a-cumbersome-url">contact page</a> to send us an e-mail.</p>
```

## Requirements

Navsmith requires Laravel 10 or 11 and PHP 8.2+.

## Installation

You can install the package via composer:

```bash
composer require codelinde/navsmith
```

## Customization

You can publish the views to make any desired alterations by running the following command.

```bash
php artisan vendor:publish --tag="navsmith-views"
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ryan Linde](https://github.com/codelinde)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
