<?php

/*
 *  This file is part of the Micro framework package.
 *
 *  (c) Stanislau Komar <kost@micro-php.net>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace Micro\Framework\Kernel\Test\Unit\Boot;

use Micro\Component\DependencyInjection\Container;
use Micro\Framework\Kernel\Boot\DependencyProviderBootLoader;
use Micro\Framework\Kernel\Plugin\DependencyProviderInterface;
use PHPUnit\Framework\TestCase;

class DependencyProviderBootLoaderTest extends TestCase
{
    /**
     * @return void
     */
    public function testBoot()
    {
        $container = new Container();

        $dataProviderBootLoader = new DependencyProviderBootLoader($container);

        $pluginMock = $this->createMock(DependencyProviderInterface::class);
        $pluginMock
            ->expects($this->once())
            ->method('provideDependencies');

        $pluginNotDependencyProvider = new class() {
            public function provideDependencies()
            {
                throw new \LogicException('Should not be executed!');
            }
        };

        foreach ([$pluginMock, $pluginNotDependencyProvider] as $plugin) {
            $dataProviderBootLoader->boot($plugin);
        }
    }
}
