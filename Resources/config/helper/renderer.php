<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container) {
    $services = $container->services();

    $services->set('ivory.google_map.helper.renderer.abstract', \Ivory\GoogleMap\Helper\Renderer\AbstractRenderer::class)
        ->abstract()
        ->args([service('ivory.google_map.helper.formatter')]);

    $services->set('ivory.google_map.helper.renderer.json', \Ivory\GoogleMap\Helper\Renderer\AbstractJsonRenderer::class)
        ->abstract()
        ->parent('ivory.google_map.helper.renderer.abstract')
        ->args([service('ivory.google_map.helper.json_builder')]);

    $services->set('ivory.google_map.helper.renderer.api', \Ivory\GoogleMap\Helper\Renderer\ApiRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract')
        ->args([
            service('ivory.google_map.helper.renderer.api_init'),
            service('ivory.google_map.helper.renderer.loader'),
            service('ivory.google_map.helper.renderer.utility.requirement_loader'),
            service('ivory.google_map.helper.renderer.utility.source'),
        ]);

    $services->set('ivory.google_map.helper.renderer.api_init', \Ivory\GoogleMap\Helper\Renderer\ApiInitRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');

    $services->set('ivory.google_map.helper.renderer.base.bound', \Ivory\GoogleMap\Helper\Renderer\Base\BoundRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');

    $services->set('ivory.google_map.helper.renderer.base.coordinate', \Ivory\GoogleMap\Helper\Renderer\Base\CoordinateRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');

    $services->set('ivory.google_map.helper.renderer.base.point', \Ivory\GoogleMap\Helper\Renderer\Base\PointRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');

    $services->set('ivory.google_map.helper.renderer.base.size', \Ivory\GoogleMap\Helper\Renderer\Base\SizeRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');

    $services->set('ivory.google_map.helper.renderer.control.manager', \Ivory\GoogleMap\Helper\Renderer\Control\ControlManagerRenderer::class);

    $services->set('ivory.google_map.helper.renderer.control.position', \Ivory\GoogleMap\Helper\Renderer\Control\ControlPositionRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');

    $services->set('ivory.google_map.helper.renderer.control.custom', \Ivory\GoogleMap\Helper\Renderer\Control\CustomControlRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract')
        ->args([service('ivory.google_map.helper.renderer.control.position')]);

    $services->set('ivory.google_map.helper.renderer.control.fullscreen', \Ivory\GoogleMap\Helper\Renderer\Control\FullscreenControlRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json')
        ->args([service('ivory.google_map.helper.renderer.control.position')])
        ->tag('ivory.google_map.helper.renderer.control');

    $services->set('ivory.google_map.helper.renderer.control.map_type', \Ivory\GoogleMap\Helper\Renderer\Control\MapTypeControlRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json')
        ->args([
            service('ivory.google_map.helper.renderer.map_type_id'),
            service('ivory.google_map.helper.renderer.control.position'),
            service('ivory.google_map.helper.renderer.control.map_type_style'),
        ])
        ->tag('ivory.google_map.helper.renderer.control');

    $services->set('ivory.google_map.helper.renderer.control.map_type_style', \Ivory\GoogleMap\Helper\Renderer\Control\MapTypeControlStyleRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');

    $services->set('ivory.google_map.helper.renderer.control.rotate', \Ivory\GoogleMap\Helper\Renderer\Control\RotateControlRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json')
        ->args([service('ivory.google_map.helper.renderer.control.position')])
        ->tag('ivory.google_map.helper.renderer.control');

    $services->set('ivory.google_map.helper.renderer.control.scale', \Ivory\GoogleMap\Helper\Renderer\Control\ScaleControlRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json')
        ->args([
            service('ivory.google_map.helper.renderer.control.position'),
            service('ivory.google_map.helper.renderer.control.scale_style'),
        ])
        ->tag('ivory.google_map.helper.renderer.control');

    $services->set('ivory.google_map.helper.renderer.control.scale_style', \Ivory\GoogleMap\Helper\Renderer\Control\ScaleControlStyleRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');

    $services->set('ivory.google_map.helper.renderer.control.street_view', \Ivory\GoogleMap\Helper\Renderer\Control\StreetViewControlRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json')
        ->args([service('ivory.google_map.helper.renderer.control.position')])
        ->tag('ivory.google_map.helper.renderer.control');

    $services->set('ivory.google_map.helper.renderer.control.zoom', \Ivory\GoogleMap\Helper\Renderer\Control\ZoomControlRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json')
        ->args([
            service('ivory.google_map.helper.renderer.control.position'),
            service('ivory.google_map.helper.renderer.control.zoom_style'),
        ])
        ->tag('ivory.google_map.helper.renderer.control');

    $services->set('ivory.google_map.helper.renderer.control.zoom_style', \Ivory\GoogleMap\Helper\Renderer\Control\ZoomControlStyleRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');

    $services->set('ivory.google_map.helper.renderer.event.dom_event', \Ivory\GoogleMap\Helper\Renderer\Event\DomEventRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');

    $services->set('ivory.google_map.helper.renderer.event.dom_event_once', \Ivory\GoogleMap\Helper\Renderer\Event\DomEventOnceRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');

    $services->set('ivory.google_map.helper.renderer.event.event', \Ivory\GoogleMap\Helper\Renderer\Event\EventRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');

    $services->set('ivory.google_map.helper.renderer.event.event_once', \Ivory\GoogleMap\Helper\Renderer\Event\EventOnceRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');

    $services->set('ivory.google_map.helper.renderer.geometry.encoding', \Ivory\GoogleMap\Helper\Renderer\Geometry\EncodingRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');

    $services->set('ivory.google_map.helper.renderer.html.tag', \Ivory\GoogleMap\Helper\Renderer\Html\TagRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');

    $services->set('ivory.google_map.helper.renderer.html.javascript_tag', \Ivory\GoogleMap\Helper\Renderer\Html\JavascriptTagRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract')
        ->args([service('ivory.google_map.helper.renderer.html.tag')]);

    $services->set('ivory.google_map.helper.renderer.html.stylesheet', \Ivory\GoogleMap\Helper\Renderer\Html\StylesheetRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');

    $services->set('ivory.google_map.helper.renderer.html.stylesheet_tag', \Ivory\GoogleMap\Helper\Renderer\Html\StylesheetTagRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract')
        ->args([
            service('ivory.google_map.helper.renderer.html.tag'),
            service('ivory.google_map.helper.renderer.html.stylesheet'),
        ]);

    $services->set('ivory.google_map.helper.renderer.layer.geo_json', \Ivory\GoogleMap\Helper\Renderer\Layer\GeoJsonLayerRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json');

    $services->set('ivory.google_map.helper.renderer.layer.heatmap', \Ivory\GoogleMap\Helper\Renderer\Layer\HeatmapLayerRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json');

    $services->set('ivory.google_map.helper.renderer.layer.kml', \Ivory\GoogleMap\Helper\Renderer\Layer\KmlLayerRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json');

    $services->set('ivory.google_map.helper.renderer.loader', \Ivory\GoogleMap\Helper\Renderer\LoaderRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json');

    $services->set('ivory.google_map.helper.renderer.map', \Ivory\GoogleMap\Helper\Renderer\MapRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json')
        ->args([
            service('ivory.google_map.helper.renderer.map_type_id'),
            service('ivory.google_map.helper.renderer.control.manager'),
            service('ivory.google_map.helper.renderer.utility.requirement'),
        ]);

    $services->set('ivory.google_map.helper.renderer.map_bound', \Ivory\GoogleMap\Helper\Renderer\MapBoundRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');

    $services->set('ivory.google_map.helper.renderer.map_center', \Ivory\GoogleMap\Helper\Renderer\MapCenterRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');

    $services->set('ivory.google_map.helper.renderer.map_container', \Ivory\GoogleMap\Helper\Renderer\MapContainerRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json');

    $services->set('ivory.google_map.helper.renderer.map_html', \Ivory\GoogleMap\Helper\Renderer\MapHtmlRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract')
        ->args([
            service('ivory.google_map.helper.renderer.html.tag'),
            service('ivory.google_map.helper.renderer.html.stylesheet'),
        ]);

    $services->set('ivory.google_map.helper.renderer.map_type_id', \Ivory\GoogleMap\Helper\Renderer\MapTypeIdRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');

    $services->set('ivory.google_map.helper.renderer.overlay.animation', \Ivory\GoogleMap\Helper\Renderer\Overlay\AnimationRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');

    $services->set('ivory.google_map.helper.renderer.overlay.circle', \Ivory\GoogleMap\Helper\Renderer\Overlay\CircleRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json');

    $services->set('ivory.google_map.helper.renderer.overlay.encoded_polyline', \Ivory\GoogleMap\Helper\Renderer\Overlay\EncodedPolylineRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json')
        ->args([service('ivory.google_map.helper.renderer.geometry.encoding')]);

    $services->set('ivory.google_map.helper.renderer.overlay.extendable', \Ivory\GoogleMap\Helper\Renderer\Overlay\Extendable\ExtendableRenderer::class);

    $services->set('ivory.google_map.helper.renderer.overlay.extendable.default_viewport', \Ivory\GoogleMap\Helper\Renderer\Overlay\Extendable\DefaultViewportExtendableRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract')
        ->tag('ivory.google_map.helper.renderer.extendable', ['class' => \Ivory\GoogleMap\Layer\KmlLayer::class]);

    $services->set('ivory.google_map.helper.renderer.overlay.extendable.heatmap_layer', \Ivory\GoogleMap\Helper\Renderer\Overlay\Extendable\HeatmapLayerExtendableRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract')
        ->tag('ivory.google_map.helper.renderer.extendable', ['class' => \Ivory\GoogleMap\Layer\HeatmapLayer::class]);

    $services->set('ivory.google_map.helper.renderer.overlay.extendable.path', \Ivory\GoogleMap\Helper\Renderer\Overlay\Extendable\PathExtendableRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract')
        ->tag('ivory.google_map.helper.renderer.extendable', ['class' => \Ivory\GoogleMap\Overlay\EncodedPolyline::class])
        ->tag('ivory.google_map.helper.renderer.extendable', ['class' => \Ivory\GoogleMap\Overlay\Polyline::class])
        ->tag('ivory.google_map.helper.renderer.extendable', ['class' => \Ivory\GoogleMap\Overlay\Polygon::class]);

    $services->set('ivory.google_map.helper.renderer.overlay.extendable.position', \Ivory\GoogleMap\Helper\Renderer\Overlay\Extendable\PositionExtendableRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract')
        ->tag('ivory.google_map.helper.renderer.extendable', ['class' => \Ivory\GoogleMap\Overlay\InfoWindow::class])
        ->tag('ivory.google_map.helper.renderer.extendable', ['class' => \Ivory\GoogleMap\Overlay\Marker::class]);

    $services->set('ivory.google_map.helper.renderer.overlay.extendable.bounds', \Ivory\GoogleMap\Helper\Renderer\Overlay\Extendable\BoundsExtendableRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract')
        ->tag('ivory.google_map.helper.renderer.extendable', ['class' => \Ivory\GoogleMap\Overlay\Circle::class])
        ->tag('ivory.google_map.helper.renderer.extendable', ['class' => \Ivory\GoogleMap\Overlay\GroundOverlay::class])
        ->tag('ivory.google_map.helper.renderer.extendable', ['class' => \Ivory\GoogleMap\Overlay\Rectangle::class]);

    $services->set('ivory.google_map.helper.renderer.overlay.ground_overlay', \Ivory\GoogleMap\Helper\Renderer\Overlay\GroundOverlayRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json');

    $services->set('ivory.google_map.helper.renderer.overlay.icon', \Ivory\GoogleMap\Helper\Renderer\Overlay\IconRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json');

    $services->set('ivory.google_map.helper.renderer.overlay.icon_sequence', \Ivory\GoogleMap\Helper\Renderer\Overlay\IconSequenceRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json');

    $services->set('ivory.google_map.helper.renderer.overlay.info_box', \Ivory\GoogleMap\Helper\Renderer\Overlay\InfoBoxRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json')
        ->args([service('ivory.google_map.helper.renderer.utility.requirement')]);

    $services->set('ivory.google_map.helper.renderer.overlay.info_window.close', \Ivory\GoogleMap\Helper\Renderer\Overlay\InfoWindowCloseRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');

    $services->set('ivory.google_map.helper.renderer.overlay.info_window.open', \Ivory\GoogleMap\Helper\Renderer\Overlay\InfoWindowOpenRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');

    $services->set('ivory.google_map.helper.renderer.overlay.info_window.default', \Ivory\GoogleMap\Helper\Renderer\Overlay\DefaultInfoWindowRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json');

    $services->set('ivory.google_map.helper.renderer.overlay.marker', \Ivory\GoogleMap\Helper\Renderer\Overlay\MarkerRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json')
        ->args([service('ivory.google_map.helper.renderer.overlay.animation')]);

    $services->set('ivory.google_map.helper.renderer.overlay.marker_clusterer', \Ivory\GoogleMap\Helper\Renderer\Overlay\MarkerClustererRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json')
        ->args([service('ivory.google_map.helper.renderer.utility.requirement')]);

    $services->set('ivory.google_map.helper.renderer.overlay.marker_shape', \Ivory\GoogleMap\Helper\Renderer\Overlay\MarkerShapeRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json');

    $services->set('ivory.google_map.helper.renderer.overlay.polygon', \Ivory\GoogleMap\Helper\Renderer\Overlay\PolygonRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json');

    $services->set('ivory.google_map.helper.renderer.overlay.polyline', \Ivory\GoogleMap\Helper\Renderer\Overlay\PolylineRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json');

    $services->set('ivory.google_map.helper.renderer.overlay.rectangle', \Ivory\GoogleMap\Helper\Renderer\Overlay\RectangleRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json');

    $services->set('ivory.google_map.helper.renderer.overlay.symbol', \Ivory\GoogleMap\Helper\Renderer\Overlay\SymbolRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json')
        ->args([service('ivory.google_map.helper.renderer.overlay.symbol_path')]);

    $services->set('ivory.google_map.helper.renderer.overlay.symbol_path', \Ivory\GoogleMap\Helper\Renderer\Overlay\SymbolPathRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');

    $services->set('ivory.google_map.helper.renderer.place.autocomplete', \Ivory\GoogleMap\Helper\Renderer\Place\AutocompleteRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json')
        ->args([service('ivory.google_map.helper.renderer.utility.requirement')]);

    $services->set('ivory.google_map.helper.renderer.place.autocomplete_container', \Ivory\GoogleMap\Helper\Renderer\Place\AutocompleteContainerRenderer::class)
        ->parent('ivory.google_map.helper.renderer.json')
        ->args([service('ivory.google_map.helper.renderer.html.tag')]);

    $services->set('ivory.google_map.helper.renderer.place.autocomplete_html', \Ivory\GoogleMap\Helper\Renderer\Place\AutocompleteHtmlRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract')
        ->args([service('ivory.google_map.helper.renderer.html.tag')]);

    $services->set('ivory.google_map.helper.renderer.static.base.coordinate', \Ivory\GoogleMap\Helper\Renderer\Image\Base\CoordinateRenderer::class);

    $services->set('ivory.google_map.helper.renderer.static.base.point', \Ivory\GoogleMap\Helper\Renderer\Image\Base\PointRenderer::class);

    $services->set('ivory.google_map.helper.renderer.static.overlay.encoded_polyline', \Ivory\GoogleMap\Helper\Renderer\Image\Overlay\EncodedPolylineRenderer::class)
        ->args([
            service('ivory.google_map.helper.renderer.static.overlay.encoded_polyline.style'),
            service('ivory.google_map.helper.renderer.static.overlay.encoded_polyline.value'),
        ]);

    $services->set('ivory.google_map.helper.renderer.static.overlay.encoded_polyline.style', \Ivory\GoogleMap\Helper\Renderer\Image\Overlay\EncodedPolylineStyleRenderer::class);

    $services->set('ivory.google_map.helper.renderer.static.overlay.encoded_polyline.value', \Ivory\GoogleMap\Helper\Renderer\Image\Overlay\EncodedPolylineValueRenderer::class);

    $services->set('ivory.google_map.helper.renderer.static.overlay.extendable', \Ivory\GoogleMap\Helper\Renderer\Image\Overlay\ExtendableRenderer::class)
        ->args([
            service('ivory.google_map.helper.renderer.static.base.coordinate'),
            service('ivory.google_map.helper.renderer.static.overlay.marker.location'),
            service('ivory.google_map.helper.renderer.static.overlay.polyline.location'),
        ]);

    $services->set('ivory.google_map.helper.renderer.static.overlay.marker', \Ivory\GoogleMap\Helper\Renderer\Image\Overlay\MarkerRenderer::class)
        ->args([
            service('ivory.google_map.helper.renderer.static.overlay.marker.style'),
            service('ivory.google_map.helper.renderer.static.overlay.marker.location'),
        ]);

    $services->set('ivory.google_map.helper.renderer.static.overlay.marker.style', \Ivory\GoogleMap\Helper\Renderer\Image\Overlay\MarkerStyleRenderer::class)
        ->args([service('ivory.google_map.helper.renderer.static.base.point')]);

    $services->set('ivory.google_map.helper.renderer.static.overlay.marker.location', \Ivory\GoogleMap\Helper\Renderer\Image\Overlay\MarkerLocationRenderer::class)
        ->args([service('ivory.google_map.helper.renderer.static.base.coordinate')]);

    $services->set('ivory.google_map.helper.renderer.static.overlay.polyline', \Ivory\GoogleMap\Helper\Renderer\Image\Overlay\PolylineRenderer::class)
        ->args([
            service('ivory.google_map.helper.renderer.static.overlay.polyline.style'),
            service('ivory.google_map.helper.renderer.static.overlay.polyline.location'),
        ]);

    $services->set('ivory.google_map.helper.renderer.static.overlay.polyline.style', \Ivory\GoogleMap\Helper\Renderer\Image\Overlay\PolylineStyleRenderer::class);

    $services->set('ivory.google_map.helper.renderer.static.overlay.polyline.location', \Ivory\GoogleMap\Helper\Renderer\Image\Overlay\PolylineLocationRenderer::class)
        ->args([service('ivory.google_map.helper.renderer.static.base.coordinate')]);

    $services->set('ivory.google_map.helper.renderer.static.size', \Ivory\GoogleMap\Helper\Renderer\Image\SizeRenderer::class);

    $services->set('ivory.google_map.helper.renderer.utility.callback', \Ivory\GoogleMap\Helper\Renderer\Utility\CallbackRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');

    $services->set('ivory.google_map.helper.renderer.utility.object_to_array', \Ivory\GoogleMap\Helper\Renderer\Utility\ObjectToArrayRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');

    $services->set('ivory.google_map.helper.renderer.utility.requirement_loader', \Ivory\GoogleMap\Helper\Renderer\Utility\RequirementLoaderRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');

    $services->set('ivory.google_map.helper.renderer.utility.requirement', \Ivory\GoogleMap\Helper\Renderer\Utility\RequirementRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');

    $services->set('ivory.google_map.helper.renderer.utility.source', \Ivory\GoogleMap\Helper\Renderer\Utility\SourceRenderer::class)
        ->parent('ivory.google_map.helper.renderer.abstract');
};
