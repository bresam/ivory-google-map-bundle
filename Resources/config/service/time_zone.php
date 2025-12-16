<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container) {
    $services = $container->services();

    $services->set('ivory.google_map.time_zone', \Ivory\GoogleMap\Service\TimeZone\TimeZoneService::class);
};
