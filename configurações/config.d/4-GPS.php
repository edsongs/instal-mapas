<?php

/* Definição das coordenadas de centralização do mapa quando em modo consulta */
$map_latitude  = '-27.665822';
$map_longitude = '-51.0234406' ;
$map_zoom      = '8.21';

return array_merge($config,
    [
        /* Configurações do Mapa e GeoDivisão */
        'maps.includeGoogleLayers' => true,
        'maps.center'              => array($map_latitude, $map_longitude),
        'maps.zoom.default'        => $map_zoom,
    ]
);