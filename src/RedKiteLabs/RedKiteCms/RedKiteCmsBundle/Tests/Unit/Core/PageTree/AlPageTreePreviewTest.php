<?php
/**
 * This file is part of the RedKiteCmsBunde Application and it is distributed
 * under the MIT License. To use this application you must leave
 * intact this copyright notice.
 *
 * Copyright (c) RedKite Labs <webmaster@redkite-labs.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For extra documentation and help please visit http://www.redkite-labs.com
 *
 * @license    MIT License
 *
 */

namespace RedKiteLabs\RedKiteCms\RedKiteCmsBundle\Tests\Unit\Core\PageTree;

use RedKiteLabs\RedKiteCms\RedKiteCmsBundle\Tests\TestCase;
use RedKiteLabs\RedKiteCms\RedKiteCmsBundle\Core\PageTree\AlPageTreePreview;

/**
 * AlPageTreeTest
 *
 * @author RedKite Labs <webmaster@redkite-labs.com>
 */
class AlPageTreePreviewTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
        
        $this->dataManager = $this->getMockBuilder('RedKiteLabs\RedKiteCms\RedKiteCmsBundle\Core\PageTree\DataManager\DataManager')
                                            ->disableOriginalConstructor()
                                            ->getMock();
        
        $this->templateAssetsManager = $this->getMockBuilder('RedKiteLabs\RedKiteCms\RedKiteCmsBundle\Core\PageTree\TemplateAssetsManager\TemplateAssetsManager')
                                            ->disableOriginalConstructor()
                                            ->getMock();
        
        $this->templateManager = $this->getMockBuilder('RedKiteLabs\RedKiteCms\RedKiteCmsBundle\Core\Content\Template\AlTemplateManager')
                                            ->disableOriginalConstructor()
                                            ->getMock();
        
        $this->pageBlocks = $this->getMock('RedKiteLabs\RedKiteCms\RedKiteCmsBundle\Core\Content\PageBlocks\AlPageBlocksInterface');
        $this->dispatcher = $this->getMock('Symfony\Component\EventDispatcher\EventDispatcherInterface');
        
        $themeSlots = $this->getMock('RedKiteLabs\ThemeEngineBundle\Core\ThemeSlots\AlThemeSlotsInterface');
        $this->theme = $this->getMockBuilder('RedKiteLabs\ThemeEngineBundle\Core\Theme\AlTheme')
                            ->disableOriginalConstructor()
                            ->getMock();
        $this->theme
            ->expects($this->any())
            ->method('getThemeSlots')
            ->will($this->returnValue($themeSlots))
        ;
    }
    
    /**
     * @dataProvider blockManagersProvider
     */
    public function testAddBlockManagers($slotName, $blockManagers)
    {
        $pageTree = new AlPageTreePreview($this->templateAssetsManager);
        foreach($blockManagers as $blockManager) {
            $pageTree->addBlockManager($slotName, $blockManager);
        }
        $this->assertCount(count($blockManagers), $pageTree->getBlockManagers($slotName));
    }
    
    public function blockManagersProvider()
    {
        return array(
            array(
                "logo",
                array(),
            ),
            array(
                "logo",
                array(                    
                    $this->createBlockManager(),
                ),
            ),
        );
    }
    
    private function createBlockManager()
    {
        return $this->getMock("RedKiteLabs\RedKiteCms\RedKiteCmsBundle\Core\Content\Block\AlBlockManagerInterface");
    }
}