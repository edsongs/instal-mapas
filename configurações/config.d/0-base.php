<?php

$site_name        = 'Mapa Cultural de Santa Catarina';
$site_description = 'O Mapa Cultural de Santa Catarina é a plataforma livre, gratuita e colaborativa de mapeamento do Estado de Santa Catarina sobre cenário cultural catarinense. Ficou mais fácil se programar para conhecer as opções culturais que as cidades catarinenses oferecem: shows musicais, espetáculos teatrais, sessões de cinema, saraus, entre outras. Além de conferir a agenda de eventos, você também pode colaborar na gestão da cultura do estado: basta criar seu perfil de agente cultural. A partir deste cadastro, fica mais fácil participar dos editais e programas da Secretaria e também divulgar seus eventos, espaços ou projetos.';

$base_domain   = @$_SERVER['HTTP_HOST'];
$base_url      = 'http://' . $base_domain . '/';
date_default_timezone_set('America/SaoPaulo');

return array_merge($config,
    [
        'app.useAssetsUrlCache' => false,
        'app.siteName'          => \MapasCulturais\i::__($site_name),
        'app.siteDescription'   => \MapasCulturais\i::__($site_description),

        /* to setup Saas Subsite theme */
/*      'namespaces' => [
                        'MapasCulturais\Themes' => THEMES_PATH,
                        'FCC'                   => THEMES_PATH . '/Santa_Catarina/',
                        'Subsite'               => THEMES_PATH . '/Subsite/'
        ],
*/
//        'themes.active' => 'Santa_Catarina',
        'base.assetUrl' => $base_url . 'assets/',
        'base.url'      => $base_url,

        /* Habilitar configurações importantes da aplicação: [development, staging, production] */ 
        'app.mode'                     => 'production',
        'app.enabled.seals'            => false,
        'app.enabled.apps'             => false,
        'api.accessControlAllowOrigin' => '*',
        'app.offline'                  => false,
        'app.offlineUrl'               => '/offline',
        'app.offlineBypassFunction'    => null
    ]
);