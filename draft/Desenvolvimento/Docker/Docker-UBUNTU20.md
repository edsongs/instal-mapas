# Instalação DOCKER para **Debian10** e **Ubuntu20**

## Passo 1: Atualização inicial
Primeiro as referências e cache:
```
edson@docker:~$ sudo -i
root@docker:~# apt update
```
Depois todos os pacotes do ambiente:
```
root@docker:~# apt upgrade
```
## Passo 2: Instalação Inicial de Pacotes Básicos
```
root@docker:~# apt install git
root@docker:~# apt-get install apt-transport-https ca-certificates curl gnupg-agent software-properties-common
```
## Passo 3: Instalação do Docker
Primeiro elimina-se qualquer instalação anterior:
```
root@docker:~# apt-get remove docker docker-engine docker.io containerd runc
```
Específico para Debian:
```
root@docker:~# curl -fsSL https://download.docker.com/linux/debian/gpg | sudo apt-key add -
root@docker:~# apt-key fingerprint 0EBFCD88
root@docker:~# add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/debian $(lsb_release -cs) stable"
```
Específico para Ubuntu:
```
root@docker:~# curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
root@docker:~# apt-key fingerprint 0EBFCD88
root@docker:~# add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
```
Em ambas distribuições:
```
root@docker:~# apt-get update
root@docker:~# apt-get install docker-ce docker-ce-cli containerd.io
root@docker:~# exit
```
## Passo 4: Testando o Docker
```
user@docker:~$ sudo docker run hello-world
user@docker:~$ sudo -i
root@docker:~# systemctl status docker
```
## Passo OPCIONAL: Instalando "net-tools"
```
root@docker:~# apt install net-tools
root@docker:~# netstat -tunlp
root@docker:~# exit
```
## Passo 5: Instalação "docker-compose"
```
user@docker:~$ sudo curl -L "https://github.com/docker/compose/releases/download/1.26.0/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
user@docker:~$ sudo chmod +x /usr/local/bin/docker-compose
user@docker:~$ docker-compose --version
```
## Passo 5: Autorizando o "user" a Executar o Docker
```
user@docker:~$ sudo usermod -aG docker $(whoami)
```
## Passo 5: Clonagem do Repositório
```
user@docker:~$ git clone --branch release/v5.0.0 https://github.com/mapasculturais/mapasculturais.git
```
ou
```
user@docker:~$ git clone https://github.com/mapasculturais/mapasculturais-base-project.git mapa
user@docker:~$ cd mapa/dev-scripts/
```
## Passo 6: Executando o Ambiente da Plataforma
```
user@docker:~$ sudo ./start-dev.sh
```
## Passo OPCIONAL: Construir os Containers
```
user@docker:~$ cd ~/mapa
user@docker:~$ docker-compose -f docker-compose.dev.yml build
user@docker:~$ docker-compose -f docker-compose.dev.yml up
```
## Passo OPCIONAL: "Forqueando" o Repositório
```
user@docker:~$ git remote set-url origin https://github.com/<user>/mapasculturais
user@docker:~$ git push
```

_Autor: [Wiusmarques Moreira](https://github.com/wiusmarques/) & [Edson Gellert Schubert](https://github.com/edsongs/)_
