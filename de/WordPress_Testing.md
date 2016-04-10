# Selbstdarstellung

- Heute für Lau

  Ich bin ein Typ, dem seine Freizeit sehr wichtig ist.
Daher ist es erstmal ungewöhnlich, dass dieser Vortrag hier der WordCamp-Orga nichts kostet.
Zum einen ist das so, weil ich so meinen Weg in die Community finde
und hoffe noch viel von dieser Community über WordPress und große Projekte zu lernen.
Zum anderen verzichte ich auf einen Obolus,
weil ich sehr(!) hoffe, dass der ein oder andere hier sich etwas abholt
und sich so die Code-Qualität verbessert.

## Diese Präsentation

- Mitlesen auf mike-pretzlaw.de/wc
- Fragen und Anmerkungen per @ScreamingDev


## Welche Test-Frameworks für PHP gibt es?

- PHPUnit
- Codeception
- 


### PHPUnit

- CLI
- TDD
- Komponententest (manchmal Integrationstest)


    class MeinTest extends \PHPUnit_Framework_Test_Case {
        function testGuestCanNotComment() {
            $a = new \WP_User();
            
            $this->assertInstanceOf('\\WP_User', $a);
            
            $this->markIncomplete('Missing test cases');
        }
    }


    phpunit --bootstrap src/autoload.php tests/MoneyTest
    PHPUnit 5.3.0 by Sebastian Bergmann and contributors.
    
    ....................
    
    Time: 121 ms, Memory: 4.50Mb
    
    OK (20 tests, 39 assertions)


- bekannt
- Wird vom Core genutzt

  PHPUnit ist ein sehr bekanntest Framework.
Dadurch ergeben sich weitere Vorteile wie eine permanente Wartung des Codes,
viele Contributor, eine große Community zum Fragen stellen und vieles mehr.
Auch WordPress nutzt PHPUnit zum testen des Cores
also dürfte es eine gute Variante sein,
um eigene Tests darauf aufzubauen.


- komplex
- Bash-Skripte
- WordPress-Vorlage nutzt blanke Installation

  PHPUnit wird in Sachen Mocks und Erweiterung sehr komplex.
Ein Programmier-Neuling setzt sich mit diesem durcheinander nicht gerne auseinander.
Er ist froh wenn alle Tests grün bleiben,
nervös einen eigenen Test in drei (unzureichenden) Zeilen zu schrieben
und resigniert bei dem Untersuchen von fehlgeschlagenen Tests.

Wenn nicht dort, dann bei den Bash-Skripten.
Eine weitere Sprache, die der Programmierer beherrschen muss, um das Testing zu verstehen.
Schon hier kommt das UnitTesting so wie es für WordPress vorherrscht
für Kundenprojekte und die tägliche Agenturarbeit nicht mehr in Frage.

Erschwert werden würde das Ganze noch durch die Vorlage von WordPress.
Diese setzt auf einer frischen WordPress-Installation auf,
so dass Echtdaten oder ander Plugins den ganzen Kram dann doch wieder Fehlschlagen lassen.
Eine unzureichende Test-Umgebung, was Du dir im Hinterkopf für die eigene Lösung halten solltest.


## Codeception

- CLI
- TDD/BDD
- Komponenten- bis Akzeptanztest


## Welche weiteren Tools helfen beim Testen?


# Diskussion

Was machen die tweets denn so?