<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container) {
    $services = $container->services();

    $services->set('ivory.google_map.place_photo', \Ivory\GoogleMap\Service\Place\Photo\PlacePhotoService::class);
};
