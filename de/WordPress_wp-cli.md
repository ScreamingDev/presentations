# WP-CLI

WordPress Shell Tool



## Scaffold

Schnell mal was erstellen


### Underscores Themes

> Die Themevorlage für alle Browser.


Was ist Underscores?

- Ein "nacktes" Theme
- [Underscores](http://underscores.me/) (c) ist von Automattic geschrieben
- Benutzt einen [CSS-Reset](http://meyerweb.com/eric/tools/css/reset/index.html)
  und [CSS-Normalisierung](http://necolas.github.com/normalize.css/)
- Basiert auf [Blueprint](http://www.blueprintcss.org/)

Note: Das Underscores Theme ist eine Theme-Vorlage, die sehr "nackt" ist und somit viele
Möglichkeiten zum anpassen bietet.
Da sie von den WordPress-Machern geschrieben worden ist,
kann der Entwickler und Designer sich sicher sein ein für WordPress geeignetes
und durchdachtes Theme zu erhalten,
was bei anderen oft nicht der Fall ist.
Dies wird bereits bei dem CSS-Reset und der -Normalisierung deutlich,
welche sich darum bemüht die Darstellung in allen Browsern auf ein gleiches Level zu bringen
von dem aus dann das Designen gestartet werden kann.
Blueprint ist ein sogenanntes CSS-Framework,
welches wie das bekanntere Bootstrap von Twitter verschiedene Klassen zur Verfügung stellt,
mit denen ein Design auf die schnelle umgesetzt werden kann.


#### Erstellen eines neuen Themes

    wp scaffold _s MeinTheme --activate \
                             --author="Me" \
                             --author_uri="example.org"
                           
Note: Ein neues Theme (hier mit dem Namen "MeinTheme") kann mit nur einem Befehl erstellt werden.
Zusätzliche Parameter können dafür sorgen, dass es prompt aktiviert wird (`--activate`)
oder einen Autor hinterlegt hat (`--author` und `--author_uri`).
Der Name des Themes (hier: "MeinTheme") kann beliebig geändert werden
und ein gleichnamiger Ordner wird in WordPress erstellt.
