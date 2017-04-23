# WordPress hidden Gems

> You might use less plugins after that - I hope!


## Me

- Selber machen


## Dialoge, Popup und Boxen

- Alert: Lässt einen nicht vorbei
- Modal/Dialog: Optionale tiefere Detailebene
- Popup: Geht neben der WebAnwendung auf
- Flash notice: Sind akut und gehen von allein
- Lightbox/Theatres: Lightbox halt
- Popover/Tooltip/Hovercard: `title` und `alt`

  Eine ziemlich gute Abgrenzung und Zusammenfassung gibt
es auf https://www.quora.com/Whats-the-difference-between-a-modal-a-popover-and-a-popup zu sehen.
Ein *Alert* kann nicht ignoriert werden. Es muss immer eine Entscheidung getroffen werden, damit der Alert wieder verschwindet.
Dies kann nützlich sein für Scheidewege, wie z.B. das Löschen von Daten.

Ein *Dialog oder "Modal" (engl.)* geht in der Seite als Overlay auf und kann weggeklickt werden.
Dialoge bringen einen weiter und erlauben oft noch eine Detailstufe zur eigentlichen Aktion hinzuzufügen.
Zum Beispiel wird eine Veranstaltung erstellt und ein Modal listet eine Auswahl an Freunden,
welche direkt mit einem weiteren Klick eingeladen werden können.

*Popups* bringen schon beim Lesen und Hören ein unangenehmes Gefühl mit sich,
da Sie sich neben der eigentlichen WebAnwendung öffnen und unabhängig aller Aktionen dort verweilen.
Sie müssen einzeln geschlossen werden und beinhalten meißt zusätzliche weniger dringliche Informationen.
Das kann zum Beispiel ein Hinweis auf eine bald anstehende Aktion sein oder ein Video, welches die ganze Zeit läuft. 

Eine *Flash-Notice oder auch Growl Notification* taucht kurz auf und verschwindet nach einer Zeit wieder.
Meißt gibt sie Stati, wie "Erfolgreich gespeichert" oder ähnliche, an
und verschwindet spätestens nach der nächsten Aktion.

### 


Thickbox:

- (Bestätigungs-)Dialoge
- Vorschau
- Gallery
- ... alles was aufpoppen soll

- Auf jQuery drauf
- JS und CSS bedeuten 10 bis 15 k
- Bilder sind nicht größer als der Browser
- Bilder, IFrame, Inline und AJAX-Content
- Immer zentriert auch beim scrollen
- Keine Übergänge


