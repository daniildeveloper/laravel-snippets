# Teamcity for my server

Follow the steps below to install Team City 9.0.3 on Ubuntu with Nginx as the proxy for port 80.

```bash
sudo wget -c https://gist.githubusercontent.com/sandcastle/9282638/raw/teamcity-install.sh -O /tmp/teamcity-install.sh
sudo sh /tmp/teamcity-install.sh
sudo rm -rf /tmp/teamcity-install.sh
```
## Postrgres
install postrgres
```bash
sudo apt-get update
sudo apt-get install postgresql postgresql-contrib
```

configure remote access
```bash
sudo vi /etc/postgresql/9.3/main/pg_hba.conf

# remote access (where x.x.x.x is your IP)
host all all x.x.x.x/32 md5

# servers (repeat this line per server)
host all all x.x.x.x/32 md5
```

Configure listening:

```sh
# open the file and change the lines below
sudo nano /etc/postgresql/9.3/main/postgresql.conf

listen_addresses = '*'
```

Access the psql command line:

```sh
# switch user to the postgres user
sudo su - postgres

# load the command line
psql
```

```psql
# create the team city user
create role teamcity with login password '<password>';
create database teamcity owner teamcity;
```

### Postgres database properties
```properties
connectionUrl=jdbc:postgresql://localhost/teamcity
connectionProperties.user=<postgres>
connectionProperties.password=<password>
```

Update the database settings:
```sh
sudo vi /srv/.BuildServer/config/database.properties
```

show ports
```sh
netstat -ntlp | grep LISTEN
```

## Nginx config

```sh
# vi /etc/nginx/sites-available/teamcity
```

```conf
# We need to support websockets from TC 9.x onwards
# https://confluence.jetbrains.com/display/TCD9/How+To...#HowTo...-SetUpTeamCitybehindaProxyServer

map $http_upgrade $connection_upgrade {
    default upgrade;
    ''   '';
}

server {

    listen       80;
    server_name  teamcity.daniiltserin.ru;

    proxy_read_timeout     1200;
    proxy_connect_timeout  240;
    client_max_body_size   0;

    location / {

        proxy_pass          http://localhost:8111/tc;
        proxy_http_version  1.1;
        proxy_set_header    X-Forwarded-For $remote_addr;
        proxy_set_header    Host $server_name:$server_port;
        proxy_set_header    Upgrade $http_upgrade;
        proxy_set_header    Connection $connection_upgrade;
    }
}
```

## Install java
```sh
sudo add-apt-repository ppa:webupd8team/java
sudo apt-get update
sudo apt-get install oracle-java8-installer
```

verify installed
```sh
java -version
```

configure
```sh
sudo apt-get install oracle-java8-set-default
```

add deps to /etc/enviroment
```
JAVA_HOME=/usr/lib/jvm/java-8-oracle
JRE_HOME=/usr/lib/jvm/java-8-oracle/jre
```

## Teamcity

Start it up:
```
sudo /etc/init.d/nginx start
sudo /etc/init.d/teamcity start
```