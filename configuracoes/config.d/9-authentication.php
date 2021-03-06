<?php

return array_merge($config,
    [
        // 'auth.provider' => 'Fake',
        /* configuração de provedores Auth para Login */
        'auth.provider' => '\MultipleLocalAuth\Provider',
        'auth.config'   => 
            [
                'salt' => 'LT_SECURITY_SALT_SECURITY_SALT_SECURITY_SALT_SECURITY_SALT_SECU',
                'timeout' => '24 hours',
                'enableLoginByCPF' => true,
                'passwordMustHaveCapitalLetters' => true,
                'passwordMustHaveLowercaseLetters' => true,
                'passwordMustHaveSpecialCharacters' => true,
                'passwordMustHaveNumbers' => true,
                'minimumPasswordLength' => 6,
                'google-recaptcha-secret' => '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe',
                'google-recaptcha-sitekey' => '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI',
                'sessionTime' => 7200,              // int , tempo da sessao do usuario em segundos
                'numberloginAttemp' => '5',         // tentativas de login antes de bloquear o usuario por X minutos
                'timeBlockedloginAttemp' => '900',  // tempo de bloqueio do usuario em segundos
                'strategies' => 
                    [
                //      'Facebook' => [
                //              'app_id' => 'SUA_APP_ID',
                //             'app_secret' => 'SUA_APP_SECRET',
                //             'scope' => 'email'
                //      ],
                //         'LinkedIn' => [
                //             'api_key' => 'SUA_API_KEY',
                //             'secret_key' => 'SUA_SECRET_KEY',
                //             'redirect_uri' => '/autenticacao/linkedin/oauth2callback',
                //             'scope' => 'r_emailaddress'
                //         ],
                //         'Google' => [
                //             'client_id' => 'SEU_CLIENT_ID',
                //             'client_secret' => 'SEU_CLIENT_SECRET',
                //             'redirect_uri' => '/autenticacao/google/oauth2callback',
                //             'scope' => 'email'
                //         ],
                        'Twitter' => 
                            [
                                'app_id' => 'SUA_APP_ID',
                                'app_secret' => 'SUA_APP_SECRET',
                            ]
					]
			]
    ]
);
