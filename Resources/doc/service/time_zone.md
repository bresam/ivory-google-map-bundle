# Time Zone

The Google Maps Time Zone API provides a simple interface to request the time zone for a location on the earth, as well 
as that location's time offset from UTC.

## Dependencies

The Time Zone API requires an [PSR-18](https://www.php-fig.org/psr/psr-18/) http client and a serializer. Any PSR-18
http client library is suitable, [HttpClient](https://github.com/symfony/http-client) is a popular and steady choice nowadays.
And the [Ivory Serializer](https://github.com/egeloen/ivory-serializer) which is an advanced (de)-serialization library.

To install them, read this [documentation](/Resources/doc/installation.md).

## Configuration

By default, the time zone service is disabled. In order to enable the service, you need to configure it.

### Http client and message factory

The http client and message factory are mandatory. They define which http client and message factory the time zone 
service will use for issuing http requests.
 
Configure the Google Map bundle:

``` yaml
ivory_google_map:
    time_zone:
        client: psr18.http_client
        request_factory: nyholm.psr7.psr17_factory
```

### Format

The format allows you to use json/xml format for your http request:

``` yaml
ivory_google_map:
    time_zone:
        format: json
```

### Api key

The API key allows you to bypass Google limitation according to your account plan:

``` yaml
ivory_google_map:
    time_zone:
        api_key: ~
```

### Business account

The business account allows you to use Google Premium account:

``` yaml
ivory_google_map:
    time_zone:
        business_account:
            client_id: ~
            secret: ~
            channel: ~
```

## Usage

Once you have configured your time zone service, you can fetch it from the container and use it as explained in the 
[documentation](https://github.com/egeloen/ivory-google-map/blob/master/doc/service/time_zone/time_zone.md)

``` php
use Ivory\GoogleMap\Base\Coordinate;
use Ivory\GoogleMap\Service\TimeZone\TimeZoneRequest;

$request = new TimeZoneRequest(
   new Coordinate(39.6034810, -119.6822510),
   new \DateTime('@1331161200')
);

$response = $this->container->get('ivory.google_map.time_zone')->process($request);
```
