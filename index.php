<!doctype html>
<html lang="en">
<?php error_reporting(E_ALL);
ini_set('display_errors', 1); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mike Pretzlaw</title>

    <link rel="stylesheet" href="reveal.js/css/reveal.css">
    <link rel="stylesheet" href="emoji.css">
    <link rel="stylesheet" href="reveal.js/css/theme/sky.css" id="theme">

    <link rel="stylesheet" href="reveal.js/lib/css/zenburn.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <style type="text/css">
        .reveal i[class*=fa] {
            font-family: 'FontAwesome';
            font-style: normal;
            font-size: 5em;
            line-height: 1em;
        }

        .reveal table {
            margin: auto;
        }

        .reveal table th {
            background: #000;
            color: #fff;
            text-align: center;
        }

        .reveal table td {
            padding: 0.2em;
        }

        .reveal table tbody tr {
            background: rgba(255,255,255,0.5);
        }

        .reveal table tbody tr:nth-child(even) {
            background: rgba(0,0,0,0.5);
            color: #fff;
        }
    </style>

    <base href="http://<?php echo $_SERVER['HTTP_HOST'] ?><?php echo $_SERVER['REQUEST_URI'] ?>">

    <?php

    function humanReadable($fileName)
    {
        return str_replace('-', ' ', $fileName);
    }

    function buildTree($start, $base = '')
    {
        if (!$base) {
            $base = $start;
        }

        $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($start));

        foreach ($it as $item) {
            if (basename($item) == '.') {
                continue;
            }

            $href = preg_replace('@\.md$@', '', trim(str_replace($start, '', $item), '/'));
            $sanitized = dirname($href) . ': ' . basename($href, '.md');
            $query = http_build_query(['p' => 'de/' . $href]);
            printf(
                '<li><a href="?%s">%s</a></li>',
                $query,
                humanReadable($sanitized)

            );
        }
    }

    ?>
</head>
<body>


<?php if (!isset($_GET['p']) || !$_GET['p'] || !file_exists($_GET['p'] . '.md')): ?>
    <ul>
        <?php buildTree(__DIR__ . '/de') ?>
    </ul>
<?php else: ?>
    <div class="reveal">

        <div class="slides">
            <!-- Use external markdown resource, separate slides by three newlines; vertical slides by two newlines -->
            <section data-markdown="<?php echo $_GET['p'] ?>.md"
                     data-separator="^\n\n\n"
                     data-vertical="^\n\n"
                     data-notes="^  [A-Z]{2,}"></section>

        </div>
    </div>
<?php endif; ?>


<script src="reveal.js/lib/js/head.min.js"></script>
<script src="reveal.js/js/reveal.js"></script>

<script>

    Reveal.initialize({
        controls: true,
        progress: true,
        history: true,
        center: true,

        // Optional libraries used to extend on reveal.js
        dependencies: [
            {
                src: 'reveal.js/lib/js/classList.js', condition: function () {
                return !document.body.classList;
            }
            },
            {
                src: 'reveal.js/plugin/markdown/marked.js', condition: function () {
                return !!document.querySelector('[data-markdown]');
            }
            },
            {
                src: 'reveal.js/plugin/markdown/markdown.js', condition: function () {
                return !!document.querySelector('[data-markdown]');
            }
            },
            {
                src: 'reveal.js/plugin/highlight/highlight.js', async: true, callback: function () {
                    hljs.initHighlightingOnLoad();
                }
            },
            {src: 'reveal.js/plugin/notes/notes.js'}
        ]
    });

</script>

</body>
</html>

