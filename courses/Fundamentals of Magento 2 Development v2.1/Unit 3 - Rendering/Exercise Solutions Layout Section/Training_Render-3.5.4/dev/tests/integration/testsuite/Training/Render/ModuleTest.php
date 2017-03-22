<?php

namespace Training\Render;

use Magento\TestFramework\Helper\Bootstrap;
use Magento\Framework\Module\ModuleList;
use Magento\Framework\App\DeploymentConfig;
use Magento\Framework\App\DeploymentConfig\Reader as ConfigReader;
use Magento\Framework\App\Filesystem\DirectoryList;

class ModuleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    private $moduleName = 'Training_Render';

    /**
     * @test
     * @return void
     */
    public function itShouldBeKnownToMagento()
    {

        $moduleList = $this->getNonTestModuleList();
        $this->assertTrue(
            $moduleList->has($this->moduleName),
            sprintf('The module "%s" is not active in app/etc/config.php', $this->moduleName)
        );
        $this->assertContains(
            $this->moduleName,
            array_keys($moduleList->getAll()),
            sprintf('The module "%s" is missing or has an invalid etc/module.xml file', $this->moduleName)
        );
    }

    /**
     * @return ModuleList
     */
    private function getNonTestModuleList()
    {
        return Bootstrap::getObjectManager()->create(
            ModuleList::class
            ,['config' => $this->getNonTestDeploymentConfig()]
        );
    }

    /**
     * @return DeploymentConfig
     */
    private function getNonTestDeploymentConfig()
    {
        return Bootstrap::getObjectManager()->create(
            DeploymentConfig::class,
            ['reader' => $this->getNonTestConfigReader()]
        );
    }

    /**
     * @return ConfigReader
     */
    private function getNonTestConfigReader()
    {
        return Bootstrap::getObjectManager()->create(
            ConfigReader::class,
            ['dirList' => $this->getNonIntegrationTestDirectoryList()]
        );
    }

    /**
     * @return DirectoryList
     */
    private function getNonIntegrationTestDirectoryList()
    {
        return Bootstrap::getObjectManager()->create(
            DirectoryList::class,
            ['root' => $this->getBaseDirectoryPath()]
        );
    }

    /**
     * @return string
     */
    private function getBaseDirectoryPath()
    {
        return Bootstrap::getObjectManager()
            ->get(\Magento\Framework\Filesystem::class)
            ->getDirectoryRead(DirectoryList::ROOT)
            ->getAbsolutePath();
    }
}
