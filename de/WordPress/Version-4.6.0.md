# WordPress 4.6 and beyond


Was erwartet uns in WordPress 4.6?

Wer hat es nicht in das Release geschafft?



## WordPress 4.6 Beta

- Was ist alles in der Beta drin?
- Krass wie viele mitmachen.

  Im folgenden wird gezeigt, wass alles in der Beta-Version drin ist.
Darüber hinaus gibt es noch andere Features für 4.6, die anschließend gezeigt werden.


### Customizer mit Validierung

- Daten beim Absenden validieren
- Speichern verweigern
- Partielles speichern
- `customize_value_{id}`-Filter


![Customizer mit Validierung](https://core.trac.wordpress.org/raw-attachment/ticket/34893/screenshot-2.png)

  Der Theme-Customizer wird immer toller. Diesmal kommt eine Validierung der eingegebenen Daten hinzu. Ganz recht,
das war vorher nicht möglich. Nun kann dem Kunden eine Rückmeldung gegeben, falls die Daten unvollständig sind (wie im Screenshot zu sehen).
Ohne die Eingabe dieser Daten weigert sich der Customizer sogar die Daten abzuspeichern oder er speichert nur die gültigen ab - das lässt sich konfigurieren.
Ganz einfach, indem man sich an den `customize_value_{id}`-Filter hängt. 
Das ist super, um den Benutzer zu führen und Fehler zu vermeiden!


```
$wp_customize->add_setting( 'established_year', array(
    'sanitize_callback' => 'absint',
    'validate_callback' => 'validate_established_year'
) );

function validate_established_year( $validity, $value ) {
    $value = intval( $value );
    if ( empty( $value ) || ! is_numeric( $value ) ) {
        $validity->add( 'required', __( 'You must supply a valid year.' ) );
    } elseif ( $value < 1900 ) {
        $validity->add( 'year_too_small', __( 'Year is too old.' ) );
    } elseif ( $value > gmdate( 'Y' ) ) {
        $validity->add( 'year_too_big', __( 'Year is too new.' ) );
    }
    return $validity;
}
```


```
class Established_Year_Setting extends WP_Customize_Setting {
    function validate( $value ) {
        if ( empty( $value ) || ! is_numeric( $value ) ) {
            return new WP_Error( 'required', __( 'Moron!' ) );
        }
        if ( $value < 1900 ) {
            return new WP_Error( 'year_too_small', __( 'Too old.' ) ); 
        } 
        if ( $value > gmdate( 'Y' ) ) {
            return new WP_Error( 'year_too_big', __( 'Too new.' ) );
        }
        return true;
    }
}
```


### Shiny updates
 
- Fork von pento/shiny-updates 
- Mehrere Updates installieren / Queue
- Meine Lösung ist nicht dabei :(
- Kein terminalmäßiger Screen mehr

  An sich cool, dass ein eingeschlafenes Plugin neu aufgegriffen wird.
Die Plugin-Seite sieht jetzt echt schön aus.


![](https://make.wordpress.org/core/files/2016/06/shiny-update-core-php-1024x803.png)


![](http://t3n.de/news/wp-content/uploads/2016/06/wordpress-4-6-shiny-updates.gif)


### WP_Post_Type


![](https://i.imgflip.com/17a6ku.jpg)



### Das könnte wehtun

- WP_Http::request() liefert nicht mehr alle Daten
- translate.wordpress.org höher gewichtet
- Veraltete Hooks schmeißen Warnung
- Benutzer nicht mehr nach Name sortierbar (?)

  Der Rückgabewert der Methode `` wurde so designt, dass er als Array behandelt werden kann, obwohl ein Objekt zurückgegeben wird.
Daher ging WordPress hin und hat  das Objekt nun durch ein echtes Array ersetzt.
Allerdings werden dort vermutlich nicht alle Daten ausgegeben (vgl. https://core.trac.wordpress.org/attachment/ticket/37097/37097.2.diff).

Das Auffinden der Übersetzungsdateien wurde überarbeitet, als dass nun erst immer im "wp-content/languages"-Ordner nachgesehen wird.
Die Sprachpakete von translate.wordpress.org werden nun also höher gewichtet.
Eine tolle Sache, um Default-Übersetzungen eines Themes oder Plugins zu verändern.
Könnte aber auch bei einigen Instanzen übel aufstoßen, die von der vorherigen Priorisierung (erst im Plugin/Theme, dann WP_LANG_DIR) gelebt haben.

Nach all den Jahren WordPress sind einige Hooks ohne jede Funktion oder nur als Platzhalter da und gelten daher als "deprecated".
Damit diese möglichst nicht weiter benutzt werden wird nun immer ein Fehler geschmissen (https://core.trac.wordpress.org/ticket/10441).
Dieser zusätzliche Fehler bläht Logs stark auf und bringt bei mangelhaften Error-Reporting die Anwendung ins wackeln.

Besonders lustig finde ich das Ticket, dass Benutzer, die nach Namen sortiert werden, fälschlicherweise nach Benutzernamen sortiert werden.
Die Lösung war, die Sortierbarkeit nach Name schlichtweg zu entfernen.
Auch eine Art Bugs zu beheben - Features abschalten.


- `get_page_by_path` wird gecached.
- Klassen und Funktionen sind verschoben worden.

  Wer sich darauf verlässt, dass `get_page_by_path` stets aktuelle Daten liefert wird über das Caching stolpern (https://core.trac.wordpress.org/ticket/36711).
Ähnlich wie andere `get_*`-Funktionen ist zum Wohle der Performance dort nun ein Caching eingebaut.

Zu guter Letzt und wie jedes Mal werden ganze Klassen ausgelagert - noch nicht schlimm - und auch Funktionsdeklarationen - aua.
Das heißt, falls eure Anwendung komplett zusammenbricht, weil eine Funktion nicht vorhanden ist, dann weil Sie künftig an einem anderen Ort wohnt 
(z.B. Walker_Nav_Menu https://core.trac.wordpress.org/ticket/37035).


### Das finde ich super

- Uploads werden vorab getestet
- Native Fonts im Admin
- comments_template mehrfach benutzen
- `WP_Term_Query` achtet nun auf `meta_value_num`


![](https://www.cloudways.com/blog/wp-content/uploads/WordPress-4.6-Beta-1-3.png)


- Parallele HTTP Requests
- *Broken-Link-Checker im TinyMCE*
- WordPress ist bereit für 7.1 (!)

  Bisher gab es erst eine Fehlermeldung über ungültige Dateitypen, wenn die Datei vollständig hochgelade war.
Bei großen Videos dauert das einige Zeit und frustriert ganz schön.
Mit WordPress 4.6 wird bereits vor dem Upload anhand des Dateinamens geprüft,
ob diese Art von Datei erlaubt ist (https://core.trac.wordpress.org/ticket/14244).
Eine Warnung erscheint dann direkt im Backend vor dem Upload. Super!

Auch toll ist, dass native Schriften im Backend benutzt werden.
Die Verwaltung brauch nicht schön sein, finde ich, sondern muss funktionieren.
Mit nativen Schriften wird eine etwas schnellere Lade- und Renderingzeit erhofft.

Bisher schlug `comments_template` fehl, sobald es mehr als einmal auf der selben Seite benutzt wird.
Die hierarchie der Kommentare konnte nicht richtig aufgelöst und somit nicht korrekt dargestellt werden.
Ein Bug im Caching wurde behoben, damit `comments_template` mehrfach benutzt werden kann.

Regelmäßiges Problem sind die Queries in WordPress.
Verrückte große dynamische Arrays machen nicht nur das korrekte Anwenden schwer sondern scheinbar auch das Debugging.
So kam es dass irgendwann die Funktionalität von der Sortierung "meta_value_num" nicht mehr griff und nun in WordPress 4.6 behoben ist
(https://core.trac.wordpress.org/ticket/37151).

Aber nicht nur bei WordPress schleichen sich Features davon, sondern auch bei PHP.
In Version 7.1 ist die String- und Array-Behandlung leicht verändert, als dass ein String nur noch mit numerischen Indizes als Array behandelt werden kann.
Dinge wie `$string['foo']` waren bisher möglich, schmeißen in PHP 7.1 allerdings einen Fehler.
WordPress reagiert in seiner Version 7.6 darauf (https://core.trac.wordpress.org/ticket/37071).


```
$responses = wp_remote_get( [
    [ 'http://api.example.org/artists/Coheed.json', [ 'timeout' => 2 ] ],
    [ 'http://api.example.org/artists/Cambria.json', [ 'timeout' => 2 ] ]
] );
```


![](https://www.cloudways.com/blog/wp-content/uploads/sfd.png)



## WordPress >= 4.7


- `get_post_by_*()` Funktionen
- Nativer gettext-Support vs "wp-includes/l10n.php"
- Überarbeitung der Export-API (`WP_WXR_Export`)
- `wp_insert_post` ohne `current_user_can`
- WordPress_Autoloader, PSR4 und PSR0.

  Eher unwichtig aber dennoch gehyped sind weitere  `get_post_by*`-Funktionen - kann ich drauf verzichten.
Zum Wohle der Performance kommt hoffentlich bald eine native gettext Unterstützung,
denn in "wp-includes/l10n.php" ist eine komplett eigene PHP-Lösung vom gettext-Framework (https://core.trac.wordpress.org/ticket/17268).
Die Überarbeitung der Export-API (https://core.trac.wordpress.org/ticket/22435) wird darin bestehen,
dass die Klasse `WP_WXR_Export` im per CLI ansprechbar ist und es mehr Kontrolle über die Ausgabe gibt.
Auch gut für die CLI ist ein überarbeitetes `wp_insert_post`, welches keine `current_user_can` Prüfungen mehr beinhalten soll.
Und endlich(!!!) ein paar Autoloader für Klassen - Willkommen im 21. Jhd WordPress!


Quellen:

- [Alle Tickets im Trac.](https://core.trac.wordpress.org/query?status=accepted&status=closed&status=new&milestone=4.6&col=id&col=summary&col=status&col=owner&col=type&col=priority&col=milestone&order=priority)
- [Künfitge Features](https://core.trac.wordpress.org/query?status=accepted&status=new&changetime=05%2F01%2F16..07%2F12%2F16&type=enhancement&keywords=~has-patch&milestone=Future+Release&max=20&page=2&col=id&col=summary&col=milestone&col=status&col=type&col=owner&col=priority&order=priority&row=description)



# Yay, WordCamp!


imagesLoaded 3.2.0


Masonry 3.3.2

![](http://i.imgur.com/6Lo8oun.jpg)


MediaElement.js 2.21.2

![](http://mediaelementjs.com/images/plugin-loop.png)


TinyMCE 4.3.13.

![](https://ps.w.org/tinymce-advanced/assets/banner-772x250.png?rev=971511)