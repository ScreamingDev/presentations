# Workflow mit Docker



## Was tun wir hier?

- Die Arbeit vom Hoster
- "Installierbarkeit" / "Konformität"
- einfacher Testen
- Datenschutz / NDA erfüllen

  Server aufsetzen und verwalten ist eine Expertise vom Hoster,
so dass dieser am Besten eine Dockerfile stellt.
Ein Hoster dem eine Dockerfile gegeben werden kann,
der daraus dann einen oder mehrere Server bereitstellt,
ist ebenfalls hilfreich.

Wo auch immer das Dockerfile herkommt dient sie dem Entwickler
primär als Programmierhilfe.
Sie kann den Zielserver simulieren
und bietet somit die Gelegenheit,
die Software vorab unter "echten" Bedingungen zu testen
(auch "Konformität" nach ISO 9126/25000).
Der Schmerz,
dass etwas lokal funktioniert auf dem Zielsystem allerdings nicht,
kann damit abgestellt werden.

Dabei muss es nicht bei einer Umgebung bleiben.
Die Software kann in mehreren Virtualisierungen laufen,
so dass unter verschiedene Umgebungen (PHP-Versionen, HTTP-Server)
getestet werden kann.
Die Testbarkeit
und Sicherstellung der Konformität von Vereinbarungen mit dem Kunden
ist durch Virtualisierung leicht lösbar.

Zu guter letzt haben wir so endlich die Möglichkeit
etwas mehr für Datenschutz
und Verschwiegenheitsvereinbarungen (NDA) zu tun.
Die gesamte Software
und Konfiguration der Virtualisierung
kann auf einem verschlüsstelen USB-Stick bereitstehen.
Nach allen Arbeiten
oder zum Feierabend wird dieser wieder in den Tresor eingeschlossen,
da dies häufig im Rahmen der
ADV (Vereinbarung zur Auftragsdatenverarbeitungs),
bzw. der Anlage zur "technischen und organisatorischen Maßnahmen",
vorgeschrieben ist.


### Docker ist (k)ein Hypervisor

![](img/hypervisor.png)


### Wie sieht das Ziel aus?

![](img/infrastruktur.png)


|               | DEV           | TEST/CI   | STAGING   | LIVE
| -------       |-------------  |---------- |---------- |---------
| **System**    | "Schlimmste"  | Mehrere   | Wie Live  | Mit Sync
| **Daten**     | Generiert     | Generiert | Sync      | Master
| **SSH**       | -             | Jein      | Ja        | Ja
| **Mails**     | Lokal         | @team     | @kunde    | Normal
| **Diff**      | XDebug        | Logging   | Bytecache | Cluster?


### Wer regelt was?

|               | Tool              | Docker Notiz  |
| -------       | ------------      | ------------- |
| **System**    | docker            | docker-compose|
| **Daten**     | migration tools   | DB volume     |
| **SSH**       | sshd              | eigenes Image |
| **Mails**     | mailcatcher/relay | ssmtp         |
| **Diff**      | docker & deployer | SSH-Port      |


### Häufige Probleme

- 4h Overhead (wegautomatisieren)
- Schreibrechte
- Sicherheitslücken
- Netzwerk
- Namen kollidieren


### Weitere Spielereien

- Backups (vgl. Volumes)
- fail2ban (Host vs. STDOUT)
- IP-Adresse (Ästhetik)
- nginx (Demux)
- SSD (Gesundheit)

  Dies ist nicht Teil des Vortrags.


## Docker Compose

<i class="em em-astonished"></i>
<i class="em em-kiss"></i>
<i class="em em-angry"></i>
<i class="em em-confused"></i>

> Ein ständiges hin und her.


### Entwickler-Alltag

```
git clone git.example.org:foo/bar.git
docker-compose up -d
bin/composer install
```


http://127.0.0.1

![](img/chrome-wordpress.png)


### "Ist das einfach!"

docker-compose.yml

```bash
version: '3'
services:
    php:
        image: pretzlaw/wordpress:5.3-apache
    db:
        image: mysql:5.7
```


Mit `docker-compose up -d` starten

```bash
Creating network "wcber_default" with the default driver

Pulling php (pretzlaw/wordpress:5.3-apache)...
ebe41ea51f73: Already exists
743b94e2fe85: Already exists
ce0eb5818e6e: Already exists
f62aa1121c7d: Already exists
8162a1e7a296: Already exists
70d01ae3f6a5: Already exists
778960dbdb32: Already exists
5d464f217287: Pull complete
086979306e7e: Pull complete
3159e31744e2: Pull complete
Status: Downloaded newer image for pretzlaw/wordpress:5.3-apache

Creating wcber_php_1
Creating wcber_db_1
```

  Neue Images holen ist Vergleichbar mit dem holen neuer Composer-Pakete.
Zwischenschichten (Pakete), die bereits heruntergeladen worden,
können wiederverwendet werden.


Mit `docker-compose ps` angucken

```bash
   Name                 Command             State    Ports  
-----------------------------------------------------------
wcber_db_1    docker-entrypoint.sh mysqld   Exit 1          
wcber_php_1   /entrypoint.sh                Up      80/tcp
```


Fehlersuche per `docker-compose logs`

```bash
$ docker-compose logs db

Attaching to wcber_db_1
db_1   | error: database is uninitialized 
db_1   |   You need to specify one of MYSQL_ROOT_PASSWORD,
           MYSQL_ALLOW_EMPTY_PASSWORD
           and MYSQL_RANDOM_ROOT_PASSWORD
```


### RTFM? Kann ich! (nicht)

```yaml
version: "3"
services:
    php:
        image: pretzlaw/wordpress:5.3-apache
    db:
        image: mysql:5.7
        
        # DB Setup
        environment:
            - MYSQL_DATABASE=wcber
            - MYSQL_USER=wcber
            - MYSQL_PASSWORD=wcber
            - MYSQL_ROOT_PASSWORD=
            - MYSQL_ALLOW_EMPTY_PASSWORD=1
```


### Unter welcher URL läuft das?

Mit `docker-compose exec` rein:

```
$ docker-compose exec php bash

root@f00bd1e99c47:/var/www# hostname --all-ip-address
172.21.0.2
```


![](img/apache-forbidden.png)


### Wie? Kein WordPress!?

Projekt rein mounten:

```yml
    php:
        image: pretzlaw/wordpress:5.3-apache
        
        # Projekt in den container
        volumes:
            - ./wp:/var/www/html
            
    db:
        image: mysql:5.7
        environment:
            - MYSQL_DATABASE=wcber
            - MYSQL_USER=wcber
            - MYSQL_USER_HOST=%
            - MYSQL_PASSWORD=wcber
            - MYSQL_ROOT_PASSWORD=
            - MYSQL_ALLOW_EMPTY_PASSWORD=1
```

  Immer Verzeichnisst mit "./" beginnen,
da alles andere als Volumename interpretiert wird.


![](img/wp-db.png)


![](img/wp-install.png)


![](img/docker-bridge.png)


### Arbiträre IPs - bah!

```
    php:
        image: pretzlaw/wordpress:5.3-apache
        volumes:
            - ./wp:/var/www/html
        links:
            - db
            
        # Host :8000 leitet auf :80 weiter
        ports:
            - "8000:80"
```








### Wie bekomme ich die Interfaces weg?

```
$ ifconfig  | grep ":Eth"
br-0b5717a7424e Link encap:Ethernet  
br-2487f7ab30f0 Link encap:Ethernet  
br-576f47be22bd Link encap:Ethernet  
br-58c4674f8c4f Link encap:Ethernet  
br-924f27df9ee7 Link encap:Ethernet  
br-c2d1a702117c Link encap:Ethernet  
br-e5c4b7db0bcc Link encap:Ethernet  
docker0         Link encap:Ethernet  
enp2s0          Link encap:Ethernet  
veth6d27a7a     Link encap:Ethernet  
wlp3s0          Link encap:Ethernet
```


```
$ bridge link list
13: veth6d87a7a state UP @(null) ...

$ brctl show br-0b571ea7284e
bridge name     bridge id   STP                 enabled interfaces
br-0b571ea7284e             8000.024203ec9280   no
```


```
$ docker network list
NETWORK ID      NAME    DRIVER  SCOPE
58c3623fac4f    rmp_foo bridge  local
41d4b6d17f69    rmp_bar bridge  local
2487fcab90f0    rmp_baz bridge  local
923f21df0ee7    rmp_qux bridge  local
576f39be32bd    kd_foo  bridge  local
c2d1a902517c    kd_bar  bridge  local
e5c3b8db5bcc    kd_baz  bridge  local

$ docker network rm ...
```


### Wie lösche ich Docker Volumes?

```bash
$ docker volume ls -f dangling=true
$ docker volume rm $(docker volume ls -qf dangling=true)
```


## Docker

<i class="em em-hurtrealbad"></i>
<i class="em em-construction"></i>
<i class="em em-hand"></i>
<i class="em em-cookie"></i>



## Links und Meinungen


- [Docker und phpStorm - Tja, so mehr so geht so!](https://blog.jetbrains.com/phpstorm/2015/10/docker-support-in-phpstorm/)

