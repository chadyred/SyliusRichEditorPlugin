<?php
declare(strict_types=1);

namespace MonsieurBiz\SyliusRichEditorPlugin\DependencyInjection;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

final class UiElementRegistryPass implements CompilerPassInterface
{
    public const UI_ELEMENT_SERVICE_TAG = 'monsieurbiz_rich_editor.ui_element';

    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container): void
    {
        if (!$container->has('monsieurbiz_rich_editor.registry')) {
            return;
        }

        $uiElementRegistry = $container->findDefinition('monsieurbiz_rich_editor.registry');

        $taggedServices = $container->findTaggedServiceIds(self::UI_ELEMENT_SERVICE_TAG);
        foreach (array_keys($taggedServices) as $id) {
            $uiElementRegistry->addMethodCall('addUiElement', [new Reference($id)]);
        }
    }
}
