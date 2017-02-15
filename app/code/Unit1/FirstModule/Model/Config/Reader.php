<?php
/**
 *
 */
namespace Unit1\FirstModule\Model\Config;

use Magento\Framework\Config\Reader\Filesystem;

class Reader extends Filesystem
{
    /**
     * List of id attributes for merge
     * @var array
     */
    protected $_idAttributes = []; //['/config/option'] => 'name', '/config/options/inputType' => 'name';

    /**
     * @param MagentoFrameworkConfigFileResolverInterface   $fileResolver
     * @param Unit1FirstModuleModelConfigConverter          $converter
     * @param Unit1FirstModuleModelConfigSchemaLocator      $schemaLocator
     * @param MagentoFrameworkConfigValidationStateInerface $validationState
     * @param string                                        $fileName
     * @param array                                         $idAttributes
     * @param string                                        $domDocumentClass
     * @param string                                        $defaultScope
     */
    public function __construct(
        \Magento\Framework\Config\FileResolverInterface $fileResolver,
        \Unit1\FirstModule\Model\Config\Converter $converter,
        \Unit1\FirstModule\Model\Config\SchemaLocator $schemaLocator,
        \Magento\Framework\Config\ValidationStateInterface $validationState,
        $fileName = 'firstmodule.xml',
        $idAttributes = [],
        $domDocumentClass = 'Magento\Framework\Config\Dom',
        $defaultScope = 'global'
    ) {
        parent::__construct(
            $fileResolver,
            $converter,
            $schemaLocator,
            $validationState,
            $fileName,
            $idAttributes,
            $domDocumentClass,
            $defaultScope
        );
    }
}
