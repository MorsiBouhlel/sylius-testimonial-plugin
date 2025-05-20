<?php

declare(strict_types=1);

namespace Softylines\SyliusTestimonialPlugin\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('softylines_sylius_testimonial_plugin');
        $rootNode = $treeBuilder->getRootNode();

        return $treeBuilder;
    }
}
