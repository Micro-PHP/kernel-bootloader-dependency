<?php

namespace Micro\Framework\Kernel\Plugin;

use Micro\Component\DependencyInjection\Container;

interface DependencyProviderInterface
{
    /**
     * @param  Container $container
     *
     * @return void
     */
    public function provideDependencies(Container $container): void;
}