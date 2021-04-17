# codekandis/tiphy-authentication-integration

[![Version][xtlink-version-badge]][srclink-changelog]
[![License][xtlink-license-badge]][srclink-license]
[![Minimum PHP Version][xtlink-php-version-badge]][xtlink-php-net]
![Code Coverage][xtlink-code-coverage-badge]

This library is an integration of [`codekandis/authentication`][xtlink-github-codekandis-authentication] into [`codekandis/tiphy`][xtlink-github-codekandis-tiphy].

## Index

* [Installation](#installation)
* [How to use](#how-to-use)

## Installation

Install the latest version with

```bash
$ composer require codekandis/tiphy-authentication-integration
```

## How to use

Just inject the [`AuthorizationHeaderKeyAuthenticationPreDispatcher`][srclink-authorization-header-key-authentication-pre-dispatcher] into the [`ActionDispatcher`][xtlink-github-codekandis-tiphy-action-dispatcher].

```php
<?php declare( strict_types = 1 );
namespace Vendor\Project;

use CodeKandis\Tiphy\Actions\ActionDispatcher;
use CodeKandis\TiphyAuthenticationIntegration\Actions\PreDispatchment\Api\AuthorizationHeaderKeyAuthenticationPreDispatcher;

$routesConfiguration = /** ... */;
$throwableHandler    = /** ... */;
$usersRepository     = /** ... */;
$preDispatcher       = new AuthorizationHeaderKeyAuthenticationPreDispatcher( $usersRepository );

$actionDispatcher = new ActionDispatcher( $routesConfiguration, $preDispatcher, $throwableHandler );
$actionDispatcher->dispatch();
```


[xtlink-version-badge]: https://img.shields.io/badge/version-0.4.0-blue.svg
[xtlink-license-badge]: https://img.shields.io/badge/license-MIT-yellow.svg
[xtlink-php-version-badge]: https://img.shields.io/badge/php-%3E%3D%207.4-8892BF.svg
[xtlink-code-coverage-badge]: https://img.shields.io/badge/coverage-0%25-red.svg
[xtlink-php-net]: https://php.net
[xtlink-github-codekandis-authentication]: https://github.com/codekandis/authentication
[xtlink-github-codekandis-tiphy]: https://github.com/codekandis/tiphy
[xtlink-github-codekandis-tiphy-action-dispatcher]: https://github.com/codekandis/tiphy/blob/master/src/Actions/ActionDispatcher.php

[srclink-changelog]: ./CHANGELOG.md
[srclink-license]: ./LICENSE
[srclink-authorization-header-key-authentication-pre-dispatcher]: ./src/Actions/PreDispatchment/Api/AuthorizationHeaderKeyAuthenticationPreDispatcher.php
