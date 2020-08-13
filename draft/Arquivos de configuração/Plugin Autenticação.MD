Como não exibir do bloco de autenticações "externas"?
No arquivo de configuração dentro do projeto eu puxo das configurações do meu arquivo em:
```
src/protected/application/conf/conf-base.d/authentication.php
```
e comenta 'strategies' => { ...}

Se mesmo comentando não der certo, você pode setar false na propriedade visible de cada strategy.
```
    'Facebook' => array(
                'visible' => *false*,
                'app_id' => env('AUTH_FACEBOOK_APP_ID', null),
                'app_secret' => env('AUTH_FACEBOOK_APP_SECRET', null),
                'scope' => env('AUTH_FACEBOOK_SCOPE', 'email'),
            ),
```
