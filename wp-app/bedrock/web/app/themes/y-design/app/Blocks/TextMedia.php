<?php

namespace App\Blocks;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Blocks\Base\BlockBuilder;


class TextMedia extends BlockBuilder
{
    public const NAME = 'text-media';
    public $shownName = "Text Media";
    public $icon;
    public $block;

    public function __construct()
    {
        $this->icon = asset('images/logo.svg');
        $this->block = new FieldsBuilder(static::NAME);
    }

    public function registerBlock()
    {
        $args = [
            'name'				=> static::NAME,
            'title'				=>__("$this->shownName", 'sage'),
            'description'		=>__("$this->shownName", 'sage'),
            'render_callback'   => [$this, 'render'],
            'category'			=> 'y-blocks',
            'keywords'			=> ['y-design', 'y-block', $this->shownName, static::NAME],
            'mode' 				=> 'edit',
        ];

        parent::buildBlock($args);
    }

    public function registerFields()
    {
        $this->block
            ->addMessage('_', "<h2>$this->shownName</h2>", [
                'label' => '',
            ])
            ->addTab(static::NAME, [
                'label' => __('Inhalt', 'sage'),
            ])
                ->addText('subheadline', [
                    'label' => 'Subheadline',
                    'instructions' => '',
                    'required' => 0,
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ])
                ->addWysiwyg('headline', [
                    'label' => 'Headline',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => [],
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'default_value' => '',
                    'tabs' => 'visual',
                    'toolbar' => 'basic',
                    'media_upload' => 0,
                    'delay' => 0,
                ])
                ->addWysiwyg('description', [
                    'label' => 'Beschreibung',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => [],
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'default_value' => '',
                    'tabs' => 'visual',
                    'toolbar' => 'basic',
                    'media_upload' => 0,
                    'delay' => 0,
                ])

                // Button-Group Begin
                ->addLink('primary_button', [
                    'label' => 'Primär Button',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => [],
                    'wrapper' => [
                        'width' => '50',
                        'class' => '',
                        'id' => '',
                    ],
                    'return_format' => 'array',
                ])
                ->addLink('secondary_button', [
                    'label' => 'Sekundär Button',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => [],
                    'wrapper' => [
                        'width' => '50',
                        'class' => '',
                        'id' => '',
                    ],
                    'return_format' => 'array',
                ])
                // Button-Group End

                ->addImage('image', [
                    'label' => 'Bild',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => [],
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'return_format' => 'id',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                ])

            ->addTab('layout', [
                'label' => __('Layout', 'sage'),
            ])
                ->addSelect('layout', [
                    'label' => 'Layout',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => [],
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'choices' => [
                        'column' => 'Column',
                        'row' => 'Row',
                    ],
                    'default_value' => 'two',
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 0,
                    'ajax' => 0,
                    'return_format' => 'value',
                    'placeholder' => '',
                ])
                ->addSelect('order', [
                    'label' => 'Reihenfolge',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => [
                        [
                            [
                                'field' => 'layout',
                                'operator' => '==',
                                'value' => 'row',
                            ]
                        ]
                    ],
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'choices' => [
                        'text-media' => 'Text - Medien',
                        'media-text' => 'Medien - Text',
                    ],
                    'default_value' => 'two',
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 0,
                    'ajax' => 0,
                    'return_format' => 'value',
                    'placeholder' => '',
                ])
                ->addTrueFalse('background', [
                    'label' => 'Hintergrundfarbe anzeigen',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => [],
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'message' => '',
                    'default_value' => 0,
                    'ui' => 1,
                    'ui_on_text' => 'Ja',
                    'ui_off_text' => 'Nein',
                ])

        ; // Hier schließt sich der block

        parent::buildFields($this->block, static::NAME);
    }

    public function returnBlockName()
    {
        return static::NAME;
    }
}