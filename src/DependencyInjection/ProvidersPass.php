<?php

namespace App\DependencyInjection;

use App\Service\ProvidersChain;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class ProvidersPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->has(ProvidersChain::class)) {
            return;
        }

        $definition = $container->findDefinition(ProvidersChain::class);

        $taggedServices = $container->findTaggedServiceIds('app.message_provider');

        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall('addProvider', [new Reference($id)]);
        }
    }
}