# WordPress und PHTML

Trennung von Logik und Design

Note: Ziel ist es, die Code-Qualität in WordPress-Projekten zu verbessern und für mehr Modulatität zu sorgen.
Dadurch verbessert sich die Laufzeit von Projekten und spätere Erweiterungen können schneller vorgenommen werden.


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


| Downloadbereich       | Vorher | Nachher |
|-----------------------|--------|---------|
| Aufwand zum Erstellen |   4 h  |    -    |
| Aufwand für Änderung  |   4 h  |    -    |
| Responsive            | ja     | ja      |
| Mobile Version        | ja     | ja      |

Note: Es musste eine einfache HTML-Änderung gemacht werden.
Allerdings waren die Daten so schlecht aufbereitet, dass die Datenstruktur verändert werden musste.
Folglich war es schneller alles auszulagern (in eine PHTML) und die Daten neu zu holen,
als die Änderung mit dem bestehenden Code zu machen.


| Konfigurator            | Zeit  |
|-------------------------|-------|
| System verstehen        | 5 m   |
| HTML-Änderung vornehmen | 1 m   |

Note: Das System für den Konfigurator ist bereits im MVC-Sinn aufgebaut.
Es musste eine einfache Anpassung gemacht werden, zu dem der passende View schnell gefunden war.
Das HTML so zu ändern, wie es sein soll war viel einfacher als sich durch Ketten von Strings zu hangeln.


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

- Form follows function
-

Note:
Das bedeutet, dass das Design erst nach dem Erstellen aller Funktionen/Logiken gemacht wird.
Es heißt nicht, dass die Logiken dem Design folgen müssen und dessen logische Auszeichnung berücksichtigen muss
(wie etwa die Anzahl und Aufteilung der `<span>` oder `<div>` Elemente).


## Programmierung


### Ein View / Template

Zum Beispiel `shortcodeName.phtml`:

```
<article>
    <meter min="0" max="1" value="<?php echo $progress ?>">Fortschritt</meter>
</article>
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

Note: Besonders wichtig ist hier, dass **get** (also: `ob_get_clean()`) und *nicht* `ob_end_clean()` benutzt wird.
Andernfalls kann es dazu kommen, dass garnichts mehr ausgegeben wird.
