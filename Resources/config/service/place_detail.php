<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container) {
    $services = $container->services();

    $services->set('ivory.google_map.place_detail', \Ivory\GoogleMap\Service\Place\Detail\PlaceDetailService::class);
};
