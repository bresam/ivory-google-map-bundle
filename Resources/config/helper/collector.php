<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container) {
    $services = $container->services();

    $services->set('ivory.google_map.helper.collector.base.bound', \Ivory\GoogleMap\Helper\Collector\Base\BoundCollector::class)
        ->args([
            service('ivory.google_map.helper.collector.overlay.ground_overlay'),
            service('ivory.google_map.helper.collector.overlay.rectangle'),
        ]);

    $services->set('ivory.google_map.helper.collector.base.coordinate', \Ivory\GoogleMap\Helper\Collector\Base\CoordinateCollector::class)
        ->args([
            service('ivory.google_map.helper.collector.base.bound'),
            service('ivory.google_map.helper.collector.overlay.circle'),
            service('ivory.google_map.helper.collector.overlay.info_window'),
            service('ivory.google_map.helper.collector.overlay.marker'),
            service('ivory.google_map.helper.collector.overlay.polygon'),
            service('ivory.google_map.helper.collector.overlay.polyline'),
            service('ivory.google_map.helper.collector.layer.heatmap'),
        ]);

    $services->set('ivory.google_map.helper.collector.base.point', \Ivory\GoogleMap\Helper\Collector\Base\PointCollector::class)
        ->args([service('ivory.google_map.helper.collector.overlay.marker')]);

    $services->set('ivory.google_map.helper.collector.base.size', \Ivory\GoogleMap\Helper\Collector\Base\SizeCollector::class)
        ->args([
            service('ivory.google_map.helper.collector.overlay.info_window'),
            service('ivory.google_map.helper.collector.overlay.icon'),
        ]);

    $services->set('ivory.google_map.helper.collector.control.custom', \Ivory\GoogleMap\Helper\Collector\Control\CustomControlCollector::class);

    $services->set('ivory.google_map.helper.collector.event.dom_event', \Ivory\GoogleMap\Helper\Collector\Event\DomEventCollector::class);

    $services->set('ivory.google_map.helper.collector.event.dom_event_once', \Ivory\GoogleMap\Helper\Collector\Event\DomEventOnceCollector::class);

    $services->set('ivory.google_map.helper.collector.event.event', \Ivory\GoogleMap\Helper\Collector\Event\EventCollector::class);

    $services->set('ivory.google_map.helper.collector.event.event_once', \Ivory\GoogleMap\Helper\Collector\Event\EventOnceCollector::class);

    $services->set('ivory.google_map.helper.collector.layer.geo_json', \Ivory\GoogleMap\Helper\Collector\Layer\GeoJsonLayerCollector::class);

    $services->set('ivory.google_map.helper.collector.layer.heatmap', \Ivory\GoogleMap\Helper\Collector\Layer\HeatmapLayerCollector::class);

    $services->set('ivory.google_map.helper.collector.layer.kml', \Ivory\GoogleMap\Helper\Collector\Layer\KmlLayerCollector::class);

    $services->set('ivory.google_map.helper.collector.overlay.circle', \Ivory\GoogleMap\Helper\Collector\Overlay\CircleCollector::class);

    $services->set('ivory.google_map.helper.collector.overlay.encoded_polyline', \Ivory\GoogleMap\Helper\Collector\Overlay\EncodedPolylineCollector::class);

    $services->set('ivory.google_map.helper.collector.overlay.extendable', \Ivory\GoogleMap\Helper\Collector\Overlay\ExtendableCollector::class);

    $services->set('ivory.google_map.helper.collector.overlay.ground_overlay', \Ivory\GoogleMap\Helper\Collector\Overlay\GroundOverlayCollector::class);

    $services->set('ivory.google_map.helper.collector.overlay.icon', \Ivory\GoogleMap\Helper\Collector\Overlay\IconCollector::class)
        ->args([service('ivory.google_map.helper.collector.overlay.marker')]);

    $services->set('ivory.google_map.helper.collector.overlay.icon_sequence', \Ivory\GoogleMap\Helper\Collector\Overlay\IconSequenceCollector::class)
        ->args([service('ivory.google_map.helper.collector.overlay.polyline')]);

    $services->set('ivory.google_map.helper.collector.overlay.info_box', \Ivory\GoogleMap\Helper\Collector\Overlay\InfoBoxCollector::class)
        ->args([service('ivory.google_map.helper.collector.overlay.marker')]);

    $services->set('ivory.google_map.helper.collector.overlay.info_window', \Ivory\GoogleMap\Helper\Collector\Overlay\InfoWindowCollector::class)
        ->args([service('ivory.google_map.helper.collector.overlay.marker')]);

    $services->set('ivory.google_map.helper.collector.overlay.info_window.default', \Ivory\GoogleMap\Helper\Collector\Overlay\DefaultInfoWindowCollector::class)
        ->args([service('ivory.google_map.helper.collector.overlay.marker')]);

    $services->set('ivory.google_map.helper.collector.overlay.marker', \Ivory\GoogleMap\Helper\Collector\Overlay\MarkerCollector::class);

    $services->set('ivory.google_map.helper.collector.overlay.marker_shape', \Ivory\GoogleMap\Helper\Collector\Overlay\MarkerShapeCollector::class)
        ->args([service('ivory.google_map.helper.collector.overlay.marker')]);

    $services->set('ivory.google_map.helper.collector.overlay.polygon', \Ivory\GoogleMap\Helper\Collector\Overlay\PolygonCollector::class);

    $services->set('ivory.google_map.helper.collector.overlay.polyline', \Ivory\GoogleMap\Helper\Collector\Overlay\PolylineCollector::class);

    $services->set('ivory.google_map.helper.collector.overlay.rectangle', \Ivory\GoogleMap\Helper\Collector\Overlay\RectangleCollector::class);

    $services->set('ivory.google_map.helper.collector.overlay.symbol', \Ivory\GoogleMap\Helper\Collector\Overlay\SymbolCollector::class)
        ->args([
            service('ivory.google_map.helper.collector.overlay.marker'),
            service('ivory.google_map.helper.collector.overlay.icon_sequence'),
        ]);

    $services->set('ivory.google_map.helper.collector.place.autocomplete.base.bound', \Ivory\GoogleMap\Helper\Collector\Place\Base\AutocompleteBoundCollector::class);

    $services->set('ivory.google_map.helper.collector.place.autocomplete.base.coordinate', \Ivory\GoogleMap\Helper\Collector\Place\Base\AutocompleteCoordinateCollector::class)
        ->args([service('ivory.google_map.helper.collector.place.autocomplete.base.bound')]);

    $services->set('ivory.google_map.helper.collector.place.autocomplete.event.dom_event', \Ivory\GoogleMap\Helper\Collector\Place\Event\AutocompleteDomEventCollector::class);

    $services->set('ivory.google_map.helper.collector.place.autocomplete.event.dom_event_once', \Ivory\GoogleMap\Helper\Collector\Place\Event\AutocompleteDomEventOnceCollector::class);

    $services->set('ivory.google_map.helper.collector.place.autocomplete.event.event', \Ivory\GoogleMap\Helper\Collector\Place\Event\AutocompleteEventCollector::class);

    $services->set('ivory.google_map.helper.collector.place.autocomplete.event.event_once', \Ivory\GoogleMap\Helper\Collector\Place\Event\AutocompleteEventOnceCollector::class);

    $services->set('ivory.google_map.helper.collector.static.encoded_polyline', \Ivory\GoogleMap\Helper\Collector\Image\EncodedPolylineCollector::class);

    $services->set('ivory.google_map.helper.collector.static.extendable', \Ivory\GoogleMap\Helper\Collector\Image\ExtendableCollector::class);

    $services->set('ivory.google_map.helper.collector.static.marker', \Ivory\GoogleMap\Helper\Collector\Image\MarkerCollector::class)
        ->args([service('ivory.google_map.helper.renderer.static.overlay.marker.style')]);

    $services->set('ivory.google_map.helper.collector.static.polyline', \Ivory\GoogleMap\Helper\Collector\Image\PolylineCollector::class);
};
