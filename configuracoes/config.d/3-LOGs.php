<?php

return array_merge($config,
    [
        /* ==================== LOGS ================== */
        'slim.debug'           => false,
        'slim.log.enabled'     => true,
        'slim.log.level'       => \Slim\Log::DEBUG,
        'app.log.hook'         => true,
        #'app.log.query'        => true,
        #'app.log.requestData'  => true,
        #'app.log.translations' => true,
        #'app.log.apiCache'     => true,
        #'app.log.path'         => '/dados/mapas/logs/',
        #'slim.log.writer'      => new \MapasCulturais\Loggers\File(function () {return 'slim.log'; }),
    ]
);