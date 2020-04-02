<?php

declare(strict_types=1);

namespace MonsieurBiz\SyliusRichEditorPlugin\Form\Type\UiElement;

use MonsieurBiz\SyliusRichEditorPlugin\Form\Type\NameableTypeInterface;
use MonsieurBiz\SyliusRichEditorPlugin\Form\Type\NameableTypeTrait;
use MonsieurBiz\SyliusRichEditorPlugin\Form\Type\WysiwygType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class TextType extends AbstractType implements NameableTypeInterface
{

    use NameableTypeTrait;

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->addUiElementNameField($builder);

        $builder
            ->add('content', WysiwygType::class, [
                'required' => true,
                'label' => 'monsieurbiz_richeditor_plugin.ui_element.text.field.content',
                'constraints' => [
                    new Assert\NotBlank([])
                ],
            ])
        ;
    }
}
