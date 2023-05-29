<?php

namespace App\Blocks\Accordion;

use App\Blocks\Base\BlockBuilder;
use StoutLogic\AcfBuilder\FieldsBuilder;

Class Accordion extends BlockBuilder {

    public $name = 'accordion';
    public $icon;
    public $block;

    public function __construct()
    {
        $this->icon = asset('images/logo.svg');
        $this->block = new FieldsBuilder($this->name);
    }

    public function registerBlock()
    {
        $args = [
            'name'				=> $this->name,
            'title'				=>__('Akkordeon', 'nova'),
            'description'		=>__('Akkordeon', 'nova'),
            'render_callback'	=> 'blockRenderCallback',
            'category'			=> 'y-blocks',
            'icon'				=> $this->icon,
            'keywords'			=> array( 'guide', 'style'),
            'mode' 				=> 'edit'
        ];

        parent::buildBlock($args);
    }

    public function registerFields()
    {
        $this->block
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
    }

    public function registerLocation()
    {
        $this->block->setLocation("block", "==", "acf/$this->name");

        parent::buildFields($this->block);
    }
}