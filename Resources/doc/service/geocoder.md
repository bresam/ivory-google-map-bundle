# Geocoder

Geocoding is the process of converting addresses (like "1600 Amphitheatre Parkway, Mountain View, CA") into geographic
coordinates (like latitude 37.423021 and longitude -122.083739), which you can use to place markers or position the map.
Additionally, the service allows you to perform the converse operation (turning coordinates into addresses). This
process is known as "reverse geocoding".

## Dependencies

The Geocoder API requires an [PSR-18](https://www.php-fig.org/psr/psr-18/) http client and a serializer. Any PSR-18
http client library is suitable, [HttpClient](https://github.com/symfony/http-client) is a popular and steady choice nowadays.
And the [Ivory Serializer](https://github.com/egeloen/ivory-serializer) which is an advanced (de)-serialization library.

To install them, read this [documentation](/Resources/doc/installation.md).

## Configuration

By default, the geocoder service is disabled. In order to enable the service, you need to configure it.

### Http client and message factory

The http client and message factory are mandatory. They define which http client and message factory the geocoder 
service will use for issuing http requests.
 
Configure the Google Map bundle:

``` yaml
ivory_google_map:
    geocoder:
        client: psr18.http_client
        request_factory: nyholm.psr7.psr17_factory
```

### Format

The format allows you to use json/xml format for your http request:

``` yaml
ivory_google_map:
    geocoder:
        format: json
```

### Api key

The API key allows you to bypass Google limitation according to your account plan:

``` yaml
ivory_google_map:
    geocoder:
        api_key: ~
```

### Business account

The business account allows you to use Google Premium account:

``` yaml
ivory_google_map:
    geocoder:
        business_account:
            client_id: ~
            secret: ~
            channel: ~
```

## Usage

Once you have configured your geocoder service, you can fetch it from the container and use it as explained in the 
[documentation](https://github.com/egeloen/ivory-google-map/blob/master/doc/service/geocoder/geocoder.md)

``` php
$request = '1600 Amphitheatre Parkway, Mountain View, CA';
$response = $this->container->get('ivory.google_map.geocoder')->geocode($request);
```
