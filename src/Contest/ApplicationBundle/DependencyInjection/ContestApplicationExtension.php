<?php
/**
 * Created by PhpStorm.
 * User: mikolaj.adamczyk
 * Date: 23.10.15
 * Time: 12:58
 */

namespace Contest\ApplicationBundle\DependencyInjection;


use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class ContestApplicationExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $fileLocator = new FileLocator(__DIR__.'/../Resources/config');
        $loader = new YamlFileLoader($container, $fileLocator);

        $loader->load('services.yml');
    }

}