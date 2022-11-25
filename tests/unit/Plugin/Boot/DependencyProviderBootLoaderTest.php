<?php

namespace Micro\Framework\Kernel\Plugin\Boot\Test;

use Micro\Component\DependencyInjection\Container;
use Micro\Framework\Kernel\Boot\DependencyProviderBootLoader;
use Micro\Framework\Kernel\Plugin\DependencyProviderInterface;
use PHPUnit\Framework\TestCase;

class DependencyProviderBootLoaderTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function testBoot()
    {
        $dataProviderBootLoader = new DependencyProviderBootLoader(
            new Container()
        );

        $pluginMock = $this->createMock(DependencyProviderInterface::class);
        $pluginMock
            ->expects($this->once())
            ->method('provideDependencies')
        ;

        $pluginMock
            ->expects($this->any())
            ->method('name')
            ->willReturn('test');

        $pluginNotDependencyProvider = new class{};

        foreach ([ $pluginMock, $pluginNotDependencyProvider ] as $plugin) {
            $dataProviderBootLoader->boot($plugin);
        }
    }
}