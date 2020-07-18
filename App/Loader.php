<?php

declare(strict_types=1);

namespace App;

use DI\Container;
use DI\Proxy\ProxyFactory;
use Psr\Container\ContainerInterface;
use DI\Definition\Source\MutableDefinitionSource;

/**
 * Class Loader
 * @package App
 */
class Loader extends Container
{
    /**
     * Use `$container = new Container()` if you want a container with the default configuration.
     *
     * If you want to customize the container's behavior, you are discouraged to create and pass the
     * dependencies yourself, the ContainerBuilder class is here to help you instead.
     *
     * @param MutableDefinitionSource|null $definitionSource
     * @param ProxyFactory|null            $proxyFactory
     * @param ContainerInterface           $wrapperContainer If the container is wrapped by another container.
     *
     * @see ContainerBuilder
     *
     */
    public function __construct(
        MutableDefinitionSource $definitionSource = null,
        ProxyFactory $proxyFactory = null,
        ContainerInterface $wrapperContainer = null
    ) {
        parent::__construct(
            $definitionSource,
            $proxyFactory,
            $wrapperContainer
        );
    }

    public function loadApplication()
    {

    }
}
