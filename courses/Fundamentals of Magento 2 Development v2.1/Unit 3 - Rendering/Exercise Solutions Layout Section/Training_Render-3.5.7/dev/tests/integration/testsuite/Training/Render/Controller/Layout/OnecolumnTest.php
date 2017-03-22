<?php

namespace Training\Render\Controller\Layout;

use Magento\TestFramework\Helper\Bootstrap;
use Training\Render\Controller\Layout\Onecolumn as OnecolumnController;
use Magento\Framework\View\Result\Page as ResultPage;

class OnecolumnTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Onecolumn
     */
    private $controller;

    /**
     * @var ResultPage|\PHPUnit_Framework_MockObject_MockObject
     */
    private $mockPage;

    public function setUp()
    {
        $this->mockPage = $this->getMock(ResultPage::class, [], [], '', false);
        $this->controller = Bootstrap::getObjectManager()
            ->create(OnecolumnController::class, ['resultPage' => $this->mockPage]);
    }

    /**
     * @test
     */
    public function itShouldReturnThePage()
    {
        $this->assertSame($this->mockPage, $this->controller->execute());
    }

    /**
     * @test
     */
    public function itShouldLoadTheLayout()
    {
        $this->mockPage->expects($this->once())->method('initLayout');
        $this->controller->execute();
    }
}
