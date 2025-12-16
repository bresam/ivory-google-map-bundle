<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container) {
    $services = $container->services();

    $services->set('ivory.google_map.helper.formatter', \Ivory\GoogleMap\Helper\Formatter\Formatter::class);

    $services->set('ivory.google_map.helper.json_builder', \Ivory\GoogleMap\Helper\Builder\JsonBuilder::class);
};
