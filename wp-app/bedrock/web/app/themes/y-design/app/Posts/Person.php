<?php

namespace App\Posts;

use App\Posts\Base\PostBuilder;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Person extends PostBuilder
{
    public const NAME = 'person';
    public const DEPARTMENT_TAX = 'department';
    protected $gutenberg_enabled = false;
    protected $fields;

    public function __construct()
    {
        $this->fields = new FieldsBuilder(static::NAME);
    }

    public function registerPost()
    {
        $args = [
            'label'                 => __('Personen', 'nova'),
            'description'           => __('Personen', 'nova'),
            'labels'                => [
                'name'                  => __('Personen', 'nova'),
                'singular_name'         => __('Person', 'nova'),
                'menu_name'             => __('Personen', 'nova'),
                'name_admin_bar'        => __('Person', 'nova'),
                'archives'              => __('Person Archives'),
                'attributes'            => __('Person Attributes'),
                'parent_item_colon'     => __('Parent Item:'),
                'all_items'             => __('Person', 'nova'),
                'add_new_item'          => __('Person hinzufügen', 'nova'),
                'add_new'               => __('Neue Person', 'nova'),
                'new_item'              => __('Neue Person', 'nova'),
                'edit_item'             => __('Person bearbeiten', 'nova'),
                'update_item'           => __('Person aktualisieren', 'nova'),
                'view_item'             => __('Person anzeigen', 'nova'),
                'view_items'            => __('Personen anzeigen', 'nova'),
            ],
            'supports'              => ['title', 'content', 'thumbnail', 'revisions'],
            'taxonomies'            => [],
            // 'menu_icon'             => $this->getIcon('group.svg'),
            'rewrite'      => [
                'slug' => 'person',
                'with_front' => true,
            ],
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 4,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => false,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
            // "cptp_permalink_structure" => "/%department%/person/%postname%/",
            'show_in_rest' => true, // Gutenberg support
        ];
        register_post_type(self::NAME, $args);

        register_taxonomy(
            self::DEPARTMENT_TAX,
            self::NAME,
            [
                'label' => __('Abteilung', 'nova'),
                'labels' => [
                    'name'              => _x('Abteilungen', 'taxonomy general name', 'nova'),
                    'singular_name'     => _x('Abteilung', 'taxonomy singular name', 'nova'),
                    'search_items'      => __('Abteilung suchen', 'nova'),
                    'all_items'         => __('Alle Abteilungen', 'nova'),
                    'view_item'         => __('Abteilung zeigen', 'nova'),
                    'parent_item'       => __('Übergeordnete Abteilung', 'nova'),
                    'parent_item_colon' => __('Übergeordnete Abteilung:', 'nova'),
                    'edit_item'         => __('Abteilung bearbeiten', 'nova'),
                    'update_item'       => __('Abteilung aktualisieren', 'nova'),
                    'add_new_item'      => __('Neue Abteilung hinzufügen', 'nova'),
                    'new_item_name'     => __('Neuer Abteilungsname', 'nova'),
                    'not_found'         => __('Keine Abteilungen gefunden', 'nova'),
                    'back_to_items'     => __('Zurück zu den Abteilungen', 'nova'),
                    'menu_name'         => __('Abteilungen', 'nova'),
                ],
                // 'rewrite' => [
                //     'slug' => 'personen/abteilung',
                //     "with_front" => true,
                //     'hierarchical' => true,
                // ],
                'hierarchical'              => true,
                'public'                    => true,
                'show_ui'                   => true,
                'show_admin_column'         => true,
                'show_in_nav_menus'         => true,
                'has_archive'               => true,
                'show_in_quick_edit'        => true,
            ]
        );
    }

    public function registerFields()
    {

    }
}