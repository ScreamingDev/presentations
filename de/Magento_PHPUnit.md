# Magento und Tests

## Inhalt

- Übersicht zu TDD und BDD
- Beispiel anhand von EcomDev_PHPUnit


### TDD vs. BDD

- Häufig in agiler Entwicklung
- TDD: technisch genau mit Grey-Box-Tests
- BDD: deskriptiv und anforderungsorientiert
- Detailliert Abstrakt vs. lebendiger Roundtrip


## Möglichkeiten

- [Magento Automated Testing] (https://wiki.magento.com/display/MAGE2DOC/Magento+Automated+Testing+Guide)
- [MTAF] (https://github.com/magento/taf)
- [EcomDev_PHPUnit] (https://github.com/EcomDev/EcomDev_PHPUnit)


### Mage Automated Testing

- Nutzt PHPUnit
- Ein Vorschlag von Magento
- Erlaubt einfache Funktionstests
- Factory und Config schwer testbar


    class Magento_DesignEditor_Block_Toolbar_BreadcrumbsTest
    extends PHPUnit_Framework_TestCase {
        protected function setUp() {
            $layoutUtility = new Magento_Core_Utility_Layout($this);
            $this->_block = new Magento_DesignEditor_Block_Toolbar_Breadcrumbs(
                array('template' => 'toolbar/breadcrumbs.phtml')
            );
            $this->_block->setLayout($layoutUtility->getLayoutFromFixture('_files/_page_types.xml'));
        }
    
        // actual tests...
    }
   
    
### Magento TAF

- Selenium mit PHPUnit vermischt
- Stark browserorientiert
