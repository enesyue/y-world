<?php

namespace App\Blocks;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Blocks\Base\BlockBuilder;

class Accordion extends BlockBuilder
{
    public const NAME = 'accordion';
    public $shownName = "Akkordeon";
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
                ->addWysiwyg('wysiwyg_field', [
                    'label' => 'WYSIWYG Field',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => [],
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'default_value' => '',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                    'delay' => 0,
                ])

        ; // Hier schließt sich der block

        parent::buildFields($this->block, static::NAME);
    }

    public function returnBlockName()
    {
        return static::NAME;
    }
}