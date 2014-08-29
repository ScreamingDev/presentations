# Commit ins Abenteuerland

> Das Coden kostet den Verstand


## Magische Zahlen


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


## Stilbrüche


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

