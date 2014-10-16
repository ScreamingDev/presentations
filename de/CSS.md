# CSS


## Überblick

- Wozu CSS?
- Benutzung von CSS
- Selektoren
- Moderne Stylesheets (Media-Queries)
- Box-Modell
- Designen macht Arbeit


### Wozu CSS?

- CSS = Cascading Style Sheet
- Formatieren von HTML-Seiten
- Stetig erweitert

Note: CSS oder Cascading Style Sheets ist eine Sprache zum Formatieren von HTML-Elementen.
Gegenüber der HTML-Formatierungen mit b, i, u
und anderen physischen Auszeichnungen bietet CSS erheblich mehr Möglichkeiten,
wie z.B. Schriftgestaltung, Rahmen, Innen- und Aussenabstände, Listen, Hintergründe, Positionieren,
Der Umfang der möglichen CSS-Regeln wird ständig erweitert,
so dass man auf zukünftige Gestaltungsmöglichkeiten gespannt sein darf.


- Zentrale Pflege bringt Wiederverwendbarkeit
- Gelungene Webseiten durch einheitliches Erscheinungsbild 
- Direktes formatieren und Abweichungen möglich

Note: Formate können zentral gepflegt werden,
im <head>-Bereich
oder in einer separaten Datei.
So müssen formate nur einmal festgelegt werden
und können trotzdem für das ganze Projekt gelten,
um ein einheitliches Erscheinungsbild zu erreichen.
Einzelne Tags und Containger lassen sich auch immer direkt formatieren,
um ggf. vom Standard abzuweichen.


### Benutzung von CSS

- Eigenschaft: Wert;
- Eigenschaft = Was wird geändert?
- Wert = Wie wird es geändert?
- Abweichung vom Browser

Note: Eine Stylesheet-Angabe besteht aus der Eigenschaft und dem Wert,
getrennt durch einen Doppelpunkt.
Die Eigenschaft ist das,
was formatiert werden soll (z.B. color für die Schriftfarbe).
Als Wert sind Farbangaben, Einheiten oder Schlüsselworte möglich.
Hier beginnen die Abweichungen von dem Schwarz-Weiß-Bild,
welches der Browser oder das Betriebssystem des Besuchers darstellen möchte.


Formatieren einzelner Bereiche:

    <h1 style="color:#789acf;">Titel</h1>
    
Note: Um ein HTML-Tag zu formatieren brauch nur das Attribut style=""
mit den Stylesheet-Angaben in Anführungszeichen festgelegt werden.
Die Eigenschaft, ein Doppelpunkt, der Wert und als Abschluß ein Semikolon.


Stylesheets zentral definieren:

    <html>
    <head>
    
    <style type="text/css">
    <!--
    
      h1 {
          color: #789acf;
      }
    
    //-->
    </style>
    
    <title>Irgendein Titel</title>
    </head>
    <body>...</body>
    </html>

Note: Im <head>-Bereich werden die Stylesheet-Angaben per `<style type="text/css"><!--` eingeleitet
und abschließend mit `//--></style>` beendet.
Der `<style>`-Container umklammert das CSS und
die Kommentar-Tags `<!-- //-->` verhindern, dass Browser bei Fehlern, diese Angaben als normalen Text anzeigen.


In eine externen Datei auslagern:

    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="plugin/style.css">
        <link rel="stylesheet" type="text/css" href="theme/name.css">
        <link rel="stylesheet" type="text/css" href="http://google.com/ie7.css">
    </head>

Note: Um die Stylesheet-Angaben auf allen Seiten zur Verfügung zu stellen,
wird diese in einer weiteren Datei auf dem Server gespeichert
und im HTML-Dokument verlinkt.
Diese Datei ist eine simple Textdatei, die die Stylesheet-Angaben enthält
und dies mit der Endung .css kennzeichnet.
Der `<link>`-Tag im `<head>`-Bereich, verweist auf diese externe Datei
über das Attribut `href=`.
Liegt diese Datei auf einem anderen Server, kann auch komplette URL-Adressen angeben werden.


Kommentare in Stylesheet-Bereichen:

    <style type="text/css">
    
        /* Überschrift der 1. Ebene */
        h1 {
            color:#ffffff;
            font-weight:bold;
            font-size:12pt;
        }
    
    </style>
    
Note: Um nicht ganz den Überblick zu verlieren kann in `/*`
und `*/` ein Kommentar eingeschlossen werden.


### Selektoren

- Universal-Selektoren
- Typ-Selektor
- Klassen (`class="..."`)
- ID (`id="..."`)
- Pseudo-Selektoren
- Verschachtelte Selektoren


Allgemeiner Aufbau:

    Selektor {
        Stylesheet-Angabe;
        Stylesheet-Angabe;
        ...
    }

Note: Selektoren verbinden die Formatierungen mit den Elementen innerhalb der Seite.
Der Aufbau ist immer wie oben gezeigt
und kann gezielt nur einen Text im Dokument erfassen/designen
oder sogar ganze Bereiche/Teile der Seite.


Universal-Selektor:

    <style type="text/css">
    
    * {
        font-size:14px;
        color:#ff0000;
    }
    
    </style>
    
Note: Der Universal-Selektor wendet das Design auf alle Elemente der Seite an.


Typ-Selektor:

    <style type="text/css">
    
        h1 {
            font-size:14px;
            font-style:italic;
        }
        p { color:#ff0000; }
    
    </style>
    
Note: Ein Typ-Selektor erlaubt das Design für ein bestimmtes HTML-Element zu ändern.
Im obigen Beispiel sind dies alle Hauptüberschriften und alle Absätze.


Klassen-Selektor:

    <style type="text/css">
    
        h1 { font-size:14px; font-style:italic; }
        h1.gerahmt { border:1px solid #aaaaaa; }
        .versteckt { display: none; }
    
    </style>
    
Note: Über das HTML-Attribut `class` können Elemente eine bestimmte Design-Klasse haben.
Der Sinn dahinter ist, dass verschiedene Elemente das gleiche Aussehen haben können
(z.B. Zeilenabstand eines def- oder cite-Containers).


ID-Selektor:

    div {background-color:#efefef;border:1px solid #aaaaaa;}
    div#logo {
        position:absolute;
        top:100px;
        left:100px;
    }
    #facebook {
        position:absolute;
        top:150px;
        left:300px;
    }
    
Note: Hier wird das ID-Attribut in HTML angesteuert,
welches im besten Fall nur einmal vertreten ist.
Somit kann gezielt ein einziges Element / ein Text designt werden.


Pseudo-Selektoren:

    <style type="text/css">
        a:link { color:#0000ff; }
        a:visited { color:#dddddd; }
        a:hover { color:#ff0000; }
        a:active { color:#ff0000; }
    </style>
    
Note: Pseudoklassen können nur in style-Containern
oder ausgelagerten Dateien verwendet werden.
Das Paradebeispiel ist hier das <a>-Tag welches eine Farbe haben soll,
wenn es ein Link ist der noch nicht besucht wurde (`:link`),
wenn es ein besuchter Link ist (`:visited`),
wenn mit der Maus drüber gegangen wird (`:hover`)
oder wenn der Link ausgewählt wurde (`:active`).
Hierbei ist die Reihenfolge wichtig:
`:hover` und `:active` müssen nach `:link` und `:visited` stehen,
sonst werden die Eigenschaften für `:hover` und `:active` ignoriert.


Verschachtelte Selektoren:

    <style type="text/css"><!--
        h1 i {color:#ff0000;}
        h1 > i {color:#ff0000;}
        h1 * i {color:#ff0000;}
        h1 + i {color:#ff0000;}
        div p *[href] {color:#ff0000;}
        div ol>li p {color:#ff0000;}
        a:hover .vis {visibility:visible;}
    //--></style>

Note: Selektoren können beliebig kombiniert werden.
Im ersten Fall werden zum beispiel alle i-Container innerhalb einer h1-Überschrift ausgewählt.
Bei dem zweiten werden nur die direkten Kinde von `h1` ausgewählt,
das heißt bei `<h1><b><i>nicht</i></b></h1>` würde das i nicht ausgewählt werden,
da es nicht eine Ebene unter dem h1 ist sondern (durch das `<b>`) gleich zwei.
Im dritten Fall würde es wieder greifen, da hier zwischen h1 und i ein beliebiger Tag sein darf (durch "*").
Mit dem `+` aus dem vierten Fall, werden alle `<i>` geändert welche nach einem `<h1>` stehen.
Wie in den weiteren Beispielen zu sehen ist, kann das sehr tief geschachtelt werden.


### Moderne Stylesheets (Media-Queries)


    @media print {
        /* Für Drucker */
    }
    
    @media only all and (min-width: 50em) {
        /* Layout */
    }

Note: Moderne Stylesheets nutzen Media-Queries,
um die selbe Seite auf mobilen Endgeräten kompakter darzustellen.
Diese Media-Queries sind schon sehr lange verfügbar,
scheinen jedoch heute erst ihre Bestimmung zu finden,
wenn auch leicht verfehlt.
Im obigen gibt es zum Beispiel ein Design,
welches genutzt werden soll,
falls jemand die Seite ausdruckt
und ein weiteres für alle,
deren Monitor mehr als 50 Zeichen nebeneinander darstellen kann.


Liste der Medientypen:

 - all: Alle Medien
 - aural: Sprachsoftware
 - braille: Blindenschrift
 - embossed: Braille-Drucker
 - handheld: Palms und Handys
 - print: Druckerausgabe
 - projection: Projektion und Beamer
 - screen: klassicher Bildschirm
 - tty: Terminals und Textbrowser
 - tv: Fernseher


### Box-Modell

![Box-Modell von CSS](http://www.css4you.de/wsboxmodell/box1.gif)

Note: Allen Browsern liegt das CSS-Boxmodell zum anzeigen von Inhalten zugrunde.


### Designen macht Arbeit

- Internet Explorer ist ein Außenseiter
- Mac, Windows, Linux und Co.

Note: Leider ergeben sich durch Browser die sich einem weltweiten Standard nicht beugen wollen
(wie z.B. dem Internet Explorer) immer wieder Probleme in der Darstellung.
Auch die verschiedenen Betriebssysteme brinen Arbeit mit sich,
da sie andere Schriftarten kennen/verwenden
oder z.B. die Schriftbreite bei Windows immer etwas schmaler ist als bei Ubuntu (Linux).


