# Instalação DOCKER para **Fedora32** e **Centos7**

## Passo 1: Atualização inicial
```
    [root@fedora ~]# yum update -y
    [root@fedora ~]# yum install git -y
```

>*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*

>**Obs.:** _Testar com [esta](https://fedoramagazine.org/docker-and-fedora-32/) receita._

>*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*

## Passo 2: Instalação do Docker ([consultado](https://computingforgeeks.com/how-to-install-docker-on-fedora/))
```
    [root@fedora ~]# dnf remove docker docker-client docker-client-latest docker-common docker-latest	\
                 	 docker-latest-logrotate docker-logrotate docker-selinux docker-engine-selinux docker-engine
    [root@fedora ~]# dnf -y install dnf-plugins-core
    [root@fedora ~]# tee /etc/yum.repos.d/docker-ce.repo<<EOF
[docker-ce-stable]
name=Docker CE Stable - \$basearch
baseurl=https://download.docker.com/linux/fedora/31/\$basearch/stable
enabled=1
gpgcheck=1
gpgkey=https://download.docker.com/linux/fedora/gpg
EOF
	[root@fedora ~]# dnf makecache
	[root@fedora ~]# dnf install docker-ce docker-ce-cli containerd.io
	[root@fedora ~]# systemctl enable docker
	[root@fedora ~]# dnf install docker-compose
	[root@fedora ~]# usermod -aG docker user	# opcional
	[root@fedora ~]# vi /etc/firewalld/firewalld.conf
FirewallBackend=iptables
	[root@fedora ~]# systemctl restart firewalld.service
```
## Passo 3: Ajustes no "cgroup" ([consultado](https://docs.docker.com/engine/install/fedora/))
```
	[root@fedora ~]# grubby --update-kernel=ALL --args="systemd.unified_cgroup_hierarchy=0"
	[root@fedora ~]# reboot
```
## Passo 4: Clonagem do repositório
```
        [user@fedora ~]$ sudo -i
	[sudo] senha para user:
	[root@fedora ~]# git clone https://github.com/mapasculturais/mapasculturais-base-project.git plataforma
	ou
	[root@fedora ~]# git clone https://github.com/mapasculturais/mapasculturais-aldirblanc plataforma
	[root@fedora ~]# cd ~/plataforma
	[root@fedora ~]# git remote set-url origin https://github.com/edsongs/plataforma
	[root@fedora ~]# git push
```
## Passo 5: Executando o ambiente da Plataforma
```	
	[root@fedora ~]# cd dev-scripts
	[root@fedora ~]# ./start-dev-sh
```

_Autor: [Wiusmarques Moreira](https://github.com/wiusmarques/) & [Edson Gellert Schubert](https://github.com/edsongs/)_
