<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container) {
    $services = $container->services();

    $services->set('ivory.google_map.helper.subscriber.abstract', \Ivory\GoogleMap\Helper\Subscriber\AbstractSubscriber::class)
        ->abstract()
        ->args([service('ivory.google_map.helper.formatter')]);

    $services->set('ivory.google_map.helper.subscriber.api_javascript', \Ivory\GoogleMap\Helper\Subscriber\ApiJavascriptSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.renderer.api'),
            service('ivory.google_map.helper.renderer.html.javascript_tag'),
        ])
        ->tag('ivory.google_map.helper.api.subscriber');

    $services->set('ivory.google_map.helper.subscriber.base', \Ivory\GoogleMap\Helper\Subscriber\Base\BaseSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.base.bound', \Ivory\GoogleMap\Helper\Subscriber\Base\BoundSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.base.bound'),
            service('ivory.google_map.helper.renderer.base.bound'),
        ])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.base.coordinate', \Ivory\GoogleMap\Helper\Subscriber\Base\CoordinateSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.base.coordinate'),
            service('ivory.google_map.helper.renderer.base.coordinate'),
        ])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.base.point', \Ivory\GoogleMap\Helper\Subscriber\Base\PointSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.base.point'),
            service('ivory.google_map.helper.renderer.base.point'),
        ])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.base.size', \Ivory\GoogleMap\Helper\Subscriber\Base\SizeSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.base.size'),
            service('ivory.google_map.helper.renderer.base.size'),
        ])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.control', \Ivory\GoogleMap\Helper\Subscriber\Control\ControlSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.control.custom', \Ivory\GoogleMap\Helper\Subscriber\Control\CustomControlSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.control.custom'),
            service('ivory.google_map.helper.renderer.control.custom'),
        ])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.event', \Ivory\GoogleMap\Helper\Subscriber\Event\EventSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.event.dom_event', \Ivory\GoogleMap\Helper\Subscriber\Event\DomEventSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.event.dom_event'),
            service('ivory.google_map.helper.renderer.event.dom_event'),
        ])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.event.dom_event_once', \Ivory\GoogleMap\Helper\Subscriber\Event\DomEventOnceSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.event.dom_event_once'),
            service('ivory.google_map.helper.renderer.event.dom_event_once'),
        ])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.event.event', \Ivory\GoogleMap\Helper\Subscriber\Event\SimpleEventSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.event.event'),
            service('ivory.google_map.helper.renderer.event.event'),
        ])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.event.event_once', \Ivory\GoogleMap\Helper\Subscriber\Event\EventOnceSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.event.event_once'),
            service('ivory.google_map.helper.renderer.event.event_once'),
        ])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.layer', \Ivory\GoogleMap\Helper\Subscriber\Layer\LayerSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.layer.geo_json', \Ivory\GoogleMap\Helper\Subscriber\Layer\GeoJsonLayerSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.layer.geo_json'),
            service('ivory.google_map.helper.renderer.layer.geo_json'),
        ])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.layer.heatmap', \Ivory\GoogleMap\Helper\Subscriber\Layer\HeatmapLayerSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.layer.heatmap'),
            service('ivory.google_map.helper.renderer.layer.heatmap'),
        ])
        ->tag('ivory.google_map.helper.api.subscriber')
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.layer.kml', \Ivory\GoogleMap\Helper\Subscriber\Layer\KmlLayerSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.layer.kml'),
            service('ivory.google_map.helper.renderer.layer.kml'),
        ])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.map', \Ivory\GoogleMap\Helper\Subscriber\MapSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([service('ivory.google_map.helper.renderer.map')])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.map_bound', \Ivory\GoogleMap\Helper\Subscriber\MapBoundSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([service('ivory.google_map.helper.renderer.map_bound')])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.map_center', \Ivory\GoogleMap\Helper\Subscriber\MapCenterSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([service('ivory.google_map.helper.renderer.map_center')])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.map_container', \Ivory\GoogleMap\Helper\Subscriber\MapContainerSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([service('ivory.google_map.helper.renderer.map_container')])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.map_html', \Ivory\GoogleMap\Helper\Subscriber\MapHtmlSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([service('ivory.google_map.helper.renderer.map_html')])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.map_init', \Ivory\GoogleMap\Helper\Subscriber\MapInitSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.map_javascript', \Ivory\GoogleMap\Helper\Subscriber\MapJavascriptSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.renderer.map'),
            service('ivory.google_map.helper.renderer.utility.callback'),
            service('ivory.google_map.helper.renderer.html.javascript_tag'),
        ])
        ->tag('ivory.google_map.helper.api.subscriber')
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.map_stylehseet', \Ivory\GoogleMap\Helper\Subscriber\MapStylesheetSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([service('ivory.google_map.helper.renderer.html.stylesheet_tag')])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.overlay', \Ivory\GoogleMap\Helper\Subscriber\Overlay\OverlaySubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.overlay.circle', \Ivory\GoogleMap\Helper\Subscriber\Overlay\CircleSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.overlay.circle'),
            service('ivory.google_map.helper.renderer.overlay.circle'),
        ])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.overlay.encoded_polyline', \Ivory\GoogleMap\Helper\Subscriber\Overlay\EncodedPolylineSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.overlay.encoded_polyline'),
            service('ivory.google_map.helper.renderer.overlay.encoded_polyline'),
        ])
        ->tag('ivory.google_map.helper.api.subscriber')
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.overlay.extendable', \Ivory\GoogleMap\Helper\Subscriber\Overlay\ExtendableSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.overlay.extendable'),
            service('ivory.google_map.helper.renderer.overlay.extendable'),
        ])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.overlay.ground_overlay', \Ivory\GoogleMap\Helper\Subscriber\Overlay\GroundOverlaySubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.overlay.ground_overlay'),
            service('ivory.google_map.helper.renderer.overlay.ground_overlay'),
        ])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.overlay.icon', \Ivory\GoogleMap\Helper\Subscriber\Overlay\IconSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.overlay.icon'),
            service('ivory.google_map.helper.renderer.overlay.icon'),
        ])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.overlay.icon_sequence', \Ivory\GoogleMap\Helper\Subscriber\Overlay\IconSequenceSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.overlay.icon_sequence'),
            service('ivory.google_map.helper.renderer.overlay.icon_sequence'),
        ])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.overlay.info_box', \Ivory\GoogleMap\Helper\Subscriber\Overlay\InfoBoxSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.overlay.info_box'),
            service('ivory.google_map.helper.renderer.overlay.info_box'),
        ])
        ->tag('ivory.google_map.helper.api.subscriber')
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.overlay.info_window.close', \Ivory\GoogleMap\Helper\Subscriber\Overlay\InfoWindowCloseSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.overlay.info_window'),
            service('ivory.google_map.helper.renderer.overlay.info_window.close'),
        ])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.overlay.info_window.open', \Ivory\GoogleMap\Helper\Subscriber\Overlay\InfoWindowOpenSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.overlay.info_window'),
            service('ivory.google_map.helper.renderer.overlay.info_window.open'),
        ])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.overlay.info_window.default', \Ivory\GoogleMap\Helper\Subscriber\Overlay\DefaultInfoWindowSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.overlay.info_window.default'),
            service('ivory.google_map.helper.renderer.overlay.info_window.default'),
        ])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.overlay.marker', \Ivory\GoogleMap\Helper\Subscriber\Overlay\MarkerSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.overlay.marker'),
            service('ivory.google_map.helper.renderer.overlay.marker'),
        ])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.overlay.marker_clusterer', \Ivory\GoogleMap\Helper\Subscriber\Overlay\MarkerClustererSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([service('ivory.google_map.helper.renderer.overlay.marker_clusterer')])
        ->tag('ivory.google_map.helper.api.subscriber')
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.overlay.marker_shape', \Ivory\GoogleMap\Helper\Subscriber\Overlay\MarkerShapeSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.overlay.marker_shape'),
            service('ivory.google_map.helper.renderer.overlay.marker_shape'),
        ])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.overlay.marker.info_window.open', \Ivory\GoogleMap\Helper\Subscriber\Overlay\MarkerInfoWindowOpenSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.overlay.marker'),
            service('ivory.google_map.helper.renderer.overlay.info_window.open'),
            service('ivory.google_map.helper.renderer.event.event'),
        ])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.overlay.polygon', \Ivory\GoogleMap\Helper\Subscriber\Overlay\PolygonSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.overlay.polygon'),
            service('ivory.google_map.helper.renderer.overlay.polygon'),
        ])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.overlay.polyline', \Ivory\GoogleMap\Helper\Subscriber\Overlay\PolylineSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.overlay.polyline'),
            service('ivory.google_map.helper.renderer.overlay.polyline'),
        ])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.overlay.rectangle', \Ivory\GoogleMap\Helper\Subscriber\Overlay\RectangleSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.overlay.rectangle'),
            service('ivory.google_map.helper.renderer.overlay.rectangle'),
        ])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.overlay.symbol', \Ivory\GoogleMap\Helper\Subscriber\Overlay\SymbolSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.overlay.symbol'),
            service('ivory.google_map.helper.renderer.overlay.symbol'),
        ])
        ->tag('ivory.google_map.helper.map.subscriber');

    $services->set('ivory.google_map.helper.subscriber.place.autocomplete', \Ivory\GoogleMap\Helper\Subscriber\Place\AutocompleteSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([service('ivory.google_map.helper.renderer.place.autocomplete')])
        ->tag('ivory.google_map.helper.place_autocomplete.subscriber');

    $services->set('ivory.google_map.helper.subscriber.place.autocomplete_container', \Ivory\GoogleMap\Helper\Subscriber\Place\AutocompleteContainerSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([service('ivory.google_map.helper.renderer.place.autocomplete_container')])
        ->tag('ivory.google_map.helper.place_autocomplete.subscriber');

    $services->set('ivory.google_map.helper.subscriber.place.autocomplete_html', \Ivory\GoogleMap\Helper\Subscriber\Place\AutocompleteHtmlSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([service('ivory.google_map.helper.renderer.place.autocomplete_html')])
        ->tag('ivory.google_map.helper.place_autocomplete.subscriber');

    $services->set('ivory.google_map.helper.subscriber.place.autocomplete_init', \Ivory\GoogleMap\Helper\Subscriber\Place\AutocompleteInitSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->tag('ivory.google_map.helper.place_autocomplete.subscriber');

    $services->set('ivory.google_map.helper.subscriber.place.autocomplete_javascript', \Ivory\GoogleMap\Helper\Subscriber\Place\AutocompleteJavascriptSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.renderer.place.autocomplete'),
            service('ivory.google_map.helper.renderer.utility.callback'),
            service('ivory.google_map.helper.renderer.html.javascript_tag'),
        ])
        ->tag('ivory.google_map.helper.api.subscriber')
        ->tag('ivory.google_map.helper.place_autocomplete.subscriber');

    $services->set('ivory.google_map.helper.subscriber.place.autocomplete.base', \Ivory\GoogleMap\Helper\Subscriber\Place\Base\AutocompleteBaseSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->tag('ivory.google_map.helper.place_autocomplete.subscriber');

    $services->set('ivory.google_map.helper.subscriber.place.autocomplete.base.bound', \Ivory\GoogleMap\Helper\Subscriber\Place\Base\AutocompleteBoundSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.place.autocomplete.base.bound'),
            service('ivory.google_map.helper.renderer.base.bound'),
        ])
        ->tag('ivory.google_map.helper.place_autocomplete.subscriber');

    $services->set('ivory.google_map.helper.subscriber.place.autocomplete.base.coordinate', \Ivory\GoogleMap\Helper\Subscriber\Place\Base\AutocompleteCoordinateSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.place.autocomplete.base.coordinate'),
            service('ivory.google_map.helper.renderer.base.coordinate'),
        ])
        ->tag('ivory.google_map.helper.place_autocomplete.subscriber');

    $services->set('ivory.google_map.helper.subscriber.place.autocomplete.event', \Ivory\GoogleMap\Helper\Subscriber\Place\Event\AutocompleteEventSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->tag('ivory.google_map.helper.place_autocomplete.subscriber');

    $services->set('ivory.google_map.helper.subscriber.place.autocomplete.event.dom_event', \Ivory\GoogleMap\Helper\Subscriber\Place\Event\AutocompleteDomEventSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.place.autocomplete.event.dom_event'),
            service('ivory.google_map.helper.renderer.event.dom_event'),
        ])
        ->tag('ivory.google_map.helper.place_autocomplete.subscriber');

    $services->set('ivory.google_map.helper.subscriber.place.autocomplete.event.dom_event_once', \Ivory\GoogleMap\Helper\Subscriber\Place\Event\AutocompleteDomEventOnceSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.place.autocomplete.event.dom_event_once'),
            service('ivory.google_map.helper.renderer.event.dom_event_once'),
        ])
        ->tag('ivory.google_map.helper.place_autocomplete.subscriber');

    $services->set('ivory.google_map.helper.subscriber.place.autocomplete.event.event', \Ivory\GoogleMap\Helper\Subscriber\Place\Event\AutocompleteSimpleEventSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.place.autocomplete.event.event'),
            service('ivory.google_map.helper.renderer.event.event'),
        ])
        ->tag('ivory.google_map.helper.place_autocomplete.subscriber');

    $services->set('ivory.google_map.helper.subscriber.place.autocomplete.event.event_once', \Ivory\GoogleMap\Helper\Subscriber\Place\Event\AutocompleteEventOnceSubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([
            service('ivory.google_map.helper.collector.place.autocomplete.event.event_once'),
            service('ivory.google_map.helper.renderer.event.event_once'),
        ])
        ->tag('ivory.google_map.helper.place_autocomplete.subscriber');

    $services->set('ivory.google_map.helper.subscriber.static', \Ivory\GoogleMap\Helper\Subscriber\Image\StaticSubscriber::class)
        ->tag('ivory.google_map.helper.map.static.subscriber');

    $services->set('ivory.google_map.helper.subscriber.static.center', \Ivory\GoogleMap\Helper\Subscriber\Image\CenterSubscriber::class)
        ->args([service('ivory.google_map.helper.renderer.static.base.coordinate')])
        ->tag('ivory.google_map.helper.map.static.subscriber');

    $services->set('ivory.google_map.helper.subscriber.static.encoded_polyline', \Ivory\GoogleMap\Helper\Subscriber\Image\EncodedPolylineSubscriber::class)
        ->args([
            service('ivory.google_map.helper.collector.static.encoded_polyline'),
            service('ivory.google_map.helper.renderer.static.overlay.encoded_polyline'),
        ])
        ->tag('ivory.google_map.helper.map.static.subscriber');

    $services->set('ivory.google_map.helper.subscriber.static.extendable', \Ivory\GoogleMap\Helper\Subscriber\Image\ExtendableSubscriber::class)
        ->args([
            service('ivory.google_map.helper.collector.static.extendable'),
            service('ivory.google_map.helper.renderer.static.overlay.extendable'),
        ])
        ->tag('ivory.google_map.helper.map.static.subscriber');

    $services->set('ivory.google_map.helper.subscriber.static.format', \Ivory\GoogleMap\Helper\Subscriber\Image\FormatSubscriber::class)
        ->tag('ivory.google_map.helper.map.static.subscriber');

    $services->set('ivory.google_map.helper.subscriber.static.key', \Ivory\GoogleMap\Helper\Subscriber\Image\KeySubscriber::class)
        ->tag('ivory.google_map.helper.map.static.subscriber');

    $services->set('ivory.google_map.helper.subscriber.static.marker', \Ivory\GoogleMap\Helper\Subscriber\Image\MarkerSubscriber::class)
        ->args([
            service('ivory.google_map.helper.collector.static.marker'),
            service('ivory.google_map.helper.renderer.static.overlay.marker'),
        ])
        ->tag('ivory.google_map.helper.map.static.subscriber');

    $services->set('ivory.google_map.helper.subscriber.static.polyline', \Ivory\GoogleMap\Helper\Subscriber\Image\PolylineSubscriber::class)
        ->args([
            service('ivory.google_map.helper.collector.static.polyline'),
            service('ivory.google_map.helper.renderer.static.overlay.polyline'),
        ])
        ->tag('ivory.google_map.helper.map.static.subscriber');

    $services->set('ivory.google_map.helper.subscriber.static.scale', \Ivory\GoogleMap\Helper\Subscriber\Image\ScaleSubscriber::class)
        ->tag('ivory.google_map.helper.map.static.subscriber');

    $services->set('ivory.google_map.helper.subscriber.static.size', \Ivory\GoogleMap\Helper\Subscriber\Image\SizeSubscriber::class)
        ->args([service('ivory.google_map.helper.renderer.static.size')])
        ->tag('ivory.google_map.helper.map.static.subscriber');

    $services->set('ivory.google_map.helper.subscriber.static.type', \Ivory\GoogleMap\Helper\Subscriber\Image\TypeSubscriber::class)
        ->tag('ivory.google_map.helper.map.static.subscriber');

    $services->set('ivory.google_map.helper.subscriber.static.zoom', \Ivory\GoogleMap\Helper\Subscriber\Image\ZoomSubscriber::class)
        ->tag('ivory.google_map.helper.map.static.subscriber');

    $services->set('ivory.google_map.helper.subscriber.utility.object_to_array', \Ivory\GoogleMap\Helper\Subscriber\Utility\ObjectToArraySubscriber::class)
        ->parent('ivory.google_map.helper.subscriber.abstract')
        ->args([service('ivory.google_map.helper.renderer.utility.object_to_array')])
        ->tag('ivory.google_map.helper.map.subscriber');
};
