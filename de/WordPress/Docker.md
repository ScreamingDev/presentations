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


### Wie sieht das Ziel aus?

|               | DEV           | TEST/CI   | STAGING   | LIVE
| -------       |-------------  |---------- |---------- |---------
| **System**    | "Schlimmste"  | Mehrere   | Wie Live  | Mit Sync
| **Daten**     | Generiert     | Generiert | Sync      | Master
| **SSH**       | -             | Ja        | Ja        | Ja
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


### Weitere Spielerei mit Docker

- Backups
- fail2ban (Host)
- eigene IP (ästhetik)
- nginx Demux



## Docker Compose

<i class="em em-astonished"></i>
<i class="em em-kiss"></i>
<i class="em em-angry"></i>
<i class="em em-confused"></i>


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



## Docker

<i class="em em-hurtrealbad"></i>
<i class="em em-construction"></i>
<i class="em em-hand"></i>
<i class="em em-cookie"></i>
