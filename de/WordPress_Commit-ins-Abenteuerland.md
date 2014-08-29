# Commit ins Abenteuerland

> Das Coden kostet den Verstand



## Commits generell


> Plugin: Revolution Slider, Google Maps, Testimonials Widget & Duplicate Post


- Revert eines einzelnen geht nicht
- Commit ist unnötig groß


- Commit modular halten


> Showing 1 changed file with 60 additions and 18 deletions
> wp-content/plugins/zoom-widget/elements/parseTheme.css 


- Nicht im Theme arbeiten
- Nicht im Plugin arbeiten
- Ein Update überbügelt alles


- Child-Theme nutzen
- Theme duplizieren
- Eignes Plugin schreiben, fremdes nutzen
- Plugin duplizieren


## Commit-Meldungen


### Word!

> Word!

> Startseite



## Abenteuerleiche Änderungen

Note: In diesem Teil sollen Code-Beispiele aus echten Commits gegeben werden,
welche eine Lösung des Problems darstellen,
aber dennoch auf ihre eigene Art und Weise abenteuerlich sind.
Es ist der Schnellschuss,
welcher das Problem trifft
und dennoch nicht zuträgtlich für guten Code ist.


### Alles was nicht gebraucht wird


  <?php /*
    <div class="sidebar-post-meta">
      <?php the_time( get_option( 'date_format' ) ); ?> | <?php the_author(); ?>
    </div>
  */ ?>


- Code wird unnötig aufgebläht

Note: Wenn eine Funktion oder ein Design nicht genutzt wird,
dann sollte diese vollständig herausgelöscht werden.
Es bläht den Code nach mehreren Änderungen zu sehr auf
und stört nur beim Lesen vom Quelltext.


- GIT hat den Code immernoch

Note: Das VCS kümmert sich darum,
dass die ursprünglichen Inhalte nicht verloren gehen.

### Magische Zahlen


```
$parentPage = 5467; // ID of the Parent Page
```


- WordPress-Vorgabe: `$parent_page`
- Magische Zahlen verwirren


Note: Hier ist es nicht der Name der Variablen,
welcher in der WordPress-Welt `$parent_page` wäre,
sondern die magische Zahl,
welche verstörend wirkt für Entwickler und WordPress.


Hierfür gibt es WP_Post::parent_id

```
// $post = get_post($current_id);
$parent_page = $post->post_parent;
```


### Stilbrüche


```
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
     <?php if(has_post_thumbnail()) {
       the_post_thumbnail('fullwidth');
     }
     the_content();
  <?php endwhile; ?>
<?php endif; ?>

```


- Eigener Dialekt in ordentlichem Code

Note: Der Code um einen herum arbeitet mit "if/endif" und "while/endwhile".
Der eigene (in der Mitte) hingegen hat dann geschweifte Klammern.
Das ist der Berliner unter den Bayern - selbe Sprache aber anderer Dialekt.
Schöner ist es sich der Umgebung anzupassen
oder noch besser nur in WordPress-Standards zu schreiben.


Besser sich an die Umgebung oder WordPress-Standards halten:

```
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
     <?php if(has_post_thumbnail()): ?>
       <?php
        the_post_thumbnail('fullwidth');
        the_content();
      ?>
    <?php endif; ?>
  <?php endwhile; ?>
<?php endif; ?>

```

