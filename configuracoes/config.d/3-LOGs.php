<?php

return array_merge($config,
    [
        /* ==================== LOGS ================== */
        'slim.debug'           => false,
        'slim.log.enabled'     => true,
        'slim.log.level'       => \Slim\Log::DEBUG,
        'app.log.hook'         => true,
        #'slim.log.writer'      => new \MapasCulturais\Loggers\File(function () {return 'slim.log'; }),
    ]
);
