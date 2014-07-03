# GIT Workflow

> Vom Anlegen bis zum Release


- Verfügbare Tools
- Der klassische Weg


## Tools


### Gibo für die passende .gitignore


- [gibo](https://github.com/simonwhitaker/gibo) ist ein Shell-Tool



## Workflow

- Grundsätzliches
- Entwicklungsmodell
- Deploymentmodell


### Grundsätzlich

 - [Saubere einheitliche Commit-Meldungen](https://gist.github.com/sourcerer-mike/9629666)
 - [Branching durchführen](http://nvie.com/posts/a-successful-git-branching-model/)
 
Note:
Auch wenn das Branching nicht immer zum Workflow der anderen
oder gar des ganzen Unternehmens passt,
ist dennoch anzuraten eines durchzuführen.
Nur so lassen sich Ziele,
wie zum Beispiel eine saubere History
und wartbares/wiederverwendbares Repo realisieren.


### Entwicklung


#### Ziel je Aktion

Zum Beispiel je Git-Aktion ein Ziel setzen:

- Die Aufgabe in eigenem *Branch*
- *Commit* nur nach dem Testen
- Nur wenige saubere commits *pushen*
- *Merge* nur mit Dokumentation etc.


### Deployment


Verfügbare Tools:

- [git-ftp](https://github.com/simonwhitaker/gibo) ist ein Deployment-Tool


#### Vor dem Deployment

- Aktuellen Stand von Server holen
- Einzeln commit, nicht `-A` / `--all`
- Lokal nochmal testen + bugfix
- Merge in Master
- Go-Live

Note: Es ist vor jedem Deployment wichtig,
dass die aktuellen Dateien geholt werden.
Sonst werden Dinge überschrieben
oder wir kommen in Konflikte mit Neuerungen,
die während dem Entwickeln nicht beachtet worden sind.
Besser noch wird der Stand schon vor dem Entwickeln abgeglichen
und der Produktiv-Server vom Code her eingefroren.


#### Auf FTP

- Aktuelle Daten per FTP holen
- Nicht per FTP hochladen(!)
- `git ftp push -p`


#### Per SSH

- Aktuelle Daten per Commit reinholen

#### Nachtrag

- Es gibt noch viel mehr zu beachten
- Live-Stellen ist kein "mal eben pullen"
- Keine Arbeit am offenen Herzen

Note: Mit den obigen Punkten ist das Live-Stellen nur umschrieben.
Während dem ganzen gilt es noch zu beachten,
dass der deveop-Zweig auch auf den neuesten Stand gebracht wird.
Zudem muss bei einem pull beachtet werden,
dass oftmals nicht nur die eigenen Änderungen dabei sind,
sondern auch die von Kollegen,
welche noch nicht mit dem Live-Stand getestet wurden
und möglicherweise ein Teil der Seite zerschießen.
Besonders irreführend wird es,
wenn am offenen Herzen / direkt am Live-Server gearbeitet wird.
Dann wurde dort der berühmte "kleine Hotfix" gemacht,
welcher von unserem nächsten Deployment überschrieben wird
und der Kunde uns mit einem Igel in der Kondomfabrik vergleicht.
