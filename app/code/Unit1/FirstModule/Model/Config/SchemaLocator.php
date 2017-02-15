<?php
/**
 *
 */
namespace Unit1\FirstModule\Model\Config;

use Magento\Framework\Config\SchemaLocatorInterface;

class SchemaLocator implements SchemaLocatorInterface
{
    /**
     * Path to corresponding XSD file with validation rules for merged config
     * @var string
     */
    protected $_schema = null;

    /**
     * Path to corresponding XSD file with validation rules for separate config
     * files
     * @var string
     */
    protected $_perFileSchema = null;

    /**
     * @param MagentoFrameworkModuleDirReader $moduleReader
     */
    public function __construct(\Magento\Framework\Module\Dir\Reader $moduleReader)
    {
        $etcDir = $moduleReader->getModuleDir('etc', 'Unit1_FirstModule');
        $this->_schema = $etcDir . '/firstmodule.xsd';
        $this->_perFileSchema = $etcDir . '/firstmodule.xsd';
    }

    /**
     * Get path to merged config schema
     * @return string|null
     */
    public function getSchema()
    {
        return $this->_schema;
    }

    /**
     * Get path to pre file validation schema
     * @return strign|null
     */
    public function getPerFileSchema()
    {
        return $this->_perFileSchema;
    }
}
