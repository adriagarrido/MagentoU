<?php

namespace Training\Render;

use Magento\TestFramework\Helper\Bootstrap;
use Magento\Framework\App\Route\Config as RouteConfig;

class RoutesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    private $frontName = 'training_render';

    /**
     * @var string
     */
    private $moduleName = 'Training_Render';

    /**
     * @var string
     */
    private $scope = 'frontend';

    /**
     * @test
     */
    public function itShouldRegisterARouteForTheFrontName()
    {
        /** @var RouteConfig $routeConfig */
        $routeConfig = Bootstrap::getObjectManager()->get(RouteConfig::class);
        $routeId = $routeConfig->getRouteByFrontName($this->frontName, $this->scope);
        $this->assertNotFalse(
            $routeId,
            sprintf('No route configuration found for the frontName "%s"', $this->frontName)
        );
    }

    /**
     * @test
     * @depends itShouldRegisterARouteForTheFrontName
     */
    public function theFrontNameShouldBeMappedToTheModule()
    {
        /** @var RouteConfig $routeConfig */
        $routeConfig = Bootstrap::getObjectManager()->get(RouteConfig::class);
        $modules = $routeConfig->getModulesByFrontName($this->frontName, $this->scope);
        $this->assertContains(
            $this->moduleName,
            $modules,
            sprintf('The frontName "%s" is not mapped to the module "%s"', $this->frontName, $this->moduleName)
        );
    }
}
