<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container) {
    $services = $container->services();

    $services->set('ivory.google_map.direction', \Ivory\GoogleMap\Service\Direction\DirectionService::class);
};
