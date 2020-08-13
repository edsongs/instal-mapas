[Voltar para o sumário](https://github.com/edsongs/instal-mapas)
  
# Instalação do Plugin de Registro, Login e Recuperação de Senha
>   **Disclaimer:**
>   _Estas instruções foram executadas e testadas em um ambiente de testes composto por uma VM rodando uma instalação básica de servidor Ubuntu 18.04, com 2BG de RAM, 10GB de HD, 2 CPUs e rede em acesso bridge. O ambiente do Mapas Culturais foi excutado em ambiente Docker, partindo de uma configuração padrão, obtida diretamente da clonagem do repositório oficial da aplicação._

Para habilitar o novo plugin que implementa as funcionalidades de **login e registro local**, assim como a facilidade de **recuperação de senha** pelo envio de link para a redefinição da senha ao e-mail público cadastrado do ente, siga os seguintes passos:
1. Instalar normalmente escolhendo as [instruções mais adequadas](https://github.com/edsongs/instal-mapas/Instala%C3%A7%C3%A3o.md) até o ponto **_imediatamente anterior_** à clonagem do repositório do Mapas Culturais (isto vai garantir que a última versão de desenvolvimento deste _branch_ seja instalada).

2. Clonar o _branch_ 5.0.0 do repositório Mapasculturais configurado com o ambiente Docker:
```
user@server:~/$ sudo git clone --branch release/v5.0.0 https://github.com/mapasculturais/mapasculturais.git
```
3. Criar diretório plugin sob o diretório criado no passo anterior:
```
user@server:~/$ sudo mkdir mapasculturais/plugin
```
4. Entrar no diretório recém criado:
```
user@server:~/mapasculturais/$ cd mapasculturais/plugin
```
5. Baixar a última versão do plugin do repositório do Ceará:
```
user@server:~/mapasculturais/plugin$ sudo git clone https://github.com/govce/MultipleLocalAuth.git
```
6. Atualizar o arquivo de definição do Docker incluindo as seguintes definições de volumes:
```
user@server:~/mapasculturais/plugin$ cd ../dev-scripts
user@server:~/mapasculturais/dev-scripts$ sudo vi docker-compose.local.yml
```
>   \# diretório de plugin
>     - ../plugin/MultipleLocalAuth:/var/www/html/protected/application/plugins/MultipleLocalAuth

Ou use [este](https://github.com/edsongs/instal-mapas/configura%C3%A7%C3%B5es/docker-compose.local.yml) arquivo já comentado de definições.

7. Mude para o diretório de configurações "expostas" e inclua os arquivos de configuração usando o comando:
```
user@server:~/mapasculturais/dev-scripts$ cd ../compose
user@server:~/mapasculturais/compose/$ sudo git clone https://github.com/edsongs/instal-mapas/configura%C3%A7%C3%B5es/config.d
```
8. Altere as configurações conforme necessário:
   - Para alterar o nome do site e sua descrição, altere o arquivo "[0-base.php](https://github.com/edsongs/instal-mapas/blob/master/configura%C3%A7%C3%B5es/config.d/0-base.php)";
   - Para habilitar a facilidade de denuncias e encaminhamento de sugestões, altere o arquivo "[1-denuncia_sugestao.php](https://github.com/edsongs/instal-mapas/blob/master/configura%C3%A7%C3%B5es/config.d/1-denuncia_sugestao.php)";
   - Para alterar as configurações do banco de dados, altereo arquivo "[2-doctrine.php](https://github.com/edsongs/instal-mapas/blob/master/configura%C3%A7%C3%B5es/config.d/2-doctrine.php)";
   - Para habilitar e alterar as configurações de log da aplicação, altere o arquivo "[3-LOGs.php](https://github.com/edsongs/instal-mapas/blob/master/configura%C3%A7%C3%B5es/config.d/3-LOGs.php)";
   - Para alterar o mapa apresentado nas consultas, altere o arquivo "[4-GPS.php](https://github.com/edsongs/instal-mapas/blob/master/configura%C3%A7%C3%B5es/config.d/4-GPS.php)";
   - Para registrar os plugins habilitados no sistema, altere o arquivo "[5-plugin_en.php](https://github.com/edsongs/instal-mapas/blob/master/configura%C3%A7%C3%B5es/config.d/5-plugin_en.php)";
   - Para que a funcionalidade de e-mail funcione, altere o arquivo "[6-mailer.php](https://github.com/edsongs/instal-mapas/blob/master/configura%C3%A7%C3%B5es/config.d/6-mailer.php)";
   - Para que a habilitar o login local, os baseados em serviços, incluir sua chave de Captcha e definir as estratégias de senha, altere o arquivo "[8-authentication.php](https://github.com/edsongs/instal-mapas/blob/master/configura%C3%A7%C3%B5es/config.d/8-authentication.php)";
   - Para habilitar a funcionalidade de **reCAPTCHA** siga [estas instruções](https://docs.wpusermanager.com/article/147-generate-recaptcha-api-keys) e, com as chaves anotadas, altere os parâmetros no arquivo "[8-authentication.php](https://github.com/edsongs/instal-mapas/blob/master/configura%C3%A7%C3%B5es/config.d/8-authentication.php)".
   
9. Ajustes, mudanças e/ou substituições nos/dos **textos enviados por e-mail**, quando do registro de novo usuário do Mapas, assim como no/do **termos e condições de uso** podem ser feitas alterando-se os arquivos que estão no diretório:
> **_~/mapasculturais/plugin/MultipleLocalAuth/views/auth_**

[Voltar para o sumário](https://github.com/edsongs/instal-mapas)
  
_Autor: [Edson Gellert Schubert](https://github.com/edsongs/)_
