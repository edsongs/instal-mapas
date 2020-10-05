<?php

return array_merge($config,
    [
        /* ==================== LOGS ================== */
        'slim.debug'           => false,
        'slim.log.enabled'     => true,
        'slim.log.level'       => \Slim\Log::DEBUG      // controla o nível de LOG: DEBUG ou ERROR
    ]
);
