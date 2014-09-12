# GIT Roundtrip

Einmal quer durch das Projekt

Note: Ziel ist es,
den Umgang mit GIT in einem exemplarischen Roundtrip zu zeigen,
welcher dem allgemein üblichen Workflow entspricht.


Mike Pretzlaw
(@fxrmp)

Auch bei GitHub zum nach-/mitlesen:
[sourcerer-mike/presentations](https://github.com/sourcerer-mike/presentations)


# Projekt erstellen und verwalten


## Branching


### Master


### Develop


### Issue und Hotfix


### Versionen



# Auf dem Server arbeiten

## Deployment


## Änderungen auf dem Server bereinigen

Note: Es kann vorkommen, dass jemand direkt auf dem Live-Server oder Staging arbeitet.
In diesem Fall wird ein `git pull` und ähnliches oft fehlschlagen.
Dieser "Verstoß" gegen den Workflow muss natürlich gelöst werden.


- Änderungen des Unbekannten wegspeichern
- Neuerungen in das Repo holen
- Bei Misserfolg benachrichtigen


```
# Änderungen wegspeichern
git stash
# Aktuelle Version holen
git pull
# Versuch die Änderungen wiederzuholen
git stash apply
```


```
git stash show -p | \
mail -s "Deine Änderungen wurden verworfen" mike@code-x.de
```

Note: Im Grunde sollte es nicht Aufgabe eines anderen Entwicklers sein,
den fehlenden Commit aufzudröseln
und wieder für einen ordentlichen Stand zu sorgen.
Hier ist vielmehr der Urheber dieser Zeilen gefragt,
da er über die Funktionalität genau bescheid weiß und was zu ändern war.


## Live-Änderungen per FTP bereinigen

Note: Leider gibt es auch Projekte,
die keinen SSH-Zugang besitzen
und somit per FTP abgeglichen werden müssen.

- Abgleich per `wget`
- Änderungen holen
- Testen und ab ins Repo


`nano ~/bin/fcp` - als `fcp` per Terminal aufrufbar:

```
#!/bin/bash

echo -n "Host with path (no ftp://): "
read HOSTPATH

echo -n "User    : "
read USER

echo -n "Password: "
read -s PASSWORD

wget -r --ftp-password=$PASSWORD --ftp-user=$USER ftp://$HOSTPATH
```
