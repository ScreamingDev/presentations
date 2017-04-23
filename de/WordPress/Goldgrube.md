# Goldgrube WordPress

## Staub oder so

- CSS
- Klassen
- Bilder

Erst einmal den Dreck vom Gold raussieben.
Da gibt es einiges, dass uns für Kundenlösungen nicht reinspielt.
Zum Beispiel Klassen, die für die WordPress-Funktionalitäten da sind
und bestimmt nie in für Frontend/API oder andere harte Fälle relevant sind.
Oder sie sind einfach zu populär, als das sie in dieser "Liste der vergessenen WordPress Gems" aufgezählt werden sollen.

Unter anderem der Customizer (Ordner "customize"), welcher im Backend zu finden ist und lediglich erweitert wird.

Bilder sind toll, aber nach beim Update anders - das will kein Designer.
Hier kommt es ganz stark auf die Policy von WordPress an.
Die Verzeichnisse "crystal" und "media" beinhalten tolle Icons für Dateitypen,
denn es gibt immer etwas herunterzuladen auf einer Seite.
Und im "smilies" Ordner verstecken sich natürlich Gesichter und ein Icon in kleiner Auflösung. 

## Kein Dreck, aber naja

- Zertifikate
- CSS/Fonts (Buttons, Icons)
- ID3
- Bilder (Crystal, Smilies)
- TinyMCE

Der "wp-includes"-Ordner beginnt mit einem Ordner für Zertifikate. Dort ist nur eine Datei in die, frei nach WordPress manier, alles reingefercht ist. Sie beinhaltet eine Reihe von Zertifikaten, welche für die Authentifizierung gegenüber anderen Diensten benötigt wird. Innerhalb der [HTTP API](https://codex.wordpress.org/HTTP_API) wird diese für verschlüsselte Verbindungen genutzt.

Der Ordner CSS wirkt unwichtig, dennoch lassen sich hier einige Sachen für das Frontend ableiten.
Dort sind insbesondere Styles für Buttons und Icons in einer eigenen Datei hinterlegt.
Die Icons können super für das Frontend wiederverwendet werden
und die Buttons am besten durch eine andere Datei (per Hooks und Co.) ersetzt werden.
Dann hätte der Kunde die Styles der wichtigsten Front-End Buttons auch im Backend.
Einfach die "buttons.css" ins Theme kopieren, für das Frontend anpassen und auch für das Backend einbinden.
Ohne viel Aufwand, wandert damit etwas vom CI ins Backend.

!!! [ID3](https://packagist.org/packages/james-heinrich/getid3)
Das kann PHP auch mit dem id3-Modul.

!!! TinyMCE kennen wir alle



## Was ist das denn?

Ein Ordner "js" in dem sich nicht nur WordPress-Sachen verstecken, sondern auch lauter alte bekannte Frameworks.

Dabei sei bedacht, dass hier die Möglichkeiten von WordPress vorgestellt werden und nicht was gerade populär ist.
Im folgenden fallen dem ein oder anderen sicherlich angenehmere Tools ein.


### Ein paar kleine Sachen

- HoverIntent !!!
- QuickTags !!!
- SACK !!!
- Twitter Emojis !!!

### Cropper



!!! Beispiel per IFrame: Klassenfoto, Person als Bereich auswählen, Namen vergeben.
!!! Explosionszeichnung: Teile markieren
!!! Code zum einbinden

David Spurr (http://www.defusion.org.uk/)
[Cropper] (http://www.defusion.org.uk/code/javascript-image-cropper-ui-using-prototype-scriptaculous/)
[imgAreaSelect jQuery plugin von Michal Wojciechowski](http://odyniec.net/projects/imgareaselect/)
[jcrop](https://github.com/tapmodo/Jcrop)

!!! Warum drei?


### Ajax-Form

- Form mit Ajax

!!! [jQuery Form extension](https://github.com/malsup/form)
!!! Initialisieren, flaggen per URL-Query und Response an Div leiten.
!!! Beispiel Kontaktformular (vllt CF7)


### Hotkeys

!!! https://github.com/tzuryby/jquery.hotkeys
!!! Eastereggs
!!! Beispiel: Navigation wie bei 9gag


### Mansonry

!!! http://masonry.desandro.com


```
<div class="grid">
  <div class="grid-item">...</div>
  <div class="grid-item grid-item--width2">...</div>
  <div class="grid-item">...</div>
  ...
</div>
```


```
.grid-item { width: 200px; }
.grid-item--width2 { width: 400px; }
```


```
$('.grid').masonry({
  // options
  itemSelector: '.grid-item',
  columnWidth: 200
});
```

!!! Layout http://masonry.desandro.com/layout.html
!!! Options http://masonry.desandro.com/options.html
??? Methods http://masonry.desandro.com/methods.html
!!! Beispiel für Galleriess


### Scheduler

!!! http://jqwidgets.com/jquery-widgets-demo/demos/jqxscheduler/index.htm


### Table Hotskeys

??? Was ist das?


### Touch Punch

!!! http://touchpunch.furf.com/
!!! Dropable ist schön
!!! Accordion ist unschön, weil es das aktuelle Panel nach oben wegschiebt und somit der Beginn des Panels außerhalb vom Viewport ist.


### jQuery Suggest

!!! http://polarblau.github.io/suggest/
!!! PH -> TAB -> Autocomplete zu PHP


### Media

??? Nur für WP


### Media element

??? Nur für Backend


### plupload / swfupload

!!! mOxie - multi-runtime File API & XMLHttpRequest
!!! Beispiel Konzept einreichen
!!! swfupload - meh.


### Thickbox


!!! Yay Thickbox


### Colorpicker


### a11y / ARIA

!!! https://make.wordpress.org/accessibility/2015/04/15/let-wordpress-speak-new-in-wordpress-4-2/
!!! https://www.w3.org/TR/wai-aria/states_and_properties#aria-live
!!! https://www.w3.org/TR/wai-aria/states_and_properties#aria-atomic
!!! https://www.w3.org/WAI/intro/aria.php
!!! http://webaim.org/techniques/ajax/

## Krass

### Backbone

- MVC mit JS
- Benötigt "Underscore.js"
- v1.3.3 (aktuellste, vor 3 Monaten)

- wp.Backbone !!!


!!! 

### Shortcode.js

??? kann das was anderes rendern im TinyMCE? ansonsten, meh.


### Underscore.js

!!! Yay \o/


### wp.*

- wp.embed !!!
- wp.emoji ???
- wp.lists ???
- wp.pointer ???
.


├── admin-bar.php
├── atomlib.php
├── author-template.php
├── bookmark.php
├── bookmark-template.php
├── cache.php
├── canonical.php
├── capabilities.php
├── category.php
├── category-template.php
├── certificates
│   └── ca-bundle.crt
├── class-feed.php
├── class-http.php
├── class-IXR.php
├── class-json.php
├── class-oembed.php
├── class-phpass.php
├── class-phpmailer.php
├── class-pop3.php
├── class-requests.php
├── class-simplepie.php
├── class-smtp.php
├── class-snoopy.php
├── class-walker-category-dropdown.php
├── class-walker-category.php
├── class-walker-comment.php
├── class-walker-nav-menu.php
├── class-walker-page-dropdown.php
├── class-walker-page.php
├── class-wp-admin-bar.php
├── class-wp-ajax-response.php
├── class-wp-comment.php
├── class-wp-comment-query.php
├── class-wp-customize-control.php
├── class-wp-customize-manager.php
├── class-wp-customize-nav-menus.php
├── class-wp-customize-panel.php
├── class-wp-customize-section.php
├── class-wp-customize-setting.php
├── class-wp-customize-widgets.php
├── class.wp-dependencies.php
├── class-wp-editor.php
├── class-wp-embed.php
├── class-wp-error.php
├── class-wp-http-cookie.php
├── class-wp-http-curl.php
├── class-wp-http-encoding.php
├── class-wp-http-ixr-client.php
├── class-wp-http-proxy.php
├── class-wp-http-requests-response.php
├── class-wp-http-response.php
├── class-wp-http-streams.php
├── class-wp-image-editor-gd.php
├── class-wp-image-editor-imagick.php
├── class-wp-image-editor.php
├── class-wp-locale.php
├── class-wp-metadata-lazyloader.php
├── class-wp-meta-query.php
├── class-wp-network.php
├── class-wp-network-query.php
├── class-wp-oembed-controller.php
├── class-wp.php
├── class-wp-post.php
├── class-wp-post-type.php
├── class-wp-rewrite.php
├── class-wp-role.php
├── class-wp-roles.php
├── class.wp-scripts.php
├── class-wp-site.php
├── class-wp-site-query.php
├── class.wp-styles.php
├── class-wp-tax-query.php
├── class-wp-term.php
├── class-wp-term-query.php
├── class-wp-theme.php
├── class-wp-user.php
├── class-wp-user-query.php
├── class-wp-walker.php
├── class-wp-widget-factory.php
├── class-wp-widget.php
├── class-wp-xmlrpc-server.php
├── comment.php
├── comment-template.php
├── compat.php
├── cron.php
├── css
│   ├── admin-bar.css
│   ├── buttons.css
│   ├── customize-preview.css
│   ├── dashicons.css
│   ├── editor.css
│   ├── jquery-ui-dialog.css
│   ├── media-views.css
│   ├── wp-auth-check.css
│   ├── wp-embed-template.css
│   ├── wp-embed-template-ie.css
│   └── wp-pointer.css
├── customize
│   ├── class-wp-customize-background-image-control.php
│   ├── class-wp-customize-background-image-setting.php
│   ├── class-wp-customize-color-control.php
│   ├── class-wp-customize-cropped-image-control.php
│   ├── class-wp-customize-filter-setting.php
│   ├── class-wp-customize-header-image-control.php
│   ├── class-wp-customize-header-image-setting.php
│   ├── class-wp-customize-image-control.php
│   ├── class-wp-customize-media-control.php
│   ├── class-wp-customize-nav-menu-auto-add-control.php
│   ├── class-wp-customize-nav-menu-control.php
│   ├── class-wp-customize-nav-menu-item-control.php
│   ├── class-wp-customize-nav-menu-item-setting.php
│   ├── class-wp-customize-nav-menu-location-control.php
│   ├── class-wp-customize-nav-menu-name-control.php
│   ├── class-wp-customize-nav-menu-section.php
│   ├── class-wp-customize-nav-menu-setting.php
│   ├── class-wp-customize-nav-menus-panel.php
│   ├── class-wp-customize-new-menu-control.php
│   ├── class-wp-customize-new-menu-section.php
│   ├── class-wp-customize-partial.php
│   ├── class-wp-customize-selective-refresh.php
│   ├── class-wp-customize-sidebar-section.php
│   ├── class-wp-customize-site-icon-control.php
│   ├── class-wp-customize-theme-control.php
│   ├── class-wp-customize-themes-section.php
│   ├── class-wp-customize-upload-control.php
│   ├── class-wp-widget-area-customize-control.php
│   └── class-wp-widget-form-customize-control.php
├── date.php
├── default-constants.php
├── default-filters.php
├── default-widgets.php
├── deprecated.php
├── embed.php
├── embed-template.php
├── feed-atom-comments.php
├── feed-atom.php
├── feed.php
├── feed-rdf.php
├── feed-rss2-comments.php
├── feed-rss2.php
├── feed-rss.php
├── fonts
│   ├── dashicons.eot
│   ├── dashicons.svg
│   ├── dashicons.ttf
│   └── dashicons.woff
├── foo.txt
├── formatting.php
├── functions.php
├── functions.wp-scripts.php
├── functions.wp-styles.php
├── general-template.php
├── http.php
├── ID3
│   ├── getid3.lib.php
│   ├── getid3.php
│   ├── license.commercial.txt
│   ├── license.txt
│   ├── module.audio.ac3.php
│   ├── module.audio.dts.php
│   ├── module.audio.flac.php
│   ├── module.audio.mp3.php
│   ├── module.audio.ogg.php
│   ├── module.audio-video.asf.php
│   ├── module.audio-video.flv.php
│   ├── module.audio-video.matroska.php
│   ├── module.audio-video.quicktime.php
│   ├── module.audio-video.riff.php
│   ├── module.tag.apetag.php
│   ├── module.tag.id3v1.php
│   ├── module.tag.id3v2.php
│   ├── module.tag.lyrics3.php
│   └── readme.txt
├── images
│   ├── admin-bar-sprite-2x.png
│   ├── admin-bar-sprite.png
│   ├── arrow-pointer-blue-2x.png
│   ├── arrow-pointer-blue.png
│   ├── blank.gif
│   ├── crystal
│   │   ├── archive.png
│   │   ├── audio.png
│   │   ├── code.png
│   │   ├── default.png
│   │   ├── document.png
│   │   ├── interactive.png
│   │   ├── license.txt
│   │   ├── spreadsheet.png
│   │   ├── text.png
│   │   └── video.png
│   ├── down_arrow-2x.gif
│   ├── down_arrow.gif
│   ├── icon-pointer-flag-2x.png
│   ├── icon-pointer-flag.png
│   ├── media
│   │   ├── archive.png
│   │   ├── audio.png
│   │   ├── code.png
│   │   ├── default.png
│   │   ├── document.png
│   │   ├── interactive.png
│   │   ├── spreadsheet.png
│   │   ├── text.png
│   │   └── video.png
│   ├── rss-2x.png
│   ├── rss.png
│   ├── smilies
│   │   ├── frownie.png
│   │   ├── icon_arrow.gif
│   │   ├── icon_biggrin.gif
│   │   ├── icon_confused.gif
│   │   ├── icon_cool.gif
│   │   ├── icon_cry.gif
│   │   ├── icon_eek.gif
│   │   ├── icon_evil.gif
│   │   ├── icon_exclaim.gif
│   │   ├── icon_idea.gif
│   │   ├── icon_lol.gif
│   │   ├── icon_mad.gif
│   │   ├── icon_mrgreen.gif
│   │   ├── icon_neutral.gif
│   │   ├── icon_question.gif
│   │   ├── icon_razz.gif
│   │   ├── icon_redface.gif
│   │   ├── icon_rolleyes.gif
│   │   ├── icon_sad.gif
│   │   ├── icon_smile.gif
│   │   ├── icon_surprised.gif
│   │   ├── icon_twisted.gif
│   │   ├── icon_wink.gif
│   │   ├── mrgreen.png
│   │   ├── rolleyes.png
│   │   └── simple-smile.png
│   ├── spinner-2x.gif
│   ├── spinner.gif
│   ├── toggle-arrow-2x.png
│   ├── toggle-arrow.png
│   ├── uploader-icons-2x.png
│   ├── uploader-icons.png
│   ├── w-logo-blue.png
│   ├── wlw
│   │   ├── wp-comments.png
│   │   ├── wp-icon.png
│   │   └── wp-watermark.png
│   ├── wpicons-2x.png
│   ├── wpicons.png
│   ├── wpspin-2x.gif
│   ├── wpspin.gif
│   ├── xit-2x.gif
│   └── xit.gif
├── js
│   ├── admin-bar.js
│   ├── autosave.js
│   ├── backbone.js
│   ├── backbone.min.js
│   ├── colorpicker.js
│   ├── comment-reply.js
│   ├── crop
│   │   ├── cropper.css
│   │   ├── cropper.js
│   │   ├── marqueeHoriz.gif
│   │   └── marqueeVert.gif
│   ├── customize-base.js
│   ├── customize-loader.js
│   ├── customize-models.js
│   ├── customize-preview.js
│   ├── customize-preview-nav-menus.js
│   ├── customize-preview-widgets.js
│   ├── customize-selective-refresh.js
│   ├── customize-views.js
│   ├── heartbeat.js
│   ├── hoverIntent.js
│   ├── imagesloaded.min.js
│   ├── imgareaselect
│   │   ├── border-anim-h.gif
│   │   ├── border-anim-v.gif
│   │   ├── imgareaselect.css
│   │   ├── jquery.imgareaselect.js
│   │   └── jquery.imgareaselect.min.js
│   ├── jcrop
│   │   ├── Jcrop.gif
│   │   ├── jquery.Jcrop.min.css
│   │   └── jquery.Jcrop.min.js
│   ├── jquery
│   │   ├── jquery.color.min.js
│   │   ├── jquery.form.js
│   │   ├── jquery.form.min.js
│   │   ├── jquery.hotkeys.js
│   │   ├── jquery.hotkeys.min.js
│   │   ├── jquery.js
│   │   ├── jquery.masonry.js
│   │   ├── jquery.masonry.min.js
│   │   ├── jquery-migrate.js
│   │   ├── jquery-migrate.min.js
│   │   ├── jquery.query.js
│   │   ├── jquery.schedule.js
│   │   ├── jquery.serialize-object.js
│   │   ├── jquery.table-hotkeys.js
│   │   ├── jquery.table-hotkeys.min.js
│   │   ├── jquery.ui.touch-punch.js
│   │   ├── suggest.js
│   │   ├── suggest.min.js
│   │   └── ui
│   │       ├── accordion.js
│   │       ├── autocomplete.js
│   │       ├── button.js
│   │       ├── core.js
│   │       ├── datepicker.js
│   │       ├── dialog.js
│   │       ├── draggable.js
│   │       ├── droppable.js
│   │       ├── effect-blind.js
│   │       ├── effect-bounce.js
│   │       ├── effect-clip.js
│   │       ├── effect-drop.js
│   │       ├── effect-explode.js
│   │       ├── effect-fade.js
│   │       ├── effect-fold.js
│   │       ├── effect-highlight.js
│   │       ├── effect.js
│   │       ├── effect-puff.js
│   │       ├── effect-pulsate.js
│   │       ├── effect-scale.js
│   │       ├── effect-shake.js
│   │       ├── effect-size.js
│   │       ├── effect-slide.js
│   │       ├── effect-transfer.js
│   │       ├── menu.js
│   │       ├── mouse.js
│   │       ├── position.js
│   │       ├── progressbar.js
│   │       ├── resizable.js
│   │       ├── selectable.js
│   │       ├── selectmenu.js
│   │       ├── slider.js
│   │       ├── sortable.js
│   │       ├── spinner.js
│   │       ├── tabs.js
│   │       ├── tooltip.js
│   │       └── widget.js
│   ├── json2.js
│   ├── masonry.min.js
│   ├── mce-view.js
│   ├── media
│   │   ├── audiovideo.manifest.js
│   │   ├── controllers
│   │   │   ├── audio-details.js
│   │   │   ├── collection-add.js
│   │   │   ├── collection-edit.js
│   │   │   ├── cropper.js
│   │   │   ├── customize-image-cropper.js
│   │   │   ├── edit-attachment-metadata.js
│   │   │   ├── edit-image.js
│   │   │   ├── embed.js
│   │   │   ├── featured-image.js
│   │   │   ├── gallery-add.js
│   │   │   ├── gallery-edit.js
│   │   │   ├── image-details.js
│   │   │   ├── library.js
│   │   │   ├── media-library.js
│   │   │   ├── region.js
│   │   │   ├── replace-image.js
│   │   │   ├── site-icon-cropper.js
│   │   │   ├── state.js
│   │   │   ├── state-machine.js
│   │   │   └── video-details.js
│   │   ├── grid.manifest.js
│   │   ├── models
│   │   │   ├── attachment.js
│   │   │   ├── attachments.js
│   │   │   ├── post-image.js
│   │   │   ├── post-media.js
│   │   │   ├── query.js
│   │   │   └── selection.js
│   │   ├── models.manifest.js
│   │   ├── routers
│   │   │   └── manage.js
│   │   ├── utils
│   │   │   └── selection-sync.js
│   │   ├── views
│   │   │   ├── attachment
│   │   │   │   ├── details.js
│   │   │   │   ├── details-two-column.js
│   │   │   │   ├── edit-library.js
│   │   │   │   ├── edit-selection.js
│   │   │   │   ├── library.js
│   │   │   │   └── selection.js
│   │   │   ├── attachment-compat.js
│   │   │   ├── attachment-filters
│   │   │   │   ├── all.js
│   │   │   │   ├── date.js
│   │   │   │   └── uploaded.js
│   │   │   ├── attachment-filters.js
│   │   │   ├── attachment.js
│   │   │   ├── attachments
│   │   │   │   ├── browser.js
│   │   │   │   └── selection.js
│   │   │   ├── attachments.js
│   │   │   ├── audio-details.js
│   │   │   ├── button
│   │   │   │   ├── delete-selected.js
│   │   │   │   ├── delete-selected-permanently.js
│   │   │   │   └── select-mode-toggle.js
│   │   │   ├── button-group.js
│   │   │   ├── button.js
│   │   │   ├── cropper.js
│   │   │   ├── edit-image-details.js
│   │   │   ├── edit-image.js
│   │   │   ├── embed
│   │   │   │   ├── image.js
│   │   │   │   ├── link.js
│   │   │   │   └── url.js
│   │   │   ├── embed.js
│   │   │   ├── focus-manager.js
│   │   │   ├── frame
│   │   │   │   ├── audio-details.js
│   │   │   │   ├── edit-attachments.js
│   │   │   │   ├── image-details.js
│   │   │   │   ├── manage.js
│   │   │   │   ├── media-details.js
│   │   │   │   ├── post.js
│   │   │   │   ├── select.js
│   │   │   │   └── video-details.js
│   │   │   ├── frame.js
│   │   │   ├── iframe.js
│   │   │   ├── image-details.js
│   │   │   ├── label.js
│   │   │   ├── media-details.js
│   │   │   ├── media-frame.js
│   │   │   ├── menu-item.js
│   │   │   ├── menu.js
│   │   │   ├── modal.js
│   │   │   ├── priority-list.js
│   │   │   ├── router-item.js
│   │   │   ├── router.js
│   │   │   ├── search.js
│   │   │   ├── selection.js
│   │   │   ├── settings
│   │   │   │   ├── attachment-display.js
│   │   │   │   ├── gallery.js
│   │   │   │   └── playlist.js
│   │   │   ├── settings.js
│   │   │   ├── sidebar.js
│   │   │   ├── site-icon-cropper.js
│   │   │   ├── site-icon-preview.js
│   │   │   ├── spinner.js
│   │   │   ├── toolbar
│   │   │   │   ├── embed.js
│   │   │   │   └── select.js
│   │   │   ├── toolbar.js
│   │   │   ├── uploader
│   │   │   │   ├── editor.js
│   │   │   │   ├── inline.js
│   │   │   │   ├── status-error.js
│   │   │   │   ├── status.js
│   │   │   │   └── window.js
│   │   │   ├── video-details.js
│   │   │   └── view.js
│   │   └── views.manifest.js
│   ├── media-audiovideo.js
│   ├── media-editor.js
│   ├── mediaelement
│   │   ├── background.png
│   │   ├── bigplay.png
│   │   ├── bigplay.svg
│   │   ├── controls.png
│   │   ├── controls.svg
│   │   ├── flashmediaelement.swf
│   │   ├── froogaloop.min.js
│   │   ├── jumpforward.png
│   │   ├── loading.gif
│   │   ├── mediaelement-and-player.min.js
│   │   ├── mediaelementplayer.min.css
│   │   ├── silverlightmediaelement.xap
│   │   ├── skipback.png
│   │   ├── wp-mediaelement.css
│   │   ├── wp-mediaelement.js
│   │   └── wp-playlist.js
│   ├── media-grid.js
│   ├── media-models.js
│   ├── media-views.js
│   ├── plupload
│   │   ├── handlers.js
│   │   ├── license.txt
│   │   ├── plupload.flash.swf
│   │   ├── plupload.full.min.js
│   │   ├── plupload.silverlight.xap
│   │   └── wp-plupload.js
│   ├── quicktags.js
│   ├── shortcode.js
│   ├── swfobject.js
│   ├── swfupload
│   │   ├── handlers.js
│   │   ├── handlers.min.js
│   │   ├── license.txt
│   │   ├── plugins
│   │   │   ├── swfupload.cookies.js
│   │   │   ├── swfupload.queue.js
│   │   │   ├── swfupload.speed.js
│   │   │   └── swfupload.swfobject.js
│   │   ├── swfupload.js
│   │   └── swfupload.swf
│   ├── thickbox
│   │   ├── loadingAnimation.gif
│   │   ├── macFFBgHack.png
│   │   ├── thickbox.css
│   │   └── thickbox.js
│   ├── tinymce
│   │   ├── langs
│   │   │   └── wp-langs-en.js
│   │   ├── license.txt
│   │   ├── plugins
│   │   │   ├── charmap
│   │   │   │   ├── plugin.js
│   │   │   │   └── plugin.min.js
│   │   │   ├── colorpicker
│   │   │   │   ├── plugin.js
│   │   │   │   └── plugin.min.js
│   │   │   ├── compat3x
│   │   │   │   ├── css
│   │   │   │   │   └── dialog.css
│   │   │   │   ├── plugin.js
│   │   │   │   └── plugin.min.js
│   │   │   ├── directionality
│   │   │   │   ├── plugin.js
│   │   │   │   └── plugin.min.js
│   │   │   ├── fullscreen
│   │   │   │   ├── plugin.js
│   │   │   │   └── plugin.min.js
│   │   │   ├── hr
│   │   │   │   ├── plugin.js
│   │   │   │   └── plugin.min.js
│   │   │   ├── image
│   │   │   │   ├── plugin.js
│   │   │   │   └── plugin.min.js
│   │   │   ├── lists
│   │   │   │   ├── plugin.js
│   │   │   │   └── plugin.min.js
│   │   │   ├── media
│   │   │   │   ├── moxieplayer.swf
│   │   │   │   ├── plugin.js
│   │   │   │   └── plugin.min.js
│   │   │   ├── paste
│   │   │   │   ├── plugin.js
│   │   │   │   └── plugin.min.js
│   │   │   ├── tabfocus
│   │   │   │   ├── plugin.js
│   │   │   │   └── plugin.min.js
│   │   │   ├── textcolor
│   │   │   │   ├── plugin.js
│   │   │   │   └── plugin.min.js
│   │   │   ├── wordpress
│   │   │   │   └── plugin.js
│   │   │   ├── wpautoresize
│   │   │   │   └── plugin.js
│   │   │   ├── wpdialogs
│   │   │   │   └── plugin.js
│   │   │   ├── wpeditimage
│   │   │   │   └── plugin.js
│   │   │   ├── wpembed
│   │   │   │   └── plugin.js
│   │   │   ├── wpemoji
│   │   │   │   └── plugin.js
│   │   │   ├── wpgallery
│   │   │   │   └── plugin.js
│   │   │   ├── wplink
│   │   │   │   └── plugin.js
│   │   │   ├── wptextpattern
│   │   │   │   └── plugin.js
│   │   │   └── wpview
│   │   │       └── plugin.js
│   │   ├── skins
│   │   │   ├── lightgray
│   │   │   │   ├── content.inline.min.css
│   │   │   │   ├── content.min.css
│   │   │   │   ├── fonts
│   │   │   │   │   ├── readme.md
│   │   │   │   │   ├── tinymce.eot
│   │   │   │   │   ├── tinymce.json
│   │   │   │   │   ├── tinymce-small.eot
│   │   │   │   │   ├── tinymce-small.json
│   │   │   │   │   ├── tinymce-small.svg
│   │   │   │   │   ├── tinymce-small.ttf
│   │   │   │   │   ├── tinymce-small.woff
│   │   │   │   │   ├── tinymce.svg
│   │   │   │   │   ├── tinymce.ttf
│   │   │   │   │   └── tinymce.woff
│   │   │   │   ├── img
│   │   │   │   │   ├── anchor.gif
│   │   │   │   │   ├── loader.gif
│   │   │   │   │   ├── object.gif
│   │   │   │   │   └── trans.gif
│   │   │   │   ├── skin.ie7.min.css
│   │   │   │   └── skin.min.css
│   │   │   └── wordpress
│   │   │       ├── images
│   │   │       │   ├── audio.png
│   │   │       │   ├── dashicon-edit.png
│   │   │       │   ├── dashicon-no.png
│   │   │       │   ├── embedded.png
│   │   │       │   ├── gallery-2x.png
│   │   │       │   ├── gallery.png
│   │   │       │   ├── more-2x.png
│   │   │       │   ├── more.png
│   │   │       │   ├── pagebreak-2x.png
│   │   │       │   ├── pagebreak.png
│   │   │       │   ├── playlist-audio.png
│   │   │       │   ├── playlist-video.png
│   │   │       │   └── video.png
│   │   │       └── wp-content.css
│   │   ├── themes
│   │   │   ├── inlite
│   │   │   │   ├── theme.js
│   │   │   │   └── theme.min.js
│   │   │   └── modern
│   │   │       ├── theme.js
│   │   │       └── theme.min.js
│   │   ├── tinymce.js
│   │   ├── tinymce.min.js
│   │   ├── tiny_mce_popup.js
│   │   ├── utils
│   │   │   ├── editable_selects.js
│   │   │   ├── form_utils.js
│   │   │   ├── mctabs.js
│   │   │   └── validate.js
│   │   └── wp-tinymce.php
│   ├── twemoji.js
│   ├── tw-sack.js
│   ├── underscore.js
│   ├── underscore.min.js
│   ├── utils.js
│   ├── wp-a11y.js
│   ├── wp-ajax-response.js
│   ├── wp-auth-check.js
│   ├── wp-backbone.js
│   ├── wpdialog.js
│   ├── wp-embed.js
│   ├── wp-embed-template.js
│   ├── wp-emoji.js
│   ├── wp-emoji-loader.js
│   ├── wplink.js
│   ├── wp-list-revisions.js
│   ├── wp-lists.js
│   ├── wp-pointer.js
│   ├── wp-util.js
│   ├── zxcvbn-async.js
│   └── zxcvbn.min.js
├── kses.php
├── l10n.php
├── link-template.php
├── load.php
├── locale.php
├── media.php
├── media-template.php
├── meta.php
├── ms-blogs.php
├── ms-default-constants.php
├── ms-default-filters.php
├── ms-deprecated.php
├── ms-files.php
├── ms-functions.php
├── ms-load.php
├── ms-settings.php
├── nav-menu.php
├── nav-menu-template.php
├── option.php
├── pluggable-deprecated.php
├── pluggable.php
├── plugin.php
├── pomo
│   ├── entry.php
│   ├── mo.php
│   ├── po.php
│   ├── streams.php
│   └── translations.php
├── post-formats.php
├── post.php
├── post-template.php
├── post-thumbnail-template.php
├── query.php
├── random_compat
│   ├── byte_safe_strings.php
│   ├── cast_to_int.php
│   ├── error_polyfill.php
│   ├── random_bytes_com_dotnet.php
│   ├── random_bytes_dev_urandom.php
│   ├── random_bytes_libsodium_legacy.php
│   ├── random_bytes_libsodium.php
│   ├── random_bytes_mcrypt.php
│   ├── random_bytes_openssl.php
│   ├── random_int.php
│   └── random.php
├── registration-functions.php
├── registration.php
├── Requests
│   ├── Auth
│   │   └── Basic.php
│   ├── Auth.php
│   ├── Cookie
│   │   └── Jar.php
│   ├── Cookie.php
│   ├── Exception
│   │   ├── HTTP
│   │   │   ├── 304.php
│   │   │   ├── 305.php
│   │   │   ├── 306.php
│   │   │   ├── 400.php
│   │   │   ├── 401.php
│   │   │   ├── 402.php
│   │   │   ├── 403.php
│   │   │   ├── 404.php
│   │   │   ├── 405.php
│   │   │   ├── 406.php
│   │   │   ├── 407.php
│   │   │   ├── 408.php
│   │   │   ├── 409.php
│   │   │   ├── 410.php
│   │   │   ├── 411.php
│   │   │   ├── 412.php
│   │   │   ├── 413.php
│   │   │   ├── 414.php
│   │   │   ├── 415.php
│   │   │   ├── 416.php
│   │   │   ├── 417.php
│   │   │   ├── 418.php
│   │   │   ├── 428.php
│   │   │   ├── 429.php
│   │   │   ├── 431.php
│   │   │   ├── 500.php
│   │   │   ├── 501.php
│   │   │   ├── 502.php
│   │   │   ├── 503.php
│   │   │   ├── 504.php
│   │   │   ├── 505.php
│   │   │   ├── 511.php
│   │   │   └── Unknown.php
│   │   ├── HTTP.php
│   │   ├── Transport
│   │   │   └── cURL.php
│   │   └── Transport.php
│   ├── Exception.php
│   ├── Hooker.php
│   ├── Hooks.php
│   ├── IDNAEncoder.php
│   ├── IPv6.php
│   ├── IRI.php
│   ├── Proxy
│   │   └── HTTP.php
│   ├── Proxy.php
│   ├── Response
│   │   └── Headers.php
│   ├── Response.php
│   ├── Session.php
│   ├── SSL.php
│   ├── Transport
│   │   ├── cURL.php
│   │   └── fsockopen.php
│   ├── Transport.php
│   └── Utility
│       ├── CaseInsensitiveDictionary.php
│       └── FilteredIterator.php
├── rest-api
│   ├── class-wp-rest-request.php
│   ├── class-wp-rest-response.php
│   └── class-wp-rest-server.php
├── rest-api.php
├── revision.php
├── rewrite.php
├── rss-functions.php
├── rss.php
├── script-loader.php
├── session.php
├── shortcodes.php
├── SimplePie
│   ├── Author.php
│   ├── Cache
│   │   ├── Base.php
│   │   ├── DB.php
│   │   ├── File.php
│   │   ├── Memcache.php
│   │   └── MySQL.php
│   ├── Cache.php
│   ├── Caption.php
│   ├── Category.php
│   ├── Content
│   │   └── Type
│   │       └── Sniffer.php
│   ├── Copyright.php
│   ├── Core.php
│   ├── Credit.php
│   ├── Decode
│   │   └── HTML
│   │       └── Entities.php
│   ├── Enclosure.php
│   ├── Exception.php
│   ├── File.php
│   ├── gzdecode.php
│   ├── HTTP
│   │   └── Parser.php
│   ├── IRI.php
│   ├── Item.php
│   ├── Locator.php
│   ├── Misc.php
│   ├── Net
│   │   └── IPv6.php
│   ├── Parse
│   │   └── Date.php
│   ├── Parser.php
│   ├── Rating.php
│   ├── Registry.php
│   ├── Restriction.php
│   ├── Sanitize.php
│   ├── Source.php
│   └── XML
│       └── Declaration
│           └── Parser.php
├── taxonomy.php
├── template-loader.php
├── template.php
├── Text
│   ├── Diff
│   │   ├── Engine
│   │   │   ├── native.php
│   │   │   ├── shell.php
│   │   │   ├── string.php
│   │   │   └── xdiff.php
│   │   ├── Renderer
│   │   │   └── inline.php
│   │   └── Renderer.php
│   └── Diff.php
├── theme-compat
│   ├── comments.php
│   ├── embed-404.php
│   ├── embed-content.php
│   ├── embed.php
│   ├── footer-embed.php
│   ├── footer.php
│   ├── header-embed.php
│   ├── header.php
│   └── sidebar.php
├── theme.php
├── update.php
├── user.php
├── vars.php
├── version.php
├── widgets
│   ├── class-wp-nav-menu-widget.php
│   ├── class-wp-widget-archives.php
│   ├── class-wp-widget-calendar.php
│   ├── class-wp-widget-categories.php
│   ├── class-wp-widget-links.php
│   ├── class-wp-widget-meta.php
│   ├── class-wp-widget-pages.php
│   ├── class-wp-widget-recent-comments.php
│   ├── class-wp-widget-recent-posts.php
│   ├── class-wp-widget-rss.php
│   ├── class-wp-widget-search.php
│   ├── class-wp-widget-tag-cloud.php
│   └── class-wp-widget-text.php
├── widgets.php
├── wlwmanifest.xml
├── wp-db.php
└── wp-diff.php

102 directories, 762 files
