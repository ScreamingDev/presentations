# WordPress und PHTML

Trennung von Logik und Design



## Beispiel


Kommt bekannt vor?

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


Was ist anders?
