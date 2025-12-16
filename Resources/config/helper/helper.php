<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container) {
    $services = $container->services();

    $services->set('ivory.google_map.helper.api', \Ivory\GoogleMap\Helper\ApiHelper::class)
        ->args([service('ivory.google_map.helper.api.event_dispatcher')]);

    $services->set('ivory.google_map.helper.api.event_dispatcher', \Symfony\Component\EventDispatcher\EventDispatcher::class);

    $services->set('ivory.google_map.helper.map', \Ivory\GoogleMap\Helper\MapHelper::class)
        ->args([service('ivory.google_map.helper.map.event_dispatcher')]);

    $services->set('ivory.google_map.helper.map.event_dispatcher', \Symfony\Component\EventDispatcher\EventDispatcher::class);

    $services->set('ivory.google_map.helper.map.static', \Ivory\GoogleMap\Helper\StaticMapHelper::class)
        ->args([service('ivory.google_map.helper.map.static.event_dispatcher')]);

    $services->set('ivory.google_map.helper.map.static.event_dispatcher', \Symfony\Component\EventDispatcher\EventDispatcher::class);

    $services->set('ivory.google_map.helper.place_autocomplete', \Ivory\GoogleMap\Helper\PlaceAutocompleteHelper::class)
        ->args([service('ivory.google_map.helper.place_autocomplete.event_dispatcher')]);

    $services->set('ivory.google_map.helper.place_autocomplete.event_dispatcher', \Symfony\Component\EventDispatcher\EventDispatcher::class);
};
