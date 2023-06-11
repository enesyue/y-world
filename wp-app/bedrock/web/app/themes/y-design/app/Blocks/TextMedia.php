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
            'mode' 				=> 'edit'
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
                'label' => __('Inhalt', 'nova'),
            ])
                ->addText('text_field', [
                    'label' => 'Text Field',
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
                ->addCheckbox('checkbox_field', [
                    'label' => 'Checkbox Field',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => [],
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'choices' => [],
                    'allow_custom' => 0,
                    'save_custom' => 0,
                    'default_value' => [],
                    'layout' => 'vertical',
                    'toggle' => 0,
                    'return_format' => 'value',
                ])

        ; // Hier schließt sich der block

        parent::buildFields($this->block, static::NAME);
    }

    public function returnBlockName()
    {
        return static::NAME;
    }
}