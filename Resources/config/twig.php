<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container) {
    $services = $container->services();

    $services->set('ivory.google_map.twig.extension.api', \Ivory\GoogleMapBundle\Twig\ApiExtension::class)
        ->args([service('ivory.google_map.helper.api')])
        ->tag('twig.extension');

    $services->set('ivory.google_map.twig.extension.map', \Ivory\GoogleMapBundle\Twig\MapExtension::class)
        ->args([service('ivory.google_map.helper.map')])
        ->tag('twig.extension');

    $services->set('ivory.google_map.twig.extension.map.static', \Ivory\GoogleMapBundle\Twig\StaticMapExtension::class)
        ->args([service('ivory.google_map.helper.map.static')])
        ->tag('twig.extension');

    $services->set('ivory.google_map.twig.extension.place_autocomplete', \Ivory\GoogleMapBundle\Twig\PlaceAutocompleteExtension::class)
        ->args([service('ivory.google_map.helper.place_autocomplete')])
        ->tag('twig.extension');
};
