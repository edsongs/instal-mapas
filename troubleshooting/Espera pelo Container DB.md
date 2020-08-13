
# Aguardando o Banco de Dados Subir

## O Problema:
Se manifesta, quando executando o ambiente de desenvolvimento, com mensagem de aguardo do banco de dados, como a que segue:

>	[root@fedora dev-scripts]# ./start-dev.sh
>	Starting dev-scripts_db_1      ... done
>	Starting dev-scripts_watcher_1 ... done
>
>	aguardando o banco de dados subir corretamente . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . ^CRemoving de
>	Removing dev-scripts_mapas_run_1d5841f30fa3 ... done
>	Removing dev-scripts_mapas_run_e96dea2df2ac ... done
>	Removing dev-scripts_watcher_1              ... done
>	Removing dev-scripts_db_1                   ... done
>	Removing network dev-scripts_default
>	[root@fedora dev-scripts]#

Consultado, o grupo de desenvolvedores sugeriu que, enquanto se aguarda, noutra sessão, executar o comando:

>	[root@fedora dev-scripts]#  docker-compose -f docker-compose.local.yml start db

Mesmo com este comando, o erro não foi resolvido.

## Resolução:
1) limpar/remover todos os containers:
>	[root@fedora dev-scripts]# cd
>	[root@fedora ~]# docker rm $(docker ps -qa)
	
2) limpar/remover todas as imagens:
>	[root@fedora ~]#  docker rmi $(docker images -qa)

3) clonar o repositório oficial do mapas, versão 5.0.0:
>	[root@fedora dev-scripts]# cd
>	[root@fedora ~]# git clone --branch release/v5.0.0 https://github.com/mapasculturais/mapasculturais.git

4) executar o BUILD no docker-compose:
>	[root@fedora dev-scripts]#  cd ~/mapasculturais
>	[root@fedora mapasculturais]# docker-compose -f dev-scripts/docker-compose.local.yml build

5) ao executar o "docker-compose UP" pode aparecer um erro no db-1:
>	[root@fedora mapasculturais]# docker-compose -f dev-scripts/docker-compose.local.yml up

6) verificar em sessão se o container do DB foi criado e startou; Caso não tenha iniciado, dê start:
>	[root@fedora mapasculturais]#  cd dev-scripts
>	[root@fedora dev-scripts]#  docker-compose -f docker-compose.local.yml start db

7) acompanhar a sessão travada (indicada em 5); deve destravar e rodar corretamente;
	
8) parar e restartar o script "start-dev". Pode aparecer um erro:
>	Error response from daemon: OCI runtime create failed: container_linux.go:349: starting container process caused "process_linux.go:449: container init caused \"rootfs_linux.go:58: mounting \\\"**/root/mapasculturais/docker-data/pcache-cron.log**\\\" to rootfs \\\"/var/lib/docker/overlay2/39f89690b35733eb96ecc39cec1bf6d89ae23747bc8689772086acd7c099e5c4/merged\\\" at \\\"/var/lib/docker/overlay2/39f89690b35733eb96ecc39cec1bf6d89ae23747bc8689772086acd7c099e5c4/merged/var/www/scripts/nohup.out\\\" caused \\\"not a directory\\\"\"": unknown: Are you trying to mount a directory onto a file (or vice-versa)? Check if the specified host path exists and is the expected type

9) editar o arquivo dev-scripts/docker.local.yml e comentar a linha " - ../docker-data/pcache-cron.log:/var/www/scripts/nohup.out":
>	[root@fedora dev-scripts]# vi ~/mapasculturais/dev-scripts/docker.local.yml
>	\#      - ../docker-data/pcache-cron.log:/var/www/scripts/nohup.out

10) iniciar novamente os containers:
>	[root@fedora ~]#  mapasculturais/dev-scripts/start-dev
