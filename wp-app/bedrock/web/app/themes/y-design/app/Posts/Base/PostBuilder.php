<?php

namespace App\Posts\Base;

use Composer\ClassMapGenerator\ClassMapGenerator;

class PostBuilder
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
    public function initAllPosts()
    {
        $childClasses = $this->getAllChildClasses();

        foreach ($childClasses as $childClass) {
            $reflectionClass = new \ReflectionClass($childClass);

            if ($reflectionClass->hasMethod("registerPost")) {
                $method = $reflectionClass->getMethod("registerPost");
                $method->invoke(new $childClass());
            }
            if ($reflectionClass->hasMethod("registerFields")) {
                $method = $reflectionClass->getMethod("registerFields");
                $method->invoke(new $childClass());
            }
        }
    }

    public static function getPosts()
    {
        $instance = new self();
        add_action( 'init', array( $instance, 'initAllPosts' ) );
    }
}