# HTML

- Auszeichnungssprache
- Ein Text erhält Logik
- und Aussehen


## Semantik


### Tags

- Beginnen mit `<`
- Gefolgt von einer Auszeichnung
- Enden mit `/>`


Beispiele:

    <br />   Eine neue Zeile
    <hr />   Ein horizontaler Trenner
    <meta /> Angaben für Suchmaschinen und Co.


### Container

- Beginnen mit `<IRGENDWAS>`
- Beinhalten Text,
- andere Tags
- oder weitere Container
- Enden mit `</IRGENDWAS>`


Beispiele:

    <p>
        Ein Absatz mit einer neuen Zeile <br/>
        einem Bild <img src="urlaub.jpg" />
        und <b>dickem Text</b>
    </p>
    
Note: Solche Container können tatsächlich als Container
oder Schachteln angesehen werden,
die Text beinhalten
oder weitere Informationen für den Browser wie eine Seite auszusehen hat.


### Attribute

- Global
    - id
- Lokal
    - src (z.B. bei "img")
    - href (z.B. bei "a")


Beispiele:

    <a href="#abc">
        Gehe zu ...
    </a>
    
    <img src="haus.png" width="100" />


### XML-Pfade

- Wegweiser
- Pfad zu einem Element


Beispiele:

    <body>
        <h1>Startseite</h1>
        <p>
            Dies ist die <b>Startseite</b>.
            <u>Nichts zu sehen hier.</u>
        </p>
    </body>
    
- body/h1
- body/p
- body/p/b



## Elemente von HTML


### Bereiche

- body
- h1 - h6
- header
- footer


### Gruppierungen

- p
- ol oder ul
    - li
- div


Absatz:

    <p>
        Ein Absatz
    </p>


Listen:

    <p>
        Eine Liste:
        <ul>
            <li>Eins</li>
            <li>Zwei</li>
        </ul>
    </p>


Design-Blöcke:

    <div>
        Auch eine Art Absatz
        über die ganze Breite
    </div>


### Text-Auszeichnungen

- a
- em
- i, b
- span


Link:

    <a href="www.example.org">
        Beispiel
    </a>


Hervorgehoben:

    <a href="www.example.org">
        <em>Beispiel</em>
    </a>


Kursiv und Dick:

    <a href="www.example.org">
        <b>Dickes</b>
        <i>schräges</i>
        <em>Beispiel</em>
    </a>


Design-Zeilen/-Wörter:

    <span>
        Span macht nichts, außer CSS helfen.
    </span>


### Eingebunden

- iframe
- embed, object


Beispiel:

    <iframe src="www.google.de></iframe>
    
<iframe src="http://www.erv-online.de/" width="100%"></iframe>


### Tabellen

- table
- thead, tbody, tfoot
- tr, td
- th


Beispiel:

    <table>
        <tr>
            <th>PLZ</th>
            <th>Ort</th>
        </tr>
        <tr>
            <td>01000</td>
            <td>Dresden</td>
        </tr>
        <tr>
            <td>99998</td>
            <td>Körner</td>
        </tr>
    </table>


### Formulare

- form
- label
- input
    - text
    - radio/checkbox
- select
- textarea
- button


Beispiel:

    <form>
        <label>Name</label>
        <input type="text" />
        
        <label>Ort</label>
        <select>
            <option>Dresden</option>
            <option>Körner</option>
        </select>
        
        <label>Lebenslauf</label>
        <textarea></textarea>
    </form>


### Weitere Sprachen

- CSS: Cascading Stylesheet
- JS: JavaScript

Note: CSS kann das Aussehen in Form und Farbe verändern.
JavaScript kann dies auch, ist allerdings mehr für Animationen
und dynamische Seiten gedacht.