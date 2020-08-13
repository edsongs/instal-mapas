```
# yum update -y
# yum install yum-utils -y
# yum install git curl gcc-c++ make zip unzip -y 
# curl -sL https://rpm.nodesource.com/setup_8.x | sudo -E bash -
# sudo yum install gcc-c++ make
sudo yum install -y nodejs
curl --silent --location https://dl.yarnpkg.com/rpm/yarn.repo | sudo tee /etc/yum.repos.d/yarn.repo
sudo rpm --import https://dl.yarnpkg.com/rpm/pubkey.gpg
sudo yum install yarn (https://linuxize.com/post/how-to-install-yarn-on-centos-7/)
```
Procedimento consultado em https://phoenixnap.com/kb/how-to-install-nginx-on-centos-7
```
sudo yum install epel-release -y
yum install nginx -y
systemctl start nginx
systemctl enable nginx
systemctl status nginx
npm install -g uglify-js uglifycss autoprefix
yum install rubygem-sass -y
```
Banco de dados
```
yum-config-manager --enable pgdg96
```
Install the repository RPM:
```
yum install https://download.postgresql.org/pub/repos/yum/reporpms/EL-7-x86_64/pgdg-redhat-repo-latest.noarch.rpm
```
Install PostgreSQL:
```
yum install postgresql96-server
```
Optionally initialize the database and enable automatic start:
```
/usr/pgsql-9.6/bin/postgresql96-setup initdb
systemctl enable postgresql-9.6
```
Install the repository RPM:
```
yum install https://download.postgresql.org/pub/repos/yum/reporpms/EL-7-x86_64/pgdg-redhat-repo-latest.noarch.rpm
```
Install PostgreSQL:
```
yum install postgresql96 postgresql96-server postgresql96-contrib postgresql96-libs -y
yum install sudo yum install postgis24_96
```
Optionally initialize the database and enable automatic start:
```
/usr/pgsql-9.6/bin/postgresql96-setup initdb
systemctl enable postgresql-9.6
```
```
su - postgres 
postgres# createuser mapas
postgres# createdb mapas
postgres# psql 
psql=# alter user "mapas" with encrypted password 'mapas';
psql=# grant all privileges on database mapas to "mapas";
```
Conecte no banco de dados: mapas
```
postgres=# \c mapas
```
Você está conectado agora ao banco de dados "mapas" como usuário "postgres".
```
mapas=# CREATE EXTENSION postgis;
CREATE EXTENSION
mapas=# CREATE EXTENSION unaccent;
CREATE EXTENSION

psql=# \q
postgres# psql
# vi /var/lib/pgsql/9.6/data/pg_hba.conf
 // Edite a linha
  host    all             all             127.0.0.1/32            ident
 //para 
  host    all             all             127.0.0.1/32            md5
# systemctl restart postgresql-9.6
```
PHP
```
# vi /etc/yum.repos.d/CentOS-Base.repo
```
Escreva o código seguinte:
```
[base]
exclude=php*
 
[updates]
exclude=php*
```
Após salvar as alterações, inicie as installações:
```
wget https://dl.fedoraproject.org/pub/epel/7/x86_64/Packages/e/epel-release-7-12.noarch.rpm
wget http://rpms.remirepo.net/enterprise/remi-release-7.rpms

# yum -y install epel-release
# rpm -Uvh epel-release-latest-7.noarch.rpm
# rpm -Uvh remi-release-7.rpm
# yum-config-manager --enable remi-php72
# yum install php php-fpm php-pdo php-json php-common php-cli php-xml php-pgsql php-mbstring php-mcrypt php-pecl-apcu php-pecl-imagick php-opcache php-doctrine-orm php-pecl-zip php-mysql -y
# systemctl start php-fpm
# systemctl enable php-fpm
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/bin/compose
```
Importação do Código da plataforma
```
# useradd -G nginx -d /srv/mapas -m mapas
# su - mapas
git clone https://github.com/hacklabr/mapasculturais.git
cd ~/mapasculturais
git checkout master
mapas@server$ psql -f mapasculturais/db/schema.sql

cp mapasculturais/src/protected/application/conf/config.template.php mapasculturais/src/protected/application/conf/config.php

mkdir mapasculturais/src/assets
mkdir mapasculturais/src/files
mkdir mapasculturais/private-files

exit
root@server# mkdir /var/log/mapasculturais
root@server# chown mapas:nginx /var/log/mapasculturais
mkdir /etc/nginx/sites-available
mkdir /etc/nginx/sites-enabled
```
Agora adicione o "sites-enabled" e comente o codigo seguinte no nginx.config :
```
# vim /etc/nginx/nginx.config
```
```
include /etc/nginx/sites-enabled/*.conf;
#    server {
# ...
# ...
# }
```
Altere e ajuste as configurações no mapas.conf
```
vim /etc/nginx/sites-available/mapas.conf
server {
	listen       80 default_server;
        listen       [::]:80 default_server;  
	server_name localhost;
  	access_log /var/log/nginx/mapas.access.log;
  	error_log  /var/log/nginx/mapas.error.log;

        client_max_body_size 10M;

  	root /srv/mapas/mapasculturais/src/;
	index index.php;

  	location / {  
    	   try_files $uri $uri/ /index.php?$args;
  	}	

  	location ~ /files/.*\.php$ {
           deny all;
      	   return 403;
        }

  	location ~* \.(js|css|png|jpg|jpeg|gif|ico|woff|pdf|odt|xls)$ {
           expires 1w;
           log_not_found off;
  	}

  	location ~ \.php$ {
           try_files $uri =404;
    	   include fastcgi_params;
    	   fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    	   fastcgi_pass unix:/var/run/php-fpm/mapas.sock;
    	   client_max_body_size 10M;
  	}
	
       charset utf-8;
}

ln -s /etc/nginx/sites-available/mapas.conf /etc/nginx/sites-enabled/mapas.conf
```
```
# vim /etc/php-fpm.d/mapa.conf
[mapas]
listen = /var/run/php-fpm/mapas.sock
listen.owner = mapas
listen.group = nginx
user = mapas
group = nginx
catch_workers_output = yes
pm = dynamic
pm.max_children = 20
pm.start_servers = 5
pm.min_spare_servers = 5
pm.max_spare_servers = 10
pm.max_requests = 500
chdir = /srv/mapas
php_admin_value[session.save_path] = /tmp/
php_admin_value[error_log] = /var/log/mapasculturais/php.error.log
php_admin_flag[log_errors] = on
php_admin_value[display_errors] = 'stderr'
```
```
# systemctl restart php-fpm
# systemctl restart nginx

# su - mapas
mapas# cd ~/mapasculturais/src/protected/ 
mapas# compose install
mapas@ cd ~
mapas# psql -f mapasculturais/db/initial-data.sql
mapas# ./mapasculturais/scripts/deploy.sh

systemctl restart nginx
systemctl restart php-fpm
```
