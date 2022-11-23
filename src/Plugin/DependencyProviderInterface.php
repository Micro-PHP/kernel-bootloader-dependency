<?php

namespace Micro\Framework\Kernel\Plugin;

use Micro\Component\DependencyInjection\Container;

interface DependencyProviderInterface extends ApplicationPluginInterface
{
    /**
     * @param  Container $container
     *
     * @return void
     */
    public function provideDependencies(Container $container): void;
}