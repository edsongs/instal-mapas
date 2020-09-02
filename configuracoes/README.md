[Voltar para o sumário](https://github.com/edsongs/instal-mapas)
  
# Instalação do Plugin de Registro, Login e Recuperação de Senha
>   **Disclaimer:**
>   _Estas instruções foram executadas e testadas em um ambiente de testes composto por uma VM, rodando uma instalação básica de servidor Ubuntu 18.04, com 2BG de RAM, 10GB de HD, 2 CPUs e rede em acesso bridge. O ambiente do Mapas Culturais foi executado em ambiente Docker, partindo de uma configuração padrão, obtida diretamente da clonagem do repositório oficial da aplicação._

Para habilitar o novo plugin que implementa as funcionalidades de **login e registro local**, assim como a facilidade de **recuperação de senha** pelo envio de link para a redefinição da senha ao e-mail público cadastrado do ente, siga os seguintes passos:

1. Quanto a base para a instalação:
    1. Se nova, siga normalmente escolhendo as [instruções mais adequadas](https://github.com/edsongs/instal-mapas/Instala%C3%A7%C3%A3o.md) até o ponto **_imediatamente anterior_** à clonagem do repositório do Mapas Culturais (isto vai garantir que a última versão de desenvolvimento deste _branch_ seja instalada). Vá para o ponto 2.i;
    2. Se existente e se deseje atualizar o código da plataforma, siga ao passo 2.ii;
    3. Se existente, sem que seja feita a atualização do código da plataforma, siga ao passo 3;
  
2. Preparando o código fonte da plataforma
    1. Clonar o _branch_ 5.0.0 do repositório Mapasculturais 
        ```
        user@server:~$ sudo git clone --branch develop https://github.com/mapasculturais/mapasculturais.git
        ```
        Continue no passo 3
     2. Atualizar o código da plataforma
        ```
        user@server:~$ cd mapasculturais
        user@server:~/mapasculturais$ sudo git pull
        ```

3. Criar diretório "plugin" no raiz do código da plataforma:
    ```
    user@server:~/mapasculturais$ sudo mkdir plugin
    ```

4. Entrar no diretório recém criado:
    ```
    user@server:~/mapasculturais$ cd plugin
    ```

5. Baixar a última versão do plugin do repositório do Ceará:
    ```
    user@server:~/mapasculturais/plugin$ sudo git clone --branch develop https://github.com/mapasculturais/plugin-MultipleLocalAuth.git MultipleLocalAuth
    ```

6. Atualizar o arquivo de definição do Docker incluindo as seguintes definições de volumes:
    ```
    user@server:~/mapasculturais/plugin$ cd ../dev-scripts
    user@server:~/mapasculturais/dev-scripts$ sudo vi docker-compose.local.yml
    ```
    >     // na sessão volumes, inclua:
    >      # diretório de plugin
    >     - ../plugin/MultipleLocalAuth:/var/www/html/protected/application/plugins/MultipleLocalAuth
    
    Ou use [este](https://github.com/edsongs/instal-mapas/configuracoes/docker-compose.local.yml) arquivo já comentado de definições.

7. Mude para o diretório de configurações "expostas" e inclua os arquivos de configuração usando o comando:
    ```
    user@server:~/mapasculturais/dev-scripts$ cd ../compose
    user@server:~/mapasculturais/compose/$ sudo git clone https://github.com/edsongs/instal-mapas/configuracoes/config.d
    ```

8. Altere as configurações conforme necessário:
   - Para alterar o nome do site e sua descrição, altere o arquivo "[0-base.php](https://github.com/edsongs/instal-mapas/blob/master/configuracoes/config.d/0-base.php)";
   - Para habilitar a facilidade de denuncias e encaminhamento de sugestões, altere o arquivo "[1-denuncia_sugestao.php](https://github.com/edsongs/instal-mapas/blob/master/configuracoes/config.d/1-denuncia_sugestao.php)";
   - Para alterar as configurações do banco de dados, altereo arquivo "[2-doctrine.php](https://github.com/edsongs/instal-mapas/blob/master/configuracoes/config.d/2-doctrine.php)";
   - Para habilitar e alterar as configurações de log da aplicação, altere o arquivo "[3-LOGs.php](https://github.com/edsongs/instal-mapas/blob/master/configuracoes/config.d/3-LOGs.php)";
   - Para alterar o mapa apresentado nas consultas, altere o arquivo "[4-GPS.php](https://github.com/edsongs/instal-mapas/blob/master/configuracoes/config.d/4-GPS.php)";
   - Para registrar os plugins habilitados no sistema, altere o arquivo "[5-plugin_en.php](https://github.com/edsongs/instal-mapas/blob/master/configuracoes/config.d/5-plugin_en.php)";
   - Para que a funcionalidade de e-mail funcione, altere o arquivo "[6-mailer.php](https://github.com/edsongs/instal-mapas/blob/master/configuracoes/config.d/6-mailer.php)";
   - Para que a habilitar o login local, os baseados em serviços, incluir sua chave de Captcha e definir as estratégias de senha, altere o arquivo "[8-authentication.php](https://github.com/edsongs/instal-mapas/blob/master/configuracoes/config.d/8-authentication.php)";
   - Para habilitar a funcionalidade de **reCAPTCHA** siga [estas instruções](https://docs.wpusermanager.com/article/147-generate-recaptcha-api-keys) e, com as chaves anotadas, altere os parâmetros no arquivo "[8-authentication.php](https://github.com/edsongs/instal-mapas/blob/master/configuracoes/config.d/8-authentication.php)".
   
9. Ajustes, mudanças e/ou substituições nos/dos **textos enviados por e-mail**, quando do registro de novo usuário do Mapas, assim como no/do **termos e condições de uso** podem ser feitas alterando-se os arquivos que estão no diretório:
    > **_~/mapasculturais/plugin/MultipleLocalAuth/views/auth_**

# Known Issues
1. **Regras de segurança de senha não aparecem**

    Este problema está relacionado com a incompatibilidade entre definições nos assets e a versão do Uglify em uso. O Uglify não mais reconhece alguns comandos presentes em páginas mais 'antigas' dos assets. A correção passa pelo desligamento da _compilação_ dos assets pelo Uglify.
    ```
    user@server:~/$ sudo vi ~/mapasculturais/src/protected/application/conf/conf-base.d/assets-manager.php
    ```
    >     // Na linha 3, mude para _false_:
    >     $is_production=false
    
2. **Definição da estratégia de login TWITTER**

    Na configuração, a estratégia TWITTER **deve** estar presente, mesmo que com valores _dummy_; ela não influencia na execução, mas quebra se retirada.

3. **Mensagem de erro do reCAPTCHA** ou **reCAPTCHA não funciona em Subsites**

    Quando em um subsite criado numa plataforma que tem o plugin de autenticação habilitado, o reCAPTCHA apresenta uma mensagem de erro, informando que as chaves do serviço não são válidas para o endereço do site. Isto acontece porque o plugin buscas suas configurações no arquivo de configuração e não identifica que, se em subsite, deve recuperar os valores dos parâmetros das tabelas "subsite" e "subsite_metadata".
    O work-aroud é incluir/redefinir na configuração da chave do reCAPTCHA lista de todos os sites onde deverá ser válida.
    
4. **eMail enviado da mesma origem em toda a plataforma** ou **Não consigo definir conta de envio de e-mail para Subsites"**

    A razão para que isto aconteça é identica à do item anterior: as configurações utilizadas tem sua origem **sempre** no arquivo e não na consulta às tabelas "subsite" e "subsite_metadata".
    Não há correção conhecida/reportada.
   
5. **Erro no envio ao utilizar SMTP-Relay**

    Caso esteja sendo utilizado um SMTP-Relay, na configuração dentro da sessão Mailer, a definição de protocolo deve ser deixada em branco, porém isto causará erro, pois quando o protocolo não é definido, o default é o "SSL" e aí está a causa do erro. Para corrigir, acesse o arquivo **src/protected/application/lib/MapasCulturais/App.php** faça a seguinte alteração próximo à linha 2677:
    
    DE:
    ```
    // default encryption protocol to ssl
        $protocol = isset($this->_config['mailer.protocol']) &&  !empty($this->_config['mailer.protocol']) ? $this->_config['mailer.protocol'] : 'ssl';
    ```
    PARA:
    ```
        $protocol = isset($this->_config['mailer.protocol']) &&  !empty($this->_config['mailer.protocol']) ? $this->_config['mailer.protocol'] : null;
    ```

[Voltar para o sumário](https://github.com/edsongs/instal-mapas)
  
_Autor: [Edson Gellert Schubert](https://github.com/edsongs/)_
