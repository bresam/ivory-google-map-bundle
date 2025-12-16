# Installation

To install the Ivory Google Map bundle, you will need [Composer](https://getcomposer.org).  It's a PHP 5.3+ dependency 
manager which allows you to declare the dependent libraries your project needs and it will install & autoload them for 
you.

## Set up Composer

Composer comes with a simple phar file. To easily access it from anywhere on your system, you can execute:

``` bash
$ curl -s https://getcomposer.org/installer | php
$ sudo mv composer.phar /usr/local/bin/composer
```

## Download the bundle

Require the library in your `composer.json` file:

``` bash
$ composer require ivory/google-map-bundle
```

## Download additional libraries

If you want to use the [Direction](/Resources/doc/service/direction.md), 
[Distance Matrix](/Resources/doc/service/distance_matrix.md), [Elevation](/Resources/doc/service/elevation.md), 
[Geocoder](/Resources/doc/service/geocoder.md), [Place](/Resources/doc/service/place/index.md) or 
[Time Zone](/Resources/doc/service/time_zone.md) services, you will need an [PSR-18](https://www.php-fig.org/psr/psr-18/) 
http client and [PSR-17](https://www.php-fig.org/psr/psr-17/) request factory as well as the
[Ivory Serializer](https://github.com/egeloen/ivory-serializer) which is an advanced (de)-serialization library.

The simplest implementation of PSR compatible libraries is using Symfony's [HttpClient](https://github.com/symfony/http-client)
and a lightweight [PSR-7 library](https://github.com/Nyholm/psr7) by [Tobias Nyholm](https://github.com/Nyholm).
Next to that use the [Ivory Serializer](https://github.com/egeloen/ivory-serializer) bundle, so let's install them to ease our life:

``` bash
$ composer require egeloen/serializer-bundle
$ composer require symfony/http-client
$ composer require nyholm/psr7
```

## Register the bundle

Then, add the bundle in your `AppKernel`:

``` php
// app/AppKernel.php

public function registerBundles()
{
    return [
        // ...
        new Ivory\GoogleMapBundle\IvoryGoogleMapBundle(),
        
        // Optionally
        new Ivory\SerializerBundle\IvorySerializerBundle(),
    ];
}
```

When using the [FrameworkBundle](https://github.com/symfony/framework-bundle) you will have a PSR-18 client service available 
under `psr18.http_client`. Otherwise you would need to create a service definition for the 
`Symfony\Component\HttpClient\Psr18Client` class and use that in the following Google service definitions in this bundle.

The request factory implementation will be available as `nyholm.psr7.psr17_factory` when you use Symfony Flex in your 
project. If not you must add a service definition for `Nyholm\Psr7\Factory\Psr17Factory` to be able to complete the 
configuration.