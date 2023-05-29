<?php 

namespace App\Blocks\Base;

use Illuminate\Support\Facades\View;

abstract Class BlockBuilder {

    public $name;
    public $block;

    public function __construct($name, $block)
    {
        $this->name = $name;
        $this->block = $block;
    }

    public function buildBlock($args)
    {
        acf_register_block($args);
    }

    public function buildFields($block)
    {
        add_action('acf/init', function() use ($block) {
            acf_add_local_field_group($block->build());
        });
    }

    public function blockRenderCallback($block, $isPreview = false)
    {
        // convert name ("acf/example") into path friendly slug ("example")
        $slug = str_replace('acf/', '', $block['name']);

        // include a template part from within the "template-parts/block" folder
        $view = "blocks." . $slug;

        if(View::exists($view)) {
            echo view($view, ['block' => $block]);
            return;
        }

        echo "<div>Not found</div>";
        
        return;
    }
}