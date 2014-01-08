# Magento Extension

What the ...


![foo](http://cdn.memegenerator.net/instances/500x/44649461.jpg)


## Logisch!

- Modul erstellen
- Struktur und Eigenarten
- Code Qualität
- Tests
- Dokumentation


## Unlogisch!

Am Ende macht man doch alles kreuz
und quer.



![x](http://cdn.memegenerator.net/instances/500x/44649627.jpg)


## Viele Wege führen nach Rom

- Das vom Hackathon (in Babyschuhen)
- Magicento (kostet)
- Silk Module Creator (nur Online)
- Magerun
- Händisch (best of the best of the best!)


## Vom Hackathon

- Erstellen: Gewohnte Struktur
- Verändern: Grid, Triad, etc.
- Muss sich gegen Magerun durchsetzen
- Magerun könnte schnell erweitert werden


## Magicento

- Erstellen von Modulen
- Erstellen von Triaden
- Templates rumkopieren
- Feierabend?!


## Silk Module Creator

- Gute Quelle für Snippets (Attribute etc.)
- Nahezu vollständig
- Aber nur Online


## Magerun

- Nettere Struktur
- Aber viel einzustellen
- Klappt nicht immer
- Erweitern bleibt außen vor


## Selbst Hand anlegen

- Struktur, die man braucht
- Skeleton bildet sich
- Anpassbar an neue Anforderungen
- Partey!


![os](http://cdn.memegenerator.net/instances/500x/44649708.jpg)


# Struktur und Eigenarten

**NEU:** Objektorientiert programmieren

_Der letzte Schrei!_


## Was waren nochmal die kommenden Themen?

- Code Qualität
- Tests
- Dokumentation

Die wollen alle gekapselt werden.


## dev/

- phpmd.xml - Bau kein Scheiß
- codeSniffer.xml - Coding Standards
- package.xml - Connect
- travis-ci - Externer UnitTests
- phpunit.xml.dist - UnitTest


## src/

- Die Erweiterung (im Community-Pool)
- Test-Extension (im Local-Pool)
- Nur kram für Endnutzer


## doc/

- Funktionalität als MD
- Changelog (generiert aus Commits)
- Features (generiert aus TestDox)
- phpDoc.dist.xml


## /

- Sauber bleiben!
- Will doch keiner Scrollen
- GitHub: CONTRIBUTING, LICENSE, README
- modman, composer.json, .travis.yml, .gitignore
- 10 Dinge - voll genug!


## Cool

- Magento-Struktur beibehalten
- Helper::MODULE_NAME, ::MODULE_ALIAS
- Eigener AbstractController, ..Model, ..Helper etc.
- ...


# Code Qualität

Schon mal gemacht?


## PHPMD

- MD = Mess Detector (aka Scheiße-Scanner)
- Zeigt Verstöße gegen Metriken
- Einhalten von Gepflogenheiten
- Lesbarer Code
- I'm so horny!

```
phpmd $DIR text $WHAT
```


- **Code size**: Cyclomatic complexity, NPath Complexity,
  excessive naming or amount of methods/properties
- **Controversial rules**: like accessing super-globals directly.
- **Design hints**: no exit/eval/goto, low depth of inheritance and low coupling between objects.
- **Naming rules**: too short/long variables, naming and no getter with boolean return value.
- **Unused code**: unused private fields/methods, local variables or formal parameter.


Beispiel: `phpmd ./app text controversial`

```
StandardController.php:96
The variable $order_id is not named in camelCase.

ConfigController.php:15
validateAction accesses the super-global variable $_REQUEST.

The class Codex_Yapital_Foo is not named in CamelCase.
```

Für Magento nicht sinnvolle Regeln lassen sich ausschalten.


## Code Sniffer

PHP-FICK! Äh, ich mein PHP-FIG...

**L** für Liebe

&lt;blink&gt;**PEAR 4tw**&lt;/blink&gt;


Sorry, aber man kann Pseudo-Experten echt kein Zepter in die Hand geben ...


... in manchen Fällen sollte man es ihnen in den Arsch schieben.


Mach'n RFC!

**FFS!**


![bam](https://i.chzbgr.com/maxW500/7841839872/hD65D9062/)


### Standards erfüllen

- Zend
- PEAR
- Squiz
- Der eigene (cool!)


### Standards testen

`phpcs --standard=meiner.xml ./src/app`

```
-------------------------------------------------------------------------
FOUND 4 ERROR(S) AFFECTING 3 LINE(S)
-------------------------------------------------------------------------
  3 | ERROR | Each PHP statement must be on a line by itself
  5 | ERROR | File is being unconditionally included; use "require_once"
    |       | instead
 26 | ERROR | Line indented; expected at least 8 spaces, found 0
 26 | ERROR | Space found before comma in function call
-------------------------------------------------------------------------
```

Boioioioioiong!


### Standard definieren

- Einfach zusammentragen aus anderen (Zend, PEAR, etc.)
- Unsinniges deaktivieren oder ändern

```
<!-- Arguments on new line if too long -->
<rule ref="Squiz.Functions.MultiLineFunctionDeclaration"/>
<!-- But not the brace itself. Please.... -->
<rule ref="Squiz.Functions.MultiLineFunctionDeclaration.BraceOnNewLine">
    <severity>0</severity>
</rule>
```



# Tests

Warum überhaupt welche machen?


![vfdsfvfd](https://i.chzbgr.com/maxW500/7938337024/h9CF0BEC7/)


## Dimensionen

- Whitebox, Blackbox, ...
- Backend, Frontend, ...
- Code, Browser, ...


### Black and White

Was bedeutet Blackbox und Whitebox-Testing?


![blackwhite](https://i.chzbgr.com/maxW500/7928224000/h62021578/)


- PHPUnit
- Refactoring
- Test Doubles: Stub, Mock, Spy, Fake, Dummy, ...


### Back and Forth

- EcomDev_PHPUnit
- Vom Magento-Altguru
- frisst leider eure Datenbank
- PHPUnit-Community hilft


### Code und Browser

- Code hatta!
- casperJS minimum (mit Coffee schnell gemacht)
- Selenium vollständig (alter...)
- ???



# Dokumentation

Macht heutzutage keiner mehr...

... weil sie sich selbst schreibt.


## Generieren lassen

- Changelog
- Features
- API-Doku
- In weiter zukunft: Nassi-Shneidermann-Diagramm


### Commit >> Changelog

- Commits haben die Issue ID und den Titel
- Deren Unterpunkte sind die neuen Features
- `git log v1...v1.1`
- Zusammenfassen. Done!


### PHPUnit >> Features

- Der Name einer Methode ist das Feature
- `testCanMakeCatsPurr` >> `Can make cats purr`
- `phpunit --testdox` listet alle auf
- Zusammenfassen. Done!


### Doc-Comments >> API-Doku

- Code dokumentieren lohnt sich!
- Andere können per API finden was sie brauchen
- IDE und Entwickler profitieren von return values


### Nassi-Shneidermann-Diagramm

```
// hole benutzerwerte
$foo = $this->getRequest();

if ($foo->hasParameter('bar'))
{ // bar wurde gesetzt: adoptiere dicke katze
    $this->callMatze();
    // besorge mehl
    $this->buyMehl(INT_MAX);
}

// licht aus
exit;
```


- Button in phpStorm klicken
- Bild angucken
- Wissen was los ist

![Diag](http://upload.wikimedia.org/wikipedia/commons/3/33/NassiShneiderman.png)



# So what?
