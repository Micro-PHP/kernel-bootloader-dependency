<?php

namespace Micro\Framework\Kernel\Boot;

use Micro\Component\DependencyInjection\Autowire\ContainerAutowire;
use Micro\Component\DependencyInjection\Container;
use Micro\Framework\Kernel\Plugin\DependencyProviderInterface;
use Micro\Framework\Kernel\Plugin\PluginBootLoaderInterface;
use Psr\Container\ContainerInterface;

class DependencyProviderBootLoader implements PluginBootLoaderInterface
{
    /**
     * @var Container
     */
    private readonly ContainerInterface $container;

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
     *
     * @TODO: uncomment at 2.0 version
     * {@inheritDoc}
     */
    public function boot(object $applicationPlugin): void
    {
        if(!($applicationPlugin instanceof DependencyProviderInterface)) {
            return;
        }

        $applicationPlugin->provideDependencies($this->container);
    }
}