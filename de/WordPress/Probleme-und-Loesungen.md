# Probleme und Lösungen in WordPress



## Welche Ansätze gibt es?


- Shortcodes
- Post-Type
- Meta-Felder
- Taxonomie
- Template Hierarchie


### Shortcodes

    add_shortcode( 'foobar', function () {
        return "foo and bar";
    });

    
Ein Shortcode kann sein

- Fremde Inhalte aus RSS
- YouTube-Videos
- Autos aus Carzilla
- Designelemente


Im Allgemeinen also

- Einbindung eines Drittanbieters
- Physische Textauszeichnungen


Die Nachteile für den Kunden sind

- Unverständlich für Kunden
- Leicht Fehleranfällig im TinyMCE



### Post-Type

    add_action('init', function () {
        register_post_type(
            'project',
            array(
                'public' => true,
                'label'  => 'Project'
            )
        );
    });


Ein Post-Type kann sein

- Buch
- Haus, Wohnung
- Produkt
- Event
- ...


Im Allgemeinen also

- eine Entität von Dingen
- Zusammenfassung von sinnverwandten "Gegenständen"

Note: Damit sind Post-Types sehr flexibel Einsetzbar.
In der Palette von Dingen, die der Kunde benötigt,
kann nahezu alles als Post-Type abgebildet werden.
Auch wenn ein eigener Post-Type zunächst nur einen Titel
und ein Bereich für Detailtext hat,
können Meta-Angaben
und eine eigene Taxonomie das Ganze erweitern
und pflegbarer gestalten.


Das Gute für den Kunden ist

- Verständlich für den Kunden
- Wohlbekannt durch Analogien

Note: Mit dem Anlegen solcher Entitäten,
wie z.B. Häuser, Projekte, Produkte
kann die Gedankenwelt des Kunden viel besser abgebildet werden.
Da mit immer wiederkehrenden Strukturen (Blog-Post, Seite) 
die Welt eines Kunden dargestellt wird,
kann er sich leichter in sein eigenes neues CMS einarbeiten,
als dass Shortcodes
oder Zaubereien mit eigenen Listen
und Detailansichten gebastelt werden.


### Meta-Felder

    add_action('add_meta_boxes', function () {
        add_meta_box('project_budget', 'Budget', function () {
            global $post;
            
            echo '<input type="text" name="project_budget" value="'
                 . get_post_meta($post->ID, 'project_budget', true) 
                 . '" />';
        }, 'project', 'side', 'default');
    });


Ein Meta-Feld kann beinhalten ...

- Budget von einem Projekt
- Produktnummer
- Produktfarbe
- Geschmack
- ...


Im Allgemeinen also

- Eigenschaften eines Post-Types
- Merkmale, zum Unterscheiden von anderen

Note: Mit einem Meta-Attribut können also allerlei Charakteristika
in einem Post-Type gespeichert werden,
um diesen reichhaltige Informationen mitzugeben.


Das Gute für den Kunden ist

- Verständlich für den Kunden
- Wohlbekannt durch Analogien

Note: Mit dem Erweitern der Entitäten,
um die für Kunden relevanten Felder,
wie z.B. Laufzeit, Preis, Größe etc.
kann die Gedankenwelt des Kunden noch besser abgebildet werden.
Da die zusätzlichen Felder (zu Blog-Post, Seiten und CPT) 
immer wieder vorkommen und an der gleichen Stelle zu finden sind,
kann der Endnutzer sich leichter in WordPress einfinden,
als dass Shortcodes genutzt werden
oder die Eigenschaften unter wilden Einstellungsmöglichkeiten
wiederzufinden ist.


### Template-Hierarchie


![Template-Hierarchie](http://codex.wordpress.org/images/1/18/Template_Hierarchy.png)


Eine Template-Hierarchie hilft bei ...

- Übersicht über Kategorien
- Übersicht über Post-Types
- Besondere Page-Templates
- Allerlei Möglichkeiten mit PHP


Das Gute für den Kunden ist

- Kaum Fehleranfällig

Note: Der Kunde kann nur mit dem nötigen Wissen
etwas an den Templates ändern,
womit fehleranfällige Änderungen durch ihn ausgeschlossen sind.


Die Nachteile für den Kunden sind

- Kaum pflegbar

Note: Leider kann der Kunde bei Templates
nicht selbst Änderungen vornehmen
und benötigt immer wieder die Hilfe seiner Agentur.


## Und was ist mit uns?

Note: Wir haben bisher nur die Vor- und Nachteile für den Kunden
beleuchtet,
müssen uns aber auch fragen was für eine Agentur am besten geeignet ist.



### Strukturen und Richtlinien


- CodeStyle-Richtlinien von WordPress
- Gutes Gerüst für Pfadangaben

Note: Es gibt von der WordPress-Community
und auch bei Automattic selbst bereits Vorgaben
wie der Code aussehen soll.
Das heißt es sind CodeStyle-Richtlinien im Umlauf die mindestens
und immer erfüllt sein sollten,
wenn mehrere Leute an einem Projekt arbeiten
oder das Werk eines Tages an eine andere Agentur weitergegeben werden
soll.
Besteht dann noch ein ordentliches Design,
was die Ordnerstruktur angeht,
in dem sich jeder Programmierer schnell zurecht findet,
dann ist ein wahres Meisterwerk entstanden.
Somit ist es auch ein No-Go bei seinem neuen Template den Vorgaben
von Automattic mit Objektorientierung
und vielen Spielereien mit zig Unterordnern abzuweichen,
da sich hier jeder Programmierer immer wieder neu reindenken muss.


Beispiel für eine Plugin-Struktur:

- plugin_name\ ("code-x // Markötter // Basis")
  - language\
  - cpt\
    - partner.php
  - meta-field\
  - shortcode\
    - code_name_ist_dateiname.php
    - code_name_ist_dateiname.phtml
  - taxonomy\
    
Note: In dem Language-Ordner verbergen sich die Übersetzungen für das
Plug-In,
so wie es bei jedem Plug-In von WordPress der Fall ist.
Darüber hinaus gibt es sprechende Ordner,
deren Name bereits zeigt was seine Inhalte sind.
Im Allgemeinen existiert eine Datei mit dem selben Namen wie
der Shortcode, das Meta-Field oder der Custom-Post-Type
als ".php"-Datei.
Soll mit dem Shortcode oder bei dem Meta-Field noch etwas angezeigt
werden,
dann gibt es auch eine zugehörige ".phtml"-Datei.
Mit diesem System ist eine derart für sich selbst sprechende Struktur
gegeben,
so dass in einem Blick auch die Funktionalitäten des Plug-In
eingefangen werden können.


Beispiel für ein Shortcode:

    function cx_plugin_name_shortcode_name() {
      // ...
    }


Beispiel für CSS:

    .foo div {
        font-size: 12pt;
        border: 1px solid #affffe;
    }


## Beispiele für Probleme


### Eventkalender


Anforderungen an einen Eventkalender:

- Events einzeln pflegbar
- Events einer Kategorie zuordnen
- Kategorien auflisten und auswählbar
- Events in einer Kategorie auflisten

*Nicht mehr und nicht weniger*


?? Umsetzung ??


?? Probleme ??


### Partnersuche


Anforderungen an eine Partnersuche:

- Partner pflegbar
- Liste selektierbar nach Branche
- Liste selektierbar nach PLZ (einstellig)

*Nicht mehr und nicht weniger*


?? Umsetzung ??


?? Probleme ??


### Downloadbereich


Anforderungen an einen Downloadbereich:

- Download nur nach Login

*Nicht mehr und nicht weniger*


?? Umsetzung ??


?? Probleme ??


### Stellenausschreibungen


Anforderungen an eine Stellenausschreibung:

- Stellen einzeln pflegbar
- Stellen einer Kategorie zuordnen
- Kategorien auflisten und auswählbar
- Stellen in einer Kategorie auflisten

*Nicht mehr und nicht weniger*


?? Umsetzung ??


?? Probleme ??
