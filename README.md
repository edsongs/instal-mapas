# Documentação

Proposta de estruturação construída e pensada, via este [diagrama](https://github.com/edsongs/instal-mapas/blob/master/DocuDiag.pdf) de mind-mapping elaborado usando o GitMind.

**Índice do Documento:**
1. [Manual de Uso](https://github.com/edsongs/instal-mapas#manual-de-uso)
2. [Manual do Administrador](https://github.com/edsongs/instal-mapas#manual-do-administrador)
3. [Manual do Desenvolvedor](https://github.com/edsongs/instal-mapas#manual-do-desenvolvedor)

## Manual de Uso
Este manual é pensado em concentrar todos os documentos necessários para correto uso da plataforma [Mapas Culturais](http://github.com/mapasculturais).

1. Usuário Final
	1. Acesso
		1. Registro Inicial
		2. Confirmação de Registro
		3. Login
	2. Agente
		1. Cadastro
		2. Atualização
		3. Atribuições
	3. Espaço
	4. Projeto
	5. Evento
		1. Criação
	6. Oportunidade
2. Administrador
	1. Evento
		1. Tipo
		2. Anexos
		3. Descrição
	2. Projeto
	3. Oportunidade
		1. Tipos
		2. Formulário
	4. Agente
	5. Registro de Usuário
	6. [Selos](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_user_seal.md#selos)

## Manual do Administrador
Este manual é pensado em concentrar todos os documentos necessários para a administração da plataforma [Mapas Culturais](http://github.com/mapasculturais).

1. [Requisitos de sistema](https://github.com/edsongs/instal-mapas/tree/master/draft/Requisitos%20minimos).
2. [Instalação do Ambiente](https://github.com/edsongs/instal-mapas/blob/master/Instalacao.md)
	1. Ubuntu/Debian
		1. Deploy
			* [Instalação Manual](https://github.com/edsongs/instal-mapas/tree/master/draft/Deploy/Instalacao%20Manual%20Ubuntu%2018.04%20e%2020.04)
			* [Instalação com Docker](https://github.com/edsongs/instal-mapas/tree/master/draft/Deploy/Instalacao%20Docker%20Ubuntu%2018.04%20e%2020.04)
		2. Desevolvimento
			* [Instalação Manual](https://github.com/edsongs/instal-mapas/tree/master/draft/Desenvolvimento/Instalacao%20Manual%20Ubuntu%2018.04%20e%2020.04)
			* [Instalação com Docker](https://github.com/edsongs/instal-mapas/tree/master/draft/Desenvolvimento/Instalacao%20Docker%20Ubuntu%2018.04%20e%2020.04)
	2. Fedora/Centos
		1. Deploy
			* Instalação Manual
			* Instalação com Docker
		2. Desevolvimento
			* Instalação Manual
			* [Instalação com Docker](https://github.com/edsongs/instal-mapas/blob/master/draft/Desenvolvimento/Docker/Docker-FEDORA32.md)
3. [Migração de Servidor](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_deploy_migration.md)
	1. Registros
		1. Exportação do BD
		2. Importação BD
		3. Uso de API
	2. Temas
		1. Textos
		2. Imagens
		3. Cores

4. [Atualização de Instalação](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_deploy_update.md#mapas-culturais--update
)

5. [Perfil de Usuário](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_user_profile.md)
	1. [Super Administrador SaaS](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_deploy.md#8-p%C3%B3s-instalacao--criando-super-admin)
	2. [Administrador SaaS](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_deploy.md#8-p%C3%B3s-instalacao--criando-super-admin)
	3. Administrador
	4. Usuário

6. Administração do Ambiente
	1. [Subsites - SaaS](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_config_saas.md)
		1. Textos
		2. Imagens
		3. Administradores
		4. Tema
			1. Imagens
	2. Segurança
		1. [Certificado](https://github.com/edsongs/instal-mapas/tree/master/draft/Deploy/Instalacao%20Manual%20Ubuntu%2018.04%20e%2020.04#instalacao-do-certificado-ssl-com-letsencrypt )
	3. [Plugins](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_config_plugins.md )
		1. [Mailer](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_config_plugins.md#mailer )
		2. [Autenticação](https://github.com/edsongs/instal-mapas/blob/master/configuracoes/README.md#instalacao-do-plugin-de-registro-login-e-recuperacao-de-senha )
			1. Google
			2. Facebook
			3. Twitter
			4. LinkedIn
			5. Local
				* Regras Autenticação
			6. Captcha
		3. [Aldir Blanc](https://github.com/mapasculturais/plugin-AldirBlanc)
	4. Configuração de Ambiente
		1. [Temas](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_deploy_theme.md#temas-conhecidos)
	5. [Auditoria e Logs de Atividades](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_user_history.md#hist%C3%B3rico-das-entidades)
	6. [Selos no ambiente do mapas culturais](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_config_seal.md#selos-no-ambiente-do-mapas-culturais)
# Manual do Desenvolvedor
Este manual é pensado em concentrar todos os documentos necessários para o desenvolvimento/programação da plataforma [Mapas Culturais](http://github.com/mapasculturais).
1. [API](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_config_api.md)
	1. Dicionário Funções 
	2. Exemplos de Uso
2. Programação
	1. [Personalizando montagem do endereço](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_developer_address.md)
	2. [Como contribuir](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_developer_contribute.md)
	3. [Desenvolvimento com Docker](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_developer_docker_enviroment.md)
	4. [Entidades dos Mapas Culturais](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_developer_entities.md)
	5. [Opções de Geocoding e busca de endereço por código postal](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_developer_geocoding.md)
	6. [Mapas Culturais > Guia do Desenvolvedor](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_developer_guide.md)
	7. [Internacionalização](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_developer_i18n.md)
	8. [Busca por palavra-chave - via DQLs (Doctrine Query Language)](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_developer_keywords.md)
	9. [Fazendo um novo Release](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_developer_releases.md)
	10. [Testes Unitários - via Docker(Travis-CI)](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_developer_tests.md)
	11. [Customização do tema do Mapas Culturais](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_developer_theme.md)
	12. [Adicionando campos adicionais ao seu tema](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_developer_theme_add_metadata.md)
	13. [Personalizando as listagens da busca](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_developer_theme_infobox.md)
	14. [Variáveis (de Ambiente) de Configuração de Temas](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_config_index.md#themesactive)
	15. [SHAPEFILEs](https://github.com/mapasculturais/mapasculturais/blob/develop/documentation/docs/mc_deploy_shapefiles.md#mapas-culturais--deploy--shapefiles)
	16. [Geração de chaves reCAPTCHA](https://docs.wpusermanager.com/article/147-generate-recaptcha-api-keys)

3. [Repositório](https://github.com/mapasculturais/mapasculturais)
4. Extensões
	1. Inclusão de Campos
	2. Alteração de Tema

Autores: [Edson Gellert Schubert](http://github.com/edsongs) e [Wiusmarques Moreira](http://github.com/wiusmarques)
