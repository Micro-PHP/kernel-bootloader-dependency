<?php

namespace Micro\Framework\Kernel\Plugin;

use Micro\Component\DependencyInjection\Container;

/**
 * @TODO: Remove extends for 2.0 version
 */
interface DependencyProviderInterface
{
    /**
     * @param  Container $container
     *
     * @return void
     */
    public function provideDependencies(Container $container): void;
}