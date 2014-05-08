# WordPress und PHTML

Trennung von Logik und Design

Note: Ziel ist es, die Code-Qualität in WordPress-Projekten zu verbessern und für mehr Modulatität zu sorgen.
Dadurch verbessert sich die Laufzeit von Projekten und spätere Erweiterungen können schneller vorgenommen werden.


Mike Pretzlaw

[![x](http://www.code-x.de/wp-content/uploads/Kreativ-256x115.png)](http://code-x.de)

für code-x GmbH

[bit.ly/cx-mvc](http://bit.ly/cx-mvc)


## Beispiel


Kommt das bekannt vor?

```
$sAttachmentString .= "<div class='documentIcons'>";
$sAttachmentString .= "<a href='$file_link'>";
$sAttachmentString .= "<img src='"
                   .get_bloginfo('template_directory')
                   ."/images/mime/XLS8.png'/>";
$sAttachmentString .= "</a>";
$sAttachmentString .= "<br>";
$sAttachmentString .= "<a href='$file_link'>$file_name[0]</a>";
$sAttachmentString .= "</div>";
```


![wtf-meme](http://cdn.memegenerator.net/instances/500x/49536908.jpg)

Note: Hier kann nicht mal eben auf die schnelle gesagt werden,
was für ein HTML produziert wird oder wofür dieser Quelltext ist.
So unaufgeräumt sieht es leider in den meisten Projekten aus.


Ist das sauberer?

```
<div class="documentIcons">
    <a href="<?= $file_link ?>">
        <img src="<?= $image_path ?>" />
    </a>
    <br />
    <a href="<?= $file_link ?>">
        <?= $file_name[0] ?>
    </a>
</div>
```


### Was ist anders?


| Downloadbereich          | Vorher | Nachher |
|--------------------------|--------|---------|
| Aufwand zum Erstellen    |   4 h  |    1 h  |
| Aufwand für Bugfix       |   1 h  |   15 m  |
| Aufwand für Erweiterung  |   8 h  |    2 h  |

Note: Es musste eine einfache HTML-Änderung gemacht werden.
Allerdings waren die Daten so schlecht aufbereitet, dass die Datenstruktur verändert werden musste.
Folglich war es schneller alles auszulagern (in eine PHTML) und die Daten neu zu holen,
als die Änderung mit dem bestehenden Code zu machen.
 In vielen Fällen sorgt eine Erweiterung des Codes für ein Quasi-Refactoring,
was an sich sehr viel Zeit kostet, vor allem wenn von einer dritten Person durchgeführt.
Mit einem MVC-Pattern, lassen sich die zu ändernden Stellen nicht nur schneller identifizieren,
sondern auch leicht Erweitern und ändern.


| Konfigurator            | Zeit  |
|-------------------------|-------|
| System verstehen        | 5 m   |
| HTML-Änderung vornehmen | 1 m   |
| Testen im Browser       | 2 m   |
| QS und Mails schreiben  | 2 m   |

Note: Das System für den Konfigurator ist bereits im MVC-Sinn aufgebaut.
Es musste eine einfache Anpassung gemacht werden, zu dem der passende View schnell gefunden war.
Das HTML so zu ändern, wie es sein soll war viel einfacher als sich durch Ketten von Strings zu hangeln.
Im Endeffekt hat alles länger gedauert, als die Änderung selbst - MVC sei Dank!


### Bugs

- Laufzeit
- Unübliche Methoden

Note: Der Nachteil liegt in der Laufzeit, da alle Daten erst gesammelt werden und dann nochmal durchlaufen,
um sie auszugeben.
Das birgt ebenfalls die Gefahr, dass der Speicherkeller vollläuft.
Zudem ist diese Art der Handhabe in WordPress bislang ziemlich unbekannt/unüblich,
so dass nicht jeder Programmierer gleich damit zurecht kommt.



## Was ist MVC?

Note: MVC steht für "Model", "View" und "Controller".
Das bedeutet, dass die Bereiche der Datenbeschaffung,
die Anzeige von Inhalten und die Verwaltung der Kommunikation zwischen allem voneinander losgelöst sind.


### MVC und PHP

- Der "Sinn" von PHP
- Trennung von Daten, Aussehen und Logik
- Also: SQL, PHP und HTML


Die Grundregeln sind:

- Form follows function (#fff)
- View nach Model (push-Prinzip)
- Kontrollstrukturen sehen (nicht) anders aus

Note:
Das bedeutet, dass das Design erst nach dem Erstellen aller Funktionen/Logiken gemacht wird.
Es heißt nicht, dass die Logiken dem Design folgen müssen und dessen logische Auszeichnung berücksichtigen muss
(wie etwa die Anzahl und Aufteilung der `<span>` oder `<div>` Elemente).


```
<body>
    <?php if ($foo): ?>
        Cool!
    <?php elseif ($bar): ?>
        Meh!
    <?php else: ?>
        Rambazamba!
    <?php endif; ?>
</body>
```

```
<ul>
    <?php for ($i = 1; $i < 10; $i++): ?>
        <li><?php echo $i ?></li>
    <?php endforeach; ?>
</ul>
```

```
<ul>
    <?php foreach ($data as $foo): ?>
        <li><?php echo $foo ?></li>
    <?php endforeach; ?>
</ul>
```

```
<ul>
    <?php while ($foo = $mysql->getRow()): ?>
        <li><?php echo $foo ?></li>
    <?php endwhile; ?>
</ul>
```

Note: Die Kontrollstrukturen sollten im "Template" nicht mit geschweiften Klammern,
sondern mit Doppelpunkt und Schlüsselwort beschrieben werden.
Zu `}` ist es schwer den Anfang zu finden, während z.B. `endforeach` schon ein Hinweis auf den Kop der Schleife ist.


### Model

- Ein Model beherbergt alle Daten
- Es führt z.B. Queries aus
- Posts etc. werden dort bezogen
- MySQL, CSV, XML, Dateisystem

Note: Im Grunde kann hier jede Art von Persistenz genutzt werden.
Es müssen lediglich die Methoden zum beziehen von Daten zur Verfügung stehen.


### View

- Kümmert sich um die Darstellung
- XML, HTML, CSV, JSON, ...

Note: Auch hier lassen sich beliebige Ausgabeformate wählen,
sofern die nötigen Methoden vorhanden sind
und die Daten dem Format entsprechend verarbeitet werden.


### Controller

- Behandelt logiken
    - Bezieht die Daten
    - Wählt den passenden View
- Reagiert z.B. auf DOING_AJAX



## Programmierung


### Ein Model

- Ist in WordPress fast schon gegeben
- WP_Query und/oder WP_Post


### Ein View / Template

Zum Beispiel `shortcodeName.phtml`:

```
<div>
    <meter value="<?php echo $progress ?>">
        Quote
    </meter>
</div>
```


### Ein Controller

Direkte Ausgabe:

```
function shortcodeFunction() {
    $progress = "0.5";

    include __DIR__ . '/shortcodeName.phtml';
}
```


Indirekt / in variable Speichern:

```
function shortcodeFunction() {
    $progress = "0.5";

    ob_start();
    include __DIR__ . '/shortcodeName.phtml';
    return ob_get_clean();
}
```


### Was tun?

Aus "Quote" soll "50%" werden

```
function shortcodeFunction() {
    $progress = "0.5";

    include __DIR__ . '/shortcodeName.phtml';
}
```

```
<meter value="<?php echo $progress ?>">
    Quote
</meter>
```



Note: Besonders wichtig ist hier, dass **get** (also: `ob_get_clean()`) und *nicht* `ob_end_clean()` benutzt wird.
Andernfalls kann es dazu kommen, dass garnichts mehr ausgegeben wird.
