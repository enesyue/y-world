<?php 

namespace App\Blocks\Base;

use Illuminate\Support\Facades\View;
use Composer\ClassMapGenerator\ClassMapGenerator;

class BlockBuilder
{
    /**
     * Get all child classes from parent class.
     *
     * @return $childClasses
     */
    public function getAllChildClasses()
    {
        $childClassesPath = ClassMapGenerator::createMap(__DIR__ . '/..');
        $parentClass = get_called_class();
        $childClasses = [];

        foreach($childClassesPath as $key=>$value) {
            if($key != $parentClass) {
                $childClasses[] = $key;
            }
        }

        return $childClasses;
    }

    /**
     * Loop through all child classes and trigger methods to automatically invoke build process.
     * Creates and builds ACF Blocks + adds custom fields via ACF Builder.
     *
     * @return void
     */
    public function initAllBlocks()
    {
        $childClasses = $this->getAllChildClasses();

        $allowedBlockList = [];
        foreach ($childClasses as $childClass) {
            $reflectionClass = new \ReflectionClass($childClass);

            if ($reflectionClass->hasMethod("registerBlock")) {
                $method = $reflectionClass->getMethod("registerBlock");
                $method->invoke(new $childClass());
            }
            if ($reflectionClass->hasMethod("registerFields")) {
                $method = $reflectionClass->getMethod("registerFields");
                $method->invoke(new $childClass());
            }
            if ($reflectionClass->hasMethod("returnBlockName")) {
                $method = $reflectionClass->getMethod("returnBlockName");
                $allowedBlock = $method->invoke(new $childClass());
                array_push($allowedBlockList, $allowedBlock);
            }
        }

        $this->allowAsBlock($allowedBlockList);
    }

    /**
     * Build ACF Block.
     *
     * @param [type] $args
     * @return void
     */
    public function buildBlock($args)
    {
        acf_register_block($args);
    }

    /**
     * Build ACF Fields for ACF Blocks.
     *
     * @param [type] $block
     * @param [type] $name
     * @return void
     */
    public function buildFields($block, $name)
    {
        $block
            ->addTab('settings_margin', [
                'label' => __('Abstandeinstellung', 'sage'),
            ])
            ->addTrueFalse('remove_margin', [
                'label' => __('Abstand deaktivieren'),
                'ui' => 1,
            ])
        ; // Add margin-toggle for all blocks 

        $block->setLocation("block", "==", "acf/$name");

        acf_add_local_field_group($block->build());
    }

    /**
     * Add custom blocks to WP and remove existing Gutenberg modules.
     *
     * @param [type] $allowedBlockList
     * @return void
     */
    public function allowAsBlock($allowedBlockList)
    {
        add_filter('allowed_block_types_all', function($allowedBlockItems) use ($allowedBlockList) {
            $allowedBlockItems = $allowedBlockList;
            foreach($allowedBlockItems as $item) {
                $allowedBlockItems[] = "acf/$item";
            }
            return array_merge($allowedBlockItems, [
                'core/heading',
                'core/paragraph',
                'core/list',
            ]);
        }, 20, 2);
    }

    /**
     * Render blade-components as ACF blocks.
     *
     * @param [type] $block
     * @param boolean $isPreview
     * @return void
     */
    public function render($block, $isPreview = false)
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

    /**
     * Static method to create instance of itself and start initializing (+ adding) everything to WP core.
     *
     * @return void
     */
    public static function getBlocks()
    {
        $instance = new self();
        add_action( 'admin_init', array( $instance, 'initAllBlocks' ) );
    }
}