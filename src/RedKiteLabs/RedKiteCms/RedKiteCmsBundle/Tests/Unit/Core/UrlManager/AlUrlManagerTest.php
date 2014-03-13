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

namespace RedKiteLabs\RedKiteCms\RedKiteCmsBundle\Tests\Unit\Core\UrlManager;

use RedKiteLabs\RedKiteCms\RedKiteCmsBundle\Core\UrlManager\AlUrlManager;
use Symfony\Component\HttpKernel\KernelInterface;
use RedKiteLabs\RedKiteCms\RedKiteCmsBundle\Core\Repository\Factory\AlFactoryRepositoryInterface;

/**
 * AlUrlManagerTest
 *
 * @author RedKite Labs <webmaster@redkite-labs.com>
 */
class AlUrlManagerTest extends BaseAlUrlManager
{
    protected $routePrefix = '';
    
    protected function getUrlManager(KernelInterface $kernel, AlFactoryRepositoryInterface $factoryRepository) {
        return new AlUrlManager($kernel, $factoryRepository);
    }
}