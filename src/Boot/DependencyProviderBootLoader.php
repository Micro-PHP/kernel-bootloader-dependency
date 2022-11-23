<?php

namespace Micro\Framework\Kernel\Plugin\Boot;

use Micro\Component\DependencyInjection\Autowire\ContainerAutowire;
use Micro\Component\DependencyInjection\Container;
use Micro\Framework\Kernel\Plugin\ApplicationPluginInterface;
use Micro\Framework\Kernel\Plugin\DependencyProviderInterface;
use Micro\Framework\Kernel\Plugin\PluginBootLoaderInterface;

class DependencyProviderBootLoader implements PluginBootLoaderInterface
{
    /**
     * @var Container
     */
    private readonly Container $container;

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        if(!($container instanceof ContainerAutowire)) {
            $container = new ContainerAutowire($container);
        }

        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function boot(ApplicationPluginInterface $applicationPlugin): void
    {
        if(!($applicationPlugin instanceof DependencyProviderInterface)) {
            return;
        }

        $applicationPlugin->provideDependencies($this->container);
    }
}