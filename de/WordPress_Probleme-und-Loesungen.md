# Probleme und Lösungen in WordPress



## Welche Ansätze gibt es?


- Post-Type
- Meta-Felder
- Taxonomie
- Template Hierarchie


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


Im  allgemeinen also

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


Im allgemeinen also

- Eigenschaften eines Post-Types
- Merkmale, zum Unterscheiden von anderen

Note: Mit einem Meta-Attribut können also allerlei Charakteristika
in einem Post-Type gespeichert werden,
um diesen reichhaltige Informationen mitzugeben.


### Template-Hierarchie


![Template-Hierarchie](http://codex.wordpress.org/images/1/18/Template_Hierarchy.png)


Eine Template-Hierarchie hilft bei ...

- Übersicht über Kategorien
- Übersicht über Post-Types
- Besondere Page-Templates
- Allerlei Möglichkeiten mit PHP



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
