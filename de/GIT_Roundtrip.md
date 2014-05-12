# GIT Roundtrip

Einmal quer das Projekt

Note: Ziel ist es, den Umgang mit GIT in einem exemplarischen Roundtrip zu zeigen,
welcher dem allgemein üblichen Workflow entspricht.


Mike Pretzlaw

[![x](http://www.code-x.de/wp-content/uploads/Kreativ-256x115.png)](http://code-x.de)

für code-x GmbH

[bit.ly/cx-git-conflict](http://bit.ly/cx-git-conflict)



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
- Neuerungen im Repo holen
- Änderungen des Anderen wiederholen
- Bei Misserfolg benachrichtigen

Note: So kann ein Entwickler, welcher auf das Problem stößt,
schnell wieder für eine solche Ordnung sorgen,
so dass er seine eigenen Änderungen holen kann.
Der Fehler beim Pull wird durch Zwischenspeicherung umgangen
und die eigenen Änderungen werden eingespielt.
Die Befehle hierfür sind:


```
# Änderungen wegspeichern
git stash
# Aktuelle Version holen
git pull
# Versuch die Änderungen wiederzuholen
git stash apply
```

Note: Bei dem letzten Befehl könnte es dazu kommen,
dass GIT abermals die Arbeit verweigert.
Dies ist nicht weiter schlimm,
denn dabei handelt es sich um die fremden Änderungen.
Natürlich wollen wir den Urheber darüber informieren
und senden eine Mail an ihn (oder auch an alle):


```
git stash show -p | \
mail -s "`pwd` Änderungen verworfen" mike@code-x.de
```

Note: Im Grunde sollte es nicht Aufgabe eines anderen Entwicklers sein,
den fehlenden Commit aufzudröseln
und wieder für einen ordentlichen Stand zu sorgen.
Hier ist vielmehr der Urheber dieser Zeilen gefragt,
da er über die Funktionalität genau bescheid weiß und was zu ändern war.




