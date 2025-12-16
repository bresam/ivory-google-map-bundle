<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container) {
    $services = $container->services();

    $services->set('ivory.google_map.form.type.place_autocomplete', \Ivory\GoogleMapBundle\Form\Type\PlaceAutocompleteType::class)
        ->tag('form.type');
};
