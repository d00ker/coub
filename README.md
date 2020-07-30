# PHP library for working with Coub API

[![Latest Stable Version](https://poser.pugx.org/d00ker/coub/v/stable.svg)](https://packagist.org/packages/d00ker/coub)
[![Total Downloads](https://poser.pugx.org/d00ker/coub/downloads.svg)](https://packagist.org/packages/d00ker/coub)
[![License](https://poser.pugx.org/d00ker/coub/license.svg)](https://packagist.org/packages/d00ker/coub)

## Getting Started

### Installing

You can install the library via [Composer](https://getcomposer.org). Run the following command:
```bash
composer require d00ker/coub
```

### Usage

Simple usage looks like:
```php
$Coub = new Coub($token);
$hotCoubs = $Coub->timeline->getHot();
```

## Built With
* [Coub API](https://coub.com/dev/docs/Coub+API%2FOverview) — of course
* [Guzzle](https://github.com/guzzle/guzzle) — PHP HTTP client
* [PHPUnit](https://github.com/sebastianbergmann/phpunit) — Programmer-oriented testing framework for PHP

## Versioning

I'm use [SemVer](https://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/d00ker/coub/tags).

## License

This library is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments
* [@stripe](https://github.com/stripe/) for Service Abstract Factory template
* [@PurpleBooth](https://gist.github.com/PurpleBooth/) for nice README template :metal: